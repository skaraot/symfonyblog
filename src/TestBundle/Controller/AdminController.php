<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use TestBundle\Entity\article;

class AdminController extends Controller
{
    public function indexAction(Request $request)
    {
        if ($request) {
            $session = new Session();
            $session->remove('user');
            $user = $request->request->get('user');
            $pwd = $request->request->get('pwd');

            $entity = $this->getDoctrine()->getManager();
            $entrance = $entity->getRepository('TestBundle:user')->findOneBy(array('user' => $user, 'pass' => $pwd));

            if (null !== $entrance) {
                $session->start();
                $session->set('user', $user);
                return $this->redirect($this->generateUrl('panel'));
            } else {
                return $this->render('TestBundle:Admin:index.html.twig');
            }
        }else{
            return $this->render('TestBundle:Admin:index.html.twig');
        }
    }

    public function panelAction()
    {
        $session = new Session();
        if ($session->has('user')){
            $entity = $this->getDoctrine()->getManager();
            $sonuc = $entity->getRepository('TestBundle:article')->findAll();
            return $this->render('TestBundle:Admin:panel.html.twig', array('articles' => $sonuc));
        }else{
            return $this->render('TestBundle:Admin:index.html.twig');
        }

    }

    public function duzenleAction($id, $ap)
    {
        $activeYN = $ap === 'Y' ? 'N' : 'Y';

        $entity = $this->getDoctrine()->getManager();
        $article = $entity->getRepository('TestBundle:article')->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'İlgili kayıt bulunamadı --> '.$id
            );
        }

        $article->setActiveYN($activeYN);
        $entity->flush();

        return $this->redirect($this->generateUrl('panel'));
    }

    public function kaydetAction(Request $request)
    {
        $title = $request->request->get('title');
        $slugtitle = $request->request->get('slugtitle');

        $currentDate = date('Y-m-d H:i:s');
        $article = $request->request->get('article');

        $newArticle = new article();
        $newArticle->setActiveYN('N');
        $newArticle->setArticle($article);
        $newArticle->setDate(new \DateTime($currentDate));
        $newArticle->setSlugtitle($slugtitle);
        $newArticle->setTitle($title);
        $newArticle->setUser('admin');

        $entity = $this->getDoctrine()->getManager();
        $entity->persist($newArticle);
        $entity->flush();

        return $this->redirect($this->generateUrl('panel'));
    }

    public function kapatAction()
    {
        $session = new Session();
        $session->remove('user');
        return $this->redirect($this->generateUrl('admin'));
    }
}

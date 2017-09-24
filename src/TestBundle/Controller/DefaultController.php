<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()//$name
    {
        $entity = $this->getDoctrine()->getManager();
        $sonuc = $entity->getRepository('TestBundle:article')->findBy(array('activeYN' => 'Y'));
        return $this->render('TestBundle:Default:index.html.twig', array('articles' => $sonuc));//
    }

    public function aramaAction( Request $request)
    {
        $title = $request->request->get('articlesearch');
        $entity = $this->getDoctrine()->getManager();

        $query = $entity->createQuery(
            'Select a from 
            TestBundle:article a
            WHERE a.title LIKE :title
            AND a.activeYN = :activeYN
            ORDER BY a.id ASC'
        )->setParameters(array ('title' => '%'.$title.'%', 'activeYN' => 'Y'));
        $products = $query->getResult();

        /*$article = $entity->getRepository( 'TestBundle:article')
            ->findBy(array('title' => $title), array('id' => 'DESC'));*/
        return $this->render ( 'TestBundle:Default:aramasonuc.html.twig', array('articles' => $products));
    }


    public function detayAction($slugTitle)
    {
        $entity = $this->getDoctrine()->getManager();
        $article = $entity->getRepository( 'TestBundle:article')->findOneBy(array('slugtitle' => $slugTitle));
        return $this->render( 'TestBundle:Default:detay.html.twig', array('detay' => $article));
    }
}

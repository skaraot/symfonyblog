<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * article
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="article", type="text")
     */
    private $article;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=150)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slugtitle", type="string", length=175)
     */
    private $slugtitle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=50)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="activeYN", type="string", length=1)
     */
    private $activeYN;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set article
     *
     * @param string $article
     * @return article
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string 
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set slugtitle
     *
     * @param string $slugtitle
     * @return article
     */
    public function setSlugtitle($slugtitle)
    {
        $this->slugtitle = $slugtitle;

        return $this;
    }

    /**
     * Get slugtitle
     *
     * @return string 
     */
    public function getSlugtitle()
    {
        return $this->slugtitle;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return article
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set activeYN
     *
     * @param string $activeYN
     * @return article
     */
    public function setActiveYN($activeYN)
    {
        $this->activeYN = $activeYN;

        return $this;
    }

    /**
     * Get activeYN
     *
     * @return string 
     */
    public function getActiveYN()
    {
        return $this->activeYN;
    }
}

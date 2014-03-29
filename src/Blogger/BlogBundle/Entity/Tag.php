<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 25.03.14
 * Time: 18:38
 */

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\Repository\TagRepository")
 * @ORM\Table(name="tag")
 */
class Tag {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Blog", mappedBy="tags")
     */
    protected $posts;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $slug;

    protected $weight;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->weight = 0;
    }

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
     * Set name
     *
     * @param string $name
     * @return Tag
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Tag
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set weight
     *
     * @param \int $weight
     * @return Tag
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return \int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Add posts
     *
     * @param \Blogger\BlogBundle\Entity\Blog $posts
     * @return Tag
     */
    public function addPost(\Blogger\BlogBundle\Entity\Blog $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Blogger\BlogBundle\Entity\Blog $posts
     */
    public function removePost(\Blogger\BlogBundle\Entity\Blog $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    public function getPostCount()
    {
        return $this->posts->count();
    }

    public function __toString()
    {
        return $this->getName();
    }
}

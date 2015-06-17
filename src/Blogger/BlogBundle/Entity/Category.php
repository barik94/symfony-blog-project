<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\Repository\CategoryRepository")
 * @ORM\Table(name="Category")
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $quantOfPosts;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="category")
     */
    protected $posts;

    /**
     * @ORM\Column(type="string")
     */
    protected $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isDefault;

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
     * Set category name
     *
     * @param string $catName
     * @return Category
     */
    public function setName($catName)
    {
        $this->name = $catName;

        return $this;
    }

    /**
     * Get category name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set quantOfPosts
     *
     * @return Category
     */
    public function setQuantOfPosts()
    {
        $this->quantOfPosts = count($this->posts);

        return $this;
    }

    /**
     * Get quantOfPosts
     *
     * @return integer 
     */
    public function getQuantOfPosts()
    {
        return $this->quantOfPosts;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
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
     * Set isDefault
     *
     * @param boolean $isDefault
     * @return Category
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();

        $this->isDefault = false;
        $this->postCount = 0;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Add posts
     *
     * @param \Blogger\BlogBundle\Entity\Blog $posts
     * @return Category
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

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
        $metadata->addPropertyConstraint('name', new Length(array('max'=>15)));

        $metadata->addPropertyConstraint('slug', new NotBlank());
        $metadata->addPropertyConstraint('slug', new Length(array('max'=>15)));
    }
}

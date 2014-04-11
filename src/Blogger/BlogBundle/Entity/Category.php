<?php
/**
 * Created by PhpStorm.
 * User: BARIK
 * Date: 24.03.14
 * Time: 14:47
 */

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
class Category {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $catName;

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
     * Set catName
     *
     * @param string $catName
     * @return Category
     */
    public function setCatName($catName)
    {
        $this->catName = $catName;

        return $this;
    }

    /**
     * Get catName
     *
     * @return string 
     */
    public function getCatName()
    {
        return $this->catName;
    }

    /**
     * Set quantOfPosts
     *
     * @param integer $quantOfPosts
     * @return Category
     */
    public function setQuantOfPosts($quantOfPosts)
    {
        $this->quantOfPosts = $quantOfPosts;

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
        return $this->getCatName();
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
        $metadata->addPropertyConstraint('catName', new NotBlank());
        $metadata->addPropertyConstraint('catName', new Length(array('max'=>15)));

        $metadata->addPropertyConstraint('slug', new NotBlank());
        $metadata->addPropertyConstraint('slug', new Length(array('max'=>15)));
    }
}

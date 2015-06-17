<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;

/**
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $username;

    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
     *
     */
    protected $roles;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=32)
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Blog", mappedBy="author")
     */
    protected $posts;

    public function __construct()
    {
        $this->isActive = true;
        $this->roles = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->salt = md5(uniqid(null,true));
    }

    public function __toString()
    {
        return $this->getUsername();
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->isActive;
    }

    /**
     * Add roles
     *
     * @param \Blogger\BlogBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\Blogger\BlogBundle\Entity\Role $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \Blogger\BlogBundle\Entity\Role $roles
     */
    public function removeRole(\Blogger\BlogBundle\Entity\Role $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * Add post
     *
     * @param Blog $post
     * @return User
     */
    public function addPosts(Blog $post)
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param Blog $post
     */
    public function removePosts(Blog $post)
    {
        $this->posts->removeElement($post);
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('username', new NotBlank());
        $metadata->addPropertyConstraint('username', new Length(array('max'=>15)));

        $metadata->addPropertyConstraint('email', new Email(array(
            'message' => 'Symblog does not like invalid emails. Give me a real one!'
        )));

        $metadata->addPropertyConstraint('roles', new NotBlank());

        $metadata->addPropertyConstraint('password', new NotBlank());
        $metadata->addPropertyConstraint('password', new Length(array('min'=>4)));

    }
}

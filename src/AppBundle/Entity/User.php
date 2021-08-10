<?php

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */

class User extends BaseUser

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
     * @ORM\Column(type="string")
     */

    protected $surname;
    /**
     * @ORM\Column(type="string",nullable=true)
     * @Assert\File(mimeTypes={ "image/png" })
     */

    protected $prof_image;

    protected $roles;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->name = $firstName;
        return $this;
    }
    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->name;
    }
    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->surname = $lastName;
        return $this;
    }
    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->surname;
    }



    /**
     * Set ProfImage
     *
     * @param string $profImage
     *
     * @return User
     */

    public function setProfImage($profImage)

    {
        $this->prof_image = $profImage;
        return $this;
    }

    /**
     * Get profImage
     *
     * @return string
     */

    public function getProfImage()

    {
        return $this->prof_image;
    }

}
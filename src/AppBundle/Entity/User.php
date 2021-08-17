<?php

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;
use DateTime;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @UniqueEntity("username",message="Already exists Username")
 * @UniqueEntity("email",message="Already exists Email")
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
     * @ORM\Column(type="datetime")
     */
    protected $registrationDate;
    /**
     * @ORM\Column(type="integer")
     */

    protected $newsActivation=0;
    /**
     * @ORM\Column(type="string",nullable=true)
     * * @Assert\File(mimeTypes={ "image/png" })
     */

    protected $prof_image;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $confirm_token;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $user_rating;



    protected $roles;

    public function __construct()
    {
        parent::__construct();
        $this->roles = array('ROLE_USER');
       // $this->registrationDate = new DateTime();
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
     * Set confirmToken
     *
     * @param string $confirmToken
     *
     * @return User
     */
    public function setConfirmToken($confirmToken)
    {
        $this->confirm_token = $confirmToken;
        return $this;
    }
    /**
     * Get firstName
     *
     * @return string
     */
    public function getConfirmToken()
    {
        return $this->confirm_token;
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
     * Set date
     *
     * @param $registrationDate
     * @return User
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }
    /**
     * Get date
     *
     * @return DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }
/**
     * Set newsActivation
     *
     * @param $newsActivation
     * @return User
     */
    public function setNewsActivation($newsActivation)
    {
        $this->newsActivation = $newsActivation;
        return $this;
    }
    /**
     * Get date
     *
     * @return integer
     */
    public function getNewsActivation()
    {
        return $this->newsActivation;
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

    /**
     * Set userRating
     *
     * @param string $userRating
     *
     * @return User
     */

    public function setUserRating($userRating)

    {
        $this->user_rating = $userRating;
        return $this;
    }

    /**
     * Get userRating
     *
     * @return string
     */

    public function getUserRating()

    {
        return $this->user_rating;
    }

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

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, array('allowed_classes' => false));
    }
}
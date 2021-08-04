<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class users{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */private $username;
    /**
     * @ORM\Column(type="string")
     */private $name;
    /**
     * @ORM\Column(type="string")
     */private $surname;
    /**
     * @ORM\Column(type="string")
     */private $role;
    /**
     * @ORM\Column(type="string")
     */private $passwd;
    /**
     * @ORM\Column(type="string")
     */private $phone;

}

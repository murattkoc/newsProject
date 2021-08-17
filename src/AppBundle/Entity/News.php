<?php

// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="news")
 */

class News

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

    protected $title;
    /**
     * @ORM\Column(type="string")
     */

    protected $subject;
    /**
     * @ORM\Column(type="string",nullable="true")
     */

    protected $image;
    /**
     * @ORM\Column(type="string")
     */

    protected $content;
    /**
     * @ORM\Column(type="string")
     */

    protected $author_id;
    /**
     * @ORM\Column(type="string",nullable="true")
     */

    protected $editor_id;
    /**
     * @ORM\Column(type="string")
     */

    protected $a;
    /**
     * @ORM\Column(type="datetime")
     */

    protected $added_time;
    /**
     * @ORM\Column(type="datetime")
     */

    protected $public_time;
}
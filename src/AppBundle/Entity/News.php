<?php

// src/AppBundle/Entity/News.php

namespace AppBundle\Entity;
use DateTime;
use FOS\UserBundle\Model\User as BaseUser;
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
     * @ORM\Column(type="string",nullable=true)
     * @Assert\File(mimeTypes={ "image/png" })
     */

    protected $image;
    /**
     * @ORM\Column(type="string")
     */

    protected $content;
    /**
     * @ORM\Column(type="integer")
     */

    protected $author_id;
    /**
     * @ORM\Column(type="integer",nullable=true)
     */

    protected $editor_id;
    /**
     * @ORM\Column(type="string", nullable=true)
     */

    protected $receive_id;
    /**
     * @ORM\Column(type="string")
     */

    protected $public_status;
    /**
     * @ORM\Column(type="string",nullable=true)
     */

    protected $news_status;
    /**
     * @ORM\Column(type="string",nullable=true)
     */

    protected $news_rating;
    /**
     * @ORM\Column(type="datetime")
     */

    protected $added_time;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     */

    protected $public_time;


    /**
     * Set title
     *
     * @param string $title
     *
     * @return News
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
     * Set title
     *
     * @param string $subject
     *
     * @return News
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

/**
 * Set image
 *
 * @param string $image
 * @return News
 */
public function setImage($image){
     $this->image=$image;
    return $this;
}
/**
 * Get image
 *
 * @return  string
 */
public function getImage()
{
    return $this->image;
}
/**
 * Set content
 *
 * @param string $content
 * @return News
 */
public function setContent($content){
    $this->content=$content;
    return $this;
}
/**
 * Get content
 *
 * @return string
 */
public function getContent(){
    return  $this->content;
}

/**
 * Set authorID
 *
 * @param string $authorID
 * @return News
 *
 */
public function setAuthorID($authorID){
    $this->author_id=$authorID;
    return $this;
}

/**
 * Get AuthorID
 *
 * @return string
 *
 */
public function getAuthorID(){
    return $this->author_id;
}

/**
 * Set editorID
 *
 * @param string $editorID
 * @return News
 *
 */
public function setEditorID($editorID){
    $this->editor_id=$editorID;
    return $this;
}

/**
 * Get editorID
 *
 * @return string
 *
 */
public function getEditorID(){
    return $this->editor_id;
    }

  /**
   * Set ReceiveID
   *
   * @param string $receiveID
   * @return News
   */
  public function setReceiveID($receiveID){
      $this->receive_id=$receiveID;
      return $this;
  }

  /**
   * Get ReceiveID
   *
   * @return string
   *
   */

  public function getReceiveID(){
      return $this->receive_id;
  }
  /**
   * Set publicStatus
   *
   * @param string $publicStatus
   * @return News
   */
  public function setPublicStatus($publicStatus){
      $this->public_status=$publicStatus;
      return $this;
  }

  /**
   * Get publicStatus
   *
   * @return string
   *
   */
    public function getPublicStatus(){
        return $this->public_status;
    }

    /**
     * Set newsStatus
     *
     * @param string $newsStatus
     * @return News
     */
    public function setNewsStatus($newsStatus){
        $this->news_status=$newsStatus;
        return $this;
    }
    /**
     * Get newsStatus
     *
     * @return String
     *
     */
    public function getNewsStatus(){
        return $this->news_status;
    }

    /**
     * Set newsRating
     *
     * @param string $newsRating
     *
     *@return News
     */
    public function setNewsRating($newsRating){
        $this->news_rating=$newsRating;
        return $this;
    }
    /**
     * Get newsRating
     *
     * @return string
     */
    /**
     * @return mixed
     */
    public function getNewsRating()
    {
        return $this->news_rating;
    }
    /**
     * Set addedTime
     *
     * @param string $addedTime
     *
     * @return News
     *
     */
    public function setAddedTime($addedTime){
        $this->added_time=$addedTime;
        return $this;

    }

    /**
     * Get addedTime
     *

     * @return DateTime
     */
    public function getAddedTime()
    {
        return $this->added_time;
    }
    /**
     * Set publicTime
     *
     * @param string $publicTime
     *
     * @return News
     */
    public function setPublicTime($publicTime)
    {
        $this->public_time = $publicTime;
        return $this;
    }
    /**
     * Get publicTime
     *
     * @return DateTime

     */
    public function getPublicTime()
    {
        return $this->public_time;
    }
}

<?php

namespace AppBundle\Entity;

use DateTime;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="news_edit")
 */
class News_edit
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\Column(type="integer")
     */

    protected $news_id;
    /**
     * @ORM\Column(type="integer")
     */

    protected $author_id;
    /**
     * @ORM\Column(type="string")
     */

    protected $edit_note;
    /**
     * @ORM\Column(type="datetime")
     */

    protected $edit_request_date;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */

    protected $edit_request_apply_date;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    protected $edit_date;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set newsID
     * @param string $newsID
     * @return News_edit
     */
    public function setNewsID($newsID)
    {
        $this->news_id = $newsID;
        return $this;
    }

    /**
     * Get NewsID
     * @return string
     *
     */
    public function getNewsID()
    {
        return $this->news_id;
    }

    /**
     * Set authorID
     *
     * @param string $authorID
     * @return News_edit
     *
     */
    public function setAuthorID($authorID)
    {
        $this->author_id = $authorID;
        return $this;
    }

    /**
     * Get authorID
     *
     * @return string
     */
    public function getAuthorID()
    {
        return $this->author_id;
    }

    /**
     * Set editNote
     *
     * @param string $editNote
     * @return News_edit
     */
    public function setEditNote($editNote)
    {
        $this->edit_note = $editNote;
        return $this;
    }

    /**
     * Get editNote
     *
     * @return string
     */

    public function getEditNote()
    {
        return $this->edit_note;
    }

    /**
     *Set editRequestDate
     *
     * @param string $editRequestDate
     * @return News_edit
     *
     */
    public function setEditRequestDate($editRequestDate){
        $this->edit_request_date=$editRequestDate;
        return $this;
    }
    /**
     * Get editRequestDate
     *
     * @return string
     */
    public function getEditRequestDate(){
        return $this->edit_request_date;
    }

    /**
     * Set editRequestApplyDate
     *
     * @param string $editRequestApplyDate
     *
     * @Return News_edit
     */
    public function setEditRequestApplyDate($editRequestApplyDate){
        $this->edit_request_apply_date=$editRequestApplyDate;
        return $this;
    }
    /**
     * Get editRequestApplyDate
     * @return string
     */
    public function getEditRequestApplyDate()
    {
        return $this->edit_request_apply_date;
    }
    /**
     * Set editDate
     * @param string $editDate
     * @return News_edit
     */
    public function setEditDate($editDate){
        $this->edit_date=$editDate;
        return $this;
    }
    /**
     * Get editDate
     * @return string
     *
     */
    public function getEditDate()
    {
        return $this->edit_date;
    }
}
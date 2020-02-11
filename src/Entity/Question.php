<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection; 
use App\Entity\Answer;

/**
 * @ORM\Entity
 * @ORM\Table(name="question")
 *
 */
class Question
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="title", type="string", length=255)
     * 
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="promoted", type="boolean", nullable=true)
     *
     */
    private $promoted;

    /**
     * @var datetime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     * 
     */
    private $created;

    /**
     * @var datetime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     *
     */
    private $updated;

  

    /**
     * @ORM\Column(name="status", type="string", columnDefinition="status_enum", nullable=true)
     * 
     */
    private $status;

   
    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"persist", "remove" })
     * 
     */
    
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="QuestionHistoric", mappedBy="question", cascade={"persist", "remove" })
     * 
     */
    
    private $questionhistorics;
    

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of promoted
     *
     * @return  boolean
     */ 
    public function getPromoted()
    {
        return $this->promoted;
    }

    /**
     * Set the value of promoted
     *
     * @param  boolean  $promoted
     *
     * @return  self
     */ 
    public function setPromoted($promoted)
    {
        $this->promoted = $promoted;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return  datetime
     */ 
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param  datetime  $created
     *
     * @return  self
     */ 
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of updated
     *
     * @return  datetime
     */ 
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @param  datetime  $updated
     *
     * @return  self
     */ 
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of channel
     */ 
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set the value of channel
     *
     * @return  self
     */ 
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

   /**
     * Set answers
     *
     * @param string $answers
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return string
     */
    public function getAnswers()
    {
        return $this->answers;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->questionhistorics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answers
     *
     * @param App\Entity\Answer $answers
     * @return Question
     */
    public function addAnswers(Answer $answers)
    {
        $this->getAnswers()->add($answers) ;
        $answers->setQuestion($this);
    
        return $this;
    }

    /**
     * Remove answers
     *
     * @param App\Entity\Answer $answers
     */
    public function removeAnswers( $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set questionhistorics
     *
     * @param string $questionhistorics
     * @return Question
     */
    public function setQuestionhistorics($questionhistorics)
    {
        $this->questionhistorics = $questionhistorics;

        return $this;
    }

    /**
     * Get questionhistorics
     *
     * @return string
     */
    public function getQuestionhistorics()
    {
        return $this->questionhistorics;
    }
    

    /**
     * Add questionhistorics
     *
     * @param App\Entity\QuestionHistoric $questionhistorics
     * @return Question
     */
    public function addQuestionhistorics(QuestionHistoric $questionhistorics)
    {
        $this->getAnswers()->add($questionhistorics) ;
        $questionhistorics->setQuestion($this);
    
        return $this;
    }

    /**
     * Remove questionhistorics
     *
     * @param App\Entity\QuestionHistoric $questionhistorics
     */
    public function removeQuestionhistorics( $questionhistorics)
    {
        $this->questionhistorics->removeElement($questionhistorics);
    }
}

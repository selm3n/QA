<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="answer")
 *
 */
class Answer
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="body", type="string", length=255)
     * 
     */
    private $body;

    /**
     * @ORM\Column(name="channel", type="string", columnDefinition="channel_enum", nullable=true)
     *
     * 
     */
    private $channel;

    
    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * 
     */
    private $question;

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
     * Get the value of question
     */ 
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * * @param string $question
     *
     * @return  self
     */ 
    public function setQuestion($question)
    {
        $this->question = $question;
        // $question->setAnswers($this);
        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

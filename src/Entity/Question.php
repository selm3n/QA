<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(name="body", type="string", length=255)
     * 
     */
    private $body;

    /**
     * @ORM\Column(name="status", type="string", columnDefinition="status_enum", nullable=true)
     * 
     */
    private $status;

    /**
     * @ORM\Column(name="channel", type="string", columnDefinition="channel_enum", nullable=true)
     *
     * 
     */
    private $channel;
    

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
}

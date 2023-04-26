<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity
{

    private $id;
    private $body;
    private $creationdate;
    private $topic;
    private $user;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return  self
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function getCreationDate()
    {
        $formattedDate = $this->creationdate->format("d/m/Y à H:i:s");
        return $formattedDate;
    }

    public function setCreationDate($date)
    {
        $this->creationdate = new \DateTime($date);
        return $this;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @return  self
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

}
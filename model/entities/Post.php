<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity
{

    private $id;
    private $body;
    private $creationDate;
    private $topic;
    private $user;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getCreationDate()
    {
        return $this->creationDate->format("d/m/Y à H:i");
    }

    public function setCreationDate($date)
    {
        $this->creationDate = new \DateTime($date);
        return $this;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function __toString()
    {
        return $this->getId() . " " . $this->getBody() . " " . $this->getCreationDate() . " " . $this->getTopic() . " " . $this->getUser();
    }
}

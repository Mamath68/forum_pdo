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

    public function __construct($data){
        $this->hydrate($data);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getBody(){
        return $this->body;
    }

    public function setBody($body){
        $this->body = $body;
    }

    public function getCreationDate(){
        $formattedDate = $this->creationdate->format("d/m/Y à H:i");
        return $formattedDate;
    }

    public function setCreationDate($date){
        $this->creationdate = new \DateTime($date);
        return $this;
    }

    public function getTopic(){
        return $this->topic;
    }

    public function setTopic($topic){
        $this->topic = $topic;
    }

    public function getUser(){
        return $this->user;
    }

    public function setUser($user){
        $this->user = $user;
    }
}
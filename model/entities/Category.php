<?php
namespace Model\Entities;

use App\Entity;

final class User extends Entity
{

    private $id;
    private $title;


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}
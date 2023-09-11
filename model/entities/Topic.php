<?php

namespace Model\Entities;

use App\Entity;

final class Topic extends Entity
{

        private $id;
        private $name;
        private $creationDate;
        private $user;
        private $category;

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

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;
        }

        public function getCreationdate()
        {
                return $this->creationDate->format("d/m/Y à H:i");
        }

        public function setCreationdate($date)
        {
                $this->creationDate = new \DateTime($date);
                return $this;
        }

        public function getUser()
        {
                return $this->user;
        }

        public function setUser($user)
        {
                $this->user = $user;
        }

        public function getCategory()
        {
                return $this->category;
        }

        public function setCategory($category)
        {
                $this->category = $category;
        }

        public function __toString()
        {
                return $this->getId() . " " . $this->getName() . " " . $this->getCreationDate() . " " . $this->getUser() . " " . $this->getCategory();
        }
}

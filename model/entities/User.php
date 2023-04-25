<?php
namespace Model\Entities;

use App\Entity;

final class User extends Entity
{

    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $roleUser;
    private $dateInscription;


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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }


    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * @return  self
     */
    public function setRoleUser($roleUser)
    {
        $this->roleUser = $roleUser;

        return $this;
    }
    public function getDateInscription()
    {
        $formattedDate = $this->dateInscription->format("d/m/Y, H:i:s");
        return $formattedDate;
    }

    public function setDateInscription($date)
    {
        $this->dateInscription = new \DateTime($date);
        return $this;
    }
}
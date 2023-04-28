<?php
namespace Model\Entities;

use App\Entity;

final class User extends Entity
{

    private $id;
    private $pseudo;
    private $email;
    private $dateInscription;
    private $roleUser;
    private $password;

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

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = ucfirst($pseudo);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDateInscription()
    {
        $formattedDate = $this->dateInscription->format("d/m/Y à H:i:s");
        return $formattedDate;
    }

    public function setDateInscription($date)
    {
        $this->dateInscription = new \DateTime($date);
        return $this;
    }

    public function getRoleUser()
    {
        if (!empty($this->roleUser)) {
            return $this->roleUser;
        } else
            return [];
    }

    public function setRoleUser($roleUser)
    {

        $this->roleUser = json_decode($roleUser);
        if (empty($this->roleUser)) {
            $this->roleUser[] = "ROLE_USER";
        }
    }

    public function hasRole($roleUser)
    {
        if ($roleUser) {
            return in_array($roleUser, $this->getRoleUser());
        } else
            return false;
    }

    public function __toString()
    {
        return $this->pseudo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

    }
}
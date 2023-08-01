<?php
namespace Model\Entities;

use App\Entity;

final class User extends Entity
{
    private $id;
    private $pseudo;
    private $email;
    private $password;
    private \DateTime $registerDate;
    private $role;

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
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRegisterDate()
    {
        return $this->registerDate->format("d/m/Y à H:i");
    }

    public function setRegisterDate($date)
    {
        $this->registerDate = new \DateTime($date);
        return $this;
    }

    public function getRole()
    {
        if (!empty($this->role)) {
            return $this->role;
        } else
            return [];
    }

    public function setRole($role)
    {

        $this->role = json_decode($role);
        if (!empty($this->role)) {
            $this->role[] = "ROLE_USER";
        }
    }

    public function hasRole($role)
    {
        if ($role) {
            return in_array($role, $this->getRole());
        } else
            return false;
    }

    public function __toString()
    {
        return $this->getId() . " " . $this->getPseudo();
    }
}
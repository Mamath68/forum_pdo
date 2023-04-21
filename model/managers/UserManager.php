<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;
use Controller\HomeController;

class UserManager extends Manager
{

    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct()
    {
        parent::connect();
    }

    public function findOneByPseudo($data) {

        $sql = "SELECT u.pseudo
        FROM " . $this->tableName . " u
        WHERE  u.pseudo = :pseudo
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudo' => $data], false),
            $this->className
        );
    }

    public function updateUser($sql, $params)
    {
        DAO::update($sql, $params);
    }
}
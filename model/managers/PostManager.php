<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Controller\ForumController;

class PostManager extends Manager
{

    protected $className = "Model\Entities\Post";
    protected $tableName = "message";

    public function __construct()
    {
        parent::connect();
    }

    public function findOneBypost($title)
    {
        $sql = "SELECT *
    FROM " . $this->tableName . " t
    WHERE t.title = :title";

        return $this->getMultipleResults(
            DAO::select($sql, ['title' => $title], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT a.body, a.creationDate
            FROM " . $this->tableName . " a
            WHERE id_utilisateur = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id'=>$id], true),
            $this->className
        );
    }
    
}
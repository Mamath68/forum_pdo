<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Controller\ForumController;

class PostManager extends Manager
{

    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct()
    {
        parent::connect();
    }

    public function findOneByPost($id)
    {
        $sql = "SELECT *
    FROM " . $this->tableName . " p
    WHERE p.id_post = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

    public function findOneById($id)
    {
        $sql = "SELECT *
            FROM " . $this->tableName . " p
            WHERE p.id_post = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
    public function findOneByTopic($id)
    {
        $sql = "SELECT *
                FROM " . $this->tableName . " p
                WHERE p.topic_id = :id";

        return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
    }

    public function findPostByUser($id)
    {
        $sql = "SELECT p.id_post, p.body, p.creationDate, p.user_id
                FROM " . $this->tableName . " p
                INNER JOIN user u 
                On u.id_user = p.id_user ";

        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
}

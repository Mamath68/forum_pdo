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

    public function findAllPostByUser()
    {
        $sql = "SELECT p.id_post, p.body, p.creationDate, p.user_id
                FROM post p
                INNER JOIN user u 
                On u.id_user = p.user_id ";

        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }
    public function findPostsByTopic($id)
    {
        $sql = "SELECT p.id_post, p.body, p.creationDate, p.topic_id, p.user_id
    FROM " . $this->tableName . " p
    INNER JOIN topic t ON t.id_topic = p.topic_id
    INNER JOIN user u ON u.id_user = t.user_id
    WHERE t.id_topic = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT *
                FROM post p
                INNER JOIN user u 
                On u.id_user = p.id_user ";

        return $this->getMultipleResults(
            DAO::select($sql),
            $this->className
        );
    }

}
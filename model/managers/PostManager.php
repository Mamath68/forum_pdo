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

    public function findOneByPost($body)
    {
        $sql = "SELECT *
    FROM " . $this->tableName . " t
    WHERE t.body = :body";

        return $this->getMultipleResults(
            DAO::select($sql, ['body' => $body], true),
            $this->className
        );
    }

    public function findOneById($id)
    {
        $sql = "SELECT *
            FROM " . $this->tableName . " m
            WHERE m.id_post = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
    public function PostByTopicId($id)
    {
        $sql = "SELECT p.id_post, p.body,p.creationDate,p.user_id, p.topic_id
            FROM post p
            INNER JOIN topic t
            ON p.id_topic = t.topic_id
            WHERE t.id_topic = :id";

        $params = ['id' => $id];
        
        return $this->getMultipleResults(
            DAO::select($sql, $params, true),
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
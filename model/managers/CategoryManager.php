<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Controller\ForumController;

class PostManager extends Manager
{

    protected $className = "Model\Entities\catagory";
    protected $tableName = "category";

    public function __construct()
    {
        parent::connect();
    }

    public function findPostsByTopic($id)
    {
        $sql = "SELECT a.message, a.creationDate
            FROM " . $this->tableName . "a
            WHERE id_topic = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id=>$id'], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT a.message, a.creationDate
            FROM " . $this->tableName . "a
            WHERE id_user = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id'=>$id], true),
            $this->className
        );
    }
    
}
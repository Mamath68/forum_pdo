<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }

    public function findOneByTopic($id)
    {
        $sql = "SELECT *
        FROM " . $this->tableName . " t
        WHERE t.id_topic = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

    public function findOneByCategory($id)
    {
        $sql = "SELECT *
                    FROM " . $this->tableName . " t
                    WHERE t.category_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id
            FROM " . $this->tableName . " t
            WHERE t.user_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
}

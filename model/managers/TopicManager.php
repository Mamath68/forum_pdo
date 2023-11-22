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

    public function findTopicByUser($id)
    {
        $sql = "SELECT t.id_topic, t.name, t.creationDate, t.user_id
            FROM " . $this->tableName . " t
            INNER JOIN user u ON u.id_user = t.user_id
            WHERE t.user_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
}

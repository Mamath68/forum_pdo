<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;
use Controller\ForumController;

class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }

    public function findOneByTopic($title)
    {
        $sql = "SELECT *
            FROM " . $this->tableName . " t
            WHERE t.title = :title";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['title' => $title], true),
            $this->className
        );
    }
    public function findOneById($id)
    {
        $sql = "SELECT *
            FROM " . $this->tableName . " c
            WHERE c.id_category = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
    public function findTopicsByUser($id)
    {
        $sql = "SELECT *
            FROM " . $this->tableName . " u
            WHERE u.id_utilisateur = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

}
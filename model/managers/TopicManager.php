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
    public function findTopicsByCat($id)
    {
        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, t.category_id
        FROM " . $this->tableName . " t
        INNER JOIN category c ON c.id_category = t.category_id
        WHERE c.id_category = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.user_id, u.id_user,u.pseudo
            FROM " . $this->tableName . " t
            INNER JOIN user u
            ON u.id_user = t.user_id
            WHERE t.user_id = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

}
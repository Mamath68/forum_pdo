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
            FROM topic t
            WHERE t.title = :title";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['title' => $title], true),
            $this->className
        );
    }
    public function TopicByCat($id)
    {
        $sql = "SELECT t.id_topic, t.title, t.creationDate, t.utilisateur_id, t.category_id
        FROM topic t
        INNER JOIN category c 
        on c.id_category = t.category_id
        WHERE c.id_category = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
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
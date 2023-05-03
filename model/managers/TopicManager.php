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
        $sql = "SELECT t.title
            FROM " . $this->tableName . " t
            WHERE id_topic = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id=>$id'], true),
            $this->className
        );
    }
    public function findTopicsByUser($id)
    {
        $sql = "SELECT u.title, u.creationDate
            FROM " . $this->tableName . " u
            WHERE id_utilisateur = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }

// public function addTopic($data)
// {

//     if (isset($_POST)) {
//         $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
//         $id_category = filter_input(INPUT_POST, 'id_category', FILTER_VALIDATE_INT);
//         $id_user = $_SESSION['id_utilisateur'];

//         $sql = ('INSERT INTO topic (title, id_utilisateur,id_category) VALUES (:title,:id_utilisateur,:id_category)');
//     }
// }

}
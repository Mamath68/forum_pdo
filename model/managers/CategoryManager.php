<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;
use Model\Controller\ForumController;

class CategoryManager extends Manager
{

    protected $className = "Model\Entities\Category";
    protected $tableName = "category";

    public function __construct()
    {
        parent::connect();
    }

    public function findOneByTitle($title)
    {
        $sql = "SELECT *
    FROM " . $this->tableName . " t
    WHERE t.title = :title";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['title' => $title], true),
            $this->className
        );
    }

    public function findTopicsByUser($id)
    {
        $sql = "SELECT a.body, a.creationDate
    FROM " . $this->tableName . " a
    WHERE id_user = :id";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
}
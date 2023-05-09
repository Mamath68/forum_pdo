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
        $sql = "SELECT c.id_category, c.title
                FROM " . $this->tableName . " c
                WHERE c.title = :title";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['title' => $title], true),
            $this->className
        );
    }
}
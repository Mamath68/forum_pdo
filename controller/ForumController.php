<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;
use Model\Managers\UserManager;


class ForumController extends AbstractController implements ControllerInterface
{

    public function listTopics()
    {

        $topicManager = new TopicManager();

        return [

            "view" => VIEW_DIR . "forum/listTopics.php",

            "data" => [

                "topics" => $topicManager->findAll(["creationDate", "DESC"])

            ]
        ];
    }
    public function listPosts()
    {

        $postManager = new PostManager();

        return [

            "view" => VIEW_DIR . "forum/listPosts.php",

            "data" => [

                "posts" => $postManager->findAll(["creationDate", "DESC"])

            ]
        ];
    }
    public function listCategorys()
    {

        $categoryManager = new CategoryManager();

        return [

            "view" => VIEW_DIR . "forum/listCategorys.php",
            "data" => [
                "categorys" => $categoryManager->findAll(["title", "DESC"])

            ]
        ];
    }
    public function listUsers()
    {

        $userManager = new UserManager();

        return [

            "view" => VIEW_DIR . "forum/listUsers.php",

            "data" => [

                "users" => $userManager->findAll(["dateInscription", "DESC"])

            ]
        ];
    }
}
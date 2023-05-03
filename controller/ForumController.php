<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;


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
    public function addTopic()
    {
        $topicManager = new TopicManager();
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_user = filter_input(INPUT_POST, "id_utilisateur", FILTER_VALIDATE_INT);
            $id_category = filter_input(INPUT_POST, "id_category", FILTER_VALIDATE_INT);

            $topic = $topicManager->findOneByTopic($title);
            $topic = $topicManager->findTopicsByUser($title);

            if (!$topic) {
                $topicManager->add([
                    "title" => $title,
                    "id_utilisateur" => $id_user,
                    "id_category" => $id_category
                ]);
            }
        }
        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll()
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
    // public function addPost()
    // {
    //     $postManager = new PostManager();
    //     if (!empty($_POST)) {

    //         $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //         $post = $postManager->findOneByTitle($title);

    //         if (!$post) {
    //             $postManager->add([
    //                 "title" => $title,
    //             ]);
    //         }
    //     }
    //     return [
    //         "view" => VIEW_DIR . "forum/listPosts.php",
    //         "data" => [
    //             "categorys" => $postManager->findAll()
    //         ]
    //     ];
    // }

    public function listCategorys()
    {

        $categoryManager = new CategoryManager();

        return [

            "view" => VIEW_DIR . "forum/listCategorys.php",
            "data" => [
                "categorys" => $categoryManager->findAll(["title", "ASC"])
            ]
        ];
    }
    public function addCategory()
    {
        $categoryManager = new CategoryManager();
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $category = $categoryManager->findOneByTitle($title);

            if (!$category) {
                $categoryManager->add([
                    "title" => $title,
                ]);
            }
        }
        return [
            "view" => VIEW_DIR . "forum/listCategorys.php",
            "data" => [
                "categorys" => $categoryManager->findAll()
            ]
        ];
    }
}
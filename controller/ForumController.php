<?php

// Ouvre le namespace Controller
namespace Controller;

// fait appel a Session dans dossier APP
use App\Session;
// fait appel a AbstractController dans dossier APP
use App\AbstractController;
// fait appel a ControllerInterface dans dossier APP
use App\ControllerInterface;
// fait appel a TopicManager dans sous-dossier Managers du dossier Model
use Model\Managers\TopicManager;
// fait appel a PostManager dans sous-dossier Managers du dossier Model
use Model\Managers\PostManager;
// fait appel a CategoryManager dans sous-dossier Managers du dossier Model
use Model\Managers\CategoryManager;

// class ForumController hérite de la classe AbstractController et implémente ControllerInterface.
class ForumController extends AbstractController implements ControllerInterface
{

    // Fonction gerant la list des catégories
    public function listCategorys()
    {

        $categoryManager = new CategoryManager();
        $postManager = new PostManager();
        $topicManager = new TopicManager();

        return [

            "view" => VIEW_DIR . "forum/listCategorys.php",
            "data" => [
                "categorys" => $categoryManager->findAll(["id_category", "ASC"]),
                "topics" => $topicManager->findAll(["creationDate", "DESC"]),
                "posts" => $postManager->findAll(["creationDate", "DESC"])
            ]
        ];
    }
    public function detailCategory($id)
    {

        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        return [
            "view" => VIEW_DIR . "forum/detailCategory.php",
            "data" => [
                "topics" => $topicManager->findAll(),
            ]
        ];
    }

    public function listTopics()
    {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $postManager = new PostManager();

        return [

            "view" => VIEW_DIR . "forum/listTopics.php",

            "data" => [
                "topics" => $topicManager->findAll(["creationDate", "DESC"]),
                "posts" => $postManager->findAll(["creationDate", "DESC"]),
                "categorys" => $categoryManager->findAll(["title", "ASC"])
            ]
        ];
    }
    public function listPosts()
    {

        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();

        return [

            "view" => VIEW_DIR . "forum/detailTopic.php",

            "data" => [
                "posts" => $postManager->findAll(["creationDate", "DESC"]),
                "topics" => $topicManager->findAll(["creationDate", "DESC"]),
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

    public function addTopic($data)
    {
        $topicManager = new TopicManager();
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST, "id_category", FILTER_VALIDATE_INT);
            $user = $_SESSION['id_utilisateur'];

            $topic = $topicManager->findOneByTopic($title);

            if (!$topic) {
                $topicManager->add([
                    "title" => $title,
                    "id_category" => $category,
                    "id_utilisateur" => Session::getUser()->getId()
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

    public function addPost()
    {
        $postManager = new PostManager();
        if (!empty($_POST)) {

            $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $topic = filter_input(INPUT_POST, "id_sujet", FILTER_VALIDATE_INT);
            $user = $_SESSION['id_utilisateur'];

            $post = $postManager->findOneByPost($body);

            if (!$post) {
                $postManager->add([
                    "body" => $body,
                    "id_sujet" => $topic,
                    "id_utilisateur" => $user
                ]);
            }
        }
        return [
            "view" => VIEW_DIR . "forum/detailTopic.php",
            "data" => [
                "categorys" => $postManager->findAll()
            ]
        ];
    }
}
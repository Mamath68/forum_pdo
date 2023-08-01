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
// fait appel a UserManager dans sous-dossier Managers du dossier Model
use Model\Managers\UserManager;
// fait appel a CategoryManager dans sous-dossier Managers du dossier Model
use Model\Managers\CategoryManager;

// class ForumController hérite de la classe AbstractController et implémente ControllerInterface.
class ForumController extends AbstractController implements ControllerInterface
{

    // Fonction gerant la list des catégories
    public function listcategories()
    {

        $categoryManager = new CategoryManager();

        return [

            "view" => VIEW_DIR . "forum/listcategories.php",
            "data" => [
                "categories" => $categoryManager->findAll(["id_category", "ASC"]),
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
            "view" => VIEW_DIR . "forum/listcategories.php",
            "data" => [
                "categories" => $categoryManager->findAll()
            ]
        ];
    }

    public function addTopic($id)
    {
        $categoryManager = new CategoryManager();
        $id = $_GET['id'];
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = Session::getUser()->getId();

            if ($title) {
                $topicManager = new TopicManager();

                if
                (
                    !$topicManager->add(
                        [
                            "title" => $title,
                            "user_id" => $user,
                            "category_id" => $id,
                        ]
                    )
                )
                    ;
            }
            $this->redirectTo("forum", "detailCategory");
        }
        return
            [
                "view" => VIEW_DIR . "forum/addTopics.php",
                "data" =>
                [
                    "category" => $categoryManager->findOneById($id)
                ]
            ];
    }

    public function findTopicByCat($id)
    {
        $categoryManager = new CategoryManager();
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/detailCategory.php",
            "data" => [
                "category" => $categoryManager->findOneById($id),
                "topics" => $topicManager->findTopicsByCat($id),
            ]
        ];
    }

    public function addPost()
    {
        $topicManager = new TopicManager();
        $id = $_GET['id'];
        if (!empty($_POST)) {

            $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = Session::getUser()->getId();

            if ($body) {
                $postManager = new PostManager();

                if
                (
                    !$postManager->add(
                        [
                            "body" => $body,
                            "user_id" => $user,
                            "topic_id" => $id,
                        ]
                    )
                );
            }
        }
        return
            [
                "view" => VIEW_DIR . "forum/detailTopic.php",
                "data" =>
                [
                    "post" => $postManager->findOneById($id)
                ]
            ];
    }

    public function findPostByTopic($id)
    {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        return [
            "view" => VIEW_DIR . "forum/detailTopic.php",
            "data" => [
                "topic" => $topicManager->findOneById($id),
                "posts" => $postManager->findPostsByTopic($id),
            ]
        ];
    }

    public function viewUser()
    {
        $userManager = new UserManager();

        return [
            "view" => VIEW_DIR . "security/listUsers.php",
            "data" => [
                "users" => $userManager->findAll(["id_user", "ASC"]),
            ]
        ];
    }

}
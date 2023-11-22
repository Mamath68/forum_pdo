<?php

// Ouvre le namespace Controller
namespace Controller;

// Fait appel a Session dans le namespace App
use App\Session;
// Fait appel a AbstractController dans le namespace App
use App\AbstractController;
// Fait appel a ControllerInterface dans le namespace App
use App\ControllerInterface;
use Model\Entities\Category;
// Fait appel a TopicManager dans le namespace Model\Managers
use Model\Managers\TopicManager;
// Fait appel a PostManager dans le namespace Model\Managers
use Model\Managers\PostManager;
// Fait appel a CategoryManager dans le namespace Model\Managers
use Model\Managers\CategoryManager;
// Fait appel a UserManager dans le namespace Model\Managers
use Model\Managers\UserManager;

// class ForumController hérite de la classe AbstractController et implémente ControllerInterface.
class ForumController extends AbstractController implements ControllerInterface
{

    // Fonction gerant la liste des catégories
    public function listcategories()
    {
        $categoryManager = new CategoryManager();

        return
            [
                "view" => VIEW_DIR . "forum/listcategories.php",
                "data" => [
                    "categories" => $categoryManager->findAll(["id_category", "ASC"]),
                ]
            ];
    }

    public function detailCategory($id)
    {
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();

        return
            [
                "view" => VIEW_DIR . "forum/detailCategory.php",
                "data" =>
                [
                    "topics" => $topicManager->findOneByCategory($id),
                    "title" => $categoryManager->findOneById($id)
                ]
            ];
    }

    public function detailTopic($id)
    {

        $postManager = new PostManager();
        $topicManager = new TopicManager();

        return
            [
                "view" => VIEW_DIR . "forum/detailTopic.php",
                "data" => [
                    "posts" => $postManager->findOneByTopic($id),
                    "title" => $topicManager->findOneById($id),
                ]
            ];
    }

    public function addCategory()
    {
        $categoryManager = new CategoryManager();
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $category = $categoryManager->findOneById($title);

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

    public function addPostByTopic()
    {
        if (isset($_POST['submit'])) {
            $id = $_GET['id'];

            $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $user = session::getUser()->getId();

            $postManager = new PostManager();

            if (!$body) {

                if (
                    $postManager->add([
                        "body" => $body,
                        "user_id" => $user,
                        "topic_id" => $id,
                    ])
                ) {
                    Session::addFlash("success", "Commentaire ajouté");
                    $this->redirectTo("forum", "viewpost", $id);
                } else {
                    Session::addFlash("error", "Commentaire non ajouté");
                }
            }
        } else {
            Session::addFlash("error", "Une erreur de formulaire");
        }
    }

    public function viewPostByUser($id)
    {
        $postManager = new PostManager();
        $userManager = new UserManager();

        return
            [
                "view" => VIEW_DIR . "forum/mesPosts.php",
                "data" =>
                [
                    "posts" => $postManager->findPostByUser($id),
                    "user" => $userManager->findOneById($id),
                ]
            ];
    }
    public function viewTopicByUser($id)
    {
        $topicManager = new TopicManager();
        $userManager = new UserManager();
        return
            [
                "view" => VIEW_DIR . "forum/mesTopics.php",
                "data" =>
                [
                    "topics" => $topicManager->findTopicByUser($id),
                    "user" => $userManager->findOneById($id),
                ]
            ];
    }
    public function addTopic($id)
    {
        $categoryManager = new CategoryManager();

        $id = $_GET['id'];
        
        if (!empty($_POST)) {

            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = Session::getUser()->getId();

            if ($name) {
                $topicManager = new TopicManager();
                if (
                    !$topicManager->add(
                        [
                            "name" => $name,
                            "user_id" => $user,
                            "category_id" => $id,
                        ]
                    )
                )
                    $this->redirectTo("forum", "detailCategory", $id);
            }
        }
        return [
            "view" => VIEW_DIR . "forum/detailCategory.php",
            "data" => [
                "category" => $topicManager->findOneById($id)
            ]
        ];
    }

    public function viewAddTop()
    {
        return
            [
                "view" => VIEW_DIR . "forum/ajouterTopic.php",
            ];
    }
}

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
    public function detailCategory($id)
    {
        
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $topic = $topicManager->TopicByCat($id);
        $category = $categoryManager->findOneByTitle($id);
        return [
            "view" => VIEW_DIR . "forum/detailCategory.php",
            "data" => [
                "topics" => $topicManager->findOneById($id),
                "category" => $categoryManager->findOneById($id),
            ]
        ];
    }

    public function listTopics()
    {

        $topicManager = new TopicManager();

        return [

            "view" => VIEW_DIR . "forum/listTopics.php",

            "data" => [
                "topics" => $topicManager->findAll(["id_topic", "ASC"]),
            ]
        ];
    }

    public function detailTopic($id)
    {

        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();

        $post = $postManager->findOneById($id);

        return [

            "view" => VIEW_DIR . "forum/detailTopic.php",

            "data" => [
                "posts" => $postManager->findAll(["id_post", "ASC"]),
            ]
        ];
    }
    public function listPost($id)
    {

        $postManager = new PostManager();

        $post = $postManager->findOneById($id);

        return [

            "view" => VIEW_DIR . "forum/listPosts.php",

            "data" => [
                "posts" => $postManager->findAll(["id_post", "ASC"]),
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
                        "utilisateur_id" => $user,
                        "topic_id" => $id,
                    ])
                ) {
                    Session::addFlash("success", "Commentaire ajouté");
                    $this->redirectTo("forum", "detailTopic", $id);
                } else {
                    Session::addFlash("error", "Commentaire non ajouté");
                }
            }
        } else {
            Session::addFlash("error", "Une erreur de formulaire");
        }
    }

    public function viewpost()
    {
        $postManager = new PostManager();
        return
            [
                "view" => VIEW_DIR . "forum/detailTopic.php",
                "data" =>
                [
                    "categories" => $postManager->findAll()
                ]
            ];
    }
    public function addTopic($id)
    {
        if (!empty($_POST)) {

            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user = Session::getUser()->getId();
            $id = $_GET['id'];

            if ($title) {
                $topicManager = new TopicManager();

                if (
                    !$topicManager->add([
                        "title" => $title,
                        "utilisateur_id" => $user,
                        "category_id" => $id,
                    ])
                )
                    ;
            }
        }
        return [
            "view" => VIEW_DIR . "forum/ajouterTopic.php",
        ];
    }
    public function viewAddTop()
    {
        $topicManager = new TopicManager();
        return
            [
                "view" => VIEW_DIR . "forum/ajouterTopic.php",
                "data" => [
                    "topics" => $topicManager->findAll()
                ]
            ];
    }
}
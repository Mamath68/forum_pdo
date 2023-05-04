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
// fait appel a UserManager dans sous-dossier Managers du dossier Model
use Model\Managers\UserManager;
// fait appel a PostManager dans sous-dossier Managers du dossier Model
use Model\Managers\PostManager;

// class HomeController hérite de la classe AbstractController et implémente ControllerInterface.
class HomeController extends AbstractController implements ControllerInterface
{

    public function index()
    {

        return [
            "view" => VIEW_DIR . "home.php"
        ];
    }

    public function users()
    {
        $this->restrictTo("ROLE_ADMIN");
        $userManager = new UserManager();

        return [

            "view" => VIEW_DIR . "security/listUsers.php",

            "data" => [

                "users" => $userManager->findAll(["dateInscription", "DESC"])

            ]
        ];
    }

    public function detailUser($id)
    {

        $userManager = new UserManager();
        $postManager = new PostManager();
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "security/detailUser.php",
            "data" => [
                "user" => $userManager->findOneById($id),
                "post" => $postManager->findTopicsByUser($id),
                "topic" => $topicManager->findTopicsByUser($id)
            ]
        ];
        // redirectTo("home","listTopics");
    }

    public function forumRules()
    {

        return [
            "view" => VIEW_DIR . "home/forumRules.php"
        ];
    }
    public function forumMentions()
    {

        return [
            "view" => VIEW_DIR . "home/mentions_legal.php"
        ];
    }

/* 
public function editUser($id) 
{
$userManager = new UserManager();
}
*/

/*public function ajax(){
$nb = $_GET['nb'];
$nb++;
include(VIEW_DIR."ajax.php");
}*/
}
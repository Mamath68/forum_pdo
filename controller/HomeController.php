<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

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
        $this->restrictTo("ROLE_USER");

        $manager = new UserManager();
        $users = $manager->findAll(['registerdate', 'DESC']);

        return [
            "view" => VIEW_DIR . "security/users.php",
            "data" => [
                "users" => $users
            ]
        ];
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

    public function detailUser($id)
    {

        $userManager = new UserManager();
        $postManager = new PostManager();
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "security/detailUser.php",
            "data" => [
                "user" => $userManager->findOneById($id),
                "posts" => $postManager->findTopicsByUser($id),
                "topics" => $topicManager->findTopicsByUser($id)
            ]
        ];
        // redirectTo("home","listTopics");

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
<?php

// Ouvre le namespace Controller
namespace Controller;

// fait appel a Session dans le namespace App
use App\Session;
// fait appel a AbstractController dans le namespace App
use App\AbstractController;
// fait appel a ControllerInterface dans le namespace App
use App\ControllerInterface;
// fait appel a UserManager dans le namespace Model\Managers
use Model\Managers\UserManager;


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
        $this->restrictTo(['ROLE_ADMIN']);
        $userManager = new UserManager();
        return [
            "view" => VIEW_DIR . "security/listUsers.php",
            "data" => [
                "users" => $userManager->findAll(["roleUser", "DESC"])
            ]
        ];
    }

    public function detailUser($id)
    {
        $userManager = new UserManager();
        return [
            "view" => VIEW_DIR . "security/detailUser.php",
            "data" => [
                "user" => $userManager->findOneById($id),
            ]
        ];
    }

    public function publicUser($id)
    {
        $userManager = new UserManager();
        return [
            "view" => VIEW_DIR . "security/publicProfil.php",
            "data" => [
                "user" => $userManager->findOneById($id),
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
}

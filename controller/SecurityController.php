<?php

namespace Controller;

use App\Session;
// fait appel a Session dans dossier APP
use App\AbstractController;
// fait appel a AbstractController dans dossier APP
use App\ControllerInterface;
// fait appel a ControllerInterface dans dossier APP
use Model\Managers\TopicManager;
// fait appel a TopicManager dans sous-dossier Managers du dossier Model
use Model\Managers\PostManager;
// fait appel a PostManager dans sous-dossier Managers du dossier Model
use Model\Managers\CategoryManager;
// fait appel a CategoryManager dans sous-dossier Managers du dossier Model
use Model\Managers\UserManager;

// fait appel a UserManager dans sous-dossier Managers du dossier Model

// class securityController hérite de la classe AbstractController et implémente ControllerInterface.
class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {

    }
    public function registerForm()
    {
        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => null,
        ];
    }
    public function register()
    {

        $message = null;

        if (!empty($_POST)) {

            $nickname = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // REGEXP possible pseudo:
            // FILTER_VALIDATE_REGEXP, array("option" => array("regexp"=>'/[A-Za-z0-9]{4,}/'));
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            // REGEXP possible pasword:
            // FILTER_VALIDATE_REGEXP, array("option" => array("regexp"=>'/[A-Za-z0-9]{6,32}/'));
            $confirmpassword = filter_input(INPUT_POST, "confirmpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            if ($nickname && $password && $email) {
                if (($password == $confirmpassword) and strlen($password) >= 8) {
                    $manager = new UserManager();
                    $user = $manager->findOneByPseudo($nickname);

                    if (!$user) {

                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        if (
                            $manager->add([
                                "pseudo" => $nickname,
                                "email" => $email,
                                "password" => $hash
                            ])
                        ) {
                            $message = "Enregistrement réussi !";
                            return [
                                "view" => VIEW_DIR . "security/login.php",
                                "message" => $message
                            ];
                        }
                    } else {
                        $message = "Ce surnom est déjà utilisé";
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
            "message" => $message
        ];
    }
    public function loginForm()
    {
        return [
            "view" => VIEW_DIR . "security/login.php",
            "data" => null,
        ];
    }

    public function login()
    {
        if (!empty($_POST)) {

            $nickname = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($nickname && $password) {

                $manager = new UserManager();
                $user = $manager->findOneByPseudo($nickname);

                $datapass = $user->getPassword();
                if ($user) {
                    if (password_verify($password, $datapass)) {
                        session::setUser($user);
                        header('Location:index.php');
                    }
                }
            }
        }
        var_dump($_POST);
        return [
            "view" => VIEW_DIR . "security/login.php"
        ];
    }

    public function modifyPassword()
    {

    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('location: layout.php');
        exit;
    }
}
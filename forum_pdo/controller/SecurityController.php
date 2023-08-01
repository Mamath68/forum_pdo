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
// fait appel a UserManager dans sous-dossier Managers du dossier Model
use Model\Managers\UserManager;

// class securityController hérite de la classe AbstractController et implémente ControllerInterface.
class SecurityController extends AbstractController implements ControllerInterface
{

    public function index()
    {
        return [
            "view" => VIEW_DIR . "home.php",
            "data" => null,
        ];
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
                if (($password == $confirmpassword) and strlen($password) >= 3) {
                    $manager = new UserManager();
                    $user = $manager->findOneByPseudo($nickname);

                    if (!$user) {

                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        if (
                            $manager->add([
                                "pseudo" => $nickname,
                                "email" => $email,
                                "password" => $hash,
                                "roleUser" => json_encode(["ROLE_USER"]),
                            ])
                        ) {
                            return [
                                "view" => VIEW_DIR . "security/login.php",
                            ];
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
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

                $pass = $user->getPassword();

                if ($user) {
                    if (password_verify($password, $pass)) {
                        session::setUser($user);

                        header('Location:index.php?ctrl=security&action=index');
                    } else {
                        return [
                            "view" => VIEW_DIR . "security/login.php",
                            "data" => null,
                        ];
                    }
                }
            }
        }
        // var_dump($_POST);


    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('location: index.php?ctrl=security&action=index');
    }
}
<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\CategoryManager;

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
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmpassword = filter_input(INPUT_POST, "confirmpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);

            if ($nickname && $password && $email) {
                if (($password == $confirmpassword) and strlen($password) >= 8) {

                }
            }
        }
    }
}
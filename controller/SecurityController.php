<?php

// Ouvre le namespace Controller
namespace Controller;

// fait appel a Session dans le namespace App
use App\Session;
// fait appel a AbstractController dans le namespace App
use App\AbstractController;
// fait appel a ControllerInterface dans le namespace App
use App\ControllerInterface;
// fait appel a TopicManager dans le namespace Model\Managers
use Model\Managers\TopicManager;
// fait appel a PostManager dans le namespace Model\Managers
use Model\Managers\PostManager;
// fait appel a CategoryManager dans le namespace Model\Managers
use Model\Managers\CategoryManager;
// fait appel a UserManager dans le namespace Model\Managers
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
            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmpassword = filter_input(INPUT_POST, "confirmpassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($pseudo && $password && $email) {
                if (($password == $confirmpassword) and strlen($password) >= 3) {
                    $manager = new UserManager();
                    $user = $manager->findOneByPseudo($pseudo);

                    if (!$user) {

                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        if (
                            $manager->add([
                                "pseudo" => $pseudo,
                                "email" => $email,
                                "password" => $hash,
                                "roleUser" => json_encode(["ROLE_USER"]),
                            ])
                        ) {
                            $this->redirectTo("security", "loginForm");
                        }
                    }
                }
            } else {
?>
                <h1 style='color:red;'>Erreur d'Enregistrement !</h1>
            <?php
                return [
                    "view" => VIEW_DIR . "security/register.php",
                ];
            }
        } else {
            ?>
            <h1 style='color:orange;'>Ces données n'ont pas été soumis !</h1>
<?php
            return [
                "view" => VIEW_DIR . "security/register.php",
            ];
        }
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

            $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if ($pseudo && $password) {

                $manager = new UserManager();
                $user = $manager->findOneByPseudo($pseudo);

                $pass = $user->getPassword();

                if ($user) {
                    if (password_verify($password, $pass)) {
                        session::setUser($user);

                        $this->redirectTo("security", "index");
                    } else {
                        return [
                            "view" => VIEW_DIR . "security/login.php",
                            "data" => null,
                        ];
                    }
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->redirectTo("security", "index");
    }

    public function deleteAccountForm()
    {

        return [
            "view" => VIEW_DIR . "security/deleteAccount.php",
            "data" => null,
        ];
    }

    public function deleteAccount()
    {

        return [
            "view" => VIEW_DIR . "security/deleteAccount.php",
            "data" => null,
        ];
    }
}

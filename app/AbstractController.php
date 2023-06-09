<?php
// J'ouvre le namspace App
namespace App;

// j'ouvre la classe abstaite, AbstractController
abstract class AbstractController
{
    // Créée la fonction public index, qui redirige vers la page par défaut, dans le cas présent: home.php
    public function index()
    {
        return [
            "view" => VIEW_DIR . "home.php",
            "data" => null,
        ];
    }
    //Création de la fonction redirectTo, qui comme l'indique son nom, redirige 
    public function redirectTo($ctrl = null, $action = null, $id = null)
    {
        // si $ctrl(contorller) est différent de home
        if ($ctrl != "home") {
            // pas tous compris ce qui se passe.
            $url = $ctrl ? "/" . $ctrl : "";
            $url .= $action ? "/" . $action : "";
            $url .= $id ? "/" . $id : "";
            //  mais en gros, ça redirige vers le fichier qui fini en php
            $url .= ".php";
            // sinon, ça renvoie a l'endroit indiqué par $url, ce dont je ne vois pas la différence.
        } else
            $url = "/";
        header("Location: $url");
        die();

    }
// Fonction imposant une restriction au role donnée.
    public function restrictTo($role)
    {
// Vérifie le rôle de l'user
        if (!Session::getUser() || !Session::getUser()->hasRole($role)) {
            // redirige vers le dossier security et le fichier login
            $this->redirectTo("security", "login");
        }
        // retourne, rien du tout, du moins a première vue.
        return;
    }

}
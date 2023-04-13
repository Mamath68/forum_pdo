<?php
session_start();
include('DAO.php');

if(isset($_POST['register_btn']))
{
    $user = mysqli_real_escape_string($con, $_POST['pseudo']);
    $email = mysqli_real_escape_string($con, $_POST['addresse_mail']);
    $password = mysqli_real_escape_string($con, $_POST['mot_passe']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    if($password == $confirm_password)
    {
        // Check Email
        $checkemail = "SELECT addresse_mail FROM utilisateur WHERE addresse_mail='$email' LIMIT 1";
        $checkemail_run = mysqli_query($con, $checkemail);

        if(mysqli_num_rows($checkemail_run) > 0)
        {
            // Already Email Exists
            $_SESSION['message'] = "Email déja utilisé";
            header("Location: layout.php");
            exit(0);
        }
        else
        {
            $user_query = "INSERT INTO utilisateur (pseudo,addresse_mail,mot_passe) VALUES ('$user','$email','$password')";
            $user_query_run = mysqli_query($con, $user_query);

            if($user_query_run)
            {
                $_SESSION['message'] = "Enregistrement réussis";
                header("Location: home.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Une erreur a été localisé!";
                header("Location: home.php");
                exit(0);
            }
        }
    }
    else
    {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas";
        header("Location: home.php");
        exit(0);
    }
}
?>
<?php
session_start();
require('DAO.php');

if(isset($_POST['login_button']))
{
    $email = filter_input(INPUT_POST, $_POST['addresse_mail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, $_POST['mot_passe'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $query = "SELECT * FROM utilisateur u where u.addresse_mail='$email' and u.mot_passe='$password' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $row = mysqli_fetch_array($query_run);

        // Authenticating Logged In User
        $_SESSION['authentication'] = true;

        // Storing Authenticated User data in Session
        $_SESSION['auth_user'] = [
            'user_id'=>$row['id'],
            'user_fullname'=>$row['fullname'],
            'user_email'=>$row['email'],
        ];

        $_SESSION['message'] = "You are Logged In Successfully"; //message to show
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Invalid Email or Password"; //message to show
        header("Location: login.php");
        exit(0);
    }
}
?>
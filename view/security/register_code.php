<?php
session_start();


if (isset($_POST['register_btn'])) {
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'addresse_mail', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'mot_passe', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_POST,'confirm_password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // var_dump($pseudo, $email, $password, $confirm_password);
    // die();

    if ($password == $confirm_password) {
        // Check Email
        $checkemail = "SELECT u.addresse_mail FROM utilisateur u WHERE u.addresse_mail='$email' LIMIT 1";
        $checkemail_run = mysqli_query($con, $checkemail);

        if (mysqli_num_rows($checkemail_run) > 0) {
            // Already Email Exists
            $_SESSION['message'] = "Already Email Exists";
            header("Location: register.php");
            exit(0);
        } //else {
    //         $user_query = "INSERT INTO utilisateur u (u.pseudo,u.addresse_mail,u.mot_passe) VALUES ('$pseudo','$email','$password')";
    //         $user_query_run = mysqli_query($con, $user_query);

    //         if ($user_query_run) {
    //             $_SESSION['message'] = "Registered Successfully";
    //             header("Location: register.php");
    //             exit(0);
    //         } else {
    //             $_SESSION['message'] = "Something Went Wrong!";
    //             header("Location: home.php");
    //             exit(0);
    //         }
     }
    // } else {
    //     $_SESSION['message'] = "Password and Confirm Password does not Match";
    //     header("Location: home.php");
    //     exit(0);
    // }
}
?>
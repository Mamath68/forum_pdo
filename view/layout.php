<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <title>FORUM</title>
</head>

<body>
    <div id="wrapper">

        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red">
                <?= App\Session::getFlash("error") ?>
            </h3>
            <h3 class="message" style="color: green">
                <?= App\Session::getFlash("success") ?>
            </h3>
            <header>
                <nav>
                    <div id="nav-left">
                        <a class="href" href="index.php?ctrl=home&action=home">Accueil</a>
                        <?php
                        if (App\Session::isAdmin()) {
                            ?>
                            <a class="href" href="index.php?ctrl=home&action=users">Voir la liste des gens</a>

                            <?php
                        }
                        ?>
                    </div>
                    <div id="nav-right">
                        <?php

                        if (App\Session::getUser()) {
                            ?>
                            <a class="href" href="/security/viewProfile.html"><span class="fas fa-user"></span>&nbsp;
                                <?= App\Session::getUser() ?>
                            </a>
                            <a class="href" href="index.php?ctrl=security&action=logout">Déconnexion</a>
                            <?php
                        } else {
                            ?>
                            <a class="href" href="index.php?ctrl=security&action=loginForm">Connexion</a>
                            <a class="href" href="index.php?ctrl=security&action=registerForm">Inscription</a>
                            <a class="href" href="index.php?ctrl=forum&action=listTopics">la liste des topics</a>
                            <?php
                        }


                        ?>
                    </div>
                </nav>
            </header>

            <main id="forum">
                <?= $contenu ?>
            </main>
        </div>
        <footer>
            <div class="nav-left">
                <p>&copy; 2020 - Forum CDA</p>
            </div>
            <div class="nav-right">
                <a class="href" href="model/home/forumRules.php">Règlement du forum</a>
                <a class="href" href="model/home/mentions_legal.php">Mentions légales</a>
            </div>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        </script>
    <script>

        $(document).ready(function () {
            $(".message").each(function () {
                if ($(this).text().length > 0) {
                    $(this).slideDown(500, function () {
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function () {
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })



        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>

</html>
<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Recipes.com</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="styles/reset.css" type="text/css">
        <link rel="stylesheet" href="styles/base.css" type="text/css">
        <link rel="stylesheet" href="styles/not-found.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include_once 'includes/fragments/menu.php' ?>
        <?php include_once 'includes/fragments/user_menu.php' ?>
        <section id="info-modal">
            <div>
                <h1>
                    The page you are looking for could not be found.
                </h1>
                <img src="images/404.png" alt="404: Page not found">
                <a class="button" href="index.php">
                    Go back to our startpage
                </a>
            </div>
        </section>
    </body>
</html>
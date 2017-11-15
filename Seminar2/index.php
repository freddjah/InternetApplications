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
        <link rel="stylesheet" href="styles/index.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include_once 'includes/fragments/menu.php' ?>
        <?php include_once 'includes/fragments/user_menu.php' ?>
        <section id="info-modal">
            <div>
                <h1>
                    What should you eat today?
                </h1>
                <a class="button" href="calendar.html">
                    Go to our Recipe Calendar
                </a>
            </div>
        </section>
    </body>
</html>
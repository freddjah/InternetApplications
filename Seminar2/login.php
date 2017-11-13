<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Recipes.com - Log in</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="styles/reset.css" type="text/css">
        <link rel="stylesheet" href="styles/base.css" type="text/css">
        <link rel="stylesheet" href="styles/login.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form class="input-form" action="includes/login.inc.php" method="POST">
            <h1>
                LOG IN AS USER
            </h1>
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <button class="button" type="submit" name="submit">Log in</button>
            <a href="register.php">Don't have an account? Register a user.</a>
        </form>
        <div>
            <a class="button button-inverse" href="index.php">Go back</a>
        </div>    
    </body>
</html>
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
        <form class="input-form" action="includes/actions/login.inc.php" method="POST">
            <h1>
                LOG IN AS USER
            </h1>
            <input type="text" name="username" placeholder="Username"/>
            
            <?php if(isset($_GET['username_not_found'])): ?>
                <span class="error">Username not found</span>
            <?php elseif(isset($_GET['empty_username'])): ?>
                <span class="error">Please enter a username</span>
            <?php endif ?>

            <input type="password" name="password" placeholder="Password"/>

            <?php if(isset($_GET['password_not_correct'])): ?>
                <span class="error">Incorrect password</span>
            <?php elseif(isset($_GET['empty_password'])): ?>
                <span class="error">Please enter a password</span>
            <?php endif ?>

            <button class="button" type="submit" name="submit">Log in</button>
            <a href="register.php">Don't have an account? Register a user.</a>
        </form>
        <div>
            <a class="button button-inverse" href="index.php">Go back</a>
        </div>    
    </body>
</html>
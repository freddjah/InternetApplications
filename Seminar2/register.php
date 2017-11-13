<!DOCTYPE HTML>
<html>
    <head>
        <title>Recipes.com - Register</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="styles/reset.css" type="text/css">
        <link rel="stylesheet" href="styles/base.css" type="text/css">
        <link rel="stylesheet" href="styles/register.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form class="input-form" method="POST" action="includes/register.inc.php">
            <h1>
                REGISTER A USER
            </h1>
            <input type="text" name="username" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <button class="button" type="submit" name="submit">Register</button>
            <a href="login.php">Already have an account? Log in as a user.</a>
        </form>
        <div>
            <a class="button button-inverse" href="index.php">Go back</a>
        </div>    
    </body>
</html>
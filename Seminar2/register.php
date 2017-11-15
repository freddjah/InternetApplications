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
        <?php if(isset($_GET['success'])): ?>
                <span class="success">Your account was created!</span>
                <a class="button" href="login.php">Log in</a>
        <?php else: ?>
        <form class="input-form" method="POST" action="includes/actions/register.inc.php">
            <h1>
                REGISTER A USER
            </h1>
            <input type="text" name="username" placeholder="Username"/>
            
            <?php if(isset($_GET['invalid_username'])): ?>
                <span class="error">Username can only consist of letters.</span>
            <?php elseif(isset($_GET['empty_username'])): ?>
                <span class="error">Please enter a username</span>
            <?php elseif(isset($_GET['username_taken'])): ?>
                <span class="error">Username is already in use</span>
            <?php endif ?>
            
            <input type="password" name="password" placeholder="Password"/>
            
            <?php if(isset($_GET['invalid_password'])): ?>
                <span class="error">Password can only consist of letters.</span>
            <?php elseif(isset($_GET['empty_password'])): ?>
                <span class="error">Please enter a password</span>
            <?php endif ?>
            
            <button class="button" type="submit" name="submit">Register</button>
            <a href="login.php">Already have an account? Log in as a user.</a>
        </form>
        <div>
            <a class="button button-inverse" href="index.php">Go back</a>
        </div>
        <?php endif ?>    
    </body>
</html>
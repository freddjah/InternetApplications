<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Recipes.com - Pancakes</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="styles/reset.css" type="text/css">
        <link rel="stylesheet" href="styles/base.css" type="text/css">
        <link rel="stylesheet" href="styles/recipe.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            #picture {
                background-image: url('images/pancake_large.jpg');
            }
        </style>
    </head>
    <body>
        <?php include_once 'menu.php' ?>
        <?php include_once 'user_menu.php' ?>
        <header id="picture">
            <h1>
                Pancakes Recipe
            </h1>
        </header>
        <section id="summary">
            <ul>
                <li>
                    <h4><strong>Preparation time:</strong> 30 min</h4>
                </li>
                <li>
                    <h4><strong>Cooking time:</strong> 10 min</h4>
                </li>
                <li>
                    <h4><strong>Servings:</strong> 8-10</h4>
                </li>
            </ul>
        </section>
        <section id="ingredients">
            <h3>Ingredients</h3>
            <ul>
                <li>1 1/2 cups all-purpose flour</li>
                <li>3 1/2 teaspoons baking powder</li>
                <li>1 teaspoon salt</li>
                <li>1 tablespoon white sugar</li>
                <li>1 1/4 cups milk</li>
                <li>1 egg</li>
                <li>3 tablespoons butter, melted</li>
            </ul>
        </section>
        <section id="instructions">
            <h3>Instructions</h3>
            <ol>
                <li>In a large bowl, sift together the flour, baking powder, salt and sugar. Make a well in the center and pour in the milk, egg and melted butter; mix until smooth.</li>
                <li>Heat a lightly oiled griddle or frying pan over medium high heat. Pour or scoop the batter onto the griddle, using approximately 1/4 cup for each pancake. Brown on both sides and serve hot.</li>
            </ol>
        </section>
        <section id="comments">
            <h3>Comments</h3>
            <ul>
                <?php 
                    include_once 'includes/db_connection.php'; 
                    $sql = "SELECT * FROM Comment WHERE Recipe='pancakes'";
                    $result = mysqli_query($link, $sql);

                    foreach(mysqli_fetch_all($result, MYSQLI_ASSOC) as $row) {
                        $user_id = $row['UserID'];
                        
                        $sql = "SELECT Username FROM User WHERE ID='$user_id'";
                        $user_result = mysqli_query($link, $sql);

                        $username = mysqli_fetch_assoc($user_result)['Username'];

                        echo '<li>';
                        echo '<span class="user">' . $username . '</span>';

                        if ($_SESSION['username'] == $username) {
                            echo '<a class="delete-comment" href="includes/delete_comment.inc.php?id=' . $row['ID'] . '">DELETE COMMENT</a>';
                        } 

                        echo '<span class="comment">' . $row['Message'] . '</span>';
                        echo '</li>';
                    }
                    
                ?>
            </ul>
            <?php
                if (isset($_SESSION['username'])) {
                    echo '<form method="POST" action="includes/comment.inc.php?recipe=pancakes">';
                    echo '<textarea name="message"></textarea>';
                    echo '<button type="submit" name="submit">Add comment</button>';
                    echo '</form>';
                } 
            ?>
        </section>
        <nav id="bottom-navbar">
            <a href="#top" class="button">Back to top</a>
        </nav>
    </body>
</html>
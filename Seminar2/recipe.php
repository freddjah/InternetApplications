<?php
    session_start();
    include_once 'includes/db_connection.php';
    
    $recipe_id = $_GET['id'];
    $sql = "SELECT * FROM Recipe WHERE id='$recipe_id'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) != 1) {
        header("Location: not_found.php");
        exit();
    } else {
        $result_row = mysqli_fetch_assoc($result);
        $recipe_name = $result_row['name'];
    }
?>

<?php 
    $recipes = simplexml_load_file("xml/recipes.xml");
    $recipe;
    foreach($recipes->recipe as $current) {
        if ($current->title == $recipe_name) {
            $recipe = $current;
            break;
        }
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Recipes.com - <?php echo $recipe_name; ?></title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="styles/reset.css" type="text/css">
        <link rel="stylesheet" href="styles/base.css" type="text/css">
        <link rel="stylesheet" href="styles/recipe.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            #picture {
                background-image: url(<?php echo $recipe->imagepath ?>);
            }
        </style>
    </head>
    <body>
        <?php include_once 'includes/fragments/menu.php' ?>
        <?php include_once 'includes/fragments/user_menu.php' ?>
        <header id="picture">
            <h1>
                <?php echo $recipe->title ?> Recipe
            </h1>
        </header>
        <section id="summary">
            <ul>
                <li>
                    <h4><strong>Preparation time:</strong> <?php echo $recipe->preptime ?></h4>
                </li>
                <li>
                    <h4><strong>Cooking time:</strong> <?php echo $recipe->cooktime ?></h4>
                </li>
                <li>
                    <h4><strong>Servings:</strong> <?php echo $recipe->quantity ?></h4>
                </li>
            </ul>
        </section>
        <section id="ingredients">
            <h3>Ingredients</h3>
            <ul>
                <?php foreach($recipe->ingredient->li as $item): ?>
                    <li><?php echo $item ?></li>
                <?php endforeach ?>
            </ul>
        </section>
        <section id="instructions">
            <h3>Instructions</h3>
            <ol>
                <?php foreach($recipe->recipetext->li as $item): ?>
                    <li><?php echo $item ?></li>
                <?php endforeach ?>
            </ol>
        </section>
        <section id="comments">
            <h3>Comments</h3>
            <ul>
                <?php 
                    // Retrieving all comments to a specific recipe
                    $sql = "SELECT * FROM Comment WHERE recipe_id='$recipe_id'";
                    $result = mysqli_query($link, $sql);
                    
                    // Iterate all found comments
                    foreach(mysqli_fetch_all($result, MYSQLI_ASSOC) as $row):
                        // Retrieving all necessary user information for a specific comment
                        $user_id = $row['user_id'];
                        $sql = "SELECT username FROM User WHERE id='$user_id'";
                        $user_result = mysqli_query($link, $sql);
                        $username = mysqli_fetch_assoc($user_result)['username'];
                ?>
                <li>
                    <span class="user"><?php echo $username ?></span>
                    <?php if($_SESSION['username'] == $username): ?>
                    <form class="delete-button" method="POST" action="includes/actions/delete_comment.inc.php">
                        <input hidden name="comment_id" value="<?php echo $row['id'] ?>">
                        <input hidden name="recipe_id" value="<?php echo $recipe_id ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                    <?php endif?>
                    <span class="comment"><?php echo $row['message']?></span>
                </li>
                <?php endforeach ?>
            </ul>
            <?php if (isset($_SESSION['username'])): ?>
                <form class="write-comment" method="POST" action="includes/actions/add_comment.inc.php">
                    <h1>Write a comment:</h1>
                    <input hidden name="id" value="<?php echo $recipe_id ?>">
                    <textarea maxlength="250" name="message" placeholder="Write a message (up to 250 characters)..." required></textarea>
                    <button class="button button-white" type="submit" name="submit">Add comment</button>
                </form> 
            <?php endif ?>
        </section>
        <nav id="bottom-navbar">
            <a href="#top" class="button">Back to top</a>
        </nav>
    </body>
</html>
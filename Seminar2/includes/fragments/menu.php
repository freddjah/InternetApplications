<?php
    include_once 'includes/db_connection.php';
    $sql = "SELECT * FROM Recipe";
    $result = mysqli_query($link, $sql);
?>
<nav class="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="calendar.php">Recipe Calendar</a></li>
        <?php foreach(mysqli_fetch_all($result, MYSQLI_ASSOC) as $row): ?>
        <li><a href="recipe.php?id=<?php echo $row['id']?>"><?php echo $row['name']?> Recipe </a></li>
        <?php endforeach ?>
    </ul>
</nav>
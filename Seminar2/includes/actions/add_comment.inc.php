<?php
include_once '../db_connection.php';
session_start();

$recipe_id = mysqli_real_escape_string($link, $_POST['id']);
$message = mysqli_real_escape_string($link, $_POST['message']);
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO Comment (message, recipe_id, user_id) VALUES ('$message', '$recipe_id', '$user_id')";
mysqli_query($link, $sql);
header("Location: ../../recipe.php?id=" . $recipe_id);
exit();

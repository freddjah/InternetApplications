<?php
include_once '../db_connection.php';
session_start();

$comment_id = $_POST['comment_id'];
$sql = "SELECT user_id FROM Comment WHERE id='$comment_id'";
$result = mysqli_query($link, $sql);
$user_id = mysqli_fetch_assoc($result)['user_id'];

if ($_SESSION['user_id'] != $user_id) {
    header("Location: ../../index.php");
    exit();
} else {
    $sql = "DELETE FROM Comment WHERE id=" . $comment_id;
    if (mysqli_query($link, $sql)) {
        header("Location: ../../recipe.php?id=" . $_POST['recipe_id']);
        exit();
    } else {
        header("Location: ../../index.php");
        exit();
    }
    
}

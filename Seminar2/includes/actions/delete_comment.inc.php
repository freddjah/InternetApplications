<?php
include_once 'db_connection.php';
session_start();

$comment_id = $_GET['id'];
$sql = "SELECT user_id FROM Comment WHERE id='$comment_id'";
$result = mysqli_query($link, $sql);
$user_id = mysqli_fetch_assoc($result)['user_id'];

if ($_SESSION['user_id'] != $user_id) {
    echo $user_id . " - " . $_SESSION['user_id'];
} else {
    $sql = "DELETE FROM Comment WHERE id=" . $comment_id;
    echo $sql;
    if (mysqli_query($link, $sql)) {
        // Go back to previous site
    } else {
        // Something went wrong
    }
    
}

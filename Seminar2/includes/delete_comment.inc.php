<?php
include_once 'db_connection.php';
session_start();

$comment_id = $_POST['id'];
$sql = "SELECT UserID FROM Comment WHERE ID='$comment_id'";
$result = mysqli_query($link, $sql);
$user_id = mysqli_fetch_assoc($result)['UserID'];

if ($_SESSION['user_id'] != $user_id) {
    header("Location: ../index.php");
    exit();
} else {
    // DELETE COMMENT
}

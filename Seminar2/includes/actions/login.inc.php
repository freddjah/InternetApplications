<?php

session_start();

if (isset($_POST['submit'])) {
    include_once '../db_connection.php';

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Error handling
    
    // Check if input is empty

    if (empty($username)) {
        header("Location: ../../login.php?empty_username");
        exit();
    } else if (empty($password)) {
        header("Location: ../../login.php?empty_password");
        exit();
    } else {
        $sql = "SELECT * FROM User WHERE username='$username'";
        $result = mysqli_query($link, $sql);
        $rowsInResult = mysqli_num_rows($result);

        // Check if user not found
        if ($rowsInResult < 1) {
            header("Location: ../../login.php?username_not_found");
            exit();
        } else {
            // Trying to fetch row
            if ($row = mysqli_fetch_assoc($result)) {
                // De-hashing password
                $correctPassword = password_verify($password, $row["password"]);
                if (!$correctPassword) {
                    header("Location: ../../login.php?password_not_correct");
                    exit();
                } else if ($correctPassword) {
                    // Log in user in current session
                    $_SESSION["username"] = $row["username"];
                    $_SESSION['user_id'] = $row['id'];
                    header("Location: ../../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../../login.php?login=error");
    exit();
}
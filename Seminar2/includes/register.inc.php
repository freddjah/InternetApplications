<?php

if (isset($_POST['submit'])) {
    include_once 'db_connection.php';
    
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Check if empty fields
    if (empty($username)) {
        header("Location: ../register.php?signup=empty_username");
        exit();
    } else if (empty($password)) {
        header("Location: ../register.php?signup=empty_password");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $username)) {
            header("Location: ../register.php?signup=invalid_username");
            exit();
        } else {
            // Find if user already exists
            $sql = "SELECT * FROM users WHERE user_username='$username'";
            $result = mysqli_query($link, $sql);
            $rowsInResult = mysqli_num_rows($result);

            // If user exists
            if ($rowsInResult > 0) {
                header("Location: ../register.php?signup=username_taken");
                exit();
            } else {
                // Hashing the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into database
                $sql = "INSERT INTO users (user_username, user_password) VALUES ('$username', '$hashedPassword');";
                mysqli_query($link, $sql);
                header("Location: ../register.php?signup=success");
                exit();
            }
        }
    }
} else {
    header("Location: ../register.php");
    exit();
}
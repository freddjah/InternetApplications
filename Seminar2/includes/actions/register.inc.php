<?php

if (isset($_POST['submit'])) {
    include_once '../db_connection.php';
    
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Check if empty fields
    if (empty($username)) {
        header("Location: ../../register.php?empty_username");
        exit();
    } else if (empty($password)) {
        header("Location: ../../register.php?empty_password");
        exit();
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $username)) {
            header("Location: ../../register.php?invalid_username");
            exit();
        } else {
            // Find if user already exists
            $sql = "SELECT * FROM User WHERE Username='$username'";
            $result = mysqli_query($link, $sql);
            $rowsInResult = mysqli_num_rows($result);

            // If user exists
            if ($rowsInResult > 0) {
                header("Location: ../../register.php?username_taken");
                exit();
            } else {
                // Hashing the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert user into database
                $sql = "INSERT INTO User (Username, Password) VALUES ('$username', '$hashedPassword');";
                mysqli_query($link, $sql);
                header("Location: ../../register.php?success");
                exit();
            }
        }
    }
} else {
    header("Location: ../register.php");
    exit();
}
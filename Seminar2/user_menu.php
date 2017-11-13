<nav class="menu user">
    <?php
        if (isset($_SESSION['username'])) {
            echo '<ul><li class="logged-in"><span>Logged in as ' . $_SESSION["username"] . '</span></li><li><a href="logout.php">Log out</a></li><ul>';
        } else {
            echo '  <ul>
                        <li><a href="login.php">Log in</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>';
        }
    ?>
    
</nav>
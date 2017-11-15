<nav class="menu menu-user">
    <?php if(isset($_SESSION['username'])): ?>
        <ul>
            <li class="logged-in">
                <span>Logged in as <?php echo $_SESSION['username']; ?></span>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        <ul>
    <?php else: ?>
        <ul>
            <li><a href="login.php">Log in</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    <?php endif ?>
</nav>
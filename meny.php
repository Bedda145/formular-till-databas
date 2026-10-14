<nav>
    <a href="index.php">Start</a>

    <?php if (isset($_SESSION['anvandarnamn'])): ?>
        <span>Inloggad som <?= htmlspecialchars($_SESSION['anvandarnamn']) ?></span>
        <a href="logga-ut.php">Logga ut</a>
    <?php else: ?>
        <a href="logga-in.php">Logga in</a>
        <a href="registrera.php">Skapa konto</a>
    <?php endif; ?>
</nav>
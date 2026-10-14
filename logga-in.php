<?php
session_start();
require "db.php";

$meddelande = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $anvandarnamn = trim($_POST['anvandarnamn']);
    $losenord = $_POST['losenord'];

    $sql = "SELECT id, anvandarnamn, losenord FROM anvandare WHERE anvandarnamn = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$anvandarnamn]);
    $anvandare = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($anvandare && password_verify($losenord, $anvandare['losenord'])) {
        session_regenerate_id(true);
        $_SESSION['anvandar_id'] = $anvandare['id'];
        $_SESSION['anvandarnamn'] = $anvandare['anvandarnamn'];

        header("Location: index.php");
        exit;
    } else {
        $meddelande = "Fel användarnamn eller lösenord.";
    }
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logga in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Logga in</h1>
        <?php require "meny.php"; ?>
    </header>

    <main>

    <?php if($meddelande): ?>
        <p><?= htmlspecialchars($meddelande) ?></p>
    <?php endif; ?>
        <form action="logga-in.php" method="POST">
        <label for="anvandarnamn">Användarnamn</label>
        <input type="text" id="anvandarnamn" name="anvandarnamn" required>

        <label for="losenord">Lösenord</label>
        <input type="password" id="losenord" name="losenord" required>

        <button type="submit">Logga in</button>
    </form>
        <p>Har du inget konto? <a href="registrera.php">Skapa ett här</a></p>
    </main>
</body>
</html>
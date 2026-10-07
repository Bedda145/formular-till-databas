<?php
require "db.php";

$meddelande = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $anvandarnamn = trim($_POST['anvandarnamn']);
    $losenord = $_POST['losenord'];

    $sql = "SELECT id FROM anvandare WHERE anvandarnamn = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$anvandarnamn]);

    if ($stmt->fetch()) {
        $meddelande = "Användarnamnet är redan taget.";
    } else {
        $hash = password_hash($losenord, PASSWORD_DEFAULT);

        $sql = "INSER   T INTO anvandare (anvandarnamn, losenord) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$anvandarnamn, $hash]);

        $meddelande = "Kontot är skapat! Du kan nu logga in.";
    }
}
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skapa konto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
      <h1>Skapa konto</h1>
    </header>

    <main>
        <?php if ($meddelande): ?>
            <p><?= htmlspecialchars($meddelande) ?></p>
        <?php endif; ?>
    </main>

    <main>
        <form action="registrera.php" method="POST">
        <label for="anvandarnamn">Användarnamn</label>
        <input type="text" id="anvandarnamn" name="anvandarnamn" required>

        <label for="losenord">Lösernord</label>
        <input type="password" id="losenord" name="losenord" required minlength="8">

        <button type="submit">Skapa konto</button>
        </form>

        <p>Har du redan konto? <a href="logga-in.php">Logga in</a></p>
    </main>
</body>
</html>
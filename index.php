<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spelförslag</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
      <h1>Spelförslag</h1>
    </header>
    <main>
      <form action="spara.php" method="POST">
        <label for="namn">Ditt namn</label>
        <input type="text" id="namn" name="namn" required>

        <label for="spel">Spel</label>
        <input type="text" id="spel" name="spel" required>

        <label for="kommentar">Varför ska vi spela det?</label>
        <textarea id="kommentar" name="kommentar" required></textarea>

        <button type="submit">Skicka</button>
      </form>
    </main> 
</body>
</html>
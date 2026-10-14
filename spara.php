<?php
require "db.php";

$namn = $_POST['namn'];
$spel = $_POST['spel'];
$kommentar = $_POST['kommentar'];

$sql = "INSERT INTO forslag (namn, spel, kommentar) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$namn, $spel, $kommentar]);

header("Location: index.php");
exit;
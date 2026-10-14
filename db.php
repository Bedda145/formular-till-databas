<?php
$host = "localhost";
$dbnamn = "spelforslag";
$anvandare = "root";
$losenord = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbnamn;charset=utf8mb4", $anvandare, $losenord);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kunde inte ansluta till databasen: " . $e->getMessage());
}
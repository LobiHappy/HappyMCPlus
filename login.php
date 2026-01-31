<?php
session_start();
require "uuid.php";
require "db.php";

$username = $_POST["username"];
$uuid = getUUID($username);

if (!$uuid) {
    die("Spieler nicht gefunden");
}

$stmt = $pdo->prepare(
    "INSERT INTO users (username, uuid)
     VALUES (?, ?)
     ON DUPLICATE KEY UPDATE username=?"
);
$stmt->execute([$username, $uuid, $username]);

$_SESSION["uuid"] = $uuid;
$_SESSION["username"] = $username;

header("Location: shop.php");

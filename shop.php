<?php
session_start();

if (!isset($_SESSION["uuid"])) {
    header("Location: login.html");
    exit;
}

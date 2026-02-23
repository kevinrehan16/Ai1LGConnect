<?php
session_start();

// session_unset();
// session_destroy();

if (!isset($_SESSION['username'])) {
    header("Location: views/login.php");
    exit();
}

require_once 'views/layout.php';
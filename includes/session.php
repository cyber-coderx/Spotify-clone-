<?php
session_start();

// Redirect to login if not logged in
function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: /public/index.php?page=login_signup");
        exit();
    }
}

// Redirect to dashboard if already logged in
function redirectIfAuthenticated() {
    if (isset($_SESSION['user_id'])) {
        header("Location: /public/index.php?page=dashboard");
        exit();
    }
}

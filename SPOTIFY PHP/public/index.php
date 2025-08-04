<?php
require_once '../controllers/AuthController.php';
require_once '../includes/session.php';

$authController = new AuthController();

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-submit'])) {
            $authController->login($_POST['email'], $_POST['password']);
        } else {
            redirectIfAuthenticated(); // Optional: block access if already logged in
            require_once '../pages/login_signup.php';
        }
        break;


    case 'signup':
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup-submit'])) {
        // Handle first step: email validation
        $authController->handleSignup();
    } else {
        redirectIfAuthenticated();
        require_once '../pages/login_signup.php';
    }
    break;

case 'signup-continue':
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register-submit'])) {
        // Handle final registration step here
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $email = $_SESSION['signup_email'] ?? '';

        if ($password !== $confirmPassword) {
            $_SESSION['error'] = "Passwords do not match.";
            header('Location: /index.php?action=signup-continue'); // better redirect to this action
            exit;
        }

        $authController->register($username, $email, $password);
    } else {
        redirectIfAuthenticated();
        require_once '../pages/signup-continue.php';
    }
    break;


    case 'dashboard':
        requireAuth();
        require_once '../pages/dashboard.php';
        break;

    case 'playlist':
        requireAuth(); // If only logged-in users should access
        require_once '../pages/playlixt.php';
        break;
    

    case 'logout':
        $authController->logout();
        break;

    default:
        echo "404 Page not found";
}
?>

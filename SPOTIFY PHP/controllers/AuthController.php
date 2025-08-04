<?php
require_once '../includes/db.php';
require_once '../includes/session.php';
//require_once '../includes/csrf.php';
//require_once '../helpers/Recaptcha.php';





class AuthController {


    // Handle user signup (email validation and redirection)
    public function handleSignup() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup-submit'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error'] = "Invalid email format.";
                header('Location: /pages/login_signup.php');
                exit;
            }

            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);

            if ($stmt->rowCount() > 0) {
                $_SESSION['error'] = "Email is already registered.";
                header('Location: /public/index.php');
                exit;
            }

            $_SESSION['signup_email'] = $email;
            header('Location: /public/index.php?action=signup-continue');
            exit;
        }
    }

    public function register($username, $email, $password) {
        $db = Database::getConnection();

        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Email is already taken.";
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $db->lastInsertId();
            header("Location: /pages/dashboard.php");
            exit;
        } else {
            echo "An error occurred during registration.";
        }
    }

    // Handle login
    public function login($email, $password) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header("Location: /public/index.php?action=dashboard");
    exit;
} else {
    $_SESSION['error'] = "Invalid credentials";
    header("Location: /public/index.php?action=login");
    exit;
}
    }

    // Handle logout
    public function logout() {
        session_destroy();
         require_once '../pages/login_signup.php';
        exit();
    }

    // Handle reCAPTCHA validation
    public function verifyRecaptcha($response) {
        if (verify_recaptcha($response)) {
            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            header('Location: ../pages/recaptcha.php?status=❌%20Verification%20failed');
            exit;
        }
    }
}

// Instantiate the controller
$authController = new AuthController();


?>

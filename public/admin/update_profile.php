<?php
require __DIR__ . '/../../src/bootstrap.php';
require_login();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }

    if (empty($username) || empty($email)) {
        die("Username and email are required");
    }

    try {
        $pdo = db();
        $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$username, $email, $hashed_password, $_SESSION['user_id']]);
        header("Location: Accounts.php");
    } catch (PDOException $e) {
        die("Error updating profile: " . $e->getMessage());
    }
} else {
    header("Location: Accounts.php");
}

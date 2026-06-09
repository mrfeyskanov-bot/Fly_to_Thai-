<?php
session_start();
header('Content-Type: application/json');
require_once 'db_config.php';

if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT username, full_name, role FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    echo json_encode([
        'logged_in' => true,
        'username' => $user['username'],
        'full_name' => $user['full_name'],
        'role' => $user['role']
    ]);
} else {
    echo json_encode(['logged_in' => false]);
}
?>
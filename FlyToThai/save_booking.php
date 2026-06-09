<?php
session_start();
header('Content-Type: application/json');
require_once 'db_config.php';

$user_id = $_SESSION['user_id'] ?? null;
$tour_id = $_POST['tour_id'] ?? null;
$full_name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$participants = intval($_POST['participants'] ?? 1);

if (empty($full_name) || empty($phone)) {
    echo json_encode(['success' => false, 'message' => 'Заполните имя и телефон']);
    exit;
}

if ($user_id && empty($full_name)) {
    $stmt = $pdo->prepare("SELECT full_name, email FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $userData = $stmt->fetch();
    if ($userData) {
        $full_name = $full_name ?: $userData['full_name'];
        $email = $email ?: $userData['email'];
    }
}

$sql = "INSERT INTO orders (user_id, tour_id, full_name, phone, email, participants, status)
        VALUES (?, ?, ?, ?, ?, ?, 'pending')";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $tour_id, $full_name, $phone, $email, $participants]);

echo json_encode(['success' => true, 'message' => 'Заявка принята. Менеджер свяжется с вами']);
?>
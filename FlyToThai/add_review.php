<?php
session_start();
header('Content-Type: application/json');
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Необходимо войти в аккаунт']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tour_id = $_POST['tour_id'] ?? 0;
    $rating = $_POST['rating'] ?? 5;
    $comment = trim($_POST['comment'] ?? '');
    
    if (empty($comment)) {
        echo json_encode(['success' => false, 'message' => 'Введите текст отзыва']);
        exit;
    }
    
    // Проверяем, не оставлял ли пользователь уже отзыв на этот тур
    $stmt = $pdo->prepare("SELECT id FROM reviews WHERE user_id = ? AND tour_id = ?");
    $stmt->execute([$_SESSION['user_id'], $tour_id]);
    
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Вы уже оставляли отзыв на этот тур']);
        exit;
    }
    
    $stmt = $pdo->prepare("INSERT INTO reviews (tour_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$tour_id, $_SESSION['user_id'], $rating, $comment])) {
        echo json_encode(['success' => true, 'message' => 'Отзыв добавлен']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при добавлении отзыва']);
    }
}
?>
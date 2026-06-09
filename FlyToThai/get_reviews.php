<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$tour_id = $_GET['tour_id'] ?? 0;

$sql = "SELECT r.*, u.username, u.full_name 
        FROM reviews r 
        JOIN users u ON r.user_id = u.id 
        WHERE r.tour_id = ? 
        ORDER BY r.created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$tour_id]);
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($reviews);
?>
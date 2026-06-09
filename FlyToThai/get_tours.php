<?php
header('Content-Type: application/json');
require_once 'db_config.php';

$stmt = $pdo->query("SELECT * FROM tours ORDER BY id");
$tours = $stmt->fetchAll(PDO::FETCH_ASSOC);

$result = [];
foreach ($tours as $tour) {
    $result[$tour['id']] = [
        'title' => $tour['name'],
        'image' => $tour['image_url'],
        'price' => $tour['price'],
        'duration' => $tour['duration'],
        'description' => $tour['description'],
        'includes' => [],
        'features' => []
    ];
}

echo json_encode($result);
?>
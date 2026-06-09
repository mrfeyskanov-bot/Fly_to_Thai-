<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$orders = $pdo->prepare("
    SELECT o.*, t.name as tour_name
    FROM orders o
    LEFT JOIN tours t ON o.tour_id = t.id
    WHERE o.user_id = ?
    ORDER BY o.created_at DESC
");
$orders->execute([$user_id]);
$orders = $orders->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-pending { background-color: #ffc107; padding: 5px 10px; border-radius: 20px; }
        .status-paid { background-color: #28a745; color: white; padding: 5px 10px; border-radius: 20px; }
        .status-cancelled { background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 20px; }
    </style>
</head>
<body class="bg-light">
<div class="container py-4">
    <h1>Личный кабинет</h1>
    <p>Привет, <?= htmlspecialchars($user['full_name'] ?: $user['username']) ?>!</p>
    <a href="index.html" class="btn btn-primary">На главную</a>
    <a href="logout.php" class="btn btn-danger">Выйти</a>

    <h3 class="mt-5">Мои заказы</h3>
    <?php if (count($orders) > 0): ?>
    <table class="table table-bordered bg-white mt-3">
        <thead><tr><th>№</th><th>Тур</th><th>Участников</th><th>Статус</th><th>Дата</th></tr></thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['id'] ?></td>
                <td><?= htmlspecialchars($order['tour_name'] ?? '—') ?></td>
                <td><?= $order['participants'] ?></td>
                <td><span class="status-<?= $order['status'] ?>"><?= $order['status'] === 'pending' ? 'Ожидает оплаты' : ($order['status'] === 'paid' ? 'Оплачен' : 'Отменён') ?></span></td>
                <td><?= date('d.m.Y H:i', strtotime($order['created_at'])) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>У вас пока нет заказов.</p>
    <?php endif; ?>
</div>
</body>
</html>
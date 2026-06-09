<?php
session_start();
require_once 'db_config.php';

// Проверка авторизации и роли
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT role FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
if ($user['role'] !== 'admin') {
    die('Доступ запрещён');
}

// Обработка отметки об оплате
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);
    $status = $_POST['status'] ?? 'paid';
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $order_id]);
    header('Location: admin.php');
    exit;
}

// Получение списка заказов
$orders = $pdo->query("
    SELECT o.*, t.name as tour_name, u.username 
    FROM orders o
    LEFT JOIN tours t ON o.tour_id = t.id
    LEFT JOIN users u ON o.user_id = u.id
    ORDER BY o.created_at DESC
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель Fly to Thai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .status-pending { background-color: #ffc107; color: #000; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; }
        .status-paid { background-color: #28a745; color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; }
        .status-cancelled { background-color: #dc3545; color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; }
    </style>
</head>
<body class="bg-light">
    <div class="container py-4">
        <h1 class="mb-4">Админ-панель</h1>
        <a href="index.html" class="btn btn-secondary mb-4">На сайт</a>
        <a href="logout.php" class="btn btn-danger mb-4 float-end">Выйти</a>
        <table class="table table-bordered bg-white">
            <thead>
                <tr><th>ID</th><th>Пользователь</th><th>Тур</th><th>ФИО</th><th>Телефон</th><th>Email</th><th>Участников</th><th>Статус</th><th>Действия</th></tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['username'] ?? 'Гость') ?></td>
                    <td><?= htmlspecialchars($order['tour_name'] ?? '—') ?></td>
                    <td><?= htmlspecialchars($order['full_name']) ?></td>
                    <td><?= htmlspecialchars($order['phone']) ?></td>
                    <td><?= htmlspecialchars($order['email']) ?></td>
                    <td><?= $order['participants'] ?></td>
                    <td>
                        <span class="status-<?= $order['status'] ?>">
                            <?= $order['status'] === 'pending' ? 'Ожидает оплаты' : ($order['status'] === 'paid' ? 'Оплачен' : 'Отменён') ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($order['status'] === 'pending'): ?>
                        <form method="POST" style="display:inline-block">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <input type="hidden" name="status" value="paid">
                            <button class="btn btn-success btn-sm">Отметить оплаченным</button>
                        </form>
                        <form method="POST" style="display:inline-block">
                            <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                            <input type="hidden" name="status" value="cancelled">
                            <button class="btn btn-danger btn-sm">Отменить</button>
                        </form>
                        <?php else: ?>
                        —
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
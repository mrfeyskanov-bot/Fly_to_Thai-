<?php
session_start();
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$tour_id = intval($_GET['tour_id'] ?? 0);
$tour = null;
if ($tour_id) {
    $stmt = $pdo->prepare("SELECT * FROM tours WHERE id = ?");
    $stmt->execute([$tour_id]);
    $tour = $stmt->fetch();
}

$user = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$user->execute([$user_id]);
$user = $user->fetch();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $participants = intval($_POST['participants'] ?? 1);
    $full_name = trim($_POST['full_name'] ?: $user['full_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email'] ?: $user['email']);

    if ($full_name && $phone) {
        $stmt = $pdo->prepare("INSERT INTO orders (user_id, tour_id, full_name, phone, email, participants, status)
                                VALUES (?, ?, ?, ?, ?, ?, 'paid')");
        $stmt->execute([$user_id, $tour_id, $full_name, $phone, $email, $participants]);
        $message = '<div class="alert alert-success">✅ Оплата прошла успешно (тестовый режим). Спасибо за заказ!</div>';
    } else {
        $message = '<div class="alert alert-danger">Заполните обязательные поля</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Оформление заказа</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <a href="index.html" class="btn btn-secondary mb-3">← На главную</a>
    <h1>Оформление заказа</h1>
    <?= $message ?>
    <?php if ($tour): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h4><?= htmlspecialchars($tour['name']) ?></h4>
            <p>Цена: от <?= $tour['price'] ?></p>
            <p>Длительность: <?= $tour['duration'] ?></p>
        </div>
    </div>
    <?php endif; ?>
    <form method="POST">
        <div class="mb-3"><label>Ваше имя *</label><input name="full_name" class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>" required></div>
        <div class="mb-3"><label>Телефон *</label><input name="phone" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>"></div>
        <div class="mb-3"><label>Количество участников</label><input name="participants" class="form-control" type="number" value="1" min="1"></div>

        <div class="card mt-4"><div class="card-body"><h5>💳 Тестовая оплата</h5><input class="form-control mb-2" placeholder="4242 4242 4242 4242"><input class="form-control mb-2" placeholder="12/25"><input class="form-control mb-2" placeholder="123"><button type="submit" class="btn btn-success w-100">Оплатить заказ (тест)</button><small class="text-muted">*Оплата не списывает деньги, это демонстрация</small></div></div>
    </form>
</div>
</body>
</html>
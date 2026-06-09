<?php
// db_config.php - подключение к PostgreSQL

$host = 'localhost';
$port = '5432';
$dbname = 'thailand_tours';
$user = 'postgres';
$password = '12345';  

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Подключено успешно!"; // для проверки
} catch (PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}
?>
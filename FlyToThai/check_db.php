<?php
require_once 'db_config.php';

echo "<h2>Таблицы в базе данных thailand_tours</h2>";

$tables = ['tours', 'booking_requests'];

foreach ($tables as $table) {
    echo "<h3>Таблица: $table</h3>";
    $stmt = $pdo->query("SELECT * FROM $table");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($rows) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>";
        foreach (array_keys($rows[0]) as $col) {
            echo "<th>$col</th>";
        }
        echo "</tr>";
        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Таблица пуста</p>";
    }
    echo "<br>";
}
?>
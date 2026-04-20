<?php
// Получаем настройки из переменных окружения (из docker-compose.yml)
$host = getenv('DB_HOST') ?: 'db';
$user = getenv('DB_USER') ?: 'app_user';
$pass = getenv('DB_PASSWORD') ?: 'app_password';
$db   = getenv('DB_NAME') ?: 'my_app_db';

echo "<h1>PHP + MySQL в Docker</h1>";

try {
    // Пытаемся подключиться к БД
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    
    // Настройка ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p style='color: green;'>✅ Подключение к базе данных успешно!</p>";
    echo "<p>Версия MySQL: " . $pdo->query('SELECT VERSION()')->fetchColumn() . "</p>";

} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Ошибка подключения: " . $e->getMessage() . "</p>";
}
?>
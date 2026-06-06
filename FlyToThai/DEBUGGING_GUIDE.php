<?php
/**
 * wp-config.php ОТЛАДКА
 * 
 * Добавьте эти строки в wp-config.php для включения режима отладки:
 */

// Включить отладку WordPress
define( 'WP_DEBUG', true );

// Включить логирование ошибок в файл
define( 'WP_DEBUG_LOG', true );

// НЕ показывать ошибки на фронтенде
define( 'WP_DEBUG_DISPLAY', false );

// Путь для лога: /wp-content/debug.log

/*
 * ЕСЛИ ОШИБКА ОСТАЁТСЯ, ПРОВЕРЬТЕ:
 */

// 1. Версии
// WordPress: минимум 5.0
// PHP: минимум 7.4
// MySQL: минимум 5.7

// 2. Права доступа на файлы:
// chmod -R 755 wp-content/themes/fly-to-thai
// chmod -R 644 wp-content/themes/fly-to-thai/*.php

// 3. Память PHP:
// define( 'WP_MEMORY_LIMIT', '256M' );
// define( 'WP_MAX_MEMORY_LIMIT', '512M' );

// 4. Отключите все плагины и используйте встроенную тему для тестирования

// 5. Проверьте логи:
// Файл: /wp-content/debug.log

/*
 * ТИПИЧНЫЕ ПРОБЛЕМЫ:
 */

// Проблема: "Call to undefined function"
// Решение: Проверьте require_once в functions.php

// Проблема: "Fatal error: Class not found"
// Решение: Проверьте путь к классу и его определение

// Проблема: "Allowed memory exhausted"
// Решение: Увеличьте WP_MEMORY_LIMIT в wp-config.php

// Проблема: "Cannot modify header information"
// Решение: Убедитесь, что нет пробелов/символов до <?php

?>
<?php
/**
 * Подключение и регистрация скриптов и стилей
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

function flytothai_enqueue_scripts() {
    // Логирование для отладки
    error_log( 'FLY TO THAI: enqueue_scripts called' );
    error_log( 'FLY TO THAI: FLYTOTHAI_URI = ' . FLYTOTHAI_URI );
    error_log( 'FLY TO THAI: FLYTOTHAI_VERSION = ' . FLYTOTHAI_VERSION );
    
    // Проверка что константы определены
    if ( ! defined( 'FLYTOTHAI_URI' ) || ! defined( 'FLYTOTHAI_VERSION' ) ) {
        error_log( 'Fly to Thai: Constants not defined in enqueue_scripts' );
        return;
    }

    // Bootstrap CSS
    wp_enqueue_style( 
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        array(),
        '5.3.0',
        'all'
    );
    error_log( 'FLY TO THAI: Bootstrap CSS enqueued' );
    
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Varta:wght@300;400;500;600;700&family=Vollkorn+SC:wght@400;600;700&display=swap',
        array(),
        '1.0',
        'all'
    );
    error_log( 'FLY TO THAI: Google Fonts enqueued' );
    
    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0',
        'all'
    );
    error_log( 'FLY TO THAI: Font Awesome enqueued' );
    
    // Главный стиль темы (объединённый файл styles/style.css)
    wp_enqueue_style(
        'flytothai-style',
        FLYTOTHAI_URI . 'styles/style.css',
        array( 'bootstrap-css', 'google-fonts', 'font-awesome' ),
        FLYTOTHAI_VERSION,
        'all'
    );
    error_log( 'FLY TO THAI: Theme styles enqueued' );

    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.0',
        true
    );
    error_log( 'FLY TO THAI: Bootstrap JS enqueued' );
    
    // jQuery (встроенный WordPress)
    wp_enqueue_script( 'jquery' );
    
    // Главный скрипт
    wp_enqueue_script(
        'flytothai-main',
        FLYTOTHAI_URI . 'js/main.js',
        array( 'jquery', 'bootstrap-js' ),
        FLYTOTHAI_VERSION,
        true
    );
    error_log( 'FLY TO THAI: Main JS enqueued' );
    
    // Валидация формы
    wp_enqueue_script(
        'flytothai-form-validation',
        FLYTOTHAI_URI . 'js/form-validation.js',
        array( 'jquery' ),
        FLYTOTHAI_VERSION,
        true
    );
    
    // Анимации JS
    wp_enqueue_script(
        'flytothai-animations',
        FLYTOTHAI_URI . 'js/animations.js',
        array( 'jquery' ),
        FLYTOTHAI_VERSION,
        true
    );
    
    // Передать данные в JS
    wp_localize_script( 'flytothai-main', 'flyToThaiData', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'flytothai-nonce' ),
        'siteurl' => site_url(),
    ) );
    
    error_log( 'FLY TO THAI: All scripts/styles enqueued successfully' );
    
    // Поддержка встроенных комментариев
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

// Правильный момент для подключения скриптов
add_action( 'wp_enqueue_scripts', 'flytothai_enqueue_scripts', 10 );

error_log( 'FLY TO THAI: enqueue-scripts.php loaded' );

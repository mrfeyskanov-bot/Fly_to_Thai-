<?php
/**
 * Fly to Thai Theme - Functions File
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

// Предотвратить прямой доступ
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Константы темы - определяются один раз
if ( ! defined( 'FLYTOTHAI_VERSION' ) ) {
    define( 'FLYTOTHAI_VERSION', '1.4.0' );
}

if ( ! defined( 'FLYTOTHAI_DIR' ) ) {
    define( 'FLYTOTHAI_DIR', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'FLYTOTHAI_URI' ) ) {
    define( 'FLYTOTHAI_URI', trailingslashit( get_template_directory_uri() ) );
}

/**
 * Включить функции темы
 */
require_once FLYTOTHAI_DIR . 'inc/theme-setup.php';
require_once FLYTOTHAI_DIR . 'inc/enqueue-scripts.php';
require_once FLYTOTHAI_DIR . 'inc/custom-post-types.php';
require_once FLYTOTHAI_DIR . 'inc/custom-taxonomies.php';

/**
 * Инициализация темы
 */
function flytothai_theme_init() {
    // Добавить поддержку функций
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ) );
    
    // Размеры изображений
    add_image_size( 'flytothai-hero', 1920, 1080, true );
    add_image_size( 'flytothai-tour-card', 400, 300, true );
    add_image_size( 'flytothai-expert', 250, 250, true );
    
    // Меню
    register_nav_menus( array(
        'main-menu'   => __( 'Главное меню', 'fly-to-thai' ),
        'footer-menu' => __( 'Меню подвала', 'fly-to-thai' ),
    ) );
}

add_action( 'after_setup_theme', 'flytothai_theme_init' );

/**
 * Регистрация боковых колонок
 */
function flytothai_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Основная боковая колонка', 'fly-to-thai' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Главная боковая колонка', 'fly-to-thai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Подвал 1', 'fly-to-thai' ),
        'id'            => 'footer-1',
        'description'   => __( 'Первая колонка подвала', 'fly-to-thai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Подвал 2', 'fly-to-thai' ),
        'id'            => 'footer-2',
        'description'   => __( 'Вторая колонка подвала', 'fly-to-thai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Подвал 3', 'fly-to-thai' ),
        'id'            => 'footer-3',
        'description'   => __( 'Третья колонка подвала', 'fly-to-thai' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}

add_action( 'widgets_init', 'flytothai_widgets_init' );

/**
 * Поддержка пользовательских шрифтов
 */
function flytothai_custom_fonts() {
    return array(
        'Varta' => array(
            'weights' => array( '300', '400', '500', '600', '700' ),
        ),
        'Vollkorn SC' => array(
            'weights' => array( '400', '600', '700' ),
        ),
    );
}

/**
 * Кастомная логика для постов
 */
function flytothai_setup_custom_functionality() {
    // Добавить фильтры, хуки и другую логику
    do_action( 'flytothai_custom_setup' );
}

add_action( 'wp_head', 'flytothai_setup_custom_functionality' );

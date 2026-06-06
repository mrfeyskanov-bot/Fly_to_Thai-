<?php
/**
 * Пользовательские типы постов
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

/**
 * Регистрация типа поста "Туры"
 */
function flytothai_register_tour_post_type() {
    $args = array(
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'tours' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-palmtree',
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ),
        'labels'              => array(
            'name'               => _x( 'Туры', 'post type general name', 'fly-to-thai' ),
            'singular_name'      => _x( 'Тур', 'post type singular name', 'fly-to-thai' ),
            'menu_name'          => _x( 'Туры', 'admin menu', 'fly-to-thai' ),
            'name_admin_bar'     => _x( 'Тур', 'add new on admin bar', 'fly-to-thai' ),
            'add_new'            => _x( 'Добавить новый', 'fly-to-thai' ),
            'add_new_item'       => __( 'Добавить новый тур', 'fly-to-thai' ),
            'new_item'           => __( 'Новый тур', 'fly-to-thai' ),
            'edit_item'          => __( 'Редактировать тур', 'fly-to-thai' ),
            'view_item'          => __( 'Смотреть тур', 'fly-to-thai' ),
            'all_items'          => __( 'Все туры', 'fly-to-thai' ),
            'search_items'       => __( 'Поиск туров', 'fly-to-thai' ),
            'not_found'          => __( 'Туры не найдены', 'fly-to-thai' ),
            'not_found_in_trash' => __( 'Нет туров в корзине', 'fly-to-thai' ),
        ),
    );
    
    register_post_type( 'tour', $args );
}

add_action( 'init', 'flytothai_register_tour_post_type' );

/**
 * Регистрация типа поста "Отзывы"
 */
function flytothai_register_review_post_type() {
    $args = array(
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'reviews' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-testimonial',
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail' ),
        'labels'              => array(
            'name'               => _x( 'Отзывы', 'post type general name', 'fly-to-thai' ),
            'singular_name'      => _x( 'Отзыв', 'post type singular name', 'fly-to-thai' ),
            'menu_name'          => _x( 'Отзывы', 'admin menu', 'fly-to-thai' ),
            'name_admin_bar'     => _x( 'Отзыв', 'add new on admin bar', 'fly-to-thai' ),
            'add_new'            => _x( 'Добавить новый', 'fly-to-thai' ),
            'add_new_item'       => __( 'Добавить новый отзыв', 'fly-to-thai' ),
            'new_item'           => __( 'Новый отзыв', 'fly-to-thai' ),
            'edit_item'          => __( 'Редактировать отзыв', 'fly-to-thai' ),
            'view_item'          => __( 'Смотреть отзыв', 'fly-to-thai' ),
            'all_items'          => __( 'Все отзывы', 'fly-to-thai' ),
            'search_items'       => __( 'Поиск отзывов', 'fly-to-thai' ),
            'not_found'          => __( 'Отзывы не найдены', 'fly-to-thai' ),
            'not_found_in_trash' => __( 'Нет отзывов в корзине', 'fly-to-thai' ),
        ),
    );
    
    register_post_type( 'review', $args );
}

add_action( 'init', 'flytothai_register_review_post_type' );

/**
 * Регистрация типа поста "Специалисты"
 */
function flytothai_register_expert_post_type() {
    $args = array(
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'experts' ),
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => false,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-businessperson',
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail' ),
        'labels'              => array(
            'name'               => _x( 'Специалисты', 'post type general name', 'fly-to-thai' ),
            'singular_name'      => _x( 'Специалист', 'post type singular name', 'fly-to-thai' ),
            'menu_name'          => _x( 'Специалисты', 'admin menu', 'fly-to-thai' ),
            'name_admin_bar'     => _x( 'Специалист', 'add new on admin bar', 'fly-to-thai' ),
            'add_new'            => _x( 'Добавить нового', 'fly-to-thai' ),
            'add_new_item'       => __( 'Добавить нового специалиста', 'fly-to-thai' ),
            'new_item'           => __( 'Новый специалист', 'fly-to-thai' ),
            'edit_item'          => __( 'Редактировать специалиста', 'fly-to-thai' ),
            'view_item'          => __( 'Смотреть специалиста', 'fly-to-thai' ),
            'all_items'          => __( 'Все специалисты', 'fly-to-thai' ),
            'search_items'       => __( 'Поиск специалистов', 'fly-to-thai' ),
            'not_found'          => __( 'Специалисты не найдены', 'fly-to-thai' ),
            'not_found_in_trash' => __( 'Нет специалистов в корзине', 'fly-to-thai' ),
        ),
    );
    
    register_post_type( 'expert', $args );
}

add_action( 'init', 'flytothai_register_expert_post_type' );

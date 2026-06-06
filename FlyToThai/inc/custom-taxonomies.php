<?php
/**
 * Пользовательские категории (таксономии)
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

/**
 * Регистрация таксономии для туров
 */
function flytothai_register_tour_taxonomy() {
    $labels = array(
        'name'              => _x( 'Направления', 'taxonomy general name', 'fly-to-thai' ),
        'singular_name'     => _x( 'Направление', 'taxonomy singular name', 'fly-to-thai' ),
        'search_items'      => __( 'Поиск направлений', 'fly-to-thai' ),
        'all_items'         => __( 'Все направления', 'fly-to-thai' ),
        'parent_item'       => __( 'Родительское направление', 'fly-to-thai' ),
        'parent_item_colon' => __( 'Родительское направление:', 'fly-to-thai' ),
        'edit_item'         => __( 'Редактировать направление', 'fly-to-thai' ),
        'update_item'       => __( 'Обновить направление', 'fly-to-thai' ),
        'add_new_item'      => __( 'Добавить новое направление', 'fly-to-thai' ),
        'new_item_name'     => __( 'Имя нового направления', 'fly-to-thai' ),
        'menu_name'         => __( 'Направления', 'fly-to-thai' ),
    );
    
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tour-direction' ),
    );
    
    register_taxonomy( 'tour_direction', array( 'tour' ), $args );
}

add_action( 'init', 'flytothai_register_tour_taxonomy' );

/**
 * Регистрация таксономии для уровня сложности тура
 */
function flytothai_register_tour_level_taxonomy() {
    $labels = array(
        'name'              => _x( 'Уровни сложности', 'taxonomy general name', 'fly-to-thai' ),
        'singular_name'     => _x( 'Уровень сложности', 'taxonomy singular name', 'fly-to-thai' ),
        'search_items'      => __( 'Поиск уровней', 'fly-to-thai' ),
        'all_items'         => __( 'Все уровни', 'fly-to-thai' ),
        'edit_item'         => __( 'Редактировать уровень', 'fly-to-thai' ),
        'update_item'       => __( 'Обновить уровень', 'fly-to-thai' ),
        'add_new_item'      => __( 'Добавить новый уровень', 'fly-to-thai' ),
        'new_item_name'     => __( 'Имя нового уровня', 'fly-to-thai' ),
        'menu_name'         => __( 'Уровни сложности', 'fly-to-thai' ),
    );
    
    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tour-level' ),
    );
    
    register_taxonomy( 'tour_level', array( 'tour' ), $args );
}

add_action( 'init', 'flytothai_register_tour_level_taxonomy' );

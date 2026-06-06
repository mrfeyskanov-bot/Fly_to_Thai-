<?php
/**
 * Настройки темы
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

/**
 * Регистрация кастомизаций
 */
function flytothai_customize_register( $wp_customize ) {
    // Панель контактов
    $wp_customize->add_section( 'flytothai_contacts', array(
        'title'    => __( 'Контакты', 'fly-to-thai' ),
        'priority' => 30,
    ) );
    
    // Телефон
    $wp_customize->add_setting( 'flytothai_phone', array(
        'default'           => '+7 (951) 816-74-44',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'flytothai_phone', array(
        'label'    => __( 'Телефон', 'fly-to-thai' ),
        'section'  => 'flytothai_contacts',
        'type'     => 'text',
    ) );
    
    // Email
    $wp_customize->add_setting( 'flytothai_email', array(
        'default'           => 'info@flytothai.ru',
        'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( 'flytothai_email', array(
        'label'    => __( 'Email', 'fly-to-thai' ),
        'section'  => 'flytothai_contacts',
        'type'     => 'email',
    ) );
    
    // Адрес
    $wp_customize->add_setting( 'flytothai_address', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'flytothai_address', array(
        'label'    => __( 'Адрес', 'fly-to-thai' ),
        'section'  => 'flytothai_contacts',
        'type'     => 'text',
    ) );
    
    // Соцсети
    $wp_customize->add_section( 'flytothai_social', array(
        'title'    => __( 'Социальные сети', 'fly-to-thai' ),
        'priority' => 31,
    ) );
    
    // VK
    $wp_customize->add_setting( 'flytothai_vk', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'flytothai_vk', array(
        'label'    => __( 'VKontakte', 'fly-to-thai' ),
        'section'  => 'flytothai_social',
        'type'     => 'url',
    ) );
    
    // Instagram
    $wp_customize->add_setting( 'flytothai_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'flytothai_instagram', array(
        'label'    => __( 'Instagram', 'fly-to-thai' ),
        'section'  => 'flytothai_social',
        'type'     => 'url',
    ) );
    
    // Telegram
    $wp_customize->add_setting( 'flytothai_telegram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'flytothai_telegram', array(
        'label'    => __( 'Telegram', 'fly-to-thai' ),
        'section'  => 'flytothai_social',
        'type'     => 'url',
    ) );
}

add_action( 'customize_register', 'flytothai_customize_register' );

<?php
/**
 * Боковая колонка (Sidebar)
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
    return;
}
?>

<aside id="secondary" class="primary-sidebar">
    <?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->

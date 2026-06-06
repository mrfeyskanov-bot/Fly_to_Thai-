<?php
/**
 * Шаблон когда постов не найдено
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */
?>

<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title"><?php esc_html_e( 'Ничего не найдено', 'fly-to-thai' ); ?></h1>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) {
            printf(
                '<p>' . wp_kses(
                    __( 'Готовы опубликовать свой первый пост? <a href="%1$s">Начните здесь</a>.', 'fly-to-thai' ),
                    array( 'a' => array( 'href' => array() ) )
                ) . '</p>',
                esc_url( admin_url( 'post-new.php' ) )
            );
        } elseif ( is_search() ) {
            ?>
            <p><?php esc_html_e( 'Извините, но ничего не соответствует вашим критериям поиска. Пожалуйста, попробуйте снова с другими ключевыми словами.', 'fly-to-thai' ); ?></p>
            <?php
            get_search_form();
        } else {
            ?>
            <p><?php esc_html_e( 'Похоже, мы не смогли найти то, что вы ищете. Возможно, поиск поможет.', 'fly-to-thai' ); ?></p>
            <?php
            get_search_form();
        }
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 -->

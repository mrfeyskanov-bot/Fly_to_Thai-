<?php
/**
 * Основной файл темы Fly to Thai
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content' );
                    }
                    
                    // Пагинация
                    the_posts_pagination( array(
                        'prev_text' => __( 'Предыдущая', 'fly-to-thai' ),
                        'next_text' => __( 'Следующая', 'fly-to-thai' ),
                    ) );
                } else {
                    get_template_part( 'template-parts/content', 'none' );
                }
                ?>
            </div>
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
                
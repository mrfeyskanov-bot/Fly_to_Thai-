<?php
/**
 * Шаблон для отображения одного поста
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
    <header class="entry-header mb-4">
        <?php
        if ( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
        
        if ( 'post' === get_post_type() ) {
            ?>
            <div class="entry-meta text-muted">
                <?php
                echo esc_html( get_the_date() );
                echo ' | ' . esc_html( get_the_author() );
                ?>
            </div>
            <?php
        }
        ?>
    </header><!-- .entry-header -->

    <?php
    if ( has_post_thumbnail() ) {
        ?>
        <div class="entry-image mb-4">
            <?php
            if ( is_singular() ) {
                the_post_thumbnail( 'flytothai-hero', array( 'class' => 'img-fluid' ) );
            } else {
                ?>
                <a href="<?php esc_url( the_permalink() ); ?>">
                    <?php the_post_thumbnail( 'flytothai-tour-card', array( 'class' => 'img-fluid' ) ); ?>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

    <div class="entry-content">
        <?php
        if ( is_singular() ) {
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Продолжить чтение<span class="meta-nav">&rarr;</span>', 'fly-to-thai' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    esc_url( get_permalink() )
                )
            );
        } else {
            the_excerpt();
            ?>
            <div class="mt-3">
                <a href="<?php esc_url( the_permalink() ); ?>" class="btn btn-primary btn-sm">
                    <?php esc_html_e( 'Подробнее', 'fly-to-thai' ); ?>
                </a>
            </div>
            <?php
        }

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fly-to-thai' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <?php
    if ( is_singular() ) {
        ?>
        <footer class="entry-footer mt-5 pt-4 border-top">
            <?php
            if ( 'post' === get_post_type() ) {
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    ?>
                    <div class="mb-2">
                        <strong><?php esc_html_e( 'Категории:', 'fly-to-thai' ); ?></strong>
                        <?php
                        foreach ( $categories as $category ) {
                            ?>
                            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" class="badge bg-secondary">
                                <?php echo esc_html( $category->name ); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }

                $tags = get_the_tags();
                if ( ! empty( $tags ) ) {
                    ?>
                    <div>
                        <strong><?php esc_html_e( 'Теги:', 'fly-to-thai' ); ?></strong>
                        <?php
                        foreach ( $tags as $tag ) {
                            ?>
                            <a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="badge bg-info">
                                <?php echo esc_html( $tag->name ); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
        </footer>
        <?php
    }
    ?>
</article><!-- #post-<?php the_ID(); ?> -->

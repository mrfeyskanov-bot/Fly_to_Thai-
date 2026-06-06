<?php
/**
 * Подвал (Footer) темы Fly to Thai
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */
?>

</main><!-- #main -->

<footer id="colophon" class="site-footer">
    <div class="footer-content py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <?php
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        dynamic_sidebar( 'footer-1' );
                    } else {
                        ?>
                        <h4><?php esc_html_e( 'О компании', 'fly-to-thai' ); ?></h4>
                        <p><?php esc_html_e( 'Туроператор по Таиланду с 10-летним опытом.', 'fly-to-thai' ); ?></p>
                        <?php
                    }
                    ?>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <?php
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        dynamic_sidebar( 'footer-2' );
                    } else {
                        ?>
                        <h4><?php esc_html_e( 'Быстрые ссылки', 'fly-to-thai' ); ?></h4>
                        <ul class="list-unstyled">
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Главная', 'fly-to-thai' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/tours' ) ); ?>"><?php esc_html_e( 'Туры', 'fly-to-thai' ); ?></a></li>
                            <li><a href="<?php echo esc_url( home_url( '/contacts' ) ); ?>"><?php esc_html_e( 'Контакты', 'fly-to-thai' ); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <?php
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        dynamic_sidebar( 'footer-3' );
                    } else {
                        ?>
                        <h4><?php esc_html_e( 'Контакты', 'fly-to-thai' ); ?></h4>
                        <p>
                            <strong><?php esc_html_e( 'Телефон:', 'fly-to-thai' ); ?></strong><br>
                            <a href="tel:<?php echo esc_attr( get_theme_mod( 'flytothai_phone', '+79998887766' ) ); ?>">
                                <?php echo esc_html( get_theme_mod( 'flytothai_phone', '+7 (999) 888-77-66' ) ); ?>
                            </a>
                        </p>
                        <?php
                    }
                    ?>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4><?php esc_html_e( 'Соцсети', 'fly-to-thai' ); ?></h4>
                    <ul class="list-unstyled">
                        <?php if ( get_theme_mod( 'flytothai_vk' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'flytothai_vk' ) ); ?>" target="_blank">VK</a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'flytothai_instagram' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'flytothai_instagram' ) ); ?>" target="_blank">Instagram</a></li>
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'flytothai_telegram' ) ) : ?>
                            <li><a href="<?php echo esc_url( get_theme_mod( 'flytothai_telegram' ) ); ?>" target="_blank">Telegram</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">
                        &copy; <?php echo esc_html( date( 'Y' ) ); ?> 
                        <strong><?php bloginfo( 'name' ); ?></strong>. 
                        <?php esc_html_e( 'Все права защищены.', 'fly-to-thai' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>

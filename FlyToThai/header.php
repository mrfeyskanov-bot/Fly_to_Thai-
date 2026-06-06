<?php
/**
 * Заголовок (Header) темы Fly to Thai
 * 
 * @package Fly_to_Thai
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    
    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varta:wght@300;400;500;600;700&family=Vollkorn+SC:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Встроенные стили темы -->
    <style>
    /* ===== БАЗОВЫЕ ПЕРЕМЕННЫЕ И СТИЛИ ===== */
    :root {
        --primary-blue: #1A4F8C;
        --primary-teal: #2AA4B0;
        --primary-orange: #E57857;
        --white: #FFFFFF;
        --light-gray: #F8F9FA;
        --gray: #6C757D;
        --dark-gray: #343A40;
        --font-heading: 'Vollkorn SC', serif;
        --font-body: 'Varta', sans-serif;
        --shadow-sm: 0 2px 4px rgba(0,0,0,0.1);
        --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
        --shadow-lg: 0 10px 15px rgba(0,0,0,0.1);
        --transition-fast: 0.2s ease;
        --transition-normal: 0.3s ease;
        --transition-slow: 0.5s ease;
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { height: 100%; }
    
    body {
        font-family: var(--font-body);
        color: var(--dark-gray);
        padding-top: 76px;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: var(--font-heading);
        font-weight: 700;
    }
    
    /* ===== НАВИГАЦИЯ ===== */
    .navbar {
        background: linear-gradient(135deg, #1A4F8C 0%, #2AA4B0 100%);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        padding: 15px 0;
        transition: all var(--transition-normal);
    }
    
    .navbar-brand {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 1.5rem;
    }
    
    .logo-text {
        color: var(--white);
    }
    
    .nav-link {
        font-family: var(--font-body);
        font-weight: 500;
        color: var(--white) !important;
        transition: all var(--transition-normal);
    }
    
    .nav-link:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    
    .header-phone a {
        color: var(--white) !important;
        text-decoration: none;
        transition: opacity var(--transition-fast);
    }
    
    .header-phone a:hover {
        opacity: 0.8;
    }
    
    /* ===== HERO ===== */
    .hero {
        min-height: 100vh;
        color: var(--white);
        position: relative;
        margin-top: -76px;
        padding-top: 160px;
        padding-bottom: 150px;
        overflow: hidden;
    }
    
    .hero-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), url('../images/hero/background.jpg') center/cover no-repeat;
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 3.5rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        color: var(--white);
    }
    
    .hero-title .text-teal {
        color: var(--primary-orange);
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
        opacity: 0.95;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }
    
    /* ===== КНОПКИ ===== */
    .btn-primary {
        background-color: var(--primary-orange) !important;
        border-color: var(--primary-orange) !important;
        border-radius: 30px;
        padding: 12px 30px;
        font-weight: 600;
    }
    
    .btn-primary:hover {
        background-color: #d46346 !important;
        border-color: #d46346 !important;
        transform: translateY(-3px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.2);
    }
    
    .btn-outline {
        color: var(--primary-orange) !important;
        border-color: var(--primary-orange) !important;
        border-radius: 30px;
    }
    
    .btn-outline:hover {
        background-color: var(--primary-orange) !important;
        color: var(--white) !important;
    }
    
    /* ===== КАРТОЧКИ ===== */
    .advantage-card {
        background-color: var(--white);
        border-radius: 8px;
        box-shadow: var(--shadow-md);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        height: 100%;
    }
    
    .advantage-card:hover {
        transform: scale(1.05) translateY(-10px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        z-index: 10;
    }
    
    .advantage-icon {
        width: 80px;
        height: 80px;
        background-color: var(--primary-teal);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .advantage-card:hover .advantage-icon {
        transform: scale(1.2) rotate(5deg);
        background-color: var(--primary-blue);
    }
    
    .tour-card {
        display: flex;
        flex-direction: column;
        width: 100%;
        transition: all 0.3s ease;
    }
    
    .tour-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .tour-price {
        background-color: var(--primary-orange);
        color: var(--white);
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .tour-duration {
        color: var(--primary-teal);
        font-weight: 600;
    }
    
    .tour-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding: 25px;
    }
    
    .tour-description {
        flex-grow: 1;
        margin-bottom: 20px;
        min-height: 72px;
    }
    
    .tour-features {
        margin-bottom: 20px;
        min-height: 60px;
    }
    
    .tour-details-btn {
        margin-top: auto;
    }
    
    .review-card {
        background-color: var(--white);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .review-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .review-location {
        background-color: var(--light-gray) !important;
        color: var(--primary-teal) !important;
        font-weight: 600;
    }
    
    /* ===== ФОРМА ===== */
    .contact-form-section {
        background-color: var(--light-gray);
    }
    
    .contact-form {
        background-color: var(--white);
        box-shadow: var(--shadow-md);
    }
    
    .btn-submit {
        background-color: var(--primary-orange) !important;
        border-color: var(--primary-orange) !important;
        color: var(--white) !important;
        border-radius: 30px;
        padding: 15px 40px;
        font-size: 1.1rem;
    }
    
    .btn-submit:hover {
        background-color: #d46346 !important;
        border-color: #d46346 !important;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }
    
    .second-form {
        background: linear-gradient(135deg, #1A4F8C 0%, #2AA4B0 100%);
        color: var(--white);
    }
    
    .second-form .form-control {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: var(--white);
    }
    
    .second-form .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    
    .second-form .form-control:focus {
        background-color: rgba(255, 255, 255, 0.25);
        border-color: var(--white);
        color: var(--white);
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
    }
    
    /* ===== ПОДВАЛ ===== */
    .footer {
        background: linear-gradient(135deg, #1A4F8C 0%, #2AA4B0 100%);
        color: var(--white);
        position: relative;
    }
    
    .footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 20px;
        background: linear-gradient(180deg, rgb(255, 255, 255) 0%, transparent 100%);
    }
    
    .footer-title {
        color: var(--white);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .footer-text {
        color: rgba(255,255,255,0.95);
    }
    
    .footer-contacts a {
        color: var(--white);
        text-decoration: none;
        transition: all var(--transition-fast);
    }
    
    .footer-contacts a:hover {
        color: var(--primary-orange);
    }
    
    .footer-links a {
        color: rgba(255,255,255,0.95);
        text-decoration: none;
        transition: all var(--transition-fast);
    }
    
    .footer-links a:hover {
        color: var(--primary-orange);
        transform: translateX(5px);
    }
    
    .social-links a {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(255, 255, 255, 0.2);
        color: var(--primary-blue) !important;
        border-radius: 50%;
        font-size: 1.2rem;
        transition: all var(--transition-normal);
        text-decoration: none;
    }
    
    .social-links a i {
        color: var(--primary-blue) !important;
    }
    
    .social-links a:hover {
        background-color: var(--primary-orange);
        transform: translateY(-5px) scale(1.1);
    }
    
    .social-links a:hover i {
        color: var(--white) !important;
    }
    
    /* ===== МОДАЛЬНОЕ ОКНО ===== */
    .modal-content {
        border-radius: 8px;
    }
    
    .modal-tour-image {
        position: relative;
        height: 200px;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 20px;
    }
    
    .modal-tour-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* ===== АДАПТИВНОСТЬ ===== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .hero-subtitle { font-size: 1.1rem; }
        .advantage-card:hover, .expert-card:hover { transform: translateY(-10px); }
    }
    
    @media (max-width: 768px) {
        .hero { padding-top: 140px; padding-bottom: 100px; }
        .hero-title { font-size: 2.2rem; }
        .hero-subtitle { font-size: 1rem; }
        .navbar-nav {
            background: linear-gradient(135deg, rgba(26, 79, 140, 0.98) 0%, rgba(42, 164, 176, 0.98) 100%);
            padding: 20px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .tour-description, .tour-features { min-height: auto !important; }
    }
    
    @media (max-width: 576px) {
        .hero-title { font-size: 1.8rem; }
        .section-title { font-size: 1.8rem; }
    }
    
    /* ===== АНИМАЦИИ ===== */
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(42, 164, 176, 0.7); }
        70% { box-shadow: 0 0 0 10px rgba(255, 255, 255, 0); }
        100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-15px); }
        60% { transform: translateY(-7px); }
    }
    
    .fade-in { opacity: 0; animation: fadeIn 0.8s ease forwards; }
    .fade-in.delay-1 { animation-delay: 0.2s; }
    .fade-in.delay-2 { animation-delay: 0.4s; }
    .fade-in.delay-3 { animation-delay: 0.6s; }
    
    .fade-in-up { opacity: 0; animation: fadeInUp 0.6s ease forwards; }
    
    .slide-up { opacity: 0; }
    .slide-up.animate { animation: slideUp 0.6s ease forwards; }
    .slide-up.delay-1 { animation-delay: 0.1s; }
    .slide-up.delay-2 { animation-delay: 0.2s; }
    .slide-up.delay-3 { animation-delay: 0.3s; }
    .slide-up.delay-4 { animation-delay: 0.4s; }
    
    .scroll-to-form-arrow i { animation: bounce 2s infinite; }
    .scroll-to-form-arrow:hover i { animation: none; transform: translateY(5px); }
    </style>
</head>
</head>
<body <?php body_class(); ?> data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="100">
    <?php wp_body_open(); ?>
    
    <!-- Header с Bootstrap Navbar -->
    <nav id="mainNav" class="navbar navbar-expand-lg navbar-dark fixed-top py-3">
        <div class="container">
            <!-- Логотип -->
            <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <svg class="logo-svg me-2" width="50" height="37" viewBox="0 0 930 688" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M712 256C712 397.385 597.385 512 456 512C314.615 512 200 397.385 200 256C200 114.615 314.615 0 456 0C597.385 0 712 114.615 712 256Z" fill="#2AA4B0"/>
                        <path d="M456 0C597.385 0 712 114.615 712 256C712 285.624 706.967 314.073 697.711 340.539C689.378 308.901 659.261 287.2 625.873 290.204L580.633 294.275C566.331 295.562 551.989 292.289 539.662 284.924L500.668 261.627C469.448 242.975 429.078 252.189 409.042 282.54L384.018 320.449C376.107 332.433 364.605 341.605 351.161 346.65L308.635 362.612C281.564 372.773 264.659 398.439 264.516 425.915C224.377 380.715 200 321.204 200 256C200 114.615 314.615 0 456 0Z" fill="#E57857"/>
                        <path d="M294.242 578.296V597.112H298.658C301.346 597.112 303.181 596.771 304.162 596.088C305.186 595.363 305.72 593.976 305.762 591.928C306.786 591.629 307.81 591.48 308.834 591.48C308.749 592.931 308.706 595.256 308.706 598.456C308.706 601.955 308.749 604.429 308.834 605.88C307.682 605.88 306.701 605.773 305.89 605.56C305.72 603.341 305.122 601.848 304.098 601.08C303.117 600.269 301.304 599.864 298.658 599.864H294.242V609.592C294.242 611.427 294.434 612.835 294.818 613.816C295.202 614.755 295.778 615.416 296.546 615.8C297.357 616.141 298.488 616.355 299.938 616.44C300.152 617.037 300.258 617.955 300.258 619.192C298.296 619.064 295.608 619 292.194 619C288.056 619 285.154 619.064 283.49 619.192C283.49 617.955 283.597 617.037 283.81 616.44C285.517 616.355 286.669 615.949 287.266 615.224C287.906 614.456 288.226 613.005 288.226 610.872V583.864C288.226 581.731 287.906 580.301 287.266 579.576C286.669 578.808 285.517 578.381 283.81 578.296C283.597 577.699 283.49 576.781 283.49 575.544C286.306 575.672 289.869 575.736 294.178 575.736C301.816 575.736 307.746 575.672 311.97 575.544C312.397 580.237 312.845 583.608 313.314 585.656C312.674 586.168 311.714 586.424 310.434 586.424C310.221 584.035 309.346 582.093 307.81 580.6C306.317 579.064 303.693 578.296 299.938 578.296H294.242ZM336.133 616.12C338.139 616.12 339.717 615.928 340.869 615.544C342.064 615.117 343.003 614.477 343.685 613.624C344.411 612.728 345.093 611.491 345.733 609.912C346.885 610.125 347.824 610.595 348.549 611.32C347.781 613.325 347.205 615.907 346.821 619.064L335.493 619C329.349 619 324.4 619.043 320.645 619.128C320.645 617.805 320.752 616.845 320.965 616.248C321.989 616.163 322.779 615.992 323.333 615.736C323.888 615.48 324.272 615.011 324.485 614.328C324.741 613.645 324.869 612.621 324.869 611.256V594.424C324.869 593.187 324.741 592.248 324.485 591.608C324.272 590.968 323.888 590.52 323.333 590.264C322.821 590.008 322.032 589.837 320.965 589.752C320.795 589.069 320.709 588.109 320.709 586.872C323.781 586.957 326.149 587 327.813 587C329.563 587 331.931 586.957 334.917 586.872C334.917 588.152 334.811 589.112 334.597 589.752C333.104 589.837 332.08 590.2 331.525 590.84C331.013 591.437 330.757 592.653 330.757 594.488V611.128C330.757 612.493 330.885 613.539 331.141 614.264C331.397 614.947 331.867 615.437 332.549 615.736C333.275 615.992 334.341 616.12 335.749 616.12H336.133ZM378.754 587C380.205 587 381.826 586.957 383.618 586.872C383.618 588.067 383.533 589.005 383.362 589.688C382.296 589.859 381.314 590.285 380.418 590.968C379.522 591.608 378.69 592.675 377.922 594.168L370.306 609.08V610.424C370.306 612.131 370.392 613.347 370.562 614.072C370.776 614.797 371.181 615.309 371.778 615.608C372.376 615.907 373.357 616.12 374.722 616.248C374.978 617.187 375.106 618.147 375.106 619.128C371.693 619.043 369.154 619 367.49 619C364.461 619 361.752 619.043 359.362 619.128C359.362 618.019 359.49 617.059 359.746 616.248C361.24 616.12 362.285 615.928 362.882 615.672C363.48 615.416 363.885 614.947 364.098 614.264C364.312 613.539 364.418 612.344 364.418 610.68V609.144L355.266 592.504C354.626 591.48 354.008 590.776 353.41 590.392C352.856 590.008 352.088 589.795 351.106 589.752C350.893 588.984 350.786 588.024 350.786 586.872C353.005 586.957 355.074 587 356.994 587C360.962 587 363.544 586.957 364.738 586.872C364.738 587.939 364.653 588.877 364.482 589.688C363.544 589.773 362.861 589.944 362.434 590.2C362.008 590.456 361.794 590.819 361.794 591.288C361.794 591.843 362.093 592.611 362.69 593.592C364.397 596.451 366.573 600.589 369.218 606.008C370.968 602.168 372.994 598.093 375.298 593.784C375.938 592.632 376.258 591.779 376.258 591.224C376.258 590.755 376.045 590.413 375.618 590.2C375.234 589.987 374.573 589.837 373.634 589.752C373.336 588.685 373.186 587.725 373.186 586.872C374.168 586.957 376.024 587 378.754 587ZM432.672 577.848C432.672 579.555 432.821 582.2 433.12 585.784C432.224 586.211 431.157 586.403 429.92 586.36C429.834 583.8 429.216 581.859 428.064 580.536C426.912 579.213 425.12 578.552 422.688 578.552H419.296V610.872C419.296 612.365 419.424 613.496 419.68 614.264C419.936 614.989 420.405 615.523 421.088 615.864C421.813 616.163 422.88 616.355 424.288 616.44C424.501 617.037 424.608 617.955 424.608 619.192C421.877 619.064 419.082 619 416.224 619C413.024 619 410.229 619.064 407.84 619.192C407.84 617.955 407.946 617.037 408.16 616.44C409.568 616.355 410.634 616.163 411.36 615.864C412.085 615.523 412.576 614.968 412.832 614.2C413.13 613.432 413.28 612.323 413.28 610.872V578.552H410.016C408.053 578.552 406.538 578.872 405.472 579.512C404.405 580.109 403.637 580.941 403.168 582.008C402.741 583.032 402.357 584.483 402.016 586.36C400.608 586.36 399.584 586.168 398.944 585.784C399.626 581.944 399.968 578.531 399.968 575.544C402.357 575.672 407.797 575.736 416.288 575.736C424.906 575.736 430.389 575.672 432.736 575.544L432.672 577.848ZM455.675 619.576C452.006 619.576 448.763 618.893 445.947 617.528C443.131 616.163 440.934 614.243 439.355 611.768C437.819 609.293 437.051 606.413 437.051 603.128C437.051 599.885 437.819 597.005 439.355 594.488C440.934 591.971 443.131 590.029 445.947 588.664C448.806 587.256 452.091 586.552 455.803 586.552C459.473 586.552 462.715 587.235 465.531 588.6C468.347 589.965 470.523 591.907 472.059 594.424C473.638 596.899 474.427 599.757 474.427 603C474.427 606.285 473.638 609.187 472.059 611.704C470.523 614.179 468.326 616.12 465.467 617.528C462.651 618.893 459.387 619.576 455.675 619.576ZM456.571 616.632C460.027 616.632 462.758 615.48 464.763 613.176C466.811 610.872 467.835 607.8 467.835 603.96C467.835 601.187 467.281 598.712 466.171 596.536C465.062 594.317 463.505 592.589 461.499 591.352C459.537 590.115 457.318 589.496 454.843 589.496C451.387 589.496 448.657 590.669 446.651 593.016C444.646 595.32 443.643 598.371 443.643 602.168C443.643 605.027 444.198 607.565 445.307 609.784C446.417 611.96 447.953 613.645 449.915 614.84C451.878 616.035 454.097 616.632 456.571 616.632ZM524.172 577.848C524.172 579.555 524.321 582.2 524.62 585.784C523.724 586.211 522.657 586.403 521.42 586.36C521.334 583.8 520.716 581.859 519.564 580.536C518.412 579.213 516.62 578.552 514.188 578.552H510.796V610.872C510.796 612.365 510.924 613.496 511.18 614.264C511.436 614.989 511.905 615.523 512.588 615.864C513.313 616.163 514.38 616.355 515.788 616.44C516.001 617.037 516.108 617.955 516.108 619.192C513.377 619.064 510.582 619 507.724 619C504.524 619 501.729 619.064 499.34 619.192C499.34 617.955 499.446 617.037 499.66 616.44C501.068 616.355 502.134 616.163 502.86 615.864C503.585 615.523 504.076 614.968 504.332 614.2C504.63 613.432 504.78 612.323 504.78 610.872V578.552H501.516C499.553 578.552 498.038 578.872 496.972 579.512C495.905 580.109 495.137 580.941 494.668 582.008C494.241 583.032 493.857 584.483 493.516 586.36C492.108 586.36 491.084 586.168 490.444 585.784C491.126 581.944 491.468 578.531 491.468 575.544C493.857 575.672 499.297 575.736 507.788 575.736C516.406 575.736 521.889 575.672 524.236 575.544L524.172 577.848ZM563.657 611.704C563.657 613.539 563.913 614.776 564.425 615.416C564.98 616.013 566.004 616.355 567.497 616.44C567.711 616.952 567.817 617.848 567.817 619.128C564.916 619.043 562.569 619 560.777 619C558.644 619 556.255 619.043 553.609 619.128C553.609 617.848 553.716 616.952 553.929 616.44C555.423 616.355 556.425 616.013 556.937 615.416C557.492 614.776 557.769 613.539 557.769 611.704V603.896C549.577 603.896 544.052 604.003 541.193 604.216V611.704C541.193 613.539 541.449 614.776 541.961 615.416C542.516 616.013 543.561 616.355 545.097 616.44C545.268 616.995 545.353 617.891 545.353 619.128C542.452 619.043 540.105 619 538.313 619C536.18 619 533.791 619.043 531.145 619.128C531.145 617.848 531.252 616.952 531.465 616.44C532.532 616.355 533.321 616.184 533.833 615.928C534.388 615.672 534.772 615.224 534.985 614.584C535.199 613.944 535.305 612.984 535.305 611.704V594.232C535.305 592.995 535.199 592.056 534.985 591.416C534.772 590.776 534.388 590.328 533.833 590.072C533.321 589.816 532.532 589.645 531.465 589.56C531.252 588.963 531.145 588.067 531.145 586.872C533.876 586.957 536.265 587 538.313 587C540.02 587 542.367 586.957 545.353 586.872C545.353 588.109 545.268 589.005 545.097 589.56C543.561 589.645 542.516 589.987 541.961 590.584C541.449 591.181 541.193 592.397 541.193 594.232V601.08H557.769V594.232C557.769 592.995 557.641 592.056 557.385 591.416C557.172 590.776 556.788 590.328 556.233 590.072C555.721 589.816 554.932 589.645 553.865 589.56C553.695 588.92 553.609 588.024 553.609 586.872C556.34 586.957 558.708 587 560.713 587C562.463 587 564.831 586.957 567.817 586.872C567.817 587.981 567.711 588.877 567.497 589.56C565.961 589.645 564.937 589.987 564.425 590.584C563.913 591.181 563.657 592.397 563.657 594.232V611.704ZM610.16 616.248C610.374 616.888 610.48 617.848 610.48 619.128C608.774 619.043 606.576 619 603.888 619C601.072 619 598.811 619.043 597.104 619.128C597.104 617.805 597.232 616.845 597.488 616.248C598.47 616.12 599.152 615.949 599.536 615.736C599.963 615.48 600.176 615.117 600.176 614.648C600.176 614.264 599.963 613.603 599.536 612.664L598.256 609.912C592.112 609.912 587.27 610.019 583.728 610.232L583.024 611.896C582.598 612.877 582.384 613.645 582.384 614.2C582.384 615.395 583.259 616.077 585.008 616.248C585.264 617.016 585.392 617.976 585.392 619.128C583.771 619.043 582 619 580.08 619C578.416 619 576.902 619.043 575.536 619.128C575.536 618.104 575.664 617.144 575.92 616.248C576.859 616.077 577.584 615.693 578.096 615.096C578.608 614.456 579.291 613.197 580.144 611.32L591.152 586.936C591.963 586.765 592.816 586.68 593.712 586.68L605.488 611.128C606.427 613.091 607.216 614.413 607.856 615.096C608.539 615.779 609.307 616.163 610.16 616.248ZM596.976 607.288L593.136 599.224C592.027 596.963 591.259 595.171 590.832 593.848C590.491 594.915 590.064 595.981 589.552 597.048C589.083 598.072 588.784 598.712 588.656 598.968L585.008 607.288H596.976ZM618.208 619.128C618.208 617.805 618.314 616.845 618.528 616.248C619.594 616.163 620.384 615.992 620.896 615.736C621.45 615.48 621.834 615.032 622.048 614.392C622.261 613.752 622.368 612.792 622.368 611.512V594.424C622.368 593.187 622.261 592.248 622.048 591.608C621.834 590.968 621.45 590.52 620.896 590.264C620.384 590.008 619.594 589.837 618.528 589.752C618.314 589.112 618.208 588.152 618.208 586.872C620.938 586.957 623.328 587 625.376 587C627.082 587 629.429 586.957 632.416 586.872C632.416 588.195 632.33 589.155 632.16 589.752C630.624 589.837 629.578 590.179 629.024 590.776C628.512 591.373 628.256 592.589 628.256 594.424V611.512C628.256 613.347 628.512 614.584 629.024 615.224C629.578 615.821 630.624 616.163 632.16 616.248C632.33 616.888 632.416 617.848 632.416 619.128C629.514 619.043 627.168 619 625.376 619C623.242 619 620.853 619.043 618.208 619.128Z" fill="#E57857"/>
                    </svg>
                    <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
                    <?php
                }
                ?>
            </a>
            
            <!-- меню для мобильных -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Навигация -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav ms-auto mb-2 mb-lg-0',
                    'fallback_cb'    => 'wp_page_menu',
                    'depth'          => 2,
                    'link_before'    => '<span class="nav-link">',
                    'link_after'     => '</span>',
                    'items_wrap'     => '<ul id="%1$s" class="%2$s"><li class="nav-item">%3$s</li></ul>',
                ) );
                ?>
                
                <!-- Телефон -->
                <div class="header-phone ms-lg-4">
                    <i class="fas fa-phone-alt me-2"></i>
                    <a href="tel:<?php echo esc_attr( get_theme_mod( 'flytothai_phone', '+79998887766' ) ); ?>" 
                       class="text-white text-decoration-none">
                        <?php echo esc_html( get_theme_mod( 'flytothai_phone', '+7 (999) 888-77-66' ) ); ?>
                    </a>
                </div>
            </div>
        </div>
    </nav>

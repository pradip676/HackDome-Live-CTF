<?php
/* Template Name: Payment Failed */
get_header();
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<!-- PAYMENT FAILED TERMINAL WINDOW -->
<div class="terminal-container">
    <div class="terminal-header" style="background-color: #dc3545;">
        <span class="terminal-title">Payment Failed</span>
    </div>
    <div class="terminal-body">
        <div class="logo-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
        </div>

        <p class="terminal-text error"><i class="fa fa-times-circle"></i> ⚠️ Oops! Your payment could not be processed.</p>
        <p class="terminal-text">[+] Please try again or contact support if the issue persists.</p>

        <div class="main-button-login">
            <a href="<?php echo home_url('/payment'); ?>" style="color: #fff; text-decoration: none;">💳 Retry Payment</a>
        </div>
        <br>
        <div class="main-button-login" style="background-color: #333;">
            <a href="<?php echo home_url('/contact'); ?>" style="color: #fff; text-decoration: none;">📧 Contact Support</a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

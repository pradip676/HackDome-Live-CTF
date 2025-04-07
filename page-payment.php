<?php
/* Template Name: Payment */
get_header();

// Determine the user's email (either from logged in user or GET param)
$email = '';
if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $email = $current_user->user_email;
} elseif (isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
}

// Create dynamic success URL
$success_url = home_url('/payment-success');
if (!empty($email)) {
    $success_url .= '?email=' . urlencode($email);
}
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<!-- PAYMENT TERMINAL WINDOW -->
<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome Payment Portal</span>
    </div>
    <div class="terminal-body">

        <?php if (!empty($email)) : ?>
            <div class="logo-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
            </div>

            <p class="terminal-text">[+] Please complete your payment to activate your HackDome access.</p>

            <!-- ✅ Stripe Payment Integration -->
            <div class="payment-section">
                <?php 
                echo do_shortcode('[accept_stripe_payment 
                    name="HackDome Membership" 
                    price="9.99" 
                    currency="USD" 
                    description="Monthly HackDome Subscription" 
                    button_text="Complete Payment" 
                    success_url="' . esc_url($success_url) . '" 
                    cancel_url="' . home_url('/payment-failed') . '"
                    class="custom-stripe-button"]'); 
                ?> 
            </div>
        <?php else : ?>
            <p class="terminal-text error">
                <i class="fa fa-times-circle"></i> Unable to process payment. Email not found.
                <a href="<?php echo home_url('/register'); ?>">Go back to Sign Up</a>.
            </p>
        <?php endif; ?>

    </div>
</div>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

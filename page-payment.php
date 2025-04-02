<?php
/* Template Name: Payment */
get_header();
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<!-- PAYMENT TERMINAL WINDOW -->
<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome Payment Portal</span>
    </div>
    <div class="terminal-body">

        <?php if (is_user_logged_in()) : ?>
            <div class="logo-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
            </div>

            <p class="terminal-text">[+] Please complete your payment to activate your HackDome access.</p>

            <!-- Stripe Payment Integration -->
            <div class="payment-section">
                <?php 
                echo do_shortcode('[accept_stripe_payment 
                    name="HackDome Membership" 
                    price="9.99" 
                    currency="USD" 
                    description="Monthly HackDome Subscription" 
                    button_text="Complete Payment" 
                    success_url="' . home_url('/payment?payment=success') . '" 
                    cancel_url="' . home_url('/payment?payment=cancel') . '"
                    class="custom-stripe-button"]'); 
                ?>
            </div>

        <?php else : ?>
            <p class="terminal-text error">
                <i class="fa fa-times-circle"></i> You must be logged in to complete payment. <a href="<?php echo wp_login_url(home_url('/payment')); ?>">Log in here</a>.
            </p>
        <?php endif; ?>

    </div>
</div>

<!-- Success & Failure Notifications -->
<?php if (isset($_GET['payment']) && $_GET['payment'] == 'success') : ?>
    <div class="payment-success">
        <p class="terminal-text success"><i class="fa fa-check-circle"></i> Payment completed successfully! Redirecting to leaderboard...</p>
        <script>
            setTimeout(function () {
                window.location.href = "<?php echo home_url('/leaderboard'); ?>"; // ✅ Redirect to leaderboard after payment
            }, 3000);
        </script>
    </div>
<?php elseif (isset($_GET['payment']) && $_GET['payment'] == 'cancel') : ?>
    <div class="payment-error">
        <p class="terminal-text error"><i class="fa fa-times-circle"></i> Payment was cancelled. Please try again or <a href="<?php echo home_url('/'); ?>">return home</a>.</p>
    </div>
<?php endif; ?>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

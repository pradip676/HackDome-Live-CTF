<?php
/* Template Name: Payment Success */
get_header();

// STEP 1: Auto-login based on email
if (isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
    $user = get_user_by('email', $email);

    if ($user) {
        // Log in the user
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true, false); // Persistent login

        // ✅ Redirect to same page without query params to refresh session
        wp_safe_redirect(home_url('/payment-success'));
        exit;
    } else {
        $error = "❌ Unable to log you in. Please log in manually.";
    }
}

// STEP 2: Check if user is now logged in
$is_logged_in = is_user_logged_in();
?>

<canvas id="matrixRain"></canvas>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">Payment Successful</span>
    </div>
    <div class="terminal-body">
        <div class="logo-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
        </div>

        <?php if (!empty($error)): ?>
            <p class="terminal-text error"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if ($is_logged_in): ?>
            <p class="terminal-text success"><i class="fa fa-check-circle"></i> 🎉 Your payment has been successfully processed!</p>
            <p class="terminal-text">[+] Welcome to HackDome. You now have full access to challenges and features.</p>
            <div class="main-button-login">
                <a href="<?php echo home_url('/challenges'); ?>" style="color: #fff;">🚀 Go to Challenges</a>
            </div>
            <br>
            <div class="main-button-login" style="background-color: #333;">
                <a href="<?php echo home_url('/profile'); ?>" style="color: #fff;">👤 View Profile</a>
            </div>
        <?php else: ?>
            <p class="terminal-text error">⚠️ Unable to detect login. Please <a href="<?php echo wp_login_url(home_url('/payment-success')); ?>">log in manually</a>.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

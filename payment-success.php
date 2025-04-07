<?php
/* Template Name: Payment Success */

// ✅ Prevent premature output so cookies can be set
ob_start();
session_start();

$logged_in_successfully = false;

if (isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
    $user = get_user_by('email', $email);

    if ($user) {
        // ✅ Clear any old auth session and login the user
        wp_clear_auth_cookie();
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);

        // ✅ Session fallback
        $_SESSION['logged_in'] = true;

        $logged_in_successfully = true;

        // ✅ One-time redirect to clean URL (and refresh cookie)
        wp_redirect(home_url('/payment-success'));
        exit;
    }
}
?>

<?php get_header(); ?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<!-- PAYMENT SUCCESS TERMINAL WINDOW -->
<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">Payment Successful</span>
    </div>
    <div class="terminal-body">
        <div class="logo-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
        </div>

        <?php if ($logged_in_successfully || is_user_logged_in() || (isset($_SESSION['logged_in']) && $_SESSION['logged_in'])) : ?>
            <p class="terminal-text success"><i class="fa fa-check-circle"></i> 🎉 Your payment has been successfully processed!</p>
            <p class="terminal-text">[+] Welcome to HackDome. You now have full access to challenges and features.</p>

            <div class="main-button-login">
                <a href="<?php echo home_url('/challenges'); ?>" style="color: #fff; text-decoration: none;">🚀 Go to Challenges</a>
            </div>
            <br>
            <div class="main-button-login" style="background-color: #333;">
                <a href="<?php echo home_url('/profile'); ?>" style="color: #fff; text-decoration: none;">👤 View Profile</a>
            </div>
        <?php else : ?>
            <p class="terminal-text error"><i class="fa fa-times-circle"></i> Unable to log you in after payment.</p>
            <p class="terminal-text">Please <a href="<?php echo home_url('/login'); ?>" style="color: #ff4c9b;">log in manually</a>.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<!-- Debugging -->
<script>
    console.log("User logged in (via PHP): <?php echo is_user_logged_in() ? 'true' : 'false'; ?>");
</script>

<?php get_footer(); ?>

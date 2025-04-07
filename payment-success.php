<?php
/* Template Name: Payment Success */

// WordPress way to start session-like behavior
if (!session_id()) {
    session_start();
}

get_header();

$email = isset($_GET['email']) ? sanitize_email(trim($_GET['email'])) : '';
$logged_in = is_user_logged_in();

if (!$logged_in && !empty($email)) {
    sleep(1); // Delay for DB consistency if needed
    $user = get_user_by('email', $email);

    if ($user) {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        $_SESSION['logged_in'] = true;

        // Force redirect to refresh auth cookie
        if (!isset($_SESSION['login_redirected'])) {
            $_SESSION['login_redirected'] = true;
            wp_redirect(home_url('/payment-success'));
            exit;
        }
    } else {
        echo '<div style="color: red; text-align: center; font-family: monospace;">❌ Unable to log you in after payment.<br><br>Please log in manually.</div>';
    }
}
?>

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

        <p class="terminal-text success"><i class="fa fa-check-circle"></i> 🎉 Your payment has been successfully processed!</p>
        <p class="terminal-text">[+] Welcome to HackDome. You now have full access to challenges and features.</p>

        <div class="main-button-login">
            <a href="<?php echo home_url('/challenges'); ?>" style="color: #fff; text-decoration: none;">🚀 Go to Challenges</a>
        </div>
        <br>
        <div class="main-button-login" style="background-color: #333;">
            <a href="<?php echo home_url('/profile'); ?>" style="color: #fff; text-decoration: none;">👤 View Profile</a>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

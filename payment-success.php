<?php
/* Template Name: Payment Success */
ob_start();
session_start();

get_header();

$show_form = false;
$login_error = false;

if (isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
    $user = get_user_by('email', $email);

    if ($user) {
        // Save ID to session to try login via POST
        $_SESSION['auto_login_id'] = $user->ID;
        $show_form = true;
    } else {
        $login_error = true;
    }
}

// Handle POST auto-login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['auto_login_id'])) {
    $user_id = $_SESSION['auto_login_id'];
    wp_clear_auth_cookie();
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    unset($_SESSION['auto_login_id']);

    // Redirect to refresh cookie
    wp_redirect(home_url('/payment-success'));
    exit;
}
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">Payment Successful</span>
    </div>
    <div class="terminal-body">
        <div class="logo-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
        </div>

        <?php if (is_user_logged_in()) : ?>
            <p class="terminal-text success"><i class="fa fa-check-circle"></i> 🎉 Your payment has been successfully processed!</p>
            <p class="terminal-text">[+] Welcome to HackDome. You now have full access to challenges and features.</p>

            <div class="main-button-login">
                <a href="<?php echo home_url('/challenges'); ?>" style="color: #fff; text-decoration: none;">🚀 Go to Challenges</a>
            </div>
            <br>
            <div class="main-button-login" style="background-color: #333;">
                <a href="<?php echo home_url('/profile'); ?>" style="color: #fff; text-decoration: none;">👤 View Profile</a>
            </div>
        <?php elseif ($show_form) : ?>
            <form method="post">
                <p class="terminal-text">One moment... finalizing your login.</p>
                <button type="submit" class="main-button-login">Finish Login</button>
            </form>
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

<?php get_footer(); ?>

<?php
/* Template Name: Payment Success */
session_start();

echo '<div style="color: yellow; background: black; padding: 10px; font-family: monospace;">';

if (isset($_GET['email'])) {
    $email = sanitize_email($_GET['email']);
    echo "✅ Email param received: $email<br>";

    $user = get_user_by('email', $email);
    if ($user) {
        echo "✅ User found: {$user->user_login}<br>";

        wp_clear_auth_cookie();
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID, true);

        $_SESSION['logged_in'] = true;

        echo "✅ Auth cookie set. Session logged_in = true<br>";
    } else {
        echo "❌ No user found with email: $email<br>";
    }
} else {
    echo "❌ No email param in URL<br>";
}

echo 'WordPress is_user_logged_in(): ';
echo is_user_logged_in() ? '✅ YES' : '❌ NO';
echo "<br>";

if (isset($_SESSION['logged_in'])) {
    echo "Session logged_in flag: " . ($_SESSION['logged_in'] ? '✅ TRUE' : '❌ FALSE');
} else {
    echo "Session logged_in flag: ❌ NOT SET";
}

echo '</div>';

get_header();
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

<?php
/* Template Name: Setup 2FA */
get_header();

if (!is_user_logged_in()) {
    wp_redirect(wp_login_url());
    exit;
}

$current_user = wp_get_current_user();
$has_2fa = get_user_meta($current_user->ID, 'mo2f_2FA_status', true);
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome - Setup 2FA</span>
    </div>

    <div class="terminal-body">
        <?php if ($has_2fa === 'enabled') : ?>
            <p class="terminal-text success">✅ 2FA is already enabled for your account.</p>
            <p><a href="<?php echo esc_url(home_url('/')); ?>">Go to Dashboard</a></p>
        <?php else : ?>
            <p class="terminal-text">[+] Set up 2FA by scanning the QR code below using Google Authenticator or any TOTP app.</p>

            <?php
            // ✅ MINI ORANGE QR CODE GENERATOR
            if (function_exists('mo2f_generate_qr_code')) {
                $qr_code = mo2f_generate_qr_code($current_user->ID);
                if ($qr_code) {
                    echo '<div class="qr-code-container">';
                    echo '<img src="' . esc_url($qr_code) . '" alt="2FA QR Code" />';
                    echo '</div>';
                } else {
                    echo '<p class="terminal-text error">⚠️ Unable to generate QR code. Please try again or contact support.</p>';
                }
            } else {
                echo '<p class="terminal-text error">⚠️ MiniOrange 2FA plugin is not properly configured.</p>';
            }
            ?>

            <form method="post" class="mfa-form">
                <p class="terminal-text">[+] Enter the 6-digit code from your Authenticator App:</p>
                <input type="text" name="mfa_code" placeholder="Enter 6-digit code" required />
                <button type="submit" class="main-button-login">Verify & Enable 2FA</button>
            </form>

            <?php
            // ✅ Handle Code Verification
            if (isset($_POST['mfa_code'])) {
                $mfa_code = sanitize_text_field($_POST['mfa_code']);
                if (function_exists('mo2f_verify_otp')) {
                    $result = mo2f_verify_otp($current_user->ID, $mfa_code);

                    if ($result['status'] === 'success') {
                        update_user_meta($current_user->ID, 'mo2f_2FA_status', 'enabled');
                        echo '<p class="terminal-text success">🎉 2FA setup complete! Redirecting...</p>';
                        echo '<script>setTimeout(function(){ window.location.href="' . home_url('/index') . '"; }, 2000);</script>';
                    } else {
                        echo '<p class="terminal-text error">❌ Invalid 2FA code. Please try again.</p>';
                    }
                } else {
                    echo '<p class="terminal-text error">⚠️ 2FA verification failed. Please contact support.</p>';
                }
            }
            ?>
        <?php endif; ?>
    </div>
</div>

<!-- Styles -->
<style>
    .qr-code-container {
        text-align: center;
        margin: 20px 0;
    }
    .qr-code-container img {
        width: 200px;
        height: 200px;
        border: 4px solid #ec6090;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(236, 96, 144, 0.5);
    }
</style>

<!-- Scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/matrix-rain.js"></script>

<?php get_footer(); ?>

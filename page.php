<?php
/* Template Name: Login */
get_header();
?>

<!-- MATRIX RAIN BACKGROUND -->
<canvas id="matrixRain"></canvas>

<!-- LOGIN TERMINAL WINDOW -->
<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome Secure Login</span>
    </div>

    <div class="terminal-body">

        <!-- LOGO -->
        <div class="logo-container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome Logo" class="logo">
        </div>

        <p class="terminal-text">[+] Welcome to HackDome. Please authenticate.</p>

        <?php
        if (is_user_logged_in()) {
            echo '<p class="terminal-text">[+] You are already logged in. <a href="' . esc_url(home_url('/')) . '">Go to Homepage</a></p>';
        } else {
            ?>
            <form method="post" id="custom-login-form">
                <label for="log">Username</label>
                <input type="text" name="log" id="log" placeholder="Enter Username" required>

                <label for="pwd">Password</label>
                <div class="password-container" style="position: relative;">
                    <input type="password" name="pwd" id="pwd" placeholder="Enter Password" required>
                    <span id="togglePassword" class="show-password" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #ec6090;">🙈</span>
                </div>

                <label>
                    <input type="checkbox" name="rememberme" value="forever"> Remember Me
                </label>

                <button type="submit" name="wp-submit" class="main-button-login">Login</button>

                <p class="forgot-password"><a href="<?php echo wp_lostpassword_url(); ?>">Forgot Password?</a></p>
            </form>
            <?php
        }

        // Handle login
        if (isset($_POST['log']) && isset($_POST['pwd'])) {
            $creds = array(
                'user_login'    => sanitize_user($_POST['log']),
                'user_password' => $_POST['pwd'],
                'remember'      => isset($_POST['rememberme'])
            );

            $user = wp_signon($creds, false);

            if (is_wp_error($user)) {
                echo '<p class="terminal-text error">❌ Invalid login. Please try again.</p>';
            } else {
                // Check miniOrange 2FA status
                $has_2fa = get_user_meta($user->ID, 'mo2f_2FA_status', true);

                if ($has_2fa !== 'enabled') {
                    // Directly trigger the miniOrange 2FA setup flow via shortcode
                    echo '<div class="terminal-text">[+] Setup your 2FA:</div>';
                    echo do_shortcode('[mo2f_setup_2fa]'); // This renders the miniOrange 2FA setup
                } else {
                    // Show 2FA Code Prompt on the same page
                    echo '<form method="post" class="mfa-form">';
                    echo '<p class="terminal-text">[+] Enter 2FA Code from Google Authenticator:</p>';
                    echo '<input type="text" name="mfa_code" placeholder="Enter 6-digit code" required />';
                    echo '<button type="submit" class="main-button-login">Verify</button>';
                    echo '</form>';
                }
            }
        }

        // Verify 2FA code using miniOrange
        if (isset($_POST['mfa_code'])) {
            $mfa_code = sanitize_text_field($_POST['mfa_code']);
            $user = wp_get_current_user();

            if (function_exists('mo2f_verify_otp')) {
                $result = mo2f_verify_otp($user->ID, $mfa_code);

                if ($result['status'] === 'success') {
                    echo '<p class="terminal-text success"><i class="fa fa-check-circle"></i> 2FA Verification Successful! Redirecting...</p>';
                    echo '<script>setTimeout(function(){ window.location.href="' . home_url('/') . '"; }, 2000);</script>';
                } else {
                    echo '<p class="terminal-text error">❌ Invalid 2FA Code. Please try again.</p>';
                }
            } else {
                echo '<p class="terminal-text error">❌ 2FA verification failed. Please contact support.</p>';
            }
        }
        ?>

        <?php if (!is_user_logged_in()) : ?>
            <p class="terminal-text">[+] New Here? <a href="<?php echo site_url('/register'); ?>">Create an account</a> or <a href="#subscription-section">Choose a plan</a></p>
        <?php endif; ?>
    </div>
</div>

<!-- SHOW PASSWORD SCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('pwd');

        togglePassword.addEventListener('click', function () {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePassword.innerHTML = "👁️";
            } else {
                passwordField.type = "password";
                togglePassword.innerHTML = "🙈";
            }
        });

        // Prevent empty form submission
        document.getElementById('custom-login-form').addEventListener('submit', function (e) {
            const username = document.getElementById('log').value;
            const password = document.getElementById('pwd').value;
            if (username.trim() === '' || password.trim() === '') {
                e.preventDefault();
                alert('Both Username and Password fields are required!');
            }
        });
    });
</script>

<?php get_footer(); ?>

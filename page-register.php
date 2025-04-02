<?php
/* Template Name: Register */
get_header();
?>

<!-- (💅 Style remains unchanged — skipping here for brevity) -->

<div class="register-container">
    <h2>Sign Up</h2>
    <p class="subtext">Join HackDome and upskill in cybersecurity.</p>

    <?php if (is_user_logged_in()) : ?>
        <p class="error">You are already logged in. <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></p>
    <?php else : ?>
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" required>

            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="example@example.com" required>

            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePasswordVisibility()">
                    <i class="fa fa-eye" id="toggleIcon"></i>
                </span>
            </div>

            <!-- reCAPTCHA placeholder -->
            <div style="margin-top: 20px;">
                <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
            </div>

            <button type="submit" name="submit_registration" class="main-button-login">Sign Up</button>
        </form>

        <?php
        if (isset($_POST['submit_registration'])) {
            $username = sanitize_user($_POST['username']);
            $email    = sanitize_email($_POST['email']);
            $password = $_POST['password'];

            if (username_exists($username) || email_exists($email)) {
                echo '<p class="error"><i class="fa fa-times-circle"></i> Username or Email already exists.</p>';
            } else {
                $user_id = wp_create_user($username, $password, $email);

                if (!is_wp_error($user_id)) {
                    wp_set_current_user($user_id);
                    wp_set_auth_cookie($user_id);
                    wp_redirect(home_url('/payment')); // ✅ Redirect after signup
                    exit;
                } else {
                    echo '<p class="error"><i class="fa fa-exclamation-circle"></i> Error creating account. Please try again.</p>';
                }
            }
        }
        ?>

        <div class="separator">or</div>

        <a href="#" class="google-btn"><i class="fab fa-google"></i> Continue with Google</a>
        <a href="#" class="sso-btn"><i class="fa fa-key"></i> Continue with SSO</a>
    <?php endif; ?>

    <div class="bottom-text">
        By signing up, you agree to our <a href="#">Terms and Conditions</a>. Already have an account? <a href="<?php echo home_url('/login'); ?>">Log in</a>.
    </div>
</div>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
</script>

<?php get_footer(); ?>

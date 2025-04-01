<?php
/* Template Name: Register */
get_header();
?>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome - Create an Account</span>
    </div>

    <div class="terminal-body">
        <?php if (is_user_logged_in()) : ?>
            <p class="terminal-text"><i class="fa fa-user-circle"></i> You are already logged in. <a href="<?php echo wp_logout_url(home_url()); ?>">Logout</a></p>
        <?php else : ?>
            <?php 
            // ✅ Check if payment is completed
            if (!isset($_GET['payment']) || $_GET['payment'] !== 'success') : ?>
                <p class="terminal-text error"><i class="fa fa-exclamation-circle"></i> Please complete the payment first.</p>
                <p><a href="<?php echo home_url('/payment'); ?>" class="main-button-login">Go to Payment</a></p>
            <?php else : ?>
                <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="register-form">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Enter username" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter email" required>

                    <label for="password">Password:</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" placeholder="Create password" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fa fa-eye" id="toggleIcon"></i>
                        </span>
                    </div>

                    <button type="submit" name="submit_registration" class="main-button-login">Create Account</button>
                </form>

                <?php
                // ✅ Handle Registration
                if (isset($_POST['submit_registration'])) {
                    $username = sanitize_user($_POST['username']);
                    $email    = sanitize_email($_POST['email']);
                    $password = $_POST['password'];

                    if (username_exists($username) || email_exists($email)) {
                        echo '<p class="terminal-text error"><i class="fa fa-times-circle"></i> Username or Email already exists.</p>';
                    } else {
                        $user_id = wp_create_user($username, $password, $email);

                        if (!is_wp_error($user_id)) {
                            // ✅ Auto-login the user
                            wp_set_current_user($user_id);
                            wp_set_auth_cookie($user_id);

                            // ✅ Redirect to Profile
                            wp_redirect(home_url('/profile'));
                            exit;
                        } else {
                            echo '<p class="terminal-text error"><i class="fa fa-exclamation-circle"></i> Error creating account. Please try again.</p>';
                        }
                    }
                }
                ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<!-- ✅ Show/Hide Password Toggle -->
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

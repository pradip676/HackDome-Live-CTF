<?php
/* Template Name: Register */
get_header();
?>

<style>
    .register-container {
        max-width: 500px;
        margin: 80px auto;
        background: #1f1f1f;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.2);
        font-family: 'Poppins', sans-serif;
        color: #fff;
    }
    .register-container h2 {
        font-size: 28px;
        margin-bottom: 10px;
        text-align: center;
        color: #fff;
    }
    .register-container p.subtext {
        text-align: center;
        color: #ccc;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .register-container label {
        font-weight: 500;
        margin-top: 15px;
        display: block;
        color: #eee;
    }
    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-top: 8px;
        border: 1px solid #444;
        border-radius: 5px;
        background: #2b2b2b;
        color: #fff;
    }
    .register-container .password-container {
        position: relative;
    }
    .register-container .toggle-password {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #aaa;
    }
    .register-container .error {
        color: #ff4c4c;
        font-weight: 500;
        margin-top: 10px;
    }
    .main-button-login, .google-btn {
        margin-top: 20px;
        width: 100%;
        padding: 12px;
        font-weight: bold;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        display: block;
        text-align: center;
        text-decoration: none;
    }
    .main-button-login {
        background: #ff4c9b;
        border: none;
        color: white;
    }
    .google-btn {
        background: white;
        color: #444;
        border: 1px solid #ccc;
    }
    .register-container .separator {
        text-align: center;
        margin: 20px 0;
        color: #666;
        position: relative;
    }
    .register-container .separator::before,
    .register-container .separator::after {
        content: "";
        height: 1px;
        width: 45%;
        background: #333;
        position: absolute;
        top: 50%;
    }
    .register-container .separator::before {
        left: 0;
    }
    .register-container .separator::after {
        right: 0;
    }
    .register-container .bottom-text {
        text-align: center;
        font-size: 12px;
        margin-top: 20px;
        color: #ccc;
    }
    .register-container .bottom-text a {
        color: #ff4c9b;
        text-decoration: underline;
    }
</style>

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

            <button type="submit" name="submit_registration" class="main-button-login">Sign Up</button>
        </form>

        <?php
        /* Template Name: Register */
        get_header();
        ?>

        <!-- Register Form HTML... -->

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
                    // 🔁 Redirect with email to payment page
                    echo '<script>window.location.href = "' . home_url('/payment') . '?email=' . urlencode($email) . '";</script>';
                    exit;
                } else {
                    echo '<p class="error">Registration failed. Try again.</p>';
                }
            }
        }
        ?>


        <div class="separator">or</div>
        <a href="#" class="google-btn"><i class="fab fa-google"></i> Continue with Google</a>
    <?php endif; ?>

    <div class="bottom-text">
        By signing up, you agree to our <a href="#">Terms and Conditions</a>. Already have an account? <a href="<?php echo home_url('/login'); ?>">Log in</a>.
    </div>
</div>

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

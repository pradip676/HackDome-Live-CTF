<!-- ***** Footer ***** -->
<footer>
    <div class="container">
        <div class="footer-container">
            
            <!-- Dynamic Logo -->
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome">
                </a>
            </div>

            <!-- Footer Links -->
            <div class="footer-links">
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a>
                <a href="<?php echo esc_url(home_url('/terms-of-use')); ?>">Terms of Use</a>
                <a href="<?php echo esc_url(home_url('/support')); ?>">Support</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
                <a href="<?php echo esc_url(home_url('/faq')); ?>">FAQ</a>
                <a href="<?php echo esc_url(home_url('/blog')); ?>">Blog</a>
                <a href="<?php echo esc_url(home_url('/community-guidelines')); ?>">Community Guidelines</a>
            </div>

            <!-- Footer Description -->
            <p class="footer-desc">HackDome is a cybersecurity platform designed for ethical hackers and CTF enthusiasts. Compete in challenges, improve your skills, and climb the leaderboard. Stay sharp. Stay safe.</p>

            <!-- Social Media Links -->
            <div class="footer-social">
                <a href="https://github.com/your-github-username" target="_blank"><i class="fab fa-github"></i></a>
                <a href="https://twitter.com/your-twitter-handle" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://linkedin.com/in/your-linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="mailto:support@hackdome.com"><i class="fas fa-envelope"></i></a>
            </div>

            <!-- Creator Credit -->
            <p class="footer-credits">Created by <a href="https://github.com/bisesdulal16" target="_blank">Bishesh Dulal</a></p>
        </div>

        <!-- Dynamic Year -->
        <p>&copy; <?php echo date('Y'); ?> HackDome. All rights reserved.</p>
    </div>

    <!-- WordPress Footer Hook -->
    <?php wp_footer(); ?>
</footer>

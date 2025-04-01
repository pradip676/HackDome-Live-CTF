<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky <?php echo is_user_logged_in() ? 'logged-in' : 'logged-out'; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">

                    <!-- ***** Logo Start ***** -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="HackDome">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Search Start ***** -->
                    <div class="search-input">
                        <form id="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                            <input type="text" placeholder="Type Something" name="s" id="searchText" />
                            <i class="fa fa-search"></i>
                        </form>
                    </div>
                    <!-- ***** Search End ***** -->

                    <!-- ***** Conditional Navbar Start ***** -->
                    <ul class="nav">
                        <?php if (is_user_logged_in()) : ?>
                            <!-- Navbar for Logged-in Users -->
                            <li><a href="<?php echo esc_url(home_url('/index')); ?>" class="<?php echo is_page('index') ? 'active' : ''; ?>">Home</a></li>
                            <li><a href="<?php echo esc_url(home_url('/challenges')); ?>" class="<?php echo is_page('challenges') ? 'active' : ''; ?>">Challenges</a></li>
                            <li><a href="<?php echo esc_url(home_url('/leaderboard')); ?>" class="<?php echo is_page('leaderboard') ? 'active' : ''; ?>">Leaderboard</a></li>
                            <li><a href="<?php echo esc_url(home_url('/profile')); ?>" class="<?php echo is_page('profile') ? 'active' : ''; ?>">Profile</a></li>
                            <li><a href="<?php echo wp_logout_url(home_url('/')); ?>" class="btn btn-danger">Logout</a></li>

                        <?php elseif (is_front_page()) : ?>
                            <!-- Front Page Navbar for Visitors -->
                            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="active">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="<?php echo esc_url(home_url('/login')); ?>" class="btn btn-outline-light">Log In</a></li>
                            <li><a href="<?php echo esc_url(home_url('/register')); ?>" class="btn btn-primary">Sign Up</a></li>

                        <?php elseif (is_page(['login', 'register', 'payment'])) : ?>
                            <!-- Navbar for Auth Pages -->
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li><a href="<?php echo esc_url(home_url('/login')); ?>" class="<?php echo is_page('login') ? 'active' : ''; ?> btn btn-outline-light">Log In</a></li>
                            <li><a href="<?php echo esc_url(home_url('/register')); ?>" class="<?php echo is_page('register') ? 'active' : ''; ?> btn btn-primary">Sign Up</a></li>

                        <?php else : ?>
                            <!-- Default Navbar for Other Pages -->
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="<?php echo esc_url(home_url('/login')); ?>" class="btn btn-outline-light">Log In</a></li>
                            <li><a href="<?php echo esc_url(home_url('/register')); ?>" class="btn btn-primary">Sign Up</a></li>
                        <?php endif; ?>
                    </ul>
                    <!-- ***** Conditional Navbar End ***** -->

                    <!-- Mobile Menu Trigger -->
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<?php wp_footer(); ?>
</body>
</html>

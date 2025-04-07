<?php
/* Template Name: Profile */
get_header();

// Start session for fallback check
session_start();

// Allow access if logged into WordPress OR manually via session
if (!is_user_logged_in() && (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)) {
    wp_redirect(wp_login_url(home_url('/profile')));
    exit;
}

$current_user = wp_get_current_user();
?>

<div class="page-wrapper" style="padding: 40px 0; background-color: #121212; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Profile Overview Start ***** -->
                    <div class="main-profile">
                        <div class="row">
                            <!-- Profile Picture -->
                            <div class="col-lg-4">
                                <?php $avatar = get_avatar_url($current_user->ID); ?>
                                <img src="<?php echo esc_url($avatar); ?>" alt="Profile Picture" style="border-radius: 23px; width: 100%;">
                            </div>

                            <!-- User Info -->
                            <div class="col-lg-4 align-self-center">
                                <div class="main-info header-text">
                                    <h4><?php echo esc_html($current_user->display_name); ?></h4>
                                    <p>Current Rank: <strong>#5</strong></p>
                                    <p>Total Score: <strong>3420</strong></p>
                                    <p>Badges Earned:</p>
                                    <span class="badge bg-success">Pentester</span>
                                    <span class="badge bg-warning">Forensics</span>
                                    <span class="badge bg-primary">Crypto Master</span>
                                    <div class="main-border-button mt-2">
                                        <a href="<?php echo esc_url(get_edit_user_link()); ?>" class="btn btn-outline-light btn-sm">Edit Profile</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Stats -->
                            <div class="col-lg-4 align-self-center">
                                <div class="profile-section">
                                    <ul>
                                        <li>Challenges Completed <span>12</span></li>
                                        <li>Ongoing Challenges <span>3</span></li>
                                        <li>Team Name <span>RedHackers</span></li>
                                        <li>CTF Points <span>4200</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Profile Overview End ***** -->

                    <!-- ***** Achievements & Progress Start ***** -->
                    <div class="achievements mt-5">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Achievements</em> & Badges</h4>
                            </div>
                            <div class="badge-container mb-3">
                                <span class="badge bg-success"><i class="fa fa-bug"></i> Bug Hunter</span>
                                <span class="badge bg-primary"><i class="fa fa-shield-alt"></i> Security Analyst</span>
                                <span class="badge bg-warning"><i class="fa fa-user-secret"></i> OSINT Expert</span>
                                <span class="badge bg-danger"><i class="fa fa-key"></i> Crypto Master</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 75%;">
                                    Next Achievement: <strong>Advanced Exploiter (75%)</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Achievements & Progress End ***** -->

                    <!-- ***** Recent Activity Start ***** -->
                    <div class="recent-activity mt-5">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Recent</em> Activity</h4>
                            </div>
                            <div class="profile-section">
                                <ul class="activity-list">
                                    <li><i class="fa fa-check-circle text-success"></i> Completed <strong>SQL Injection Challenge</strong></li>
                                    <li><i class="fa fa-trophy text-warning"></i> Earned <strong>Bug Hunter Badge</strong></li>
                                    <li><i class="fa fa-users text-info"></i> Joined <strong>Team RedHackers</strong></li>
                                    <li><i class="fa fa-bolt text-danger"></i> Won a <strong>Live CTF Battle</strong></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Recent Activity End ***** -->

                    <!-- ***** Friends & Team Members Start ***** -->
                    <div class="friends-team mt-5">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Friends &</em> Team Members</h4>
                            </div>
                            <ul class="friends-list">
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar-01.jpg" alt="Avatar"> <span class="friend-name">ShadowRoot</span> <span class="status online">Online</span></li>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar-02.jpg" alt="Avatar"> <span class="friend-name">ByteBuster</span> <span class="status offline">Offline</span></li>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar-03.jpg" alt="Avatar"> <span class="friend-name">CryptoPhantom</span> <span class="status online">Online</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- ***** Friends & Team Members End ***** -->

                    <!-- ***** Upcoming CTFs Start ***** -->
                    <div class="upcoming-ctfs mt-5">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Upcoming</em> CTFs</h4>
                            </div>
                            <div class="profile-section">
                                <ul class="ctf-list">
                                    <li><i class="fa fa-calendar-alt"></i> <strong>HackThePlanet</strong> - March 25, 2024</li>
                                    <li><i class="fa fa-calendar-alt"></i> <strong>Red vs Blue Showdown</strong> - April 5, 2024</li>
                                    <li><i class="fa fa-calendar-alt"></i> <strong>CyberSecurity Global Challenge</strong> - April 20, 2024</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Upcoming CTFs End ***** -->

                    <div class="text-center mt-5">
                        <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn btn-danger">Logout</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

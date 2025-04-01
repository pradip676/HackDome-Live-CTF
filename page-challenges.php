<?php
/* Template Name: Challenges */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Featured CTF Challenges ***** -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="featured-games header-text">
                            <div class="heading-section">
                                <h4><em>Popular</em> Live Boxes</h4>
                            </div>
                            <div class="owl-features owl-carousel">
                                <?php
                                // Dummy data for featured CTFs (replace with dynamic data from DB if needed)
                                $featured_ctfs = [
                                    ['image' => 'redvsblue.webp', 'title' => 'Red Team vs Blue Team', 'desc' => 'Attack & Defend in a real-time simulation.', 'players' => '10/20', 'difficulty' => 'Hard', 'rating' => '4.8/5', 'plays' => '3.5K'],
                                    ['image' => 'accesdenied.webp', 'title' => 'Web Exploitation Showdown', 'desc' => 'Find and exploit vulnerabilities.', 'players' => '8/15', 'difficulty' => 'Medium', 'rating' => '4.6/5', 'plays' => '2.1K'],
                                    ['image' => 'forensics.webp', 'title' => 'Forensics Deep Dive', 'desc' => 'Analyze logs and recover hidden data.', 'players' => '5/10', 'difficulty' => 'Hard', 'rating' => '4.7/5', 'plays' => '1.8K'],
                                ];

                                foreach ($featured_ctfs as $ctf) :
                                ?>
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_html($ctf['image']); ?>" alt="">
                                            <div class="hover-effect">
                                                <h6>Join Box</h6>
                                            </div>
                                        </div>
                                        <h4><?php echo esc_html($ctf['title']); ?><br><span><?php echo esc_html($ctf['desc']); ?></span></h4>
                                        <span class="stats">
                                            <i class="fa fa-users"></i> Players: <?php echo esc_html($ctf['players']); ?> <br>
                                            <i class="fa fa-tachometer-alt"></i> Difficulty: <?php echo esc_html($ctf['difficulty']); ?> <br>
                                            <i class="fa fa-star"></i> <?php echo esc_html($ctf['rating']); ?> <br>
                                            <i class="fa fa-gamepad"></i> <?php echo esc_html($ctf['plays']); ?> Times
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- ***** CTF Leaderboard ***** -->
                    <div class="col-lg-4">
                        <div class="top-streamers">
                            <div class="heading-section">
                                <h4><em>CTF</em> Leaderboard</h4>
                            </div>
                            <ul>
                                <?php
                                // Dummy leaderboard data
                                $leaderboard = [
                                    ['rank' => '01', 'name' => 'BishopX', 'score' => '2250', 'color' => 'gold'],
                                    ['rank' => '02', 'name' => 'ShadowRoot', 'score' => '1980', 'color' => 'silver'],
                                    ['rank' => '03', 'name' => 'CryptoPhantom', 'score' => '1850', 'color' => 'bronze'],
                                ];

                                foreach ($leaderboard as $player) :
                                ?>
                                    <li>
                                        <span><?php echo esc_html($player['rank']); ?></span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar-0<?php echo esc_html($player['rank']); ?>.jpg" alt="" style="max-width: 46px; border-radius: 50%; margin-right: 15px;">
                                        <h6><i class="fa fa-trophy" style="color: <?php echo esc_html($player['color']); ?>;"></i> <?php echo esc_html($player['name']); ?></h6>
                                        <div class="main-button">
                                            <a href="#"><?php echo esc_html($player['score']); ?> Pts</a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="see-more">
                                <a href="<?php echo esc_url(home_url('/leaderboard')); ?>">See More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ***** Ongoing CTFs with Filters ***** -->
                <div class="live-stream">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Ongoing</em> Live CTFs</h4>
                        </div>

                        <!-- CTF Filters -->
                        <div class="ctf-filter">
                            <div class="filter-buttons">
                                <button class="filter-btn active" data-category="all">All</button>
                                <button class="filter-btn" data-category="offensive">Offensive</button>
                                <button class="filter-btn" data-category="defensive">Defensive</button>
                                <button class="filter-btn" data-category="forensics">Forensics</button>
                                <button class="filter-btn" data-category="crypto">Cryptography</button>
                                <button class="filter-btn" data-category="osint">OSINT</button>
                            </div>
                        </div>

                        <!-- CTF Items -->
                        <div class="row">
                            <?php
                            // Dummy ongoing CTFs
                            $ongoing_ctfs = [
                                ['image' => 'stream-08.jpg', 'title' => 'OSINT Recon Hunt', 'category' => 'osint', 'players' => '8/15', 'difficulty' => 'Medium', 'rating' => '4.6/5'],
                                ['image' => 'stream-08.jpg', 'title' => 'Cryptography Decryption War', 'category' => 'crypto', 'players' => '7/14', 'difficulty' => 'Hard', 'rating' => '4.7/5'],
                                ['image' => 'stream-08.jpg', 'title' => 'Forensics Deep Dive', 'category' => 'forensics', 'players' => '5/10', 'difficulty' => 'Medium', 'rating' => '4.5/5'],
                            ];

                            foreach ($ongoing_ctfs as $ctf) :
                            ?>
                                <div class="col-lg-3 col-sm-6 ctf-item" data-category="<?php echo esc_attr($ctf['category']); ?>">
                                    <div class="item">
                                        <div class="thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_html($ctf['image']); ?>" alt="">
                                            <div class="hover-effect">
                                                <div class="content">
                                                    <div class="live"><a href="#">Live</a></div>
                                                    <ul>
                                                        <li><a href="#"><i class="fa-solid fa-right-to-bracket"></i> Join Box </a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <h4><?php echo esc_html($ctf['title']); ?><br><span>Find and exploit vulnerabilities in a live website.</span></h4>
                                        <div class="stats">
                                            <li>
                                                <i class="fa fa-users"></i> Players: <?php echo esc_html($ctf['players']); ?> <br>
                                                <i class="fa fa-tachometer-alt"></i> Difficulty: <?php echo esc_html($ctf['difficulty']); ?> <br>
                                                <i class="fa fa-star"></i> <?php echo esc_html($ctf['rating']); ?>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

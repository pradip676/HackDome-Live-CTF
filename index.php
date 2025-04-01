<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">

        <!-- ***** Banner Start ***** -->
        <div class="main-banner">
          <div class="row">
            <div class="col-lg-7">
              <div class="header-text">
                <h6>Welcome to HackDome</h6>
                <h4>Compete in <em>real-time CTF challenges</em> and climb the ranks</h4>
                <div class="main-button">
                  <a href="<?php echo esc_url(site_url('/challenges')); ?>">Start Hacking</a>
                </div>
              </div>
            </div>
          </div>
        </div><br>
        <!-- ***** Banner End ***** -->

        <!-- ***** Featured Games Start ***** -->
        <div class="row">
          <div class="col-lg-8">
            <div class="featured-games header-text">
              <div class="heading-section">
                <h4><em>Popular</em> Live Boxes</h4>
              </div>
              <div class="owl-features owl-carousel">
                <?php
                // Example: Replace this with a dynamic loop from WordPress custom post types if needed
                $ctf_boxes = [
                  ['image' => 'redvsblue.webp', 'title' => 'Red Team vs Blue Team', 'desc' => 'Attack & Defend in a real-time simulation.', 'players' => '10/20', 'difficulty' => 'Hard', 'rating' => '4.8/5', 'plays' => '3.5K'],
                  ['image' => 'accesdenied.webp', 'title' => 'Web Exploitation Showdown', 'desc' => 'Find and exploit vulnerabilities in a live website.', 'players' => '8/15', 'difficulty' => 'Medium', 'rating' => '4.6/5', 'plays' => '2.1K'],
                  ['image' => 'forensics.webp', 'title' => 'Forensics Deep Dive', 'desc' => 'Analyze logs and recover hidden data from compromised systems.', 'players' => '5/10', 'difficulty' => 'Hard', 'rating' => '4.7/5', 'plays' => '1.8K'],
                  ['image' => 'steg.webp', 'title' => 'Steganography Secrets', 'desc' => 'Uncover hidden messages in files and images.', 'players' => '6/12', 'difficulty' => 'Medium', 'rating' => '4.5/5', 'plays' => '1.1K'],
                  ['image' => 'cipher.png', 'title' => 'Cryptography Decryption War', 'desc' => 'Crack encrypted messages and ciphers in real-time.', 'players' => '10/20', 'difficulty' => 'Hard', 'rating' => '4.9/5', 'plays' => '3.8K'],
                  ['image' => 'footprint.png', 'title' => 'OSINT Recon Hunt', 'desc' => 'Gather intelligence using open-source data.', 'players' => '7/14', 'difficulty' => 'Easy', 'rating' => '4.4/5', 'plays' => '1.2K'],
                ];

                foreach ($ctf_boxes as $box) :
                ?>
                  <div class="item">
                    <div class="thumb">
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($box['image']); ?>" alt="">
                      <div class="hover-effect">
                        <h6>Join Box</h6>
                      </div>
                    </div>
                    <h4><?php echo esc_html($box['title']); ?><br><span><?php echo esc_html($box['desc']); ?></span></h4>
                    <span class="stats">
                      <i class="fa fa-users"></i> Players: <?php echo esc_html($box['players']); ?> <br>
                      <i class="fa fa-tachometer-alt"></i> Difficulty: <?php echo esc_html($box['difficulty']); ?> <br>
                      <i class="fa fa-star"></i> <?php echo esc_html($box['rating']); ?> <br>
                      <i class="fa fa-gamepad"></i> <?php echo esc_html($box['plays']); ?> Times
                    </span>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- ***** Leaderboard Sidebar ***** -->
          <div class="col-lg-4">
            <div class="top-streamers">
              <div class="heading-section">
                <h4><em>CTF</em> Leaderboard</h4>
              </div>
              <ul>
                <?php
                $leaderboard = [
                  ['rank' => '01', 'name' => 'BishopX', 'pts' => '2250', 'icon' => 'trophy', 'color' => 'gold', 'avatar' => 'avatar-01.jpg'],
                  ['rank' => '02', 'name' => 'ShadowRoot', 'pts' => '1980', 'icon' => 'trophy', 'color' => 'silver', 'avatar' => 'avatar-02.jpg'],
                  ['rank' => '03', 'name' => 'CryptoPhantom', 'pts' => '1850', 'icon' => 'trophy', 'color' => 'gold', 'avatar' => 'avatar-03.jpg'],
                  ['rank' => '04', 'name' => 'ByteBuster', 'pts' => '1610', 'icon' => 'code', 'color' => '', 'avatar' => 'avatar-04.jpg'],
                  ['rank' => '05', 'name' => 'N1ghtH4wk', 'pts' => '1520', 'icon' => 'shield-alt', 'color' => '', 'avatar' => 'avatar-01.jpg'],
                ];

                foreach ($leaderboard as $player) :
                ?>
                  <li>
                    <span><?php echo esc_html($player['rank']); ?></span>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($player['avatar']); ?>" alt="" style="max-width: 46px; border-radius: 50%; margin-right: 15px;">
                    <h6><i class="fa fa-<?php echo esc_attr($player['icon']); ?>" style="color: <?php echo esc_attr($player['color']); ?>;"></i> <?php echo esc_html($player['name']); ?></h6>
                    <div class="main-button">
                      <a href="#"><?php echo esc_html($player['pts']); ?> Pts</a>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
              <div class="see-more">
                <a href="<?php echo esc_url(site_url('/leaderboard')); ?>">See More</a>
              </div>
            </div>
          </div>
        </div>
        <!-- ***** Featured Games End ***** -->

        <!-- ***** Top Players Leaderboard Table ***** -->
        <div class="leaderboard">
          <div class="col-lg-12">
            <div class="heading-section">
              <h4><em>Top Players</em> Leaderboard</h4>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Rank</th>
                    <th>Player</th>
                    <th>Score</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>HackerX</td>
                    <td>1500</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>CyberWarrior</td>
                    <td>1400</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- ***** Leaderboard End ***** -->

      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

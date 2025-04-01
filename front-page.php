<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="page-content">

        <!-- ***** Landing Banner ***** -->
        <div class="main-banner">
          <div class="row">
            <div class="col-lg-7">
              <div class="header-text">
                <h6>Welcome to HackDome</h6>
                <h4>Compete in <em>real-time CTF challenges</em> and climb the ranks</h4>
                <div class="main-button">
                  <a href="<?php echo esc_url(site_url('/login')); ?>">Start Hacking</a>
                </div>
              </div>
            </div>
          </div>
        </div><br>

        <!-- ***** About Us ***** -->
        <section id="about" class="about-us">
                    <div class="container">
                        <div class="heading-section text-center">
                            <h4><em>About</em> HackDome</h4>
                        </div>

                        <div class="about-box">
                            <h5><i class="fas fa-shield-alt"></i> What is HackDome?</h5>
                            <p>
                                HackDome is an advanced <strong>cybersecurity training platform</strong> designed for ethical hackers, students, and professionals. 
                                Our <strong>Capture The Flag (CTF) challenges</strong> provide a hands-on environment to test and improve cybersecurity skills in <strong>real-world attack scenarios</strong>.
                            </p>
                        </div>

                        <div class="about-box">
                            <h5><i class="fas fa-question-circle"></i> Why Choose HackDome?</h5>
                            <ul class="about-list">
                                <li><i class="fas fa-terminal"></i> <strong>Real-World CTF Challenges:</strong> Practice ethical hacking in controlled attack simulations.</li>
                                <li><i class="fas fa-layer-group"></i> <strong>Multiple Difficulty Levels:</strong> Challenges from beginner to advanced.</li>
                                <li><i class="fas fa-users"></i> <strong>Global Community:</strong> Compete with cybersecurity experts.</li>
                                <li><i class="fas fa-brain"></i> <strong>Learn While Competing:</strong> Improve penetration testing, cryptography, and OSINT skills.</li>
                            </ul>
                        </div>

                        <div class="about-box">
                            <h5><i class="fas fa-globe"></i> Our Mission</h5>
                            <p>
                                Cyber threats are evolving, and security professionals must stay ahead. Our goal is to bridge the gap between theory and practice, offering real-world hacking simulations that train the next generation of cybersecurity experts.
                            </p>
                        </div>

                        <div class="about-box">
                            <h5><i class="fas fa-trophy"></i> Climb the Leaderboards</h5>
                            <p>
                                HackDome features an interactive ranking system where you can compete, earn points, and showcase your skills on our global leaderboard.
                            </p>
                        </div>

                        <div class="text-center">
                            <a href="challenges.html" class="btn btn-primary"><i class="fas fa-play"></i> Start Your Challenge</a>
                        </div>
                    </div>
                </section>

        <!-- ***** What is CTF ***** -->
        <section id="ctf-info" class="what-is-ctf">
          <div class="container">
            <div class="heading-section text-center">
              <h4>What is <em>CTF?</em></h4>
            </div>
            <p>Capture The Flag (CTF) is a cybersecurity competition where participants find and exploit vulnerabilities to capture "flags" (hidden text).</p>
            <div class="row text-center">
              <div class="col-md-4">
                <i class="fa fa-tools fa-3x"></i>
                <h5>Hands-on Learning</h5>
                <p>Practice ethical hacking in real-world attack simulations.</p>
              </div>
              <div class="col-md-4">
                <i class="fa fa-bolt fa-3x"></i>
                <h5>Fast-Paced Challenges</h5>
                <p>Compete in live battles against other hackers worldwide.</p>
              </div>
              <div class="col-md-4">
                <i class="fa fa-trophy fa-3x"></i>
                <h5>Earn Your Rank</h5>
                <p>Complete challenges, earn points, and climb the leaderboard.</p>
              </div>
            </div>
          </div>
        </section>

        <!-- ***** Subscription Plans ***** -->
        <section id="subscription-home" class="subscription-home">
          <div class="container">
            <div class="heading-section text-center">
              <h4><em>Choose</em> Your Plan</h4>
            </div>
            <div class="row text-center">
              <div class="col-md-4">
                <div class="subscription-option-home">
                  <h3>Basic Plan</h3>
                  <p class="price">$9.99 / month</p>
                  <ul>
                    <li><i class="fa fa-check"></i> Access to Live CTFs</li>
                    <li><i class="fa fa-check"></i> Basic Challenge Library</li>
                    <li><i class="fa fa-check"></i> Community Support</li>
                  </ul>
                  <a href="<?php echo esc_url(site_url('/register')); ?>" class="btn btn-primary">Subscribe</a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="subscription-option-home coming-soon">
                  <h3>Pro Plan (Coming Soon)</h3>
                  <p class="price">$19.99 / month</p>
                  <ul>
                    <li><i class="fa fa-check"></i> Advanced CTF Challenges</li>
                    <li><i class="fa fa-check"></i> Priority Support</li>
                    <li><i class="fa fa-check"></i> Exclusive Webinars</li>
                  </ul>
                  <button class="btn btn-secondary" disabled>Coming Soon</button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- ***** Contact Us ***** -->
        <section id="contact" class="contact-us">
          <div class="container">
            <div class="heading-section text-center">
              <h4><em>Contact</em> Us</h4>
           </div>
            <p class="text-center">If you have any queries, feel free to contact us!</p>

             <!-- WPForms Shortcode -->
            <?php echo do_shortcode('[wpforms id="97" title="false"]'); ?> 

          </div>
        </section>


      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>

<?php
/* Template Name: Leaderboard */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Leaderboard Filters ***** -->
                <div class="leaderboard-filters">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="time-range">Time Range:</label>
                            <select id="time-range" class="form-control">
                                <option value="all-time">All Time</option>
                                <option value="monthly">This Month</option>
                                <option value="weekly">This Week</option>
                                <option value="daily">Today</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="role-filter">Role:</label>
                            <select id="role-filter" class="form-control">
                                <option value="all">All</option>
                                <option value="offensive">Offensive</option>
                                <option value="defensive">Defensive</option>
                                <option value="forensics">Forensics</option>
                                <option value="osint">OSINT</option>
                                <option value="crypto">Cryptography</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- ***** Leaderboard Start ***** -->
                <div class="leaderboard">
                    <div class="col-lg-12">
                        <div class="heading-section">
                            <h4><em>Top</em> Players Leaderboard</h4>
                        </div>

                        <!-- First Rank Special Display -->
                        <div class="first-rank" data-role="offensive">
                            <h2>🥇 HackerX</h2>
                            <p>Score: <strong>2500</strong></p>
                            <p><span class="badge gold">Elite Hacker</span></p>
                        </div>

                        <!-- Second & Third Ranks Display -->
                        <div class="second-third-rank">
                            <div class="second-rank" data-role="defensive">
                                <h3>🥈 CyberWarrior</h3>
                                <p>Score: <strong>2300</strong></p>
                                <p><span class="badge silver">Master Exploiter</span></p>
                            </div>
                            <div class="third-rank" data-role="crypto">
                                <h3>🥉 ShadowRoot</h3>
                                <p>Score: <strong>2100</strong></p>
                                <p><span class="badge bronze">Code Breaker</span></p>
                            </div>
                        </div>

                        <!-- Standard Table for Remaining Ranks -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Player</th>
                                        <th>Score</th>
                                        <th>Badge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-role="forensics"><td>4</td><td>ByteBuster</td><td>1950</td><td><span class="badge">Security Analyst</span></td></tr>
                                    <tr data-role="crypto"><td>5</td><td>ExploitSeeker</td><td>1850</td><td><span class="badge">Crypto Master</span></td></tr>
                                    <tr data-role="osint"><td>6</td><td>PacketHunter</td><td>1750</td><td><span class="badge">OSINT Specialist</span></td></tr>
                                    <tr data-role="offensive"><td>7</td><td>ZeroDayFinder</td><td>1700</td><td><span class="badge">Bug Bounty Hunter</span></td></tr>
                                    <tr data-role="defensive"><td>8</td><td>FirewallPhantom</td><td>1650</td><td><span class="badge">Network Guardian</span></td></tr>
                                    <tr data-role="crypto"><td>9</td><td>CryptoCracker</td><td>1600</td><td><span class="badge">Encryption Expert</span></td></tr>
                                    <tr data-role="forensics"><td>10</td><td>DeepPwner</td><td>1550</td><td><span class="badge">Penetration Tester</span></td></tr>
                                    
                                    <?php
                                    // Dynamically generate players from 11 to 50
                                    for ($i = 11; $i <= 50; $i++) {
                                        $roles = ['offensive', 'defensive', 'forensics', 'osint', 'crypto'];
                                        $randomRole = $roles[array_rand($roles)];
                                        $playerName = "Player" . $i;
                                        $score = 1500 - ($i * 20);
                                        echo "<tr data-role='{$randomRole}'><td>{$i}</td><td>{$playerName}</td><td>{$score}</td><td><span class='badge bg-info'>Cyber Warrior</span></td></tr>";
                                    }
                                    ?>
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

<script>
    jQuery(document).ready(function ($) {
        // Filter leaderboard based on time range and role
        function filterLeaderboard() {
            var selectedRole = $('#role-filter').val();

            $('.leaderboard tbody tr, .first-rank, .second-rank, .third-rank').each(function () {
                var playerRole = $(this).data('role');
                if (selectedRole === 'all' || playerRole === selectedRole) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        // Event listeners for filters
        $('#time-range, #role-filter').change(function () {
            filterLeaderboard();
        });

        // Initial filter on page load
        filterLeaderboard();
    });
</script>

<?php get_footer(); ?>

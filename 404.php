<?php get_header(); ?>

<div class="container text-center" style="padding: 100px 0;">
    <div class="error-404">
        <h1 class="glitch-text" data-text="404">404</h1>
        <h2 class="sub-heading">Oops! Page Not Found</h2>
        <p class="error-message">The page you're looking for might have been removed, had its name changed, or is temporarily unavailable.</p>

        <div class="error-buttons">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><i class="fas fa-home"></i> Back to Home</a>
            <a href="<?php echo esc_url(home_url('/challenges')); ?>" class="btn btn-warning"><i class="fas fa-flag"></i> View Challenges</a>
            <a href="<?php echo esc_url(home_url('/leaderboard')); ?>" class="btn btn-info"><i class="fas fa-trophy"></i> View Leaderboard</a>
        </div>

        <div class="matrix-background">
            <canvas id="matrixRain"></canvas>
        </div>
    </div>
</div>

<style>
    /* 404 Page Custom Styles */
    .error-404 {
        position: relative;
        z-index: 2;
        color: #fff;
    }

    .glitch-text {
        font-size: 120px;
        font-weight: 900;
        color: #ff004f;
        position: relative;
        display: inline-block;
        animation: glitch 1.5s infinite;
    }

    .glitch-text::before,
    .glitch-text::after {
        content: attr(data-text);
        position: absolute;
        left: 0;
    }

    .glitch-text::before {
        animation: glitchTop 1.5s infinite;
        color: #00ffea;
        z-index: -1;
    }

    .glitch-text::after {
        animation: glitchBottom 1.5s infinite;
        color: #ff00c8;
        z-index: -2;
    }

    @keyframes glitch {
        0% { transform: none; }
        20% { transform: translate(-2px, 2px); }
        40% { transform: translate(-2px, -2px); }
        60% { transform: translate(2px, 2px); }
        80% { transform: translate(2px, -2px); }
        100% { transform: none; }
    }

    @keyframes glitchTop {
        0% { clip: rect(0, 9999px, 0, 0); }
        20% { clip: rect(10px, 9999px, 20px, 0); }
        40% { clip: rect(0, 9999px, 0, 0); }
        60% { clip: rect(5px, 9999px, 15px, 0); }
        80% { clip: rect(0, 9999px, 0, 0); }
        100% { clip: rect(10px, 9999px, 20px, 0); }
    }

    @keyframes glitchBottom {
        0% { clip: rect(0, 9999px, 0, 0); }
        20% { clip: rect(15px, 9999px, 25px, 0); }
        40% { clip: rect(0, 9999px, 0, 0); }
        60% { clip: rect(20px, 9999px, 30px, 0); }
        80% { clip: rect(0, 9999px, 0, 0); }
        100% { clip: rect(15px, 9999px, 25px, 0); }
    }

    .sub-heading {
        font-size: 28px;
        margin-top: 20px;
    }

    .error-message {
        font-size: 16px;
        margin: 20px 0;
        color: #ccc;
    }

    .error-buttons .btn {
        margin: 10px;
        text-transform: uppercase;
    }

    /* Matrix Background */
    .matrix-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    canvas#matrixRain {
        width: 100%;
        height: 100%;
        display: block;
    }
</style>

<!-- Matrix Rain Effect Script -->
<script>
    const canvas = document.getElementById('matrixRain');
    const ctx = canvas.getContext('2d');

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()*&^%';
    const fontSize = 16;
    const columns = canvas.width / fontSize;

    const drops = [];
    for (let x = 0; x < columns; x++) {
        drops[x] = 1;
    }

    function drawMatrix() {
        ctx.fillStyle = 'rgba(0, 0, 0, 0.05)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        ctx.fillStyle = '#0F0';
        ctx.font = fontSize + 'px monospace';

        for (let i = 0; i < drops.length; i++) {
            const text = chars[Math.floor(Math.random() * chars.length)];
            ctx.fillText(text, i * fontSize, drops[i] * fontSize);

            if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
                drops[i] = 0;
            }
            drops[i]++;
        }
    }

    setInterval(drawMatrix, 35);

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
</script>

<?php get_footer(); ?>

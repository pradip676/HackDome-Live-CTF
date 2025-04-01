<?php
/* Template Name: Checkout */
get_header();
?>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome - Checkout</span>
    </div>

    <div class="terminal-body">
        <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
</div>

<?php get_footer(); ?>

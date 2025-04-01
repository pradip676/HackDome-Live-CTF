<?php
/* Template Name: Cart */
get_header();
?>

<div class="terminal-container">
    <div class="terminal-header">
        <span class="terminal-title">HackDome - Cart</span>
    </div>

    <div class="terminal-body">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
        
        <div class="cart-buttons">
            <a href="<?php echo esc_url(home_url('/checkout')); ?>" class="main-button-login">Proceed to Checkout</a>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="main-button-login">Continue Shopping</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>

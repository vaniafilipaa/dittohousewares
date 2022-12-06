<?php
/* Template name: Login */
get_header();

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_login_form'); ?>
    
    <div class="container login-container">
        <div class="row">
            <div class="col-xs-12">
                <div class="login-row">
<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

                <?php endif; ?>
                <h3 class="title"><?php esc_html_e('Login', 'woocommerce'); ?></h2>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;
                    ?>
                    <form class="woocommerce-form woocommerce-form-login login" method="post">
                        <?php do_action('woocommerce_login_form_start'); ?>
                        <div class="row">
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide col-md-3 col-xs-12">
                                <label for="username"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
                            </div>
                            <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide col-md-3 col-xs-12">
                                <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
                            </div>

                            <?php do_action('woocommerce_login_form'); ?>
                            
                            <div class="col-md-3 col-xs-6 col-md-offset-3">
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                                </label>
                                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                            </div>
                            <div class="col-md-6 col-xs-6 text-right">
                                <label class="woocommerce-LostPassword lost_password">
                                    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
                                </label>
                            </div>
                            <div class="col-md-9 col-xs-12 col-md-offset-3">
                                <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
                            </div>
                        </div>
                        <?php do_action('woocommerce_login_form_end'); ?>
                    </form>
                    <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
                </div>
            </div>
            </div>
    </div>
        <?php endif; ?>
        <?php do_action('woocommerce_after_customer_login_form'); ?>
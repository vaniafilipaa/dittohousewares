<?php
/* Template name: Registration */
get_header();

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_registration_form' ); ?>

<div class="container login-container">
	<div class="row">
		<div class="col-xs-12">
			<div class="login-row">
				<h3 class="title"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h3>
				<?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;
                    ?>
				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
					<?php do_action( 'woocommerce_register_form_start' ); ?>
					<div class="row">

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
							<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide col-md-3 col-xs-12">
								<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							</div>
							<div class="col-md-9 col-xs-12">
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
							</div>
						<?php endif; ?>
						
						<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide col-md-3 col-xs-12">
							<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
						</div>
						<div class="col-md-9 col-xs-12">
							<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</div>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
							<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide col-md-3 col-xs-12">
								<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							</div>
							<div class="col-md-9 col-xs-12">
								<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
							</div>
						<?php else : ?>
							<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>
						<?php endif; ?>
						
						<div class="col-md-9 col-xs-12 col-md-offset-3">
							<?php do_action( 'woocommerce_register_form' ); ?>
							<p class="woocommerce-FormRow form-row">
								<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
								<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
							</p>					
						</div>
						</div>
					<?php do_action( 'woocommerce_register_form_end' ); ?>
				</form>
			</div>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

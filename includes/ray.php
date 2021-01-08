<?php

/**
 * Hooks into 'wp_mail' and sends a preview to Ray. This
 * will not disable PhpMailer from sending the email.
 *
 * @param PHPMailer $phpmailer
 * @return void
 */
function vrdt_ray_wp_mail_hook( $phpmailer ) {
	$subject = $phpmailer->Subject;
	$to      = implode( ', ', array_filter( $phpmailer->getToAddresses()[0] ) ?? array() );
	$cc      = implode( ', ', array_filter( $phpmailer->getCcAddresses()[0] ) ?? array() );
	$bcc     = implode( ', ', array_filter( $phpmailer->getBccAddresses()[0] ) ?? array() );
	$body    = $phpmailer->Body;

	ob_start();

	vrdt_partial( 'partials/ray/mail-preview', compact( 'subject', 'to', 'cc', 'bcc', 'body' ) );

	ray()->sendCustom( ob_get_clean(), 'wp_mail' );
}

add_action( 'phpmailer_init', 'vrdt_ray_wp_mail_hook' );

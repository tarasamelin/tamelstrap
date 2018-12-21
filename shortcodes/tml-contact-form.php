<?php
/**
 * TML Contact Form Shortcode [contact-form]
 */
/*
[contact-form email="" subject="" label_name="" label_email="" label_phone="" label_subject="" label_message="" label_submit="" error_empty="" error_noemail="" success=""]
*/
// function to get the IP address of the user
function tml_get_the_ip() {
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		return $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	else {
		return $_SERVER["REMOTE_ADDR"];
	}
}

// Add the shortcode
add_shortcode( 'contact-form', 'tml_contact_form_sc' );
function tml_contact_form_sc( $atts ) {
	extract( shortcode_atts( array(
		"email" => get_bloginfo( 'admin_email' ),
		"subject" => __( 'the letter was sent via the contact form', 'tamelstrap' ),
		"label_name" => __( 'Name' ),
		"label_email" => __( 'Email' ),
		"label_phone" => __( 'Telephone', 'tamelstrap' ),
		"label_message" => __( 'Message', 'tamelstrap' ),
		"label_submit" => __( 'Send', 'tamelstrap' ),
		"error_empty" => __( '<strong>ERROR</strong>: please fill the required fields (name, email).' ),
		"error_noemail" => __( 'Please enter a valid email address.' ),
		"success" => __( '<span class="text-success h3">Thank you for your message! We will contact you shortly.</span>', 'tamelstrap' ),
	), $atts ) );

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$error = false;
		$required_fields = array( "your_name", "email", "message" );

		foreach ( $_POST as $field => $value ) {
			if ( get_magic_quotes_gpc() ) {
				$value = stripslashes( $value );
			}
			$form_data[$field] = strip_tags( $value );
		}

		foreach ( $required_fields as $required_field ) {
			$value = trim( $form_data[$required_field] );
			if( empty( $value ) ) {
				$error = true;
				$result = $error_empty;
			}
		}

		if( !is_email( $form_data['email'] ) ) {
			$error = true;
			$result = $error_noemail;
		}

		if ( $error == false ) {
			$email_subject = "[" . get_bloginfo('name') . "] " . $subject ;
			$email_message = "IP: " . tml_get_the_ip(). "\n\n";
			$email_message .= "Subject: " . $form_data['subject'] . "\n\n";
			$email_message .= "Name: " .$form_data['your_name'] . "\n\n";
			$email_message .= "E-mail: " .$form_data['email'] . "\n\n";
			$email_message .= "Phone: " .$form_data['phone'] . "\n\n";
			$email_message .= "Message: " .$form_data['message'] . "\n\n";
			$headers  = "From: ".$form_data['your_name']." <".$form_data['email'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			wp_mail( $email, $email_subject, $email_message, $headers );
			$result = $success;
			$sent = true;
		}
	}

	if( $result != "" ) {
		$info = '<div class="info">'.$result.'</div>';
	}
	$email_form = '<form class="contact-form" method="post" action="'.get_permalink().'">
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_name">'.$label_name.':</label>
			<input class="form-control rounded-0" id="cf_name" name="your_name" type="text" size="50" maxlength="50" value="'.$form_data['your_name'].'" />
		</div>
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_email">'.$label_email.':</label>
			<input class="form-control rounded-0" id="cf_email" name="email" type="text" size="50" maxlength="50" value="'.$form_data['email'].'" />
		</div>
        <div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_email">'.$label_phone.':</label>
			<input class="form-control rounded-0" id="cf_email" name="phone" type="text" size="50" maxlength="50" value="'.$form_data['phone'].'" />
		</div>
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_message">'.$label_message.':</label>
			<textarea class="form-control rounded-0" id="cf_message" name="message" cols="50" rows="3">'.$form_data['message'].'</textarea>
		</div>
		<div class="form-group mb-3">
			<input class="pt-1 pb-1 btn btn-outline-secondary rounded-0" id="cf_send" type="submit" value="'.$label_submit.'" name="send" />
		</div>
	</form>';
	
	if($sent == true) {
		return $info.$email_form;
	} else {
		return $info.$email_form;
	}
}
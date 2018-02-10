<?php
/**
 * TML Contact Form Shortcode
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
		"subject" => '',
		"label_name" => __( 'Name' ),
		"label_email" => __( 'Email' ),
		"label_subject" => __( 'Title:' ),
		"label_message" => __( 'Text' ),
		"label_submit" => __( 'Next' ),
		"error_empty" => __( '<strong>ERROR</strong>: please fill the required fields (name, email).' ),
		"error_noemail" => __( 'Please enter a valid email address.' ),
		"success" => 'OK!'
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
			$email_subject = "[" . get_bloginfo('name') . "] " . $form_data['subject'];
			$email_message = $form_data['message'] . "\n\nIP: " . tml_get_the_ip();
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
			<label class="text-secondary mb-0" for="cf_subject">'.$label_subject.'</label>
			<input class="form-control rounded-0" id="cf_subject" name="subject" type="text" size="50" maxlength="50" value="'.$subject.$form_data['subject'].'" />
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

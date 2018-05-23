<?php

/*
[wayforpay link="https://google.com"]
[wayforpay
email=""
subject=""
label_name=""
label_email=""
label_phone=""
label_adress=""
subject=""
link=""
]
*/

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
add_shortcode( 'wayforpay', 'wayforpay_form_sc' );
function wayforpay_form_sc( $atts ) {
	extract( shortcode_atts( array(
		"email" => get_bloginfo( 'admin_email' ),
		"subject" => 'Заказ через ссылку WFP - ',
		"label_name" => 'ФИО',
		"label_email" => 'Email',
		"label_phone" => 'Телефон',
		"label_adress" => 'Адрес Доставки',
		"label_submit" => 'Перейти к оплате',
        "link" => '/#',
		"error_empty" => 'Ошибка!',
		"error_noemail" => __( 'Please enter a valid email address.' ),
		"success" => 'OK!',
	), $atts ) );

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$error = false;
		$required_fields = array( "your_name", "your_phone", "your_email", "your_adress" );

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

		if( !is_email( $form_data['your_email'] ) ) {
			$error = true;
			$result = $error_noemail;
		}
        
        $the_title = get_the_title();
        
		if ( $error == false ) {
			$email_subject = "[" . get_bloginfo('name') . "]" . $subject.$the_title. "\n\n";
            
			$email_message = "IP: " . tml_get_the_ip(). " \n\n";
			$email_message .= "Subject: ".$subject.$the_title." \n\n";
			$email_message .= "Name: " .$form_data['your_name'] . "\n\n";
			$email_message .= "E-mail: " .$form_data['your_email'] . "\n\n";
			$email_message .= "Phone: " .$form_data['your_phone'] . "\n\n";
			$email_message .= "Adress: " .$form_data['your_adress'] . "\n\n";
            
			$headers  = "From: ".$form_data['your_name']." <".$form_data['your_email'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
            
			wp_mail( $email, $email_subject, $email_message, $headers );
			$result = $success;
			$sent = true;
		}
	}

	if( $result != '' ) {
		$info = '<div class="info">'.$result.'</div>';
	}
    
	$email_form = '<div class="wayforpay_form_sc row"><form class="col-md-8 contact-form" method="post" action="'.get_permalink().'">
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_name">'.$label_name.':</label>
			<input class="form-control rounded-0" id="cf_name" name="your_name" type="text" size="50" maxlength="50" value="'.$form_data['your_name'].'" />
		</div>
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_email">'.$label_email.':</label>
			<input class="form-control rounded-0" id="cf_email" name="your_email" type="text" size="50" maxlength="50" value="'.$form_data['your_email'].'" />
		</div>
        <div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_email">'.$label_phone.':</label>
			<input class="form-control rounded-0" id="cf_email" name="your_phone" type="text" size="50" maxlength="50" value="'.$form_data['your_phone'].'" />
		</div>
		<div class="form-group mb-2">
			<label class="text-secondary mb-0" for="cf_message">'.$label_adress.':</label>
			<textarea class="form-control rounded-0" id="cf_message" name="your_adress" cols="50" rows="3">'.$form_data['your_adress'].'</textarea>
		</div>
		<div class="form-group mb-3">
			<input class="button pt-1 pb-1 btn btn-outline-secondary rounded-0" id="cf_send" type="submit" value="'.$label_submit.'" name="send" />
		</div>
	</form></div>';
	
	if ( $sent == true ) {
        echo '<script type="text/javascript">window.location.href = "'.$link.'"</script>';
		return $info.$email_form;
    }
    else {
		return $info.$email_form;
	}
}



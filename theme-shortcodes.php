<?php
// Create portfolio
	
	function crosstec_portfolio_template() {
		
		// Query Arguments
		$args = array(
					'post_type' => 'portfolio',
					'posts_per_page'	=> 5,
					'orderby' => 'menu_order',
					'order' => 'ASC' 
				);	
		
		// The Query
		$the_query = new WP_Query( $args );
		
		// Check if the Query returns any posts
		if ( $the_query->have_posts() ) {
		
		// Start the portfolio ?>

			<dic class="portfolio-wrap">
				<?php		
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="portfolio_hover">	
					<?php if ( has_post_thumbnail()) { 
					echo the_post_thumbnail('post-thumbnail', array( 'class'	=> "port attachment-post-thumbnail"));
					} else{ ?>
					<img src="http://crosstec.de/templates/crossteclight/images/logo_crosstec.png"  class="port"/>
					<?php } ?>
					<div class="contenthover">
							<h3><?php the_title();?></h3>
							<?php the_excerpt();?>
								<a href="<?php echo the_permalink();?>" class="crosstec-button green square">
									<span class="crosstec-button-inner"> Read More </span>
								</a>

            		</div>
				</div>
				<?php endwhile; ?>
		<?php }
		
		// Reset Post Data
		wp_reset_postdata();
	}

// portfolio Shortcode
add_shortcode('portfolio', 'crosstec_portfolio_template');


	function crosstec_portfolio_shortcode() {
		ob_start();
		crosstec_portfolio_template();
		$portfolio = ob_get_clean();
		return $portfolio;
	}

function crosstec_carousel_template(){

$carouselPosts = new WP_Query();
$carouselPosts->query('showposts=12');
?>

<div class="slider5">
        <?php while ($carouselPosts->have_posts()) : $carouselPosts->the_post(); ?>
        <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full'); ?>
 	
        <div class="slide">
        	<?php if ( has_post_thumbnail() ):?>
        	<a href="<?php the_permalink();?>" class="tooltip" title="<?php the_title();?>">
            	<img src="<?php echo $thumbnail[0];?>" alt="<?php the_title();?>"/>
        	</a>
        	<?php endif;?>
        </div>
        <?php endwhile; ?>
    </div>
 
    <div class="clearfix"></div>
<?php
}

// Carousel Shortcode
add_shortcode('carousel', 'crosstec_carousel_template');


// function to get the IP address of the user
function crosstec_get_the_ip() {
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

// the shortcode
function crosstec_contact_form_sc($atts) {
	extract(shortcode_atts(array(
		"email" => get_bloginfo('admin_email'),
		"subject" => '',
		"label_name" => 'Your Name',
		"label_email" => 'Your E-mail Address',
		"label_subject" => 'Subject',
		"label_message" => 'Your Message',
		"label_submit" => 'Submit',
		"error_empty" => 'Please fill in all the required fields.',
		"error_noemail" => 'Please enter a valid e-mail address.',
		"success" => 'Thanks for your e-mail! We\'ll get back to you as soon as we can.'
	), $atts));

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error = false;
		$required_fields = array("your_name", "email", "message", "subject");

		foreach ($_POST as $field => $value) {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
			$form_data[$field] = strip_tags($value);
		}

		foreach ($required_fields as $required_field) {
			$value = trim($form_data[$required_field]);
			if(empty($value)) {
				$error = true;
				$result = $error_empty;
			}
		}

		if(!is_email($form_data['email'])) {
			$error = true;
			$result = $error_noemail;
		}

		if ($error == false) {
			$email_subject = "[" . get_bloginfo('name') . "] " . $form_data['subject'];
			$email_message = $form_data['message'] . "\n\nIP: " . crosstec_get_the_ip();
			$headers  = "From: ".$form_data['your_name']." <".$form_data['email'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			wp_mail($email, $email_subject, $email_message, $headers);
			$result = $success;
			$sent = true;
		}
	}

	if(isset($result) != "") {
		$info = '<div class="info">'.$result.'</div>';
	}
	$email_form = '<form class="contact-form" method="post" action="'.get_permalink().'" style="float:left;">

<input type="text" style="max-width:200px;" placeholder='.$label_name.' name="your_name" id="cf_name" size="50" maxlength="50" value="'.isset($form_data['your_name']).'" />

<input type="text" style="max-width:200px;" placeholder="'.$label_email.'" name="email" id="cf_email" size="50" maxlength="50" value="'.isset($form_data['email']).'" /></td>

<input type="text" style="max-width:200px;" placeholder="'.$label_subject.'" name="subject" id="cf_subject" size="50" maxlength="50" value="'.$subject.isset($form_data['subject']).'" /></td>

<textarea name="message" style="width:98%;" placeholder="'.$label_message.'" id="cf_message" cols="50" rows="15">'.isset($form_data['message']).'</textarea><br><input type="submit" class="btn" value="'.$label_submit.'" name="send" id="cf_send" /></td>
</form>';
	
	if(isset($sent) == true) {
		return $info;
	} else {
		return isset($info).$email_form;
	}
} 
add_shortcode('contact', 'crosstec_contact_form_sc');


// Include Drag & Drop

require_once(dirname(__FILE__) . '/CPT/portfolio-order.php');
require_once(dirname(__FILE__) . '/CPT/staff-order.php');
require_once(dirname(__FILE__) . '/CPT/services-order.php');

?>

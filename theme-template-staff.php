<?php
/**
 * Template Name: Staff
 */
$options          = get_option('katapult'); // Retrieve FW Options
$img_background   = isset($options['accent_color']) && $options['accent_color'] != '' ? $options['accent_color'] : '';
?>


<?php
//start page loop
if (have_posts()) : while (have_posts()) : the_post();


//get meta to set parent category
$staff_filter_parent = '';
$staff_parent = get_post_meta($post->ID, 'office_staff_parent', true);
if($staff_parent != 'select_staff_parent') { $staff_filter_parent = $staff_parent; } else { $staff_filter_parent = NULL; };
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>	 
</header>
<!-- /page-heading -->

<?php
$content = $post->post_content;
if(!empty($content)) { ?>
	<div id="staff-description">
    	<?php the_content(); ?>
    </div>
    <!-- /staff-description -->
<?php }?>

<div id="staff-wrap" class="clearfix">
	<?php
	//tax query
	if($staff_filter_parent) {
	$tax_query = array(
		array(
			  'taxonomy' => 'staff_departments',
			  'field' => 'id',
			  'terms' => $staff_filter_parent
			  )
		);
	} else { $tax_query = NULL; }

	//get posts ==> staff
	query_posts(array(
		'post_type' => 'staff',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
        'order' => 'ASC',
		'paged' => $paged,
		'tax_query' => $tax_query
	));

	//start loop
	$count=0;
	while (have_posts()) : the_post();
	$count++;
	
	//get images
	$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');


	
	//get meta
	$staff_position = get_post_meta($post->ID, '_cmb_pos', TRUE);
	$staff_occupation = get_post_meta($post->ID, '_cmb_occ', TRUE);
	?>

	
	<?php if(has_post_thumbnail() ) { ?>
	<div class="staff-member clearfix">
		<div class="staff-img">
			<a href="<?php the_permalink();?>">
				<div class="staff_image"  style='background: <?php echo $img_background;?> url(<?php echo $featured_image[0]; ?>) no-repeat center center'>
					<h3><?php the_title(); ?></h3>
				</div>
			</a>
		</div>
		<!-- /staff-img -->
		<div class="staff-meta">
        	<h3><?php the_title(); ?></h3>
			<?php if($staff_position) { ?><?php echo ''.$staff_position.''; ?><?php } ?>
			<?php if($staff_occupation) { ?><?php echo ' '. '|' . ' ' .$staff_occupation.''; ?><?php } ?>
		</div>
		<!-- /staff-meta -->
	</div>
	<!-- /staff-member -->
    <?php } ?>
 
<?php endwhile; wp_reset_query(); ?>

</div>
<!-- /staff-wrap -->

<?php endwhile; endif; ?>	


<?php if (have_posts()) : while (have_posts()) : the_post(); 

$_id 			  = $post->ID;
$meta_desc 	 	  = get_post_meta($_id, '_cmb_about', TRUE);
$meta_occ 	 	  = get_post_meta($_id, '_cmb_occ', TRUE);
$meta_pos 	 	  = get_post_meta($_id, '_cmb_pos', TRUE);
$meta_joined 	  = get_post_meta($_id, '_cmb_joined', TRUE);
$options          = get_option('katapult'); // Retrieve FW Options
$img_background   = isset($options['accent_color']) && $options['accent_color'] != '' ? $options['accent_color'] : '';



?>

<div class="single_staff">
<header id="page-heading">
	<h1><?php the_title(); ?></h1>	
</header>
<!-- /post-meta -->

<article class="post staff-post clearfix">

<?php 
if ( has_post_thumbnail() )	:?>
  <?php $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full'); ?>

<div class="crosstec-accordion  ui-accordion ui-widget ui-helper-reset" role="tablist">
	<h3 class="crosstec-accordion-trigger  ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-accordion-1-header-0" aria-controls="ui-accordion-1-panel-0" aria-selected="false" tabindex="-1">
	    <span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>
		<a href="#">Contact</a>
	</h3>
	<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" id="ui-accordion-1-panel-0" aria-labelledby="ui-accordion-1-header-0" role="tabpanel" aria-expanded="false" aria-hidden="true" style="display: none;">
		<!-- __ -->
		<div class="single_staff">
			<ul>
				<li>
					<div id="staff_single_img"  style='background: <?php echo $img_background ;?> url(<?php echo $thumbail[0]; ?>) no-repeat center center'></div>
				</li>
				<li>
					<h4> About <?php the_title();?></h4>
					<?php the_content(); ?>
				</li>
			</ul>
		</div>
		<div style="clear:both;"></div>
		<!-- __ -->
	</div>
	<h3 class="crosstec-accordion-trigger  ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active ui-corner-top ui-state-hover" role="tab" id="ui-accordion-1-header-1" aria-controls="ui-accordion-1-panel-1" aria-selected="true" tabindex="0">
		<span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>
		<a href="#">More about <?php the_title();?></a>
	</h3>
	<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" id="ui-accordion-1-panel-1" aria-labelledby="ui-accordion-1-header-1" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
		<!-- __ -->
		<ul>
		<?php
			if(isset($meta_occ)){
			echo '<li>'. 'Occupation: ' . $meta_occ . '</li>';
			}
			if(isset($meta_pos)){
			echo '<li>' . 'Position: ' . $meta_pos . '</li>';
			}
			if(isset($meta_joined)){
			echo '<li>' . 'Date joined: ' . $meta_joined . '</li>';
			}
			if(isset($meta_desc)){
			echo '<li>' . 'Biography: ' . $meta_desc . '</li>';
			}			
		?>
		</ul>
		
		<!-- __ -->
	</div>
</div>
<?php else: ?>

	<div class="entry clearfix">
		<?php the_content(); ?>
	</div>
	<!-- /entry -->

<?php endif; //has_post_thumbnail?>       

</article>
<!-- /post -->

</div><!-- /.single_staff -->


<?php endwhile; endif; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
$_id              =  $post->ID;
$options          = get_option('katapult'); // Retrieve FW Options
$img_background   = isset($options['accent_color']) && $options['accent_color'] != '' ? $options['accent_color'] : '';

?>

<div class="single_port">
<header id="page-heading">
	<h1><?php the_title(); ?></h1>
</header>
<!-- /post-meta -->

<article class="post staff-post clearfix">

<?php 
if ( has_post_thumbnail() )	:?>
  <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id()); ?>
  	<div class="port_wrapper">
  		<ul>
  			<li>
  				<div class="port_holder">
    				<a href="<?php echo $thumbnail[0];?>" title="<?php the_title(); ?>" class="prettyphoto-link">
    					<div class="single_port_img" style="background:<?php echo $img_background;?> url(<?php echo $thumbnail[0];?>) no-repeat center center;"></div>
    				</a>
    			</div>
    		</li>
    		<li>
    			<div class="port_desc">
    				<?php the_content(); ?>
    			</div>
    		</li>
    	</ul>
	</div>


<?php else: ?>

	<div class="entry clearfix">
		<?php the_content(); ?>
	</div>
	<!-- /entry -->

<?php endif; //has_post_thumbnail?>       

</article>
<!-- /post -->

</div> <!-- /.single_port -->
<?php next_post_link('%link', 'Next Post &raquo;') ?>
<?php endwhile; endif; ?>

<?php
/*
Template Name: Contact
*
*/
?>

<?php
$location = get_post_meta(get_the_ID(),'_cmb_contact',TRUE);
$title 	  = get_post_meta(get_the_ID(),'_cmb_contactname',TRUE);
?>


<?php
//start loop
if (have_posts()) : while (have_posts()) : the_post();
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>	
</header>
<!-- /page-heading -->

<?php echo do_shortcode('[crosstec_googlemap title="'.$title.'" location="'.$location.'" zoom="10" height=350]');?>

	<div id="contact-describtion" class="clearfix">
		<?php the_content(); ?>
	</div>


<div class="post full-width clearfix">

    

    </div>
<!-- /post -->

<?php endwhile; endif; ?>




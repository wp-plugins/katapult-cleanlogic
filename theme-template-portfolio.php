<?php
/**
 * Template Name: Portfolio
 */
$options          = get_option('katapult'); // Retrieve FW Options
$img_background   = isset($options['accent_color']) && $options['accent_color'] != '' ? $options['accent_color'] : '';
?>


<?php
//start loop
if (have_posts()) : while (have_posts()) : the_post();
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>	
    <?php

		//get portfolio categories
		$cats_args = array(
			'hide_empty'    => true
		);
		$cats = get_terms('portfolio_cats', $cats_args);
		
		//show filter if categories exist
		if($cats) { ?>
        <!-- Portfolio Filter -->
        <ul id="portfolio-cats" class="filter clearfix">
            <li><a href="#all" rel="all" class="active"><span><?php _e('All', 'office'); ?></span></a></li>
            <?php
            foreach ($cats as $cat ) : ?>
            <li><a href="#<?php echo $cat->slug; ?>" rel="<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
            <?php endforeach; ?>
        </ul>
        test
        <!-- /portfolio-cats -->
	<?php } ?>
    
</header>
<!-- /page-heading -->

<?php
$content = $post->post_content;
if(!empty($content)) { ?>
	<div id="portfolio-description" class="clearfix">
		<?php the_content(); ?>
	</div>
	<!-- portfolio-description -->
<?php } ?>

<div class="post full-width clearfix">

    <div id="portfolio-wrap" class="clearfix">
    	<ul class="portfolio-content">
			<?php
			//tax query
 			$tax_query = NULL;
			
            //get post type ==> portfolio
            query_posts(array(
                'post_type'=>'portfolio',
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'posts_per_page' => -1,
                'paged'=>$paged,
				'tax_query' => $tax_query
            ));
            ?>
        
            <?php
			$count=0;
            while (have_posts()) : the_post();
			$count++;
			
            //get portfolio thumbnail
            $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
			
            //get terms
            $terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
			$terms_list = get_the_term_list( get_the_ID(), 'portfolio_cats' );
            ?>
            
            <?php
			//show entry only if it has a featured image
            if($thumbail) {  ?>
            <li data-id="id-<?php echo $count; ?>" data-type="<?php if($terms) { foreach ($terms as $term) { echo $term->slug .' '; } } else { echo 'none'; } ?>" class="portfolio-item">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                	<div id="port-img"  style='background: <?php echo $img_background;?> url(<?php echo $thumbail[0]; ?>) no-repeat center center'>

                		<h3><?php the_title(); ?></h3>
                    </div>
                </a>
            </li>
            <!-- /portfolio-item -->
            <?php } ?>
            
            <?php endwhile; wp_reset_query(); ?>
		</ul>
    </div>
    <!-- /portfolio-wrap -->

</div>
<!-- /post -->

<?php endwhile; endif; ?>



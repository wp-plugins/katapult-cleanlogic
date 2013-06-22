
<?php if (have_posts()) : ?>

<header id="page-heading">
	<h1>
	<?php
		$term =	$wp_query->queried_object;
		echo $term->name;
	?>
	</h1> 
</header>
<!-- /page-heading -->


<div id="portfolio-description">
	 CATEGORY Describtion HERE (using php) !!
</div>
<!-- /portfolio-description -->

    
<div class="post full-width clearfix">
    
    <div id="portfolio-wrap" class="clearfix">
    
        <?php
        while (have_posts()) : the_post();
        //get portfolio thumbnail
        $thumbail = wp_get_attachment_image_src(get_post_thumbnail_id());
        ?>
        
        <?php if ( has_post_thumbnail() ) {  ?>
        <div class="portfolio-item <?php if($count == '4') { echo 'no-margin'; } ?>">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            	<img src="<?php echo $thumbail[0]; ?>" height="<?php echo $thumbail[2]; ?>" width="<?php echo $thumbail[1]; ?>" alt="<?php echo the_title(); ?>" />
            	<h3><?php the_title(); ?></h3>
            </a>
        </div>
        <!-- /portfolio-item -->
        <?php } ?>
        
        <?php endwhile; ?>
          
    </div>
    <!-- /portfolio-wrap -->
    
	<?php wp_reset_query(); ?>

</div>
<!-- /post -->


<?php endif; ?>
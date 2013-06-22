<?php
/**
 * Template Name: Services
 */
?>
<?php
//start page loop
if (have_posts()) : while (have_posts()) : the_post();

$service_filter_parent = NULL;
?>

<header id="page-heading">
	<h1><?php the_title(); ?></h1>	
</header>
<!-- /page-heading -->
    
<?php
//show page content if not empty
$content = $post->post_content;
if(!empty($content)) { ?>
	<div id="services-description" class="clearfix">
		<?php the_content(); ?>
	</div>
	<!--/services description -->
<?php } ?>
     
     
<div id="services-wrap" class="clearfix">

	<?php		
    //tax query
    if($service_filter_parent) {
        $tax_query = array(
            array(
                  'taxonomy' => 'service_cats',
                  'field' => 'id',
                  'terms' => $service_filter_parent
                  )
            );
    } else { $tax_query = NULL; }
    
    // get custom post type ==> homepage-tabs
    global $post;
    $args = array(
        'post_type'=>'services',
        'numberposts' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'tax_query' => $tax_query
    );
    $services_posts = get_posts($args);
    ?>
    
    <ul id="service-tabs">
        <?php
        //tabs
        $count=0;
        foreach($services_posts as $post) : setup_postdata($post);
        $count++;
        //featured image
        $feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full-size');
        ?>
        <li><a href="#tab-<?php echo $count; ?>" title="<?php the_title(); ?>"><?php if($feat_img) { ?><span><img src="<?php echo $feat_img[0]; ?>" alt="<?php the_title(); ?>" /></span><?php } ?><?php the_title(); ?></a></li>
        <?php endforeach; ?>
    </ul>
    <!-- /service tabs -->
    
    <div id="service-content" class="entry">
        <?php
        //tab content
        $count=0;
        foreach($services_posts as $post) : setup_postdata($post);
        $count++;
        ?>
        <article id="tab-<?php echo $count; ?>" class="service-tab-content">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </article>
        <!-- /service-tab-content -->
        <?php endforeach; ?>
    </div>
    <!-- /service-content -->
    
</div>
<!-- /services-wrap -->

<?php wp_reset_postdata(); endwhile; endif; ?>	

<!-- Include js here so the tabs load faster -->
<script>
jQuery(function($){
    $(document).ready(function(){
        $('.service-tab-content').hide();
        $('#service-content .service-tab-content:first').show();
        $('ul#service-tabs li:first').addClass('active');
         
        $('ul#service-tabs a').click(function(){
            $('ul#service-tabs li').removeClass('active');
            $(this).parent().addClass('active');
            var currentTab = $(this).attr('href');
            $('#service-content .service-tab-content').hide();
            $(currentTab).fadeIn(1000);
            return false;
        });
    });
});
</script>
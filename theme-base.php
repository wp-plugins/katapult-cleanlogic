<?php
$slider_meta_select = get_post_meta(get_the_ID(),'_cmb_sliderselect',TRUE); // Retrieve slider options from page
?>

<body id="body" <?php body_class(); ?>>
<?php if (!is_404()):;?>
<div class="container_12">
  <div id="siteWrapper">
    <div id="siteTop">
    <?php
      do_action('get_header');
      get_template_part('templates/header-top-navbar');
    ?>


  <div id="ct_sliderWrapper">
     <div id="ct_sliderContent">
       <div class="moduletable"> 
         <?php if($slider == 1 && $slider_meta_select == 1):?>    
          <?php echo crosstec_slider_template(); ?>
          <?php endif;?>
      </div>
    </div>
  </div>
  <div style="clear:both !important;"></div>

    
  <!-- <div class="container"> -->
  <!-- <div class="span10"> -->
  </div>
  
  <div id="main">
    <div class="ct_breadcrumbs"> 
      <div class="moduletable">
        <div class="breadcrumbs">
          <span class="showHere"><?php the_breadcrumb();?></span>
        </div>
      </div>
    </div>
  
    <div class="contentWrapper container wrapper" role="document">
      <div class="content row">
        <?php if($showcase_meta_select == 1):?>
        <div id="showcase">
          <?php dynamic_sidebar( 'showcase' ); ?>
        </div>
        <?php endif;?>

  
          <?php if ($sidebar_meta_select == 0):?>
          <div class="main span12 grid_9" role="main">
          <?php else:?>
          <div class="main span8 grid_9" role="main">
          <?php endif;?>
          <?php  if($content_found == '') { include crosstec_template_path(); } else { echo $content_found; } ?>
        </div><!-- /.main -->
  
        <?php if($sidebar_meta_select == 1):?>
        <?php if (crosstec_display_sidebar()) : ?>
        <aside class="sidebar span4 grid_2" role="complementary">
          <?php include crosstec_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
        <?php endif; endif; ?>
        
        <div class="clear"></div>
      
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php get_template_part('templates/footer'); ?>
  </div>
  
  </div><!-- SiteWrapper -->
  
  <?php endif;?><!-- is_404 -->
  <?php if(is_404()):;?>
  <div id="siteWrapper">
    <div class="contentWrapper container wrapper">
       <div class="content row">
  
        <div id="ct_errorWrapper">
          <div class="error">
            <span class="errorNumber">404</span>
              <div id="outline">
               <div id="errorboxoutline">  
                  <div id="errorboxbody">
  
                    <p><strong>Sorry, but the page you were trying to view does not exist.</strong></p>
                     <p><strong>It looks like this was the result of either:</strong></p>
                          <ol>
                            <li><?php _e('a mistyped address', 'cross'); ?></li>
                            <li><?php _e('an out-of-date link', 'cross'); ?></li>
                          </ol>
                      <p><strong>Please try one of the following pages:</strong></p>
                    
                    <div style="text-align:center;">
                      <a href="<?php echo site_url();?>" title="Go to the Home Page">Home Page</a>
                    </div>
    
                    <p>If difficulties persist, please contact the System Administrator of this site and report your issue below..</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  </div>
</div> <!-- /.conatainer -->
<?php endif;?><!--  / 404 -->

</body>
</html>

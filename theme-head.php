<?php
// extend basic options
$dynabg  = isset($options['dynabg']) && $options['dynabg'] != '' ? $options['dynabg'] : '';
?>
<!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />


  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon and Apple Icons -->
  <link rel="shortcut icon" href="<?php echo $favicon; ?>">
  <link rel="apple-touch-icon" href="<?php echo $app_touch; ?>">
  
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">



<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/selectivizr.min.js"></script>
<![endif]-->


<!--[if lt IE 9]>
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/js/html5.js"></script>
<![endif]-->

<!-- Get our color sheme -->
<?php
if($css_select) {
    if($css_select == "Choose a color sheme") { ?>
        <link rel="stylesheet" type="text/css" media="all"
        href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/default.css" /><?php
    } else { ?>
        <link rel="stylesheet" type="text/css" media="all"
              href="<?php echo plugins_url(); ?>/katapult-<?php echo str_replace('.css','',$css_select); ?>/theme.css" /><!-- Test -->
        <?php
        if(@file_exists(WP_PLUGIN_DIR . '/katapult-' . str_replace('.css','',$css_select) . '/theme-dynacss.php')){
            $uri = '?bg_color='.str_replace('#','',$bg_color)
                                .'&amp;body_color='.str_replace('#','',$body_color)
                                .'&amp;heading_color='.str_replace('#','',$heading_color)                                
                                .'&amp;accent_color='.str_replace('#','',$accent_color)
                                .'&amp;border_color='.str_replace('#','',$border_color)
                                .'&amp;menu_gradient[from]='.str_replace('#','',(isset($menu_gradient['from']) ? $menu_gradient['from'] : ''))
                                .'&amp;menu_gradient[to]='.str_replace('#','',(isset($menu_gradient['to']) ? $menu_gradient['to'] : ''))
                                .'&amp;menu_color='.str_replace('#','',$menu_color)
                                .'&amp;menu_hover[from]='.str_replace('#','',(isset($menu_hover['from']) ? $menu_hover['from'] : ''))
                                .'&amp;menu_hover[to]='.str_replace('#','',(isset($menu_hover['to']) ? $menu_hover['to'] : ''))
                                .'&amp;input_color='.str_replace('#','',$input_color)
                                .'&amp;input_focus='.str_replace('#','',$input_focus)
                                .'&amp;button_gradient[from]='.str_replace('#','',(isset($button_gradient['from']) ? $button_gradient['from'] : ''))
                                .'&amp;button_gradient[to]='.str_replace('#','',(isset($button_gradient['to']) ? $button_gradient['to'] : ''))
                                .'&amp;box1_gradient[from]='.str_replace('#','',(isset($box1_gradient['from']) ? $box1_gradient['from'] : ''))
                                .'&amp;box1_gradient[to]='.str_replace('#','',(isset($box1_gradient['to']) ? $box1_gradient['to'] : ''))
                                .'&amp;box2_gradient[from]='.str_replace('#','',(isset($box2_gradient['from']) ? $box2_gradient['from'] : ''))
                                .'&amp;box2_gradient[to]='.str_replace('#','',(isset($box2_gradient['to']) ? $box2_gradient['to'] : ''))
                                .'&amp;control_gradient[from]='.str_replace('#','',(isset($control_gradient['from']) ? $control_gradient['from'] : ''))
                                .'&amp;control_gradient[to]='.str_replace('#','',(isset($control_gradient['to']) ? $control_gradient['to'] : ''))                                  
                                .'&amp;footer[from]='.str_replace('#','',(isset($footer['from']) ? $footer['from'] : ''))
                                .'&amp;footer[to]='.str_replace('#','',(isset($footer['to']) ? $footer['to'] : ''))
                                .'&amp;dynabg='.urlencode((isset($dynabg) ? $dynabg : ''));
        ?>
        <link rel="stylesheet" type="text/css" media="all"
              href="<?php echo plugins_url(); ?>/katapult-<?php echo str_replace('.css','',$css_select); ?>/theme-dynacss.php<?php echo $uri;?>" />
        <?php
        }
    }
} else { ?>
    <link rel="stylesheet" type="text/css" media="all"
    href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.css" /><!-- Test -->
    <?php
} 
?>
<!-- / Color Sheme -->

<!-- Custom -->
<?php if(isset($custom_css)):?>
  <style>
  <?php
  echo $custom_css;
  ?>
  </style>
<?php endif;?>
<?php if(isset($custom_js)):?>
  <script>
  <?php
  echo $custom_js;
  ?>
  </script>
<?php endif;?>
<!-- / Custom -->

<!-- End Styling Options -->
<?php wp_head(); ?>
</head>
<div class="crosstec-box red none" style="text-align:left; width:100%;"> 
    <a href="http://crosstec.de/en/wordpress/wordpress-themes.html">Get the full version with color setup and slider here</a>
</div>
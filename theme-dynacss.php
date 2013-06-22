<?php
header('Content-Type: text/css');

$bg_color           = isset($_GET['bg_color'])        && $_GET['bg_color']        != '' ? $_GET['bg_color']        : 'FFFFFF';
$body_color         = isset($_GET['body_color'])      && $_GET['body_color']      != '' ? $_GET['body_color']      : 'FFFFFF';
$heading_color      = isset($_GET['heading_color'])   && $_GET['heading_color']   != '' ? $_GET['heading_color']   : 'BBFF00';
$accent_color       = isset($_GET['accent_color'])    && $_GET['accent_color']      != '' ? $_GET['accent_color']      : 'FFFFFF';
$g_family           = isset($_GET['g_family'])        && $_GET['g_family']        != '' ? $_GET['g_family']        : 'Arimo';
$border_color       = isset($_GET['border_color'])    && $_GET['border_color']    != '' ? $_GET['border_color']    : 'A6A6A6';
$menu_gradient      = isset($_GET['menu_gradient'])   && $_GET['menu_gradient']   != '' ? $_GET['menu_gradient']   : array('from' => '96A4B0', 'to' => '667888');
$menu_color         = isset($_GET['menu_color'])      && $_GET['menu_color']      != '' ? $_GET['menu_color']      : 'ffffff';
$menu_hover         = isset($_GET['menu_hover'])      && $_GET['menu_hover']      != '' ? $_GET['menu_hover']      : array('from' => 'bbff00', 'to' => '709900');
$input_color        = isset($_GET['input_color'])     && $_GET['input_color']     != '' ? $_GET['input_color']     : '8D9CAA';
$input_focus        = isset($_GET['input_focus'])     && $_GET['input_focus']     != '' ? $_GET['input_focus']     : 'bbff00';
$button_gradient    = isset($_GET['button_gradient']) && $_GET['button_gradient'] != '' ? $_GET['button_gradient'] : array('from' => '#bbff00', 'to' => '#709900');
$box1_gradient      = isset($_GET['box1_gradient'])   && $_GET['box1_gradient']   != '' ? $_GET['box1_gradient']   : array('from' => '#677989', 'to' => '#5E6F7D');
$box2_gradient      = isset($_GET['box2_gradient'])   && $_GET['box2_gradient']   != '' ? $_GET['box2_gradient']   : array('from' => '#677989', 'to' => '#5E6F7D');
$control_gradient   = isset($_GET['control_gradient'])&& $_GET['control_gradient']!= '' ? $_GET['control_gradient']: array('from' => '#709900', 'to' => '#bbff00');
$footer             = isset($_GET['footer'])          && $_GET['footer']          != '' ? $_GET['footer']          : array('from' => '#4c4c4c', 'to' => '#333333');

$dynabg          = isset($_GET['dynabg'])          && $_GET['dynabg']          != '' ? $_GET['dynabg']          : 'bg_main_01_alphablending.png';

?>
body{
background-image: url(theme-dynabg/<?php echo $dynabg?>) !important;
background-color: #<?php echo $bg_color?> !important;
color: #<?php echo $body_color;?> !important;
}
h1, h1 a { 
  border-bottom: 1px solid #<?php echo $border_color;?> !important; 
}
h1,
h1 a,
h2,
h2 a,
h3,
h3 a,
h4,
h4 a,
h5,
h5 a,
h6,
h6 a{
  color: #<?php echo $heading_color;?> !important;
  <?php if (isset($heading_color)):?>
  <?php endif;?>
}
ul.menu,
ul.menu ul,
ul.menu ul ul {
  background: #<?php echo $menu_gradient['from'];?> !important;
  background: -moz-linear-gradient(top, #<?php echo $menu_gradient['from'];?> 0%, #<?php echo $menu_gradient['to'];?> 100%) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $menu_gradient['from'];?>), color-stop(100%, #<?php echo $menu_gradient['to'];?>)) !important;
  background: -webkit-linear-gradient(top, #<?php echo $menu_gradient['from'];?> 0%, #<?php echo $menu_gradient['to'];?> 100%) !important;
  background: -o-linear-gradient(top, #<?php echo $menu_gradient['from'];?> 0%, #<?php echo $menu_gradient['to'];?> 100%) !important;
  background: -ms-linear-gradient(top, #<?php echo $menu_gradient['from'];?> 0%, #<?php echo $menu_gradient['to'];?> 100%) !important;
  background: linear-gradient(top, #<?php echo $menu_gradient['from'];?> 0%, #<?php echo $menu_gradient['to'];?> 100%) !important;
}

ul.menu li a,
ul.menu li span {
  color: #<?php echo $menu_color;?>!important;
}

ul.menu ul li a,
ul.menu ul li span {
  color: #<?php echo $menu_color;?>!important;
}
ul.menu li:hover > a,
ul.menu li:hover > span,
ul.menu li.current > a,
ul.menu li.current > span, 
ul.menu li.active > a,
ul.menu li.active > span,
ul.menu li ul li:hover > a,
ul.menu li ul li:hover > span,
ul.menu li ul li.current > a, 
ul.menu li ul li.current > span, 
ul.menu li ul li.active > a,
ul.menu li ul li.active > span,
ul.menu li ul li ul li:hover > a,
ul.menu li ul li ul li:hover > span,
ul.menu li ul li ul li.current > a, 
ul.menu li ul li ul li.current > span, 
ul.menu li ul li ul li.active > a,
ul.menu li ul li ul li.active > span,
ul.autocompleter-choices li.autocompleter-selected { 
  background: #<?php echo $menu_hover['from'];?> !important;
  background: -moz-linear-gradient(top,  #<?php echo $menu_hover['from'];?> 0%, #<?php echo $menu_hover['to'];?> 100%) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $menu_hover['from'];?>), color-stop(100%, #<?php echo $menu_hover['to'];?>)) !important;
  background: -webkit-linear-gradient(top, #<?php echo $menu_hover['from'];?> 0%, #<?php echo $menu_hover['to'];?> 100%) !important;
  background: -o-linear-gradient(top, #<?php echo $menu_hover['from'];?> 0%, #<?php echo $menu_hover['to'];?> 100%) !important;
  background: -ms-linear-gradient(top, #<?php echo $menu_hover['from'];?> 0%, #<?php echo $menu_hover['to'];?> 100%) !important;
  background: linear-gradient(top, #<?php echo $menu_hover['from'];?> 0%, #<?php echo $menu_hover['to'];?> 100%) !important;


  color: #ffffff;
  text-shadow: 0px -1px 0px rgba(0,0,0,0.3);
}

#ct_headerSearch .search input, #ct_headerSearch .finder input{
background-color: #<?php echo $input_color;?> !important;
}
input[type='text'], input[type='password'], input[type='email'], input[type='text'], select, textarea {
background-color: #<?php echo $input_color;?> !important;
}
input[type='text']:hover, 
input[type='password']:hover, 
input[type='email']:hover, 
input[type='text']:focus, 
input[type='password']:focus, 
input[type='email']:focus,
select:focus, 
textarea:focus {
  -moz-box-shadow: 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?> !important;
  -webkit-box-shadow: 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?> !important;
  box-shadow: 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?>, 0px 0px 3px 0px #<?php echo $input_focus;?> !important;
}
input.button, button, .btn {
background: #<?php echo $button_gradient['to'];?> !important;
background: -moz-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $button_gradient['from'];?>), color-stop(100%, #<?php echo $button_gradient['to'];?>)) !important;
background: -webkit-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%)!important;
background: -o-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background: -ms-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background: linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
}

#login-form.compact .button{
background: #<?php echo $button_gradient['to'];?> !important;
background-image: url(images/bg_btn_login.png), -moz-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background-image: url(images/bg_btn_login.png), -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $button_gradient['from'];?>), color-stop(100%, #<?php echo $button_gradient['to'];?>)) !important;
background-image: url(images/bg_btn_login.png), -webkit-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%)!important;
background-image: url(images/bg_btn_login.png), -o-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background-image: url(images/bg_btn_login.png), -ms-linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
background-image: url(images/bg_btn_login.png), linear-gradient(top, #<?php echo $button_gradient['from'];?> 0%, #<?php echo $button_gradient['to'];?> 100%) !important;
}


.box1{
background: #<?php echo $box1_gradient['from'];?> !important;
background: -moz-linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $box1_gradient['from'];?>), color-stop(100%, #<?php echo $box1_gradient['to'];?>));
background: -webkit-linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
background: -o-linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
background: -ms-linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
background: linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
-pie-background: linear-gradient(top, #<?php echo $box1_gradient['from'];?> 0%, #<?php echo $box1_gradient['to'];?> 100%);
}


.box2{
background: #<?php echo $box2_gradient['from'];?> !important;
background: -moz-linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $box2_gradient['from'];?>), color-stop(100%, #<?php echo $box2_gradient['to'];?>));
background: -webkit-linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
background: -o-linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
background: -ms-linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
background: linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
-pie-background: linear-gradient(top, #<?php echo $box2_gradient['from'];?> 0%, #<?php echo $box2_gradient['to'];?> 100%);
}

.flex-control-nav li a.flex-active ,
.flex-control-nav li a:hover {
  background: #<?php echo $control_gradient['from'];?> !important;
  background: -moz-linear-gradient(top,  #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #<?php echo $control_gradient['from'];?>), color-stop(100%, #<?php echo $control_gradient['to'];?>));
  background: -webkit-linear-gradient(top, #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%);
  background: -o-linear-gradient(top, #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%);
  background: -ms-linear-gradient(top, #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%);
  background: linear-gradient(top, #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%); 
  -pie-background: linear-gradient(top,  #<?php echo $control_gradient['from'];?> 0%, #<?php echo $control_gradient['to'];?> 100%);
}



.crosstec-testimonial-content:after{
/*border-bottom: 15px solid #<?php echo $accent_color;?> !important;
border-top: 15px solid #<?php echo $accent_color;?> !important;*/
border-right: 15px solid #<?php echo $accent_color;?> !important;
}


.staff-meta{
background:#<?php echo $accent_color;?> !important;
}
.staff-meta:after{
  border-top: 10px solid #<?php echo $accent_color;?> !important;
}

.crosstec-callout{
  background: #<?php echo $accent_color;?> !important;
}

.crosstec-callout-caption { 

border-left: 5px solid <?php echo $heading_color;?> !important;
}

#service-tabs li.active a{
    background: #<?php echo $heading_color;?> !important;
    color: #<?php echo $body_color;?> !important;
}

#service-tabs li a{
    color: #<?php echo $body_color;?> !important;
  }
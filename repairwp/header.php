<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">

 *
 * @package WordPress

 * @subpackage Trekking India

 * @since Trekking India 1.0

 */

?>

<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) | !(IE 8)  ]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width"/>

<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php if(get_the_ID() == 213){

?>

<meta name="robots" content="noindex, nofollow">

<?php

}?>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favi.ico" type="image/ico" />

<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">

<title><?php wp_title( '', true, 'right' ); ?></title>

<meta property="fb:admins" content="569290557" />
<meta property="fb:app_id" content="1076465339085485" />
 <meta property="og:type"   content="website" /> 

<!--<script  type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/float.js"></script>-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>

<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>

<![endif]-->

<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=1076465339085485&version=v2.0";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75728474-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

  gtag('config', 'UA-75728474-1');

  gtag('config', 'AW-830661918');

</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<a href="<?=$value;?>" style="display:none;"><?=$key;?></a><br>
<?php endforeach; */ ?>
<div id="warpper">
<!--header-outer-start-->
<div class="header-outer">



<!--nav-start-->





<div class="nav">

<ul >



<li><a class="nmem" href="#">MENU</a>



<!--sub-menu-start-->



<ul class="sub-menu">



<?php wp_nav_menu( array( 'theme_location' => 'tertiary' ) ); ?>



 </ul>



<!--sub-menu-start-->



</li>



</ul>



</div>
<div class="nav mainmenu">





<ul >



<li><a class="cmem" href="#">CATEGORIA</a>



<!--sub-menu-start-->



<ul class="sub-menu">



<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>



 </ul>



<!--sub-menu-start-->



</li>



</ul>

</div>
<!--nav-end-->



<!--quik-link-start-->



<div class="quik-link">



<ul>



<li><img src="<?php echo get_template_directory_uri(); ?>/images/massage-icon.jpg" alt="image"><a href="mailto:atendimento@educabras.com">atendimento@educabras.com</a></li>






</ul>



<div class="header-icon">



<ul>



<li><a href="https://www.facebook.com/PortalEducaBras/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/head-fb.png" alt="image"></a></li>



<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/head-in.png" alt="image"></a></li>



<li><a href="https://twitter.com/PortalEducabras" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/head-t.png" alt="image"></a></li>



<li><a href="#" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/head-g.png" alt="image"></a></li>



</ul>



</div>



</div>



<!--quik-link-end-->



<!--header-start-->



<div class="header">



<!--logo-start-->



<div class="logo"><a href="https://www.educabras.com"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo-image"></a></div>



<!--logo-end-->



</div>



<!--header-end-->



<!--search-box-->



<div class="search-box">



<div class="search-box-2">



<form role="search" type="text" method="get" action="<?php echo home_url( '/' ); ?>">



<input type="search"  placeholder="buscar no blog" value="" name="s" title="Search for:" />



<input type="submit" value=" search" />



</form>



</div>



</div>



<!--search-box-->



</div>
<!--header-outer-end-->
<div id="main" class="site-main">
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Restara
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<a class="skip-link screen-reader-text" href="#content_navigator">
<?php esc_html_e( 'Skip to content', 'skt-restara' ); ?>
</a>
<?php
	$header_trans = esc_html(get_theme_mod('option_header_transparent', 1));
	$header_trans_inner = esc_html(get_theme_mod('option_inner_header_transparent', 1));
	$showpagebanner = esc_html(get_theme_mod('inner_page_banner_option', 1));
	$showpostbanner = esc_html(get_theme_mod('inner_post_banner_option', 1));
	$pagethumb = esc_html(get_theme_mod('inner_page_banner_thumb'));
	$postthumb = esc_html(get_theme_mod('inner_post_banner_thumb'));
?>
<div id="main-set">
<div class="header <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transheader');}elseif(!is_home() && !is_front_page() && $header_trans_inner == '') {echo esc_html('transheader');}?>">
	<div class="container">
    <div class="logo">
		<?php skt_restara_the_custom_logo(); ?>
        <div class="clear"></div>
		<?php	
        $description = get_bloginfo( 'description', 'display' );
        ?>
        <div id="logo-main">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <h2 class="site-title"><?php bloginfo('name'); ?></h2>
        <?php if ( $description || is_customize_preview() ) :?>
        <p class="site-description"><?php echo esc_html($description); ?></p>                          
        <?php endif; ?>
        </a>
        </div>
    </div> 
    
    <div class="menuareatop">
    	<div id="navigation"><nav id="site-navigation" class="main-navigation">
				<button type="button" class="menu-toggle">
					<span></span>
					<span></span>
					<span></span>
				</button>
		<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => 'ul', 'menu_id' => 'primary', 'menu_class' => 'primary-menu menu' ) ); ?>
			</nav></div>
    </div>
    
    <div class="heder-rightside">
            <div class="header-right-infos">
            <div class="header-extras">
            	<div class="header-search-toggle"><img src="<?php echo esc_url(get_stylesheet_directory_uri());?>/images/search-icon.png"/></div>
            	<div class="header-search-form">
                    <form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search', 'skt-restara' ); ?>" name="s">
                      <input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'skt-restara' ); ?>">
                    </form>
          		</div>
    		<div class="clear"></div>
            </div>
            <?php if ( class_exists( 'WooCommerce' ) ) { ?>
            <div class="header-cart">
            	<a class="cart-customlocation" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'skt-restara' ); ?>"> <img src="<?php echo esc_url(get_stylesheet_directory_uri());?>/images/cart-icon.png" /> <span class="custom-cart-count"><div id="mini-cart-count"></div></span> </a> 
            </div>   
            <?php } ?>
                 <div class="clear"></div>
            </div>
    </div>
        <div class="clear"></div>
        </div> <!-- container -->     
  </div>
  <div class="clear"></div> 
  
  </div><!--main-set-->
  <?php if( !is_home() && !is_front_page() && is_page()) {?>
      <div class="clear"></div>
      <div class="inner-banner-thumb <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transbanner');}elseif(!is_home() && !is_front_page() && $header_trans_inner == '') {echo esc_html('transbanner');}?>">
      	<?php if($showpagebanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($pagethumb)){ ?>
            <img src="<?php echo esc_url($pagethumb); ?>" />
            <?php } } ?>
        <?php } ?>    
        <div class="banner-container <?php if($showpagebanner != '') {?>black-title<?php }?>"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>
  <?php } ?>
  <?php if( !is_home() && !is_front_page() && !is_page() && is_single() && 'post' == get_post_type()) {?>
      <div class="clear"></div>
      <div class="inner-banner-thumb <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transbanner');}elseif(!is_home() && !is_front_page() && $header_trans_inner == '') {echo esc_html('transbanner');}?>">
      	<?php if($showpostbanner == '') {?>
        <?php 	if ( has_post_thumbnail() ) {
                    echo esc_url(the_post_thumbnail('full'));
                }else{
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }  } ?>
         <?php } ?>   
        <div class="banner-container <?php if($showpostbanner != '') {?>black-title<?php }?>"><h1><?php the_title(); ?></h1></div>
        <div class="clear"></div>
      </div>
  <?php } ?>  
  <?php if (is_category() || is_archive()) { ?>
  <div class="clear"></div>
  <div class="inner-banner-thumb <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transbanner');}elseif(!is_home() && !is_front_page() && $header_trans_inner == '') {echo esc_html('transbanner');}?>">
      	<?php if($showpostbanner == '') {?>
        <?php 
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }   ?>
         <?php } ?>   
        <div class="banner-container <?php if($showpostbanner != '') {?>black-title<?php }?>">
  	    <?php if ( class_exists( 'WooCommerce' ) ) {
		if(is_shop()) {
			?><h1><?php woocommerce_page_title(); ?></h1><?php
		}else{
		?><h1><?php the_archive_title(); ?></h1><?php	
		}
	}else{ ?>
    <h1><?php the_archive_title(); ?></h1>
    <?php } ?>	
  </div>
        <div class="clear"></div>
      </div>
  <?php } ?>  
  
  <?php if ( class_exists( 'WooCommerce' ) ) { ?>
  <?php if (is_single() && 'product' == get_post_type()) { ?>
  <div class="clear"></div>
  <div class="inner-banner-thumb <?php if( !is_home() && is_front_page() && $header_trans == '') {echo esc_html('transbanner');}elseif(!is_home() && !is_front_page() && $header_trans_inner == '') {echo esc_html('transbanner');}?>">
      	<?php if($showpostbanner == '') {?>
        <?php 
			if(!empty($postthumb)){ ?>
            <img src="<?php echo esc_url($postthumb); ?>" />
            <?php }   ?>
         <?php } ?>            
        <div class="clear"></div>
      </div>
  <?php } ?>  
  <?php } ?>  
  
  <div class="clear"></div> 
  
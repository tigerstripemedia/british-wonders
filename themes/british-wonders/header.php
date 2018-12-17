<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package british-wonders
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
 	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

	<?php wp_head(); ?>
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body id="body" <?php body_class(); ?>>
  
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'british-wonders' ); ?></a>

	<header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="/">
          <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/logo.svg" alt="British Wonders">
        </a>
        <button class="navbar-toggler navbar-custom-toggler ml-auto collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar top-bar"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <?php $loop = new WP_Query( array( 'post_type' => 'menu_items', 'orderby' => 'post_id', 'order' => 'ASC', 'posts_per_page' => -1 ) ); ?>
          
          <ul class="navbar-nav ml-auto">
            
            <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
            
            <?php
             $menu_item_icon  = get_field('menu_item_icon');
             $menu_item_url  = get_field('menu_item_url');
            ?>
          
            <li class="nav-item">
              <a class="nav-link mx-4" href="<?php echo $menu_item_url; ?>"><?php if( !empty($menu_item_icon) ) : ?><i class="<?php echo $menu_item_icon; ?> mr-1"></i> <?php endif; ?><?php echo esc_html( get_the_title() ); ?></a>
            </li>
            
            <?php endwhile; ?>
            
          </ul>
          <!--<form class="form-inline nav-search">-->
          <!--  <input class="form-control" type="search" placeholder="Search" aria-label="Search">-->
          <!--  <button class="btn btn-nav-search" type="submit"><i class="fas fa-search"></i></button>-->
          <!--</form>-->
          
          <?php echo get_search_form(); ?>
        </div>
      </nav>
    </header>
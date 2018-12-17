<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package british-wonders
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) { ?>
	<section id="article-header" >
      <div class="article-header-img" style="background: url('<?php echo the_post_thumbnail_url(); ?>');">
        <img class="blog-border" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/blog-border.png"></img>
      </div>
  </section>
  <?php } else { ?>
    <br>
    <br>
  <?php } ?>
    
    <section id="article-title">
      <div class="container">
      	<?php the_title( '<h1>', '</h1>' ); ?>
        <h6 class="text-muted"><time><?php the_last_modified_info(); ?></time> | In <?php the_category(', '); ?> | By <?php the_author(); ?> | <?php echo do_shortcode('[rt_reading_time postfix="min read" postfix_singular="min read"]'); ?></h6>
      </div>
    </section>

	<section id="article-body">
      <div class="container">
		
		    <?php the_content(); ?>
        
      </div>

        <hr class="hr">
      </div>
    </section>

</article><!-- #post-<?php the_ID(); ?> -->

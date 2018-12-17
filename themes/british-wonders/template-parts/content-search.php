<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package british-wonders
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<!-- Blog Card -->
    <div class="card">
    	
      <?php if( get_post_type() == 'travel_guide_posts' ) { ?>
          <div class="card-badge-travel">
            <i class="fas fa-map-marked-alt fa-2x"></i>
          </div>
      <?php } else { ?>
          <div class="card-badge-product">
            <i class="fas fa-shopping-bag fa-2x"></i>
          </div>
      <?php } ?>
      
      <?php if ( has_post_thumbnail() ) { ?>
      
      <?php
      $thumbnail_id = get_post_thumbnail_id( $post->ID );
      $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
      ?>
      
      <img class="card-img-top" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>">
      
      <?php } ?>
      
      <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <p class="card-text"><?php the_excerpt(); ?></p>
      </div>
      <footer class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">Read Post</a>
      </footer>
    </div>
    <!-- End Blog Card -->
	
</article><!-- #post-<?php the_ID(); ?> -->

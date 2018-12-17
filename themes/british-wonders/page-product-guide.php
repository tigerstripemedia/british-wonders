<?php

/*
    Template Name: Product Guide
*/ 

get_header();
?>

    <section id="guide-header">
      <h1>Product Guide</h1>
      <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/product-icon.svg" class="guide-header-icon" alt="Travel Guide">
    </section>

    <section id="guide-posts">
        <div class="container">
            
            <?php $loop = new WP_Query( array( 'post_type' => 'product_guide_posts', 'orderby' => 'post_id', 'order' => 'DES', 'posts_per_page' => -1 ) ); ?>
            
            <div class="row">
                
                <?php if ( $loop->have_posts() ) : ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                
                      <div class="col-lg-4 col-md-6">
                        <!-- Blog Card -->
                        <div class="card">
                          
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
                      </div>
            
                <?php endwhile;?>
                <?php else: ?>
                
                  <div class="no-posts">
                    <h4>New posts coming soon!</h4>
                  </div>
                  
                <?php endif; ?>
                <?php wp_reset_query(); ?>
      
            </div>
        </div>
    </section>

<?php get_footer(); ?>
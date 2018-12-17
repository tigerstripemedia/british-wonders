<?php

/*
    Template Name: Home Page
*/ 

get_header();
?>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        
        <?php         
        $args = array( 'post_type' => array('travel_guide_posts', 'product_guide_posts'), 'posts_per_page' => 5);
        $featured_posts = new WP_Query( $args );
        $cc = count($featured_posts);
        if ( $featured_posts->have_posts() ) :
        $i=0;
        while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
        ?>
        
        <div class="carousel-item <?php echo ($i==0)?'active':''; ?>">
          
          <?php
          $thumbnail_id = get_post_thumbnail_id( $post->ID );
          $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
          ?>
          
          <img class="d-block w-100 banner-image" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php echo $alt; ?>">
          <div class="carousel-caption">
            <h3><?php the_title(); ?></h3>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-block mx-auto">Read Post</a>
          </div>
        </div>
        
        <?php 
        $i++; 
        endwhile;
        endif;
        wp_reset_query();
        wp_reset_postdata(); ?>
        
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <section id="latest-posts">
      <div class="container">
        <h1>Latest</h1>
        
        <?php
            $latest_posts = new WP_Query( array(
            'post_type' => array('travel_guide_posts', 'product_guide_posts'),
                'posts_per_page' => 9 // put number of posts that you'd like to display
            ) );
        ?>
        
        <div class="row">
          
        <?php if ( $latest_posts->have_posts() ) : ?>
            <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
            
                  <div class="col-lg-4 col-md-6">
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
                  </div>
        
            <?php endwhile;?>
        <?php else: ?>
        
          <div class="no-posts">
            <h4>New posts coming soon!</h4>
          </div>
          
        <?php endif; ?>
        <?php wp_reset_query(); ?>
      
          
          
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-travel">-->
          <!--      <i class="fas fa-map-marked-alt fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/london.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">Top 10 Places to Visit in London</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-product">-->
          <!--      <i class="fas fa-shopping-bag fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/cushion.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">This cushion is a lifesaver for the budding traveller!</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-travel">-->
          <!--      <i class="fas fa-map-marked-alt fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/garden.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">5 stately home gardens you MUST visit this summer</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-product">-->
          <!--      <i class="fas fa-shopping-bag fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/camera.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">The top 5 cameras for your next trip</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-travel">-->
          <!--      <i class="fas fa-map-marked-alt fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/coast.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">Why the British coast is the best coast in the world!</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
          <!--<div class="col-lg-4 col-md-6">-->
            <!-- Blog Card -->
          <!--  <div class="card">-->
          <!--    <div class="card-badge-travel">-->
          <!--      <i class="fas fa-map-marked-alt fa-2x"></i>-->
          <!--    </div>-->
          <!--    <img class="card-img-top" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/house.jpg" alt="Card image cap">-->
          <!--    <div class="card-body">-->
          <!--      <h5 class="card-title">Have you ever stayed in a pink B&B?</h5>-->
          <!--      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>-->
          <!--    </div>-->
          <!--    <footer class="card-footer">-->
          <!--      <a href="#" class="btn btn-primary btn-block">Read Post</a>-->
          <!--    </footer>-->
          <!--  </div>-->
            <!-- End Blog Card -->
          <!--</div>-->
          
      </div>
    </section>
    
<?php get_footer(); ?>


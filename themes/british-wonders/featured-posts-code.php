<?php $loop = new WP_Query( array( 'post_type' => 'featured_posts', 'orderby' => 'post_id', 'order' => 'ASC', 'posts_per_page' => -1 ) ); ?>
        
        <?php while( $loop->have_posts() ) : $loop->the_post(); ?>
        
          <?php
          $posts = get_field('related_posts', false, false);
          $loop = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'post__in' => $posts, 'post_status' => 'publish', 'orderby' => 'post__in', 'order' => 'ASC' ));
          
          if($loop->have_posts()) { ?>
              <div class="posts">
          
              <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          
                  <div class="related-post">
                      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'theme'); ?></a>
                  </div>
                  
              <?php endwhile; ?>
          
          </div>
          <?php } wp_reset_query(); ?>
        
        <?php endwhile; ?>
        
        
        
        <div class="carousel-item active">
          <img class="d-block w-100 banner-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/london.jpg" alt="London">
          <div class="carousel-caption">
            <h3>Top 10 Places to Visit in London</h3>
            <a href="#" class="btn btn-outline-primary btn-block mx-auto">Read Post</a>
          </div>
        </div>
        
        <div class="carousel-item">
          <img class="d-block w-100 banner-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/house.jpg" alt="Pink House">
          <div class="carousel-caption">
            <h3>Have you ever stayed in a pink B&B?</h3>
            <a href="#" class="btn btn-outline-primary btn-block mx-auto">Read Post</a>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 banner-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/garden.jpg" alt="Garden">
          <div class="carousel-caption">
            <h3>5 stately home gardens you MUST visit this summer</h3>
            <a href="#" class="btn btn-outline-primary btn-block mx-auto">Read Post</a>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 banner-image" src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/coast.jpg" alt="British Coast">
          <div class="carousel-caption">
            <h3>Why the British coast is the best coast in the world</h3>
            <a href="#" class="btn btn-outline-primary btn-block mx-auto">Read Post</a>
          </div>
        </div>
      </div>
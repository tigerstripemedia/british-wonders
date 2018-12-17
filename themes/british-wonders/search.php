<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tiger_Stripe_Media
 */

get_header();
?>
		<section id="search-page">

			<?php if ( have_posts() ) : ?>
			
			<div class="search-header">
				<h1>Search our guides</h1>
				<!--<div class="page-title">-->
					<h3>
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Showing results for: %s', 'british-wonders' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h3>
				<!--</div>-->
			</div>
	
			<div class="search-body">
	      		<div class="container">
	        		<div class="row">
	
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
						?>	
							<div class="col-lg-4 col-md-6">
								<?php
								the_post();
				
								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );
								?>
							</div>
						<?php	
						endwhile;
			
						the_posts_navigation();
						
						?>
						
					</div>
		      	</div>
		    </div>
			
			<?php 
			else :
	
				get_template_part( 'template-parts/content', 'none' );
	
			endif;
			?>
	
					
	    
	    </section>

<?php
get_footer();

<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package british-wonders
 */

?>

<section class="no-results not-found">
	<div class="search-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'british-wonders' ); ?></h1>
	</div>

	<div class="none-search-body">
		<div class="container">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :
	
				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'british-wonders' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);
	
			elseif ( is_search() ) :
				?>
	
				<h3><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'british-wonders' ); ?></h3>
				<?php

			else :
				?>
	
				<h3><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'british-wonders' ); ?></h3>
				<?php

			endif;
			?>
		</div>
	</div><!-- .search-blog -->
</section><!-- .no-results -->

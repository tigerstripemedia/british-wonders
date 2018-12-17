<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package british-wonders
 */

?>

	<!-- Footer -->
<footer id="footer">
  <div class="footer-content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4><?php $nav_menu = wp_get_nav_menu_object(3); echo $nav_menu->name; ?></h4>
          <hr class="footer-hr">
          <?php
            wp_nav_menu( array(
                'theme_location'    => 'footer-menu',
                'menu'              => 'ul',
                'menu_class'        => 'footer-menu'
        		) );
          ?>
        </div>
        <div class="col-md-6">
          <h4>Love Exploring? Sign Up to our Newsletter!</h4>
          <hr class="footer-hr">
          <form class="footer-form" action="index.html" method="post">
            <div class="form-group">
              <label for="first-name" class="sr-only"></label>
              <input class="form-control" type="text" name="first-name" id="first-name" placeholder="First name">
            </div>
            <div class="form-group">
              <label for="email" class="sr-only"></label>
              <input class="form-control" type="email" name="email" id="email" placeholder="Email">
            </div>
            <button class="btn btn-outline-primary btn-block" type="submit" name="button">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <small>&copy; 2018 British Wonders | Website made with &#9825; by <a href="https://www.tigerstripemedia.com" target="_blank">Tiger Stripe Media</a> in partnership with <a href="https://www.flyhighmedia.co.uk" target="_blank">Fly High Media</a></small>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

<!-- Custom JS -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

</body>
</html>

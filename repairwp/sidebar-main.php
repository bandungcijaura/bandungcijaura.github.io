<?php
/**
 * The sidebar containing the footer widget area
 *
 * If no active widgets in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="sidebar-container" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->

		<div class="vertical-adsbygoogle">
			<br><br>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7900338252115916"
     crossorigin="anonymous"></script>
<!-- Vertical Ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7900338252115916"
     data-ad-slot="7327454935"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
 </div>
	</div><!-- #secondary -->
<?php endif; ?>
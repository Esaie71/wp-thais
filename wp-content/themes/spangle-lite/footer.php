<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Spangle Lite
 */
?>

<div class="site-footer">
        <div class="container">            	
            <div class="design-by">                
            <?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'spangle-lite');?>
            <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-interior-wordpress-theme/', 'spangle-lite' ) ); ?>" target="_blank">
              <?php printf( __( 'Theme by %s', 'spangle-lite' ), 'Grace Themes' ); ?>
            </a>
            </div><!--end .design-by-->      
        </div><!--end .container-->           
</div><!--end .site-footer-->
</div><!--#end site-holder-->
<?php wp_footer(); ?>
</body>
</html>
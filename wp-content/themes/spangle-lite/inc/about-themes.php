<?php
/**
 *Spangle Lite About Theme
 *
 * @package Spangle Lite
 */

//about theme info
add_action( 'admin_menu', 'spangle_lite_abouttheme' );
function spangle_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'spangle-lite'), __('About Theme Info', 'spangle-lite'), 'edit_theme_options', 'spangle_lite_guide', 'spangle_lite_mostrar_guide');   
} 

//Info of the theme
function spangle_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'spangle-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Spangle Lite is a clean, minimal, multipurpose and creative free interior design WordPress theme. This free theme is specially designed for interior design and furniture stores companies. It has attractive and minimalist design eliminates distractions and focus on your content. It is very easy to use and user friendly, also theme is translation ready.','spangle-lite'); ?></p>
          
<div class="heading-gt"><h3><?php esc_html_e('Theme Features', 'spangle-lite'); ?></h3></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'spangle-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'spangle-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'spangle-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'spangle-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'spangle-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'spangle-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'spangle-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'spangle-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( SPANGLE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'spangle-lite'); ?></a> | 
            <a href="<?php echo esc_url( SPANGLE_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'spangle-lite'); ?></a> | 
            <a href="<?php echo esc_url( SPANGLE_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'spangle-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>
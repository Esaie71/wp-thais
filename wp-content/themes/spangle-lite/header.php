<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Spangle Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$show_hdr_socialicons 	     	= get_theme_mod('show_hdr_socialicons', false);
$show_hdr_slider 	  		    = get_theme_mod('show_hdr_slider', false);
$show_services_bxes 	  	    = get_theme_mod('show_services_bxes', false);
?>
<div id="site-holder" <?php if( get_theme_mod( 'sitebox_layout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($show_hdr_slider)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'headerinner';
	}
}
else {
$inner_cls = 'headerinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>">   
<div class="header-top">
  <div class="container">
   <?php if(!dynamic_sidebar('headertopwidget')): ?>
     <div class="left">                               
       <?php 
	   $hdr_phone_text = get_theme_mod('hdr_phone_text');
	   if( !empty($hdr_phone_text) ){ ?>           		  
	   		<span class="phoneno"><i class="fas fa-phone-square"></i><?php echo esc_html($hdr_phone_text); ?></span>   
       <?php } ?>               
       <?php
	   $contact_emailid = get_theme_mod('contact_emailid');
	   if( !empty($contact_emailid) ){ ?>           		 
	   		<i class="fas fa-envelope"></i>
	   		<a href="<?php echo esc_url('mailto:'.get_theme_mod('contact_emailid')); ?>"><?php echo esc_html(get_theme_mod('contact_emailid')); ?></a>                 
       <?php } ?>   	   
     </div>
     
     <div class="right">
     <?php if( $show_hdr_socialicons != ''){ ?> 
       <div class="social-icons">                   
           <?php $spangle_lite_fb_link = get_theme_mod('spangle_lite_fb_link');
           	if( !empty($spangle_lite_fb_link) ){ ?>
           	<a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($spangle_lite_fb_link); ?>"></a>
           <?php } ?>
        
           <?php $spangle_lite_twitt_link = get_theme_mod('spangle_lite_twitt_link');
            if( !empty($spangle_lite_twitt_link) ){ ?>
            <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($spangle_lite_twitt_link); ?>"></a>
           <?php } ?>
    
          <?php $spangle_lite_gplus_link = get_theme_mod('spangle_lite_gplus_link');
            if( !empty($spangle_lite_gplus_link) ){ ?>
            <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($spangle_lite_gplus_link); ?>"></a>
          <?php }?>
    
          <?php $spangle_lite_linked_link = get_theme_mod('spangle_lite_linked_link');
            if( !empty($spangle_lite_linked_link) ){ ?>
            <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($spangle_lite_linked_link); ?>"></a>
          <?php } ?>                  
      </div><!--end .social-icons--> 
    <?php } ?> 
    </div>
     <div class="clear"></div>
    <?php endif; ?>
  </div>
</div><!--end header-top-->    

<div class="container">    
  <div class="logo">
        <?php spangle_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
  </div><!-- logo -->
  <div class="head-rightpart">
  <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','spangle-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="header-menu">                   
        <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>   
       </div><!--.header-menu -->  
 </div><!-- .head-rightpart --> 
<div class="clear"></div>  
</div><!-- container --> 
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($show_hdr_slider != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('sliderpagearea'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('sliderpagearea'.$i,true));
	  }
	}
?>                
                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<p><?php echo esc_html( wp_trim_words( get_the_content(), 20, '' ) );  ?></p> 
    <?php
    $sliderarea_readmore = get_theme_mod('sliderarea_readmore');
    if( !empty($sliderarea_readmore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($sliderarea_readmore); ?></a>
    <?php } ?>       
    </div>      
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>        
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $show_services_bxes != ''){ ?>  
<section id="pagecolumnsection">
<div class="container">                                               
<?php 
for($n=1; $n<=4; $n++) {    
if( get_theme_mod('servicespagecol'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('servicespagecol'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
	<div class="spngl_fourcolumn <?php if($n % 4 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="four-pagecontent">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<p><?php echo esc_html( wp_trim_words( get_the_content(), 18, '...' ) );  ?></p>   
		   <a class="readmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','spangle-lite'); ?></a>                               
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- .services-section-one section-->                      	      
<?php } ?>
<?php } ?>
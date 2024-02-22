<?php
/*
Plugin Name:Popup title
Description:Custom plugin for popup create
*/
?>
<?php
function enqueue_script_popup(){
    wp_enqueue_style( 'popup-style',plugins_url( '/css/popup_ti.css' , __FILE__ )  );
    wp_enqueue_script( 'popup-js',plugins_url( '/js/popup_ti.js' , __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'enqueue_script_popup');
?>
<?php
function add_content_single(){
ob_start();
$curent_product_id = get_the_id();
$product_content = get_post_meta($curent_product_id,'product_new_content',true);
$product_image = get_post_meta($curent_product_id,'product_image',true);
$product_video = get_post_meta($curent_product_id,'product_video',true);
$image_urll_get = wp_get_attachment_url($product_image);
$video_urll = wp_get_attachment_url($product_video);
?>
<div class="title_hover_test">
<div class="inner_all_content">
<?php 
if($product_content){ ?>
<div class="title_popup_content">
<span class="close_tit_popup"><img src="<?php echo site_url()?>/wp-content/uploads/2023/02/Cross.svg"></span>
<p><?php echo $product_content;?></p>
</div>	
<?php } ?>
<div class="video_or_img">
<?php
if($product_video && $product_image){?>
<video src="<?php echo $video_urll;?>" controls></video>
<?php	
}
elseif($product_video){?>  
<video src="<?php echo $video_urll;?>" controls></video>
<?php	
}
elseif($product_image){
?>
<img src="<?php echo $image_urll_get;?>">
<?php	
}

?>
</div>
</div>
</div>
<?php
	$content = ob_get_clean();
	return $content;
}
add_shortcode("single_pro_popup","add_content_single");
?>

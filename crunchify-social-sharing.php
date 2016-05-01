<?php
/*
Plugin Name: Crunchify Social Sharing
Plugin URI: http://crunchify.com/crunchify-social-sharing/
Description: Fastest & Simplest Social Sharing Button without any Script Loading - WordPress Speed Optimization Goal.
Version: 1.3
Author: Crunchify
Author URI: http://crunchify.com
Text Domain: crunchify-social-sharing
*/

/*
    Copyright (C) 2016 Crunchify.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function crunchify_social_sharing_buttons_menu(){
  add_submenu_page("options-general.php", "Crunchify Sharing", "Crunchify Sharing", "manage_options", "crunchify-social-sharing", "crunchify_social_sharing_page"); 
}

add_action("admin_menu", "crunchify_social_sharing_buttons_menu");

function crunchify_social_sharing_page(){
   ?>
      <div class="wrap">
         <h1>Social Sharing Buttons Plugin By <a href="http://crunchify.com/crunchify-social-sharing/" target="_blank">Crunchify</a></h1>
         
         <form method="post" action="options.php">
            <?php
               settings_fields("crunchify_social_sharing_config_section");
 
               do_settings_sections("crunchify-social-sharing");
                
               submit_button(); 
            ?>
         </form>
         
        <div class="postbox" style="width: 65%; padding: 20px;">
        <h3>Follow us to get latest update. DM me on Twitter for quick reply.</h3>
        <a href="https://twitter.com/Crunchify" class="twitter-follow-button" data-show-count="false">Follow @Crunchify</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

         <div id="fb-root"></div>
				<script>(function(d, s, id) {
 				 var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
 				 fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
			
		<div class="fb-like" data-href="https://www.facebook.com/Crunchify" data-width="50px" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
		</div>
      </div>
   <?php
}

function crunchify_social_sharing_buttons_settings(){
    add_settings_section("crunchify_social_sharing_config_section", "", null, "crunchify-social-sharing");
 
    add_settings_field("crunchify-social-sharing-facebook", "Enable your sharing services", "crunchify_social_sharing_checkbox", "crunchify-social-sharing", "crunchify_social_sharing_config_section");
    add_settings_field("crunchify-social-sharing-twitter-name", "More custom Options", "crunchify_social_sharing_crunchify_options", "crunchify-social-sharing", "crunchify_social_sharing_config_section");
 
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-facebook");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-twitter");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-twitter-name");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-googleplus");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-buffer");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-pinterest");

    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-crunchify-rel-nofollow");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-crunchify-custom-label");
    register_setting("crunchify_social_sharing_config_section", "crunchify-social-sharing-email");
}

function crunchify_social_sharing_checkbox(){  
   ?>
    <div class="postbox" style="width: 65%; padding: 30px;">
        <input type="checkbox" name="crunchify-social-sharing-facebook" value="1" <?php checked(1, get_option('crunchify-social-sharing-facebook'), true); ?> /> Facebook
        <br><br><input type="checkbox" name="crunchify-social-sharing-twitter" value="1" <?php checked(1, get_option('crunchify-social-sharing-twitter'), true); ?> /> Twitter
        <br><br><input type="checkbox" name="crunchify-social-sharing-googleplus" value="1" <?php checked(1, get_option('crunchify-social-sharing-googleplus'), true); ?> /> Google+
        <br><br><input type="checkbox" name="crunchify-social-sharing-buffer" value="1" <?php checked(1, get_option('crunchify-social-sharing-buffer'), true); ?> /> Buffer
        <br><br><input type="checkbox" name="crunchify-social-sharing-pinterest" value="1" <?php checked(1, get_option('crunchify-social-sharing-pinterest'), true); ?> /> Pinterest
        <br><br><input type="checkbox" name="crunchify-social-sharing-email" value="1" <?php checked(1, get_option('crunchify-social-sharing-email'), true); ?> /> Email
    </div>
   <?php
}

function crunchify_social_sharing_crunchify_options(){  
   ?>
   <div class="postbox" style="width: 65%; padding: 30px;">
        <input type="checkbox" name="crunchify-social-sharing-crunchify-rel-nofollow" value="1" <?php checked(1, get_option('crunchify-social-sharing-crunchify-rel-nofollow'), true); ?> /> add rel="nofollow" to all links
        <br><br><input type="text" name="crunchify-social-sharing-twitter-name" value="<?php echo esc_attr(get_option('crunchify-social-sharing-twitter-name')); ?>" /> Twitter Username (without @)
        <br><br><input type="text" name="crunchify-social-sharing-crunchify-custom-label" value="<?php echo esc_attr(get_option('crunchify-social-sharing-crunchify-custom-label')); ?>" /> Custom Header
   </div>
   <?php
}
 
add_action("admin_init", "crunchify_social_sharing_buttons_settings");



function add_crunchify_social_sharing_buttons($content) {
	
		// Get current page URL 
		$crunchifyURL = get_permalink();
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
        $twitterUserName = get_option("crunchify-social-sharing-twitter-name");
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via='.$twitterUserName;

		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 		$emailURL = 'mailto:?subject=' . $crunchifyTitle . '&amp;body=Check out this site: '. $crunchifyURL .'" title="Share by Email';
 
 		if(get_option("crunchify-social-sharing-crunchify-rel-nofollow") == 1){
 			$rel_nofollow = 'rel="nofollow"';
 		}else{
 			$rel_nofollow = '';
 		}
 
		// Add sharing button at the end of page/page content
		$content .= '<div style="clear:both"></div><div class="crunchify-social">';
		$content .= '<!-- Social Sharing Buttons Plugin without any Java Script Loading by Crunchify.com - START-->';
		$content .= '<h5>'.get_option("crunchify-social-sharing-crunchify-custom-label").'</h5>';
		
        if(get_option("crunchify-social-sharing-facebook") == 1){
			$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank" '. $rel_nofollow .'>Facebook</a>';
        }
        if(get_option("crunchify-social-sharing-twitter") == 1){
			$content .= '<a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank" '. $rel_nofollow .'>Twitter</a>';
        }
        if(get_option("crunchify-social-sharing-googleplus") == 1){
			$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank" '. $rel_nofollow .'>Google+</a>';
        }
        if(get_option("crunchify-social-sharing-buffer") == 1){
			$content .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank" '. $rel_nofollow .'>Buffer</a>';
        }
        if(get_option("crunchify-social-sharing-pinterest") == 1){
			$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" target="_blank" '. $rel_nofollow .'>Pin It</a>';
        }
        if(get_option("crunchify-social-sharing-email") == 1){
			$content .= '<a class="crunchify-link crunchify-email" href="'.$emailURL.'" target="_blank" '. $rel_nofollow .'>Email</a>'; 
        }
        $content .= '<!-- Social Sharing Buttons Plugin - END-->';

		$content .= '</div><div style="clear:both">';
		return $content;
};

add_filter( 'the_content', 'add_crunchify_social_sharing_buttons');

function crunchify_social_sharing_style() 
{
    wp_register_style("crunchify-social-sharing-style-file", plugin_dir_url(__FILE__) . "crunchify-social-sharing.css");
    wp_enqueue_style("crunchify-social-sharing-style-file");
}

add_action("wp_enqueue_scripts", "crunchify_social_sharing_style");
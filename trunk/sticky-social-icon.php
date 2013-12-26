<?php
/*
Plugin Name: Sticky Social Icon
Plugin URI: http://viaviweb.com
Description: Sticky social icon is a simple container of social media icons, glued to the right side of the browser window. 
Version: 1.0
Author: viaviwebtech
Author URI: http://viaviweb.com
Wordpress version supported: 3.0 and above
License: GPL2
*/

include("installation-sticky-social-icon.php");

register_activation_hook (__FILE__,'stickysocialicon_install');
register_deactivation_hook (__FILE__,'stickysocialicon_uninstall');


//Admin menu
if ( is_admin() ) {
    add_action('admin_menu', 'stickysocialicon_admin_create_menu');
}


/**
 *  Create admin menu
 */
function stickysocialicon_admin_create_menu()
{
    add_menu_page('Sticky Social Icon', 'Sticky Social Icon', 'administrator', 'sticky-social-icon-setting', 'sticky_social_icon_setting_form',plugins_url('/sticky-social-icon/icon/icon_pref_settings.png',1));
}

function stickysocialicon_script() {
	
	wp_enqueue_script( 'wp-color-picker' );
        // load the minified version of custom script
        wp_enqueue_script( 'stickysocialicon-color', plugins_url( 'js/cp-demo-script.min.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), '1.1', true );
        wp_enqueue_style( 'wp-color-picker' );
}
add_action('init', 'stickysocialicon_script');
/**
 *  Load the setting from
 */
function sticky_social_icon_setting_form()
{
    include("sticky-social-icon-setting-form.php");
}


//Main function Sticky Social Icon
add_action('wp_head', 'sticky_social_icon_css');

//CSS
function sticky_social_icon_css() {
?>
<style type="text/css">
    .sticky-container {
		/*background-color: #333;*/
		padding: 0px;
		margin: 0px;
		position: fixed;
		right: -129px;
		top:130px;
		width: 200px;

	}

	.sticky li {
		list-style-type: none;
		//background-color: #333;
		color: #efefef;
		height: 43px;
		padding: 0px;
		margin: 0px 0px 1px 0px;
		-webkit-transition:all 0.25s ease-in-out;
		-moz-transition:all 0.25s ease-in-out;
		-o-transition:all 0.25s ease-in-out;
		transition:all 0.25s ease-in-out;
		cursor: pointer;
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale");
                filter: gray;
                -webkit-filter: grayscale(100%);
				

	}

	.sticky li:hover {
		margin-left: -115px;
		/*-webkit-transform: translateX(-115px);
		-moz-transform: translateX(-115px);
		-o-transform: translateX(-115px);
		-ms-transform: translateX(-115px);
		transform:translateX(-115px);*/
		/*background-color: #8e44ad;*/
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
                -webkit-filter: grayscale(0%);
	}

	.sticky li a img {
		float: left;
		margin: 5px 5px;
		margin-right: 10px;

	}

	.sticky li a p {
		padding: 0px;
		margin: 0px;
		text-transform: uppercase;
		line-height: 43px;
        text-decoration: none !important;
        color: #ECF0F1;
        font-family: "Lato";
    }
</style>
<?php
}

//HTML
add_action( 'get_footer', 'sticky_social_icon_html' );

function sticky_social_icon_html() {
    global $wpdb;
    $stickySocialIconTable  = $wpdb->prefix . "sticky_social_icon";
    $result = $wpdb->get_results("SELECT * FROM {$stickySocialIconTable} WHERE id = 1");
    $links   = get_object_vars($result[0]);
    unset($links['id']);	
    unset($links['update_date']);
?>
<div class="sticky-container">
    <ul class="sticky">
        <?php foreach($links as $name => $link) : ?>
            <?php if(!empty($link)): ?>
           		
                <?php if($name!="color_th"):?>
                     <li style="background-color:<?php echo $links['color_th']; ?>">
                        <a target="_blank" href="<?php echo $link ?>">
                            <img width="32" height="32" alt="" src="<?php echo plugins_url('/sticky-social-icon/icon/'. $name .'.png', 1) ?>" />
                            <p><?php echo ucfirst($name) ?></p>
                        </a>
                    </li>
           		 <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>
<?php
}

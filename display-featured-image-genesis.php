<?php
/**
 * Simple plugin to vary how the post/page featured image displays
 *
 * @package   DisplayFeaturedImageGenesis
 * @author    Robin Cornett <hello@robincornett.com>
 * @license   GPL-2.0+
 * @link      http://robincornett.com
 * @copyright 2014-2015 Robin Cornett Creative, LLC
 *
 * @wordpress-plugin
 * Plugin Name:       Display Featured Image for Genesis
 * Plugin URI:        http://github.com/robincornett/display-featured-image-genesis/
 * Description:       This plugin works within the Genesis Framework, to display featured images in beautiful and dynamic ways.
 * Version:           2.0.0
 * Author:            Robin Cornett
 * Author URI:        http://robincornett.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Include classes
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-admin.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-common.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-description.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-output.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-rss.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-settings.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-displayfeaturedimagegenesis-taxonomies.php';

// Instantiate dependent classes
$displayfeaturedimagegenesis_admin       = new Display_Featured_Image_Genesis_Admin();
$displayfeaturedimagegenesis_common      = new Display_Featured_Image_Genesis_Common();
$displayfeaturedimagegenesis_description = new Display_Featured_Image_Genesis_Description();
$displayfeaturedimagegenesis_output      = new Display_Featured_Image_Genesis_Output();
$displayfeaturedimagegenesis_rss         = new Display_Featured_Image_Genesis_RSS();
$displayfeaturedimagegenesis_settings    = new Display_Featured_Image_Genesis_Settings();
$displayfeaturedimagegenesis_taxonomies  = new Display_Featured_Image_Genesis_Taxonomies();

$displayfeaturedimage = new Display_Featured_Image_Genesis(
	$displayfeaturedimagegenesis_admin,
	$displayfeaturedimagegenesis_common,
	$displayfeaturedimagegenesis_description,
	$displayfeaturedimagegenesis_output,
	$displayfeaturedimagegenesis_rss,
	$displayfeaturedimagegenesis_settings,
	$displayfeaturedimagegenesis_taxonomies
);

$displayfeaturedimage->run();

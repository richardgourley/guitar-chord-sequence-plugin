<?php
/*
* Plugin Name: Guitar Chord Sequence Plugin
* Plugin URI: http://wprevs.com
* Description: A plugin for guitarists that creates a part of a page or post, where chord sequences of different lengths can be generated at the click of a button. It can be useful for practicing the guitar or even writing songs.   
* Author: wprevs.com
* Version: 1.0.0
* Author URI: http://wprevs.com
* License: GPLv2 or later
*/

if(!defined( 'ABSPATH' )) exit;

//Here we add in our init classes for registering CPT, JS files, CSS files and 
require_once
dirname( __FILE__ ) . '/classes-init/class-gcs-custom-post-type-initializer.php';
require_once
dirname( __FILE__ ) . '/classes-init/class-gcs-scripts-initializer.php';
require_once
dirname( __FILE__ ) . '/classes-init/class-gcs-posts-initializer.php';
require_once
dirname( __FILE__ ) . '/classes-deactivate/class-gcs-deactivation.php';
require_once
dirname( __FILE__ ) . '/classes-model/class-gcs-model.php';

//model class contains methods with db interaction
$gcs_model_class = new GCS_Model();

//initializes js and css on load (Model class passed in as param)
$gcs_scripts_initializer = new GCS_Scripts_Initializer( $gcs_model_class );

//registers the custom post type (key_chord_grouping)
$gcs_cpt_initializer = new GCS_Custom_Post_Type_Initializer();
//Flush and re-writes rules only ONCE on plugin activation
register_activation_hook( __FILE__, array( $gcs_cpt_initializer, 'rewrite_rules' ) );

//insert key_chord_grouping posts into db, with chords saved to postmeta table
$gcs_posts_initializer = new GCS_Posts_Initializer();
register_activation_hook( __FILE__, array( $gcs_posts_initializer, 'generate_posts' ) );

//deactivation class unregisters post type on plugin deactivation
$gcs_plugin_deactivation = new GCS_Plugin_Deactivation();
register_deactivation_hook( __FILE__, array( $gcs_plugin_deactivation, 'remove_custom_post_type' ) );

function display_chord_sequence_plugin(){
    $html .= '<div id="chordSequenceDisplayDiv"></div>';
    return $html;
}

add_shortcode( 'display_chord_sequence_plugin_display', 'display_chord_sequence_plugin' );


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

//initializes js and css on load (Model class method passed in as param)
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

function get_chord_groupings(){
    /*$chord_groupings = [];
    $query = new WP_Query( array( 'post_type' => 'key_chord_grouping' ) );

    foreach( $query->posts as $key_chord_grouping ){
        $chord_grouping = [];
        $chord_grouping['title'] = $key_chord_grouping->post_title;
        $post_meta = get_post_meta( $key_chord_grouping->ID );
        $chord_grouping['post_meta'] = $post_meta;
        array_push( $chord_groupings, $chord_grouping );
    }
    return $chord_groupings;*/
    return array( 1,2,3,4,5 );
}

function display_chords( $chord_groupings ){
    $output = '';
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['chord_grouping'] )){
        foreach( $chord_groupings as $chord_grouping ){
            if( $_POST['chord_grouping'] == $chord_grouping['name']){
                $output .= '<h3>' . shuffle_chords( $chord_grouping['chords'] ) . '</h3>';
            }
        }   
    }
    return $output;
}

function display_chord_grouping_buttons(){
    $html = '';
    foreach( get_chord_groupings() as $chord_grouping ){
        $html .= '<div>';
        $html .= '<button class="chord-button" '; 
        $html .= 'id="button' . $chord_grouping['name'] . '">';
        $html .= $chord_grouping['name'] . '</button>';
        $html .= '</div>';
    }
    $html .= '<div id="chordSequenceDisplayDiv"></div>';
    return $html;
}

add_shortcode( 'display_chord_buttons', 'display_chord_grouping_buttons' );


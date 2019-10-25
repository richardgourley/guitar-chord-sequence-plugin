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

//Here we add in our init classes for registering CPT, metaboxes and js, css etc.
require_once
dirname( __FILE__ ) . '/classes-init/class-gcs-custom-post-type-initializer.php';
require_once
dirname( __FILE__ ) . '/classes-init/class-gcs-scripts-initializer.php';

$gcs_scripts_initializer = new GCS_Scripts_Initializer( get_chord_groupings() );

function get_chord_groupings(){
    $chord_groupings = array(
        array(
            'name' => '3 major chords',
            'num_chords' => '3',
            'chords' => array(
                'G', 'D', 'C'
            )
        ),
        array(
            'name' => '3 major chords and A minor',
            'num_chords' => '4',
            'chords' => array(
                'G', 'D', 'C', 'Am'
            )
        ),
        array(
            'name' => '3 major chords and E minor',
            'num_chords' => '4',
            'chords' => array(
                'G', 'D', 'C', 'Em'
            )
        )
    );

    return $chord_groupings;
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


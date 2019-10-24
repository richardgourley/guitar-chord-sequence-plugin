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

//Here we add in our init classes for registering CPT and metaboxes

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

function shuffle_chords( $chords ){
    $output = '';
    shuffle( $chords );
    foreach( $chords as $chord ){
        $output .= $chord . ' ';
    }
    return $output;
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
    $chord_groupings = get_chord_groupings();

    $chord_grouping_buttons = '';
    $output = '';

    foreach( $chord_groupings as $chord_grouping ){
        $admin_post_url = esc_url( admin_url('admin-post.php') );
        $chord_grouping_buttons .= '<form method="post" action="' . get_permalink() . '">';
        $chord_grouping_buttons .= '<input type="submit" id="chord_grouping" name="chord_grouping" value="' . 
        $chord_grouping['name'] . '">';
        //$chord_grouping_buttons .= '<input type="hidden" name="action" value="contact_form_test">';
        $chord_grouping_buttons .= '</form>';
        //$chord_grouping_buttons .= '<br><br>';
    }
    //var_dump( $_POST );

    $output .= display_chords( $chord_groupings );

    return $output . $chord_grouping_buttons;
}

//add_action( 'admin_post_contact_form_test', 'test_form' );
add_shortcode( 'display_chord_buttons', 'display_chord_grouping_buttons');


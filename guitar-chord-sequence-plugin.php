<?php
/*
* Plugin Name: Guitar Chord Sequence Plugin
* Plugin URI: http://wprevs.com
* Description: A plugin for guitarists that creates a page where chord sequences of different lengths are generated at the click of a button. It can be useful for practicing the guitar or even writing songs.   
* Author: wprevs.com
* Version: 1.0.0
* Author URI: http://wprevs.com
* License: GPLv2 or later
*/

function choose_chord_grouping(){
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


    $chord_grouping_buttons = '';

    foreach( $chord_groupings as $chord_grouping ){
        $php_self = $_SERVER['PHP_SELF'];
        $chord_grouping_buttons .= '<form method="post" action="' . esc_url( admin_url('admin-post.php') ) . '">';
        $chord_grouping_buttons .= '<input type="submit" name="' . $chord_grouping['name'] . '" value="' . $chord_grouping['name'] . '"';
        $chord_grouping_buttons .= '<input type="hidden" name="action" value="guitar_chord_form"';
        $chord_grouping_buttons .= '</form>';
        $chord_grouping_buttons .= '<br><br>';
    }

    return $chord_grouping_buttons;
}



add_action( 'admin_post_nopriv_guitar_chord_form', 'test_form_working' );
add_shortcode( 'select_a_chord_grouping', 'choose_chord_grouping');

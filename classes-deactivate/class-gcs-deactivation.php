<?php

class GCS_Plugin_Deactivation{
    public function __construct(){
        
    }

    /******
    Unregisters 'key_chord_grouping' custom post type on plugin deactivation
    *******/
    public function remove_custom_post_type(){
        unregister_post_type( 'key_chord_grouping' );
        flush_rewrite_rules();
    }
}
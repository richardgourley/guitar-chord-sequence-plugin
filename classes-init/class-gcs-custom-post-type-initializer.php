<?php
class GCS_Custom_Post_Type_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'add_key_chord_grouping_post_type' ));
    }

    //To be called once on plugin activation
    public function rewrite_rules(){

    }

    public function add_key_chord_grouping_post_type(){

    }
}
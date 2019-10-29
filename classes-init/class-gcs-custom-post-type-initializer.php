<?php
class GCS_Custom_Post_Type_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'add_chord_grouping_post_type' ));
    }
}
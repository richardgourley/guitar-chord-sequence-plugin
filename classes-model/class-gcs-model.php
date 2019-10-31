<?php
class GCS_Model{

	public function __construct( ){
		
	}
    
    /************
    * @returns: Array - chord groupings with post meta saved in an array
    *************/
    public function get_chord_groupings(){
        $query = new WP_Query( 'post_type' => 'key_chord_grouping' );
    }

	
}
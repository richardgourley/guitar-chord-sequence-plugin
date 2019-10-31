<?php
class GCS_Model{

	public function __construct( ){
		
	}
    
    /************
    * @returns: Array - chord groupings with post meta saved in an array
    *************/
    public function get_chord_groupings(){
        $chord_groupings = [];
        $pt_query = new WP_Query( array( 'post_type' => 'key_chord_grouping' ) );

        foreach( $pt_query->posts as $key_chord_grouping ){
            $chord_grouping = [];
            $chord_grouping['title'] = $key_chord_grouping->post_title;
            $post_meta = get_post_meta( $key_chord_grouping->ID );
            $chord_grouping['post_meta'] = $post_meta;
            array_push( $chord_groupings, $chord_grouping );
        }
        return $chord_groupings;
    }

	
}
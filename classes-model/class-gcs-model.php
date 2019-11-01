<?php
class GCS_Model{

	public function __construct( ){
		
	}
    
    /************
    * @returns: Array - chord groupings with post meta saved in an array
    *************/
    public function get_chord_groupings(){
        
        $chord_groupings = [];
        $query = new WP_Query( array( 'post_type' => 'key_chord_grouping' ) );

        foreach( $query->posts as $key_chord_grouping ){
            $chord_grouping = [];
            $chord_grouping['title'] = $key_chord_grouping->post_title;
            $post_meta = get_post_meta( $key_chord_grouping->ID );
            $chord_grouping['root_major'] = $post_meta['root_major'][0];
            $chord_grouping['root_minor'] = $post_meta['root_minor'][0];
            $chord_grouping['major2'] = $post_meta['major2'][0];
            $chord_grouping['major3'] = $post_meta['major3'][0];
            $chord_grouping['minor2'] = $post_meta['minor2'][0];
            $chord_grouping['minor3'] = $post_meta['minor3'][0];
            array_push( $chord_groupings, $chord_grouping );
        }

        return $chord_groupings;

    }

	
}
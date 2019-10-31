<?php
class GCS_Posts_Initializer{

	public function __construct( ){
		
	}
    
    /*********
    * Generates a 'key_chord_grouping' custom post type with a post_title of a key name (C, G, D)
    * Adds nothing to post_content
    * Adds chord names as post meta to the post
    * Each post is searchable by post_type
    * Post meta is then added to an array that is passed onto our JS file that generates chord sequences
    **********/
    public function generate_posts(){
        generate_post(
            'Key of C', 
            array(
                'root_major' => 'C',
                'root_minor' => 'Am',
                'major2' => 'F',
                'major3' => 'G',
                'minor2' => 'Dm',
                'minor3' => 'Em'
            )
        );
    }
    
    /***********
    * @params = post_title, meta_input (ARRAY OF CHORDS AS POST META)
    * returns - empty
    * Inserts a post with the paramaters provided
    ************/
    private function generate_post( $post_title, $meta_input ){
        //post_type and comment_status set without params
        $post_array = array(
            'post_title'     => $post_title,
            'post_type'      => 'key_chord_grouping',
            'comment_status' => 'closed',
            'meta_input'     => $meta_input
        );
        wp_insert_post( $post_array );
    }

	
}
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

    }
    
    /***********
    * @params = post_title, post_type, comment_status, meta_input (ARRAY OF CHORDS AS POST META)
    * returns - empty
    * Inserts a post with the paramaters provided
    ************/
    private function generate_post(){

    }

	
}
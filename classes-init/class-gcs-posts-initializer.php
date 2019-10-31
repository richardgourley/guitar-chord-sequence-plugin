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
        $this->generate_post(
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
        $this->generate_post(
            'Key of G', 
            array(
                'root_major' => 'G',
                'root_minor' => 'Em',
                'major2' => 'C',
                'major3' => 'D',
                'minor2' => 'Am',
                'minor3' => 'Bm'
            )
        );
        $this->generate_post(
            'Key of F', 
            array(
                'root_major' => 'F',
                'root_minor' => 'Dm',
                'major2' => 'Bb',
                'major3' => 'C',
                'minor2' => 'Gm',
                'minor3' => 'Am'
            )
        );
        $this->generate_post(
            'Key of E', 
            array(
                'root_major' => 'E',
                'root_minor' => 'C#m',
                'major2' => 'A',
                'major3' => 'B',
                'minor2' => 'F#m',
                'minor3' => 'G#m'
            )
        );
        $this->generate_post(
            'Key of Eb', 
            array(
                'root_major' => 'Eb',
                'root_minor' => 'Cm',
                'major2' => 'Ab',
                'major3' => 'Bb',
                'minor2' => 'Fm',
                'minor3' => 'Gm'
            )
        );
    }
    
    /***********
    * @params = post_title, meta_input (ARRAY OF CHORDS AS POST META)
    * returns - empty
    * Inserts a post with the paramaters provided
    ************/
    private function generate_post( $post_title, $meta_input ){
        //post_type, post_status and comment_status set without params
        $post_array = array(
            'post_title'     => $post_title,
            'post_type'      => 'key_chord_grouping',
            'comment_status' => 'closed',
            'post_status'    => 'publish',
            'meta_input'     => $meta_input
        );
        wp_insert_post( $post_array );
    }

	
}
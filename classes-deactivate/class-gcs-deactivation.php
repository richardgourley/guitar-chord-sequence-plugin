<?php

class GCS_Plugin_Deactivation{
    public function __construct(){
        
    }

    /******
    Unregisters 'key_chord_grouping' custom post type and deletes posts on plugin deactivation hook
    *******/
    public function de_activate_gcs_plugin(){
        $this->remove_custom_post_type();
        $this->delete_chord_grouping_posts();
    }

    private function remove_custom_post_type(){
        unregister_post_type( 'key_chord_grouping' );
        flush_rewrite_rules();
    }

    private function delete_chord_grouping_posts(){
        global $wpdb;
        $wpdb->get_results(
            "DELETE wp_posts, wp_postmeta
            FROM wp_posts 
            INNER JOIN wp_postmeta 
            ON wp_posts.ID = wp_postmeta.post_id
            WHERE wp_posts.post_type = 'key_chord_grouping'"
        );
    }
}
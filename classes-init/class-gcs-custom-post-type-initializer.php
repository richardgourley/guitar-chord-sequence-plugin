<?php
class GCS_Custom_Post_Type_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'add_key_chord_grouping_post_type' ));
    }

    //To be called once on plugin activation
    public function rewrite_rules(){
        $this->add_key_chord_grouping_post_type();
    	flush_rewrite_rules();
    }

    public function add_key_chord_grouping_post_type(){
        $labels = array(
            "name" => __( "Key Chord Grouping" ),
		    "singular_name" => __( "Key Chord Grouping" ),
		    "menu_name" => __( "Key Chord Grouping" ),
		    "all_items" => __( "All Key Chord Grouping" ),
		    "add_new" => __( "Add New" ),
		    "add_new_item" => __( "Add New Key Chord Grouping" ),
		    "edit_item" => __( "Edit Key Chord Grouping" ),
		    "new_item" => __( "New Key Chord Grouping" ),
		    "view_item" => __( "View Key Chord Grouping" ),
		    "view_items" => __( "View Key Chord Groupings" ),
		    "search_items" => __( "Search Key Chord Groupings" ),
		    "not_found" => __( "No Key Chord Groupings found" ),
		    "not_found_in_trash" => __( "No Key Chord Groupings found in trash" ),
		    "featured_image" => __( "Featured Image for the Key Chord Grouping" ),
		    "set_featured_image" => __( "Set featured image for this Key Chord Grouping" ),
		    "remove_featured_image" => __( "Remove featured image for this Key Chord Grouping" ),
		    "use_featured_image" => __( "Use featured image for this Key Chord Grouping" ),
		    "archives" => __( "Key Chord Grouping Archives" ),
		    "insert_into_item" => __( "Insert into Key Chord Grouping" ),
		    "uploaded_to_this_item" => __( "Uploaded to this Key Chord Grouping" ),
		    "filter_items_list" => __( "Filter Key Chord Groupings" ),
		    "items_list_navigation" => __( "Key Chord Groupings list navigation" ),
		    "items_list" => __( "Key Chord Groupings list" ),
		    "attributes" => __( "Key Chord Grouping attributes" ),
        );
        $args = array(
            "label" => __( "Key Chord Grouping" ),
		    "labels" => $labels,
		    "description" => "This post type will contain post meta of chords in a particular musical key.",
		    "public" => true,
		    "publicly_queryable" => true,
		    "show_ui" => false,
		    "delete_with_user" => false,
		    "show_in_rest" => true,
		    "rest_base" => "",
		    "rest_controller_class" => "WP_REST_Posts_Controller",
		    "has_archive" => false,
		    "show_in_menu" => false,
		    "show_in_nav_menus" => false,
		    "exclude_from_search" => false,
		    "capability_type" => "post",
		    "map_meta_cap" => true,
		    "hierarchical" => false,
		    "rewrite" => array( "slug" => "key_chord_grouping", "with_front" => true ),
		    "query_var" => false,
		    "supports" => array( "title", "thumbnail" ),
        );
    }
}
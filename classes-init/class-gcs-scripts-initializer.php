<?php
class GCS_Scripts_Initializer{
    protected $model_class;

	public function __construct( $model_class ){
		$this->model_class = $model_class;
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );
        add_action( 'enqueue_block_editor_assets', array( $this, 'register_chord_gutenberg_block' ) );
	}

	public function enqueue_js(){
        wp_enqueue_script(
            'gcs_button_actions_js',
            plugins_url( 'js/gcs-button-actions.js', __DIR__ ),
            array(),
            '1.0.0',
            true
        );

        wp_localize_script( 
            'gcs_button_actions_js',
            'chordGroupings',
            $this->model_class->get_chord_groupings()
        );

	}

    public function register_chord_gutenberg_block(){
        wp_enqueue_script(
          'gcs-block',
          plugins_url( 'js/gcs-block.js', __DIR__ ),
          array( 'wp-blocks', 'wp-element' ),
          true
       );
    }

	public function enqueue_css(){
        wp_enqueue_style(
            'gcs_style',
            plugins_url( 'css/styles.css', __DIR__ )
        );
	}

}
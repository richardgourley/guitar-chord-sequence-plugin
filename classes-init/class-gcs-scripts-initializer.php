<?php
class GCS_Scripts_Initializer{
    protected $model_class;

	public function __construct( $model_class ){
		$this->model_class = $model_class;
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );
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

	public function enqueue_css(){
        wp_enqueue_style(
            'gcs_style',
            plugins_url( 'css/styles.css', __DIR__ )
        );
	}

}
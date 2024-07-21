<?php
/**
 * Cookery Customizer Typography Control
 *
 * @package Cookery
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists( 'Cookery_Typography_Control' ) ) {
    
    class Cookery_Typography_Control extends WP_Customize_Control {
    
    	public $tooltip = '';
    	public $js_vars = array();
    	public $output = array();
    	public $option_type = 'theme_mod';
    	public $type = 'cookery-typography';
    
    	/**
    	 * Refresh the parameters passed to the JavaScript via JSON.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function to_json() {
    		parent::to_json();
    
    		if ( isset( $this->default ) ) {
    			$this->json['default'] = $this->default;
    		} else {
    			$this->json['default'] = $this->setting->default;
    		}
    		$this->json['js_vars'] = $this->js_vars;
    		$this->json['output']  = $this->output;
    		$this->json['value']   = $this->value();
    		$this->json['choices'] = $this->choices;
    		$this->json['link']    = $this->get_link();
    		$this->json['tooltip'] = $this->tooltip;
    		$this->json['id']      = $this->id;
    		$this->json['l10n']    = apply_filters( 'cookery_il8n_strings', array(
    			'on'                 => esc_attr__( 'ON', 'cookery' ),
    			'off'                => esc_attr__( 'OFF', 'cookery' ),
    			'all'                => esc_attr__( 'All', 'cookery' ),
    			'cyrillic'           => esc_attr__( 'Cyrillic', 'cookery' ),
    			'cyrillic-ext'       => esc_attr__( 'Cyrillic Extended', 'cookery' ),
    			'devanagari'         => esc_attr__( 'Devanagari', 'cookery' ),
    			'greek'              => esc_attr__( 'Greek', 'cookery' ),
    			'greek-ext'          => esc_attr__( 'Greek Extended', 'cookery' ),
    			'khmer'              => esc_attr__( 'Khmer', 'cookery' ),
    			'latin'              => esc_attr__( 'Latin', 'cookery' ),
    			'latin-ext'          => esc_attr__( 'Latin Extended', 'cookery' ),
    			'vietnamese'         => esc_attr__( 'Vietnamese', 'cookery' ),
    			'hebrew'             => esc_attr__( 'Hebrew', 'cookery' ),
    			'arabic'             => esc_attr__( 'Arabic', 'cookery' ),
    			'bengali'            => esc_attr__( 'Bengali', 'cookery' ),
    			'gujarati'           => esc_attr__( 'Gujarati', 'cookery' ),
    			'tamil'              => esc_attr__( 'Tamil', 'cookery' ),
    			'telugu'             => esc_attr__( 'Telugu', 'cookery' ),
    			'thai'               => esc_attr__( 'Thai', 'cookery' ),
    			'serif'              => _x( 'Serif', 'font style', 'cookery' ),
    			'sans-serif'         => _x( 'Sans Serif', 'font style', 'cookery' ),
    			'monospace'          => _x( 'Monospace', 'font style', 'cookery' ),
    			'font-family'        => esc_attr__( 'Font Family', 'cookery' ),
    			'font-size'          => esc_attr__( 'Font Size', 'cookery' ),
    			'font-weight'        => esc_attr__( 'Font Weight', 'cookery' ),
    			'line-height'        => esc_attr__( 'Line Height', 'cookery' ),
    			'font-style'         => esc_attr__( 'Font Style', 'cookery' ),
    			'letter-spacing'     => esc_attr__( 'Letter Spacing', 'cookery' ),
    			'text-align'         => esc_attr__( 'Text Align', 'cookery' ),
    			'text-transform'     => esc_attr__( 'Text Transform', 'cookery' ),
    			'none'               => esc_attr__( 'None', 'cookery' ),
    			'uppercase'          => esc_attr__( 'Uppercase', 'cookery' ),
    			'lowercase'          => esc_attr__( 'Lowercase', 'cookery' ),
    			'top'                => esc_attr__( 'Top', 'cookery' ),
    			'bottom'             => esc_attr__( 'Bottom', 'cookery' ),
    			'left'               => esc_attr__( 'Left', 'cookery' ),
    			'right'              => esc_attr__( 'Right', 'cookery' ),
    			'center'             => esc_attr__( 'Center', 'cookery' ),
    			'justify'            => esc_attr__( 'Justify', 'cookery' ),
    			'color'              => esc_attr__( 'Color', 'cookery' ),
    			'select-font-family' => esc_attr__( 'Select a font-family', 'cookery' ),
    			'variant'            => esc_attr__( 'Variant', 'cookery' ),
    			'style'              => esc_attr__( 'Style', 'cookery' ),
    			'size'               => esc_attr__( 'Size', 'cookery' ),
    			'height'             => esc_attr__( 'Height', 'cookery' ),
    			'spacing'            => esc_attr__( 'Spacing', 'cookery' ),
    			'ultra-light'        => esc_attr__( 'Ultra-Light 100', 'cookery' ),
    			'ultra-light-italic' => esc_attr__( 'Ultra-Light 100 Italic', 'cookery' ),
    			'light'              => esc_attr__( 'Light 200', 'cookery' ),
    			'light-italic'       => esc_attr__( 'Light 200 Italic', 'cookery' ),
    			'book'               => esc_attr__( 'Book 300', 'cookery' ),
    			'book-italic'        => esc_attr__( 'Book 300 Italic', 'cookery' ),
    			'regular'            => esc_attr__( 'Normal 400', 'cookery' ),
    			'italic'             => esc_attr__( 'Normal 400 Italic', 'cookery' ),
    			'medium'             => esc_attr__( 'Medium 500', 'cookery' ),
    			'medium-italic'      => esc_attr__( 'Medium 500 Italic', 'cookery' ),
    			'semi-bold'          => esc_attr__( 'Semi-Bold 600', 'cookery' ),
    			'semi-bold-italic'   => esc_attr__( 'Semi-Bold 600 Italic', 'cookery' ),
    			'bold'               => esc_attr__( 'Bold 700', 'cookery' ),
    			'bold-italic'        => esc_attr__( 'Bold 700 Italic', 'cookery' ),
    			'extra-bold'         => esc_attr__( 'Extra-Bold 800', 'cookery' ),
    			'extra-bold-italic'  => esc_attr__( 'Extra-Bold 800 Italic', 'cookery' ),
    			'ultra-bold'         => esc_attr__( 'Ultra-Bold 900', 'cookery' ),
    			'ultra-bold-italic'  => esc_attr__( 'Ultra-Bold 900 Italic', 'cookery' ),
    			'invalid-value'      => esc_attr__( 'Invalid Value', 'cookery' ),
    		) );
    
    		$defaults = array( 'font-family'=> false );
    
    		$this->json['default'] = wp_parse_args( $this->json['default'], $defaults );
    	}
    
    	/**
    	 * Enqueue scripts and styles.
    	 *
    	 * @access public
    	 * @return void
    	 */
    	public function enqueue() {
    		wp_enqueue_style( 'cookery-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.css', null );
            
            wp_enqueue_script( 'jquery-ui-core' );
    		wp_enqueue_script( 'jquery-ui-tooltip' );
    		wp_enqueue_script( 'jquery-stepper-min-js' );
    		wp_enqueue_script( 'cookery-selectize', get_template_directory_uri() . '/inc/js/selectize.js', array( 'jquery' ), false, true );
    		wp_enqueue_script( 'cookery-typography', get_template_directory_uri() . '/inc/custom-controls/typography/typography.js', array( 'jquery', 'cookery-selectize' ), false, true );
    
    		$google_fonts   = Cookery_Fonts::get_google_fonts();
    		$standard_fonts = Cookery_Fonts::get_standard_fonts();
    		$all_variants   = Cookery_Fonts::get_all_variants();
    
    		$standard_fonts_final = array();
    		foreach ( $standard_fonts as $key => $value ) {
    			$standard_fonts_final[] = array(
    				'family'      => $value['stack'],
    				'label'       => $value['label'],
    				'is_standard' => true,
    				'variants'    => array(
    					array(
    						'id'    => 'regular',
    						'label' => $all_variants['regular'],
    					),
    					array(
    						'id'    => 'italic',
    						'label' => $all_variants['italic'],
    					),
    					array(
    						'id'    => '700',
    						'label' => $all_variants['700'],
    					),
    					array(
    						'id'    => '700italic',
    						'label' => $all_variants['700italic'],
    					),
    				),
    			);
    		}
    
    		$google_fonts_final = array();
    
    		if ( is_array( $google_fonts ) ) {
    			foreach ( $google_fonts as $family => $args ) {
    				$label    = ( isset( $args['label'] ) ) ? $args['label'] : $family;
    				$variants = ( isset( $args['variants'] ) ) ? $args['variants'] : array( 'regular', '700' );
    
    				$available_variants = array();
    				foreach ( $variants as $variant ) {
    					if ( array_key_exists( $variant, $all_variants ) ) {
    						$available_variants[] = array( 'id' => $variant, 'label' => $all_variants[ $variant ] );
    					}
    				}
    
    				$google_fonts_final[] = array(
    					'family'   => $family,
    					'label'    => $label,
    					'variants' => $available_variants
    				);
    			}
    		}
    
    		$final = array_merge( $standard_fonts_final, $google_fonts_final );
    		wp_localize_script( 'cookery-typography', 'all_fonts', $final );
    	}
    
    	/**
    	 * An Underscore (JS) template for this control's content (but not its container).
    	 *
    	 * Class variables for this control class are available in the `data` JS object;
    	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
    	 *
    	 * I put this in a separate file because PhpStorm didn't like it and it fucked with my formatting.
    	 *
    	 * @see    WP_Customize_Control::print_template()
    	 *
    	 * @access protected
    	 * @return void
    	 */
    	protected function content_template(){ ?>
    		<# if ( data.tooltip ) { #>
                <a href="#" class="tooltip hint--left" data-hint="{{ data.tooltip }}"><span class='dashicons dashicons-info'></span></a>
            <# } #>
            
            <label class="customizer-text">
                <# if ( data.label ) { #>
                    <span class="customize-control-title">{{{ data.label }}}</span>
                <# } #>
                <# if ( data.description ) { #>
                    <span class="description customize-control-description">{{{ data.description }}}</span>
                <# } #>
            </label>
            
            <div class="wrapper">
                <# if ( data.default['font-family'] ) { #>
                    <# if ( '' == data.value['font-family'] ) { data.value['font-family'] = data.default['font-family']; } #>
                    <# if ( data.choices['fonts'] ) { data.fonts = data.choices['fonts']; } #>
                    <div class="font-family">
                        <h5>{{ data.l10n['font-family'] }}</h5>
                        <select id="cookery-typography-font-family-{{{ data.id }}}" placeholder="{{ data.l10n['select-font-family'] }}"></select>
                    </div>
                    <div class="variant cookery-variant-wrapper">
                        <h5>{{ data.l10n['style'] }}</h5>
                        <select class="variant" id="cookery-typography-variant-{{{ data.id }}}"></select>
                    </div>
                <# } #>   
                
            </div>
            <?php
    	}    

        protected function render_content(){
        }
    }
}
<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class WP_Job_Manager_Field_Editor_Company_Writepanels {

	private static $instance;
	public static $wp_editors;

	function __construct() {
		add_action( 'company_manager_input_wp_editor', array( $this, 'wp_editor' ), 10, 2 );
	}

	/**
	 * Singleton Instance
	 *
	 * @since 1.10.0
	 *
	 * @return WP_Job_Manager_Field_Editor_Company_Writepanels
	 */
	static function get_instance() {

		if( NULL == self::$instance ) {
			self::$wp_editors = 0;
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * WP Editor Field Output
	 *
	 *
	 * @since 1.4.0
	 *
	 * @param $key
	 * @param $field
	 */
	function wp_editor( $key, $field ){
		global $thepostid;

		if ( empty( $field[ 'value' ] ) ) $field[ 'value' ] = get_post_meta( $thepostid, $key, true );
		$name = ! empty( $field['name']) ? $field['name'] : $key;

		$args = array(
				'textarea_rows' => 4,
				'textarea_name' => $name,
				'media_buttons' => FALSE,
				'editor_class'	=> 'jmfe-element jmfe-richtext jmfe-tinymce'
		);

		/**
		 * Filter settings for WP Editor Field
		 *
		 * @since 1.4.0
		 *
		 * @param array    $args       WP Editor settings/arguuments
		 * @param string   $key        Meta key for current field
		 * @param array    $field      Field configuration
		 */
		$args = apply_filters( 'field_editor_job_manager_input_wp_editor_args', $args, $key, $field );

		// Check for priority above 99999, should mean place all WP Editor fields at bottom
		// then add a single <p> tag to add linebreak after the "Posted By" field
		if( self::$wp_editors === 0 && isset($field['priority']) && (int) $field['priority'] > 99999 && isset( $field['wpe_add_p'] ) ){
			self::$wp_editors++;
			echo '<p class="form-field"></p>';
		}

		wp_enqueue_script( 'jmfe-admin-metaboxes' );
		$full_width = get_option( 'jmfe_admin_wp_editor_full_width', FALSE ) ? 'width: 100%; padding-left: 0; padding-right: 0; margin-bottom: 12px;' : '';
		?>
		<style>.quicktags-toolbar input { width: auto !important; }</style>
		<div class="form-field form-field-wp-editor" style="<?php echo $full_width; ?>">
			<label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?>:
				<?php if( ! empty($field['description']) ) : ?>
				<span class="tips" data-tip="<?php echo esc_attr( $field['description'] ); ?>">[?]</span>
				<?php endif; ?>
			</label>
			<?php wp_editor( $field['value'], esc_attr( $key ), $args ); ?>
		</div>

		<?php

	}

}
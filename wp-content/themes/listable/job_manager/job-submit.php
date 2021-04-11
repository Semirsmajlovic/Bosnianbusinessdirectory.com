<?php
/**
 * Content for job submission (`[submit_job_form]`) shortcode.
 *
 * @package Listable
 * @version     1.30.0
 */

if (!defined( 'ABSPATH')) {
    exit;
}

// Job manager returns empty submitted jobs ids.
global $job_manager;
?>

<form action="<?php echo esc_url( $action ); ?>" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

    <!-- Trigger the needed action to start the form -->
	<?php do_action('submit_job_form_start'); ?>

    <!-- If the user can post jobs, the allow form submissions -->
	<?php if (job_manager_user_can_post_job() || job_manager_user_can_edit_job($job_id)): ?>

		<!-- Job Information Fields -->
		<?php do_action( 'submit_job_form_job_fields_start' );

		// Grab all of the job fields
		$all_fields = $job_fields;

		// Grab all of the company fields
		if ($company_fields) {
			$all_fields = $job_fields + $company_fields;
		}

		$new_all_fields = [
            'job_title' => $all_fields['job_title'],
            'company_owner' => $all_fields['company_owner'],
            'company_email' => $all_fields['company_email'],
            'job_location' => $all_fields['job_location'],
            'company_tagline' => $all_fields['company_tagline'],
            'job_description' => $all_fields['job_description'],
            'job_hours' => $all_fields['job_hours'],
            'company_phone' => $all_fields['company_phone'],
            'company_website' => $all_fields['company_website'],
            'company_instagram' => $all_fields['company_instagram'],
            'company_facebook' => $all_fields['company_facebook'],
            'job_category' => $all_fields['job_category'],
            'main_image' => $all_fields['main_image']
        ];
		?>

		<?php foreach ( $new_all_fields as $key => $field ) : ?>
			<fieldset class="fieldset-<?php echo esc_attr( $key ); ?>">
				<label for="<?php echo esc_attr( $key ); ?>">
					<?php
					if ( isset( $field['label'] ) ) {
						echo $field['label'];
					}

					echo apply_filters( 'submit_job_form_required_label', (isset($field['required'])&&$field['required']) ? '' : ' <small>' . esc_html__( '(optional)', 'listable' ) . '</small>', $field );
					?>
				</label>
				<div class="field <?php echo ( isset($field['required']) && $field['required'] ) ? 'required-field' : ''; ?>">
					<?php
					if ( isset( $field['type'] ) ) {
						get_job_manager_template( 'form-fields/' . $field['type'] . '-field.php', array( 'key' => $key, 'field' => $field ) );
					} ?>
				</div>
			</fieldset>
		<?php endforeach; ?>

		<?php do_action( 'submit_job_form_job_fields_end' ); ?>

		<!-- Company Information Fields -->
		<?php if ( $company_fields ) : ?>
			<?php do_action( 'submit_job_form_company_fields_start' ); ?>
			<?php do_action( 'submit_job_form_company_fields_end' ); ?>
		<?php endif; ?>

		<?php do_action( 'submit_job_form_end' ); ?>

		<p>
			<input type="hidden" name="job_manager_form" value="<?php echo $form; ?>" />
			<input type="hidden" name="job_id" value="<?php echo esc_attr( $job_id ); ?>" />
			<input type="hidden" name="step" value="<?php echo esc_attr( $step ); ?>" />
			<input type="submit" name="submit_job" class="button" value="<?php echo esc_attr( $submit_button_text ); ?>" />
			<?php
			if ( isset( $can_continue_later ) && $can_continue_later ) {
				echo '<input type="submit" name="save_draft" class="button secondary save_draft" value="' . esc_attr__( 'Save Draft', 'wp-job-manager' ) . '" formnovalidate />';
			}
			?>
		</p>

	<?php else : ?>

		<?php do_action( 'submit_job_form_disabled' ); ?>

	<?php endif; ?>
</form>
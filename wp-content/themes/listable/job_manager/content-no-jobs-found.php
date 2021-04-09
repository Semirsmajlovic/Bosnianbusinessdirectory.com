<?php
/**
 * The template for displaying the WP Job Manager no found message
 *
 * @package Listable
 */


$submit_listing_page_id = get_option( 'job_manager_submit_job_form_page_id', false ); ?>

<div class="no-results">
    <h2><?php esc_html_e( 'Sorry, there are no results.', 'listable' ); ?></h2>
    <p class="no-margins"><?php esc_html_e( 'Please try searching for a different categories or business tag.', 'listable' ); ?></p>

    <a class="btn clear-results-btn reset" href="<?php echo listable_get_listings_page_url(); ?>"><?php esc_html_e( 'Clear Filters ', 'listable' ); ?></a>

</div>

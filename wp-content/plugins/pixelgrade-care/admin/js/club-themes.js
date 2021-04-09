(function (window, $) {
	$(document).on('click', '.club-install-theme', function(e) {
		e.preventDefault();
		var button = $(this),
			theme = button.closest( '.theme' );

		if ( button.hasClass('disabled') || button.hasClass('updating-message') ) {
			return;
		}

		var download_url = button.data('url');
		var slug = button.data('slug');

		// Clear any previous errors
		button.closest( '.theme' ).find( '.theme-install-error' ).remove();

		// Mark this theme as being installing - this way we can style things more sanely
		theme.addClass('installed');

		// Disable the Install button, add the loading class and change the text
		button.addClass('disabled');
		button.addClass('updating-message');
		button.text('Installing...');

		// Ajax to install the theme
		$.ajax({
			url: pixcare.wpRest.endpoint.installTheme.url,
			method: pixcare.wpRest.endpoint.installTheme.method,
			beforeSend: function(xhr){
				xhr.setRequestHeader('X-WP-Nonce', pixcare.wpRest.nonce);
			},
			data: {
				download_url: download_url,
				slug: slug,
				pixcare_nonce: pixcare.wpRest.pixcare_nonce
			},
			success: function(response) {
				if ( 'success' === response.code ) {
					button.addClass('button-primary');
					button.removeClass('disabled');
					button.removeClass('club-install-theme');
					button.removeClass('updating-message');
					button.addClass('club-activate-theme');
					button.text('Activate');
				} else {
					// An error occurred
					// @todo .errors.errors is kinda dumb - we need to do a better job when returning the error data to make it easier to work with here
					if ( response.data.errors !== undefined && response.data.errors.errors !== undefined ) {
						button.removeClass('disabled');
						button.removeClass('updating-message');
						button.text('Install');

						theme.removeClass('installed');

						let error_text = '';
						// Determine the message error
						switch(Object.keys(response.data.errors.errors)[0]) {
							case 'mkdir_failed_destination':
								error_text = 'The theme could not be installed. Please check if your current user has write permissions on the themes folder of your WordPress installation.';
								break;
							case 'no_package':
								error_text = response.data.errors.errors['no_package'];
								break;
							case 'download_failed':
								error_text = response.data.errors.errors['download_failed'];
								break;
							default:
								error_text = 'An unexpected error occurred. Please contact us at help@pixelgrade.com';
								break;
						}

						// Add an error div
						button.closest( '.theme' ).find( '.theme-screenshot' ).prepend('<div class="error theme-install-error">' +  error_text + '</div>');
					}

				}
			}
		})
	});

	$(document).on('click', '.club-activate-theme', function(e) {
		e.preventDefault();

		var context = $(this);
		var slug = context.data('slug');

		// Ajax to activate the theme
		$.ajax({
			url: pixcare.wpRest.endpoint.activateTheme.url,
			method: pixcare.wpRest.endpoint.activateTheme.method,
			beforeSend: function(xhr){
				xhr.setRequestHeader('X-WP-Nonce', pixcare.wpRest.nonce);
			},
			data: {
				slug: slug,
				pixcare_nonce: pixcare.wpRest.pixcare_nonce
			},
			success: function(response) {
				if ( 'success' === response.code ) {
					// Redirect to the Appearance > Themes WordPress dashboard page
					window.location.href = pixcare.themesUrl;
				} else {
					// Add an error div
					context.closest( '.theme' ).find( '.theme-screenshot' ).prepend('<div class="error theme-install-error">' +  response.message + '</div>');
				}
			}
		})
	});
})(window, jQuery);

<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function pixcare_get_default_config( $original_theme_slug ){
	// General strings ready to be translated
	$config['l10n'] = array(
		'myAccountBtn'                                  => esc_html__( 'My account', 'pixelgrade_care' ),
		'needHelpBtn'                                   => esc_html__( 'Need help?', 'pixelgrade_care' ),
		'returnToDashboard'                             => esc_html__( 'Continue to your WordPress dashboard', 'pixelgrade_care' ),
		'nextButton'                                    => esc_html__( 'Continue', 'pixelgrade_care' ),
		'skipButton'                                    => esc_html__( 'Skip this step', 'pixelgrade_care' ),
		'notRightNow'                                   => esc_html__( 'Not right now', 'pixelgrade_care' ),
		'validationErrorTitle'                          => esc_html__( 'Something went wrong', 'pixelgrade_care' ),
		'themeValidationNoticeFail'                     => esc_html__( 'Not activated.', 'pixelgrade_care' ),
		'themeValidationNoticeOk'                       => esc_html__( 'Connected & up-to-date!', 'pixelgrade_care' ),
		'themeValidationNoticeOutdatedWithUpdate'       => esc_html__( 'Your theme is outdated, but an update is available!', 'pixelgrade_care' ),
		'themeValidationNoticeExpired'                  => esc_html__( 'Expired license.', 'pixelgrade_care' ),
		'themeValidationNoticeNotConnected'             => esc_html__( 'Not connected', 'pixelgrade_care' ),
		'themeUpdateAvailableTitle'                     => esc_html__( 'New theme update is available!', 'pixelgrade_care' ),
		'themeUpdateAvailableContent'                   => esc_html__( 'Great news! There is a new version of {{theme_name}} available.', 'pixelgrade_care' ),
		'hashidNotFoundNotice'                          => esc_html__( 'Sorry but we could not recognize your theme. This might have happened because you have made changes to the functions.php file. If that is the case - please try to revert to the original contents of that file and retry to validate your theme license.', 'pixelgrade_care' ),
		'themeUpdateButton'                             => esc_html__( 'Update now', 'pixelgrade_care' ),
		'themeChangelogLink'                            => esc_html__( 'View changelog', 'pixelgrade_care' ),
		'kbButton'                                      => esc_html__( 'Theme Help', 'pixelgrade_care' ),
		'Error500Text'                                  => esc_html__( 'Oh, snap! Something went wrong and we are unable to make sense of the actual problem.', 'pixelgrade_care' ),
		'Error500Link'                                  => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'Error400Text'                                  => esc_html__( 'There is something wrong with the current setup of this WordPress installation.', 'pixelgrade_care' ),
		'Error400Link'                                  => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/guides-and-resources/server-errors-handling',
		'missingWupdatesUpdateCodeTitle'                => esc_html__( 'You seem to be using a wrong theme variant!', 'pixelgrade_care' ),
		'missingWupdatesUpdateCode'                     => wp_kses_post( __( 'It seems that the theme you are using is <strong>not a self-hosted, premium theme of ours.</strong> Maybe it\'s a free version or a WordPress.com theme? Please <strong>use the theme you\'ve downloaded</strong> from your My Account on pixelgrade.com.', 'pixelgrade_care' ) ),
		'tamperedWupdatesCodeTitle'                     => esc_html__( 'The theme CODE has been changed!', 'pixelgrade_care' ),
		'tamperedWupdatesCode'                          => wp_kses_post( __( 'This will give you <strong>all kinds of trouble</strong> when installing updates for the theme or reaching out to our support crew. To be able to successfully install updates please <strong>use the original theme files.</strong> Make use of a child theme if you wish to modify the theme\'s code.', 'pixelgrade_care' ) ),
		'themeDirectoryChangedTitle'                    => esc_html__( 'Your theme DIRECTORY is changed!', 'pixelgrade_care' ),
		'themeDirectoryChanged'                         => wp_kses_post( __( 'This will give you <strong>all kinds of trouble</strong> when installing updates for the theme. To be able to <strong>successfully install updates</strong> please <strong>change the theme\'s directory</strong> from "{{template}}" to "{{original_slug}}".', 'pixelgrade_care' ) ),
		'themeNameChangedTitle'                         => esc_html__( 'Your theme NAME is changed!', 'pixelgrade_care' ),
		'themeNameChanged'                              => wp_kses_post( __( 'The theme name specified in the "style.css" file in the theme\'s directory is <strong>"{{stylecss_theme_name}}".</strong> The next time you <strong>update your theme</strong> this name will be <strong>changed back to "{{theme_name}}".</strong>', 'pixelgrade_care' ) ),
		'childThemeNameChanged'                         => wp_kses_post( __( 'On your next theme update, your parent theme name will be <strong>changed back to its original one: "{{stylecss_theme_name}}".</strong> To avoid issues with your child theme, you will need to <strong>update the style.css file of both your parent and child theme</strong> with <strong>the original theme name: "{{theme_name}}".</strong>', 'pixelgrade_care' ) ),
		'forceDisconnected'                             => esc_html__( 'Unfortunately, we\'ve lost your connection with pixelgrade.com. Just reconnect and all will be back to normal.', 'pixelgrade_care' ),
		'connectionLostTitle'                           => esc_html__( 'Your connection is out of sight!', 'pixelgrade_care' ),
		'connectionLost'                                => esc_html__( 'Unfortunately, we\'ve lost your connection with {{shopdomain}}. Just reconnect and all will be back to normal.', 'pixelgrade_care' ),
		'connectButtonLabel'                            => esc_html__( 'Connect to {{shopdomain}}', 'pixelgrade_care' ),
		'refreshConnectionButtonLabel'                  => esc_html__( 'Refresh your site connection', 'pixelgrade_care' ),
		'setupWizardTitle'                              => esc_html__( 'Site setup wizard', 'pixelgrade_care' ),
		'internalErrorTitle'                            => esc_html__( 'An internal server error has occurred', 'pixelgrade_care' ),
		'internalErrorContent'                          => esc_html__( 'Something went wrong while trying to process your request. Please try again.', 'pixelgrade_care' ),
		'disconnectLabel'                               => esc_html__( 'Disconnect', 'pixelgrade_care' ),
		'disconnectConfirm'                             => esc_html__( "Are you sure you want to do this?\nYou will lose the connection with {{shopdomain}}.\nBut don't worry, you can always reconnect.", 'pixelgrade_care' ),
		'componentUnavailableTitle'                     => esc_html__( 'Unavailable', 'pixelgrade_care' ),
		'componentUnavailableContent'                   => esc_html__( 'This feature is available only if your site is connected to {{shopdomain}}.', 'pixelgrade_care' ),
		'pluginInstallLabel'                            => esc_html__( 'Install', 'pixelgrade_care' ),
		'pluginActivateLabel'                           => esc_html__( 'Activate', 'pixelgrade_care' ),
		'pluginUpdateLabel'                             => esc_html__( 'Update', 'pixelgrade_care' ),
		'pluginsPlural'                                 => esc_html__( 'selected plugins', 'pixelgrade_care' ),
		'starterContentImportLabel'                     => esc_html__( 'Import starter content', 'pixelgrade_care' ),
		'starterContentImportSelectedLabel'             => esc_html__( 'Import selected', 'pixelgrade_care' ),
		'setupWizardWelcomeTitle'                       => esc_html__( 'Welcome to the site setup wizard', 'pixelgrade_care' ),
		'setupWizardWelcomeContent'                     => esc_html__( 'Go through this quick setup wizard to make sure you install all the recommended plugins and pre-load the site with helpful demo content. It\'s safe and fast.', 'pixelgrade_care' ),
		'setupWizardStartButtonLabel'                   => esc_html__( 'Let\'s get started!', 'pixelgrade_care' ),
		'authenticatorDashboardConnectTitle'            => esc_html__( 'Connect your site to Pixelgrade', 'pixelgrade_care' ),
		'authenticatorDashboardConnectContent'          => wp_kses_post( __( 'Securely connect to {{shopdomain}}, create <strong>a free account</strong>, and make sure you don\'t miss any of the following perks.
					<ul class="benefits">
						<li><i></i><span><strong>Hand-picked plugins</strong> to boost your website.</span></li>
						<li><i></i><span><strong>Starter content</strong> to make your website look like the demo.</span></li>
						<li><i></i><span><strong>Premium support</strong> to guide you through everything you need.</span></li>
                    </ul>', 'pixelgrade_care' ) ),
		'authenticatorDashboardConnectLoadingContent'   => esc_html__( 'Take a break while you securely authorize Pixelgrade Care to connect to {{shopdomain}}. It\'s going to happen in a newly open browser window or tab, just so you know.', 'pixelgrade_care' ),
		'authenticatorDashboardConnectedSuccessTitle'   => esc_html__( 'Yaaay, site connected! ????', 'pixelgrade_care' ),
		'authenticatorDashboardConnectedSuccessContent' => wp_kses_post( __( 'Well done, <strong>{{username}}</strong>! Your website is successfully connected with {{shopdomain}}. Carry on and install the recommended plugins or starter content in the blink of an eye.', 'pixelgrade_care' ) ),
		'authenticatorActivationErrorTitle'             => esc_html__( 'Something Went Wrong!', 'pixelgrade_care' ),
		'authenticatorActivationErrorContent'           => esc_html__( 'We couldn\'t properly activate your theme. Please try again later.', 'pixelgrade_care' ),
		'authenticatorErrorMessage1'                    => esc_html__( 'An error occurred. Please refresh the page to try again. Error: ', 'pixelgrade_care' ),
		'authenticatorErrorMessage2'                    => wp_kses_post( __( 'If the error persists please contact our support team at <a href="mailto:help@pixelgrade.com?Subject=Help%20with%20connecting%20my%20site" target="_top">help@pixelgrade.com</a>.', 'pixelgrade_care' ) ),
	);

	$config['setupWizard'] = array(

		'activation' => array(
			'stepName' => 'Connect',
			'blocks'   => array(
				'authenticator' => array(
					'class'  => 'full white',
					'fields' => array(
						'authenticator_component' => array(
							'title' => 'Activate {{theme_name}}!',
							'type'  => 'component',
							'value' => 'authenticator',
						),
					),
				),
			),
		),

		'theme' => array(
			'stepName' => 'Theme',
			'blocks'   => array(
				'themes' => array(
					'class'  => 'full white',
					'fields' => array(
						'theme-selector' => array(
							'title' => 'Choose a Theme',
							'type'  => 'component',
							'value' => 'theme-selector',
						),
					),
				),
			),
		),

		'plugins' => array(
			'stepName' => esc_html__( 'Plugins', 'pixelgrade_care' ),
			'blocks'   => array(
				'plugins' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'             => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Set up the right plugins', 'pixelgrade_care' ),
							'value_installing' => esc_html__( 'Setting up plugins..', 'pixelgrade_care' ),
							'value_installed' => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'All done with plugins!', 'pixelgrade_care' ) . ' ????',
							'class' => 'section__title'
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Install and activate the plugins that provide the needed functionality for your site. You can add or remove plugins later on from within the WordPress dashboard.', 'pixelgrade_care' ),
							'value_installing' => wp_kses_post( __( 'Why not take a peek at our <a href="https://twitter.com/pixelgrade" target="_blank">Twitter page</a> while you wait? (opens in a new tab and the plugins aren\'t going anywhere)', 'pixelgrade_care' ) ),
							'value_installed'  => esc_html__( 'You made it! ???? You\'ve installed and activated the plugins. You are good to jump to the next step.', 'pixelgrade_care' ),
						),
						'plugins_component' => array(
							'title' => esc_html__( 'Install Plugins', 'pixelgrade_care' ),
							'type'  => 'component',
							'value' => 'plugin-manager',
						),
					),
				),
			),
		),

		'support'   =>  array(
			'stepName'  =>  esc_html__( 'Starter content', 'pixelgrade_care' ),
			'nextText'  =>  esc_html__( 'Next Step', 'pixelgrade_care' ),
			'blocks'    =>  array(
				'support'   =>  array(
					'class'  => 'full white',
					'fields' => array(
						'title'          => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Import starter content', 'pixelgrade_care' ),
							'value_installing' => esc_html__( 'Importing starter content..', 'pixelgrade_care' ),
							'value_installed' => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade_care' ),
							'value_errored' => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade_care' ),
							'class' => 'section__title',
						),
						'head_content'   => array(
							'type'             => 'text',
							'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade_care' ),
							'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade_care' ) ),
							'value_installed'  => esc_html__( 'Mission accomplished! ???? You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade_care' ),
							'value_errored'  => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade_care' ),
						),
						'starterContent' => array(
							'type'     => 'component',
							'value'    => 'starter-content',
							'notconnected' => 'hidden',
						),
						'content'        => '',
						'links'          => '',
						'footer_content' => '',
					),
				),
			),
		),

		'ready' => array(
			'stepName' => esc_html__( 'Ready', 'pixelgrade_care' ),
			'blocks'   => array(
				'ready' => array(
					'class'  => 'full white',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Your site is ready to make an impact!', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( '<strong>Big congrats, mate!</strong> ???? Everything\'s right on track which means that you can start making tweaks of all kinds. Login to your WordPress dashboard to make changes, and feel free to change the default content to match your needs.', 'pixelgrade_care' ) ),
						),
					),
				),

				'redirect_area' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Next steps', 'pixelgrade_care' )
						),
						'cta'   => array(
							'type'  => 'button',
							'class' => 'btn btn--large',
							'label' => esc_html__( 'View and Customize', 'pixelgrade_care' ),
							'url'   => '{{customizer_url}}?return=' . urlencode( PixelgradeCare_Admin::get_dashboard_url() )
						),
					),
				),

				'help_links' => array(
					'class'  => 'half',
					'fields' => array(
						'title' => array(
							'type'  => 'h4',
							'value' => esc_html__( 'Learn more', 'pixelgrade_care' )
						),
						'links' => array(
							'type'  => 'links',
							'value' => array(
								array(
									'label' => esc_html__( 'Browse the Theme Documentation', 'pixelgrade_care' ),
									'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/'
								),
								array(
									'label' => esc_html__( 'Learn How to Use WordPress', 'pixelgrade_care' ),
									'url'   => 'https://easywpguide.com'
								),
								array(
									'label' => esc_html__( 'Get Help and Support', 'pixelgrade_care' ),
									'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'get-support/'
								),
								array(
									'label' => esc_html__( 'Join our Facebook group', 'pixelgrade_care' ),
									'url'   => 'https://www.facebook.com/groups/PixelGradeUsersGroup/'
								),
							),
						),
					),
				),
			),
		),
	);

	$config['dashboard'] = array(
		'general' => array(
			'name'   => esc_html__( 'General', 'pixelgrade_care' ),
			'blocks' => array(
				'authenticator' => array(
					'class'  => 'full white',
					'fields' => array(
						'authenticator' => array(
							'type'  => 'component',
							'value' => 'authenticator'
						),
					),
				),
				'plugins' => array(
					'notconnected' =>  'hidden',
					'fields' => array(
						'recommended_plugins' => array(
							'type'  => 'component',
							'value' => 'recommended-plugins'
						),
					),
				),
                'starterContent' => array(
                    'notconnected' =>  'hidden',
                    'fields' => array(
	                    'title'          => array(
		                    'type'  => 'h2',
		                    'value' => esc_html__( 'Starter content', 'pixelgrade_care' ),
		                    'value_installing' => esc_html__( 'Starter content importing..', 'pixelgrade_care' ),
		                    'value_installed' => '<span class="c-icon  c-icon--large  c-icon--success-auth"></span> ' . esc_html__( 'Starter content imported!', 'pixelgrade_care' ),
		                    'value_errored' => '<span class="c-icon  c-icon--large  c-icon--warning"></span> ' . esc_html__( 'Starter content could not be imported!', 'pixelgrade_care' ),
		                    'class' => 'section__title',
	                    ),
	                    'head_content'   => array(
		                    'type'             => 'text',
		                    'value'            => esc_html__( 'Use the demo content to make your site look as eye-candy as the theme\'s demo. The importer helps you have a strong starting point for your content and speed up the entire process.', 'pixelgrade_care' ),
		                    'value_installing' => wp_kses_post( __( 'Why not join our <a href="https://www.facebook.com/groups/PixelGradeUsersGroup/" target="_blank">Facebook Group</a> while you wait? (opens in a new tab)', 'pixelgrade_care' ) ),
		                    'value_installed'  => esc_html__( 'Mission accomplished! ???? You\'ve successfully imported the starter content, so you\'re good to move forward. Have fun!', 'pixelgrade_care' ),
		                    'value_errored'  => esc_html__( 'Sadly, errors have happened and the started content could not be imported at this time. Please try again in a little while or reach out to our support crew.', 'pixelgrade_care' ),
	                    ),
	                    'starterContent' => array(
		                    'type'     => 'component',
		                    'value'    => 'starter-content',
	                    ),
                    ),
                ),
			),
		),

		'customizations' => array(
			'name'   => esc_html__( 'Customizations', 'pixelgrade_care' ),
			'class'  => 'sections-grid__item',
			'blocks' => array(
				'featured'  => array(
					'class'  => 'u-text-center',
					'fields' => array(
						'title'   => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Customizations', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We know that each website needs to have an unique voice in tune with your charisma. That\'s why we created a smart options system to easily make handy color changes, spacing adjustments and balancing fonts, each step bringing you closer to a striking result.', 'pixelgrade_care' ),
							'class' => 'section__content'
						),
						'cta'     => array(
							'type'  => 'button',
							'class' => 'btn btn--action  btn--green',
							'label' => esc_html__( 'Access the Customizer', 'pixelgrade_care' ),
							'url'   => '{{customizer_url}}',
							'target' => '', // we don't want the default _blank target
						),
					),
				),
				'subheader' => array(
					'class'  => 'section--airy  u-text-center',
					'fields' => array(
						'subtitle' => array(
							'type'  => 'h3',
							'value' => esc_html__( 'Learn more', 'pixelgrade_care' ),
							'class' => 'section__subtitle'
						),
						'title'    => array(
							'type'  => 'h2',
							'value' => esc_html__( 'Design & Style', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
					),
				),
				'colors'    => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '<img class="emoji" alt="????" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Tweaking Colors Schemes', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Choose colors that resonate with the statement you want to portray. For example, blue inspires safety and peace, while yellow is translated into energy and joyfulness.', 'pixelgrade_care' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Colors', 'pixelgrade_care' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/design-and-style/style-changes/changing-colors/'
						),
					),
				),

				'fonts' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '<img class="emoji" alt="????" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> '. esc_html__( 'Managing Fonts', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'We recommend you settle on only a few fonts: it\'s best to stick with two fonts but if you\'re feeling ambitious, three is tops.', 'pixelgrade_care' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Changing Fonts', 'pixelgrade_care' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/design-and-style/style-changes/changing-fonts/'
						),
					),
				),

				'custom_css' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '<img class="emoji" alt="????" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Custom CSS', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you\'re looking for changes that are not possible through the current set of options, swing some Custom CSS code to override the default CSS of your theme.', 'pixelgrade_care' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using the Custom CSS Editor', 'pixelgrade_care' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/design-and-style/custom-code/using-custom-css-editor'
						),
					),
				),

				'advanced' => array(
					'class'  => 'half sections-grid__item',
					'fields' => array(
						'title'   => array(
							'type'  => 'h4',
							'value' => '<img class="emoji" alt="????" src="https://s.w.org/images/core/emoji/2.2.1/svg/1f3a8.svg"> ' . esc_html__( 'Advanced Customizations', 'pixelgrade_care' ),
							'class' => 'section__title'
						),
						'content' => array(
							'type'  => 'text',
							'value' => esc_html__( 'If you want to change HTML or PHP code, and keep your changes from being overwritten on the next theme update, the best way is to make them in a child theme.', 'pixelgrade_care' ),
						),
						'cta'     => array(
							'type'  => 'button',
							'label' => esc_html__( 'Using a Child Theme', 'pixelgrade_care' ),
							'class' => 'btn btn--action btn--small  btn--blue',
							'url'   => trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'docs/getting-started/using-child-theme'
						),
					),
				),
			),
		),

		'system-status' => array(
			'name'   => 'System Status',
			'blocks' => array(
				'system-status' => array(
					'class'  => 'u-text-center',
					'fields' => array(
						'title'        => array(
							'type'  => 'h2',
							'class' => 'section__title',
							'value' => esc_html__( 'System Status', 'pixelgrade_care' ),
						),
						'systemStatus' => array(
							'type'  => 'component',
							'value' => 'system-status'
						),
						'tools'        => array(
							'type'  => 'component',
							'value' => 'pixcare-tools'
						),
					),
				),
			),
		),
	);

	$config['systemStatus'] = array(
		'phpRecommendedVersion'     => 5.6,
		'l10n' => array(
			'title'                     => esc_html__( 'System Status', 'pixelgrade_care' ),
			'description'               => esc_html__( 'Allow Pixelgrade to collect non-sensitive diagnostic data and usage information. This will allow us to provide better assistance when you reach us through our support system. Thanks!', 'pixelgrade_care' ),
			'phpOutdatedNotice'         => esc_html__( 'This version is a little old. We recommend you update to PHP ', 'pixelgrade_care' ),
			'wordpressOutdatedNoticeContent' => esc_html__( 'We recommend you update to the latest and greatest WordPress version.', 'pixelgrade_care' ),
			'updateAvailable' => esc_html__( 'There\'s an update available!', 'pixelgrade_care' ),
			'themeLatestVersion' => esc_html__( 'You are running the latest version of {{theme_name}}', 'pixelgrade_care' ),
			'wpUpdateAvailable1' => esc_html__( 'There\'s an update available!', 'pixelgrade_care' ),
			'wpUpdateAvailable2' => esc_html__( 'Follow this link to update.', 'pixelgrade_care' ),
			'wpVersionOk' => esc_html__( 'Great!', 'pixelgrade_care' ),
			'phpUpdateNeeded1' => esc_html__( 'Your PHP version isn\'t supported anymore!', 'pixelgrade_care' ),
			'phpUpdateNeeded2' => esc_html__( 'Please update to a newer PHP version', 'pixelgrade_care' ),
			'phpVersionOk' => esc_html__( 'Your PHP version is OK.', 'pixelgrade_care' ),
			'mysqlUpdateNeeded1' => esc_html__( 'Your MySQL version isn\'t supported anymore!', 'pixelgrade_care' ),
			'mysqlUpdateNeeded2' => esc_html__( 'Please update to a newer MySQL version', 'pixelgrade_care' ),
			'mysqlVersionOk' => esc_html__( 'Your MySQL version is OK.', 'pixelgrade_care' ),
			'dbCharsetIssue' => esc_html__( 'You might have problems with emoji!', 'pixelgrade_care' ),
			'dbCharsetOk' => esc_html__( 'Go all out emoji-style!', 'pixelgrade_care' ),
			'tableWPDataTitle' => esc_html__( 'WordPress Install Data', 'pixelgrade_care' ),
			'tableSystemDataTitle' => esc_html__( 'System Data', 'pixelgrade_care' ),
			'tableActivePluginsTitle' => esc_html__( 'Active Plugins', 'pixelgrade_care' ),
			'resetPluginButtonLabel' => esc_html__( 'Reset Pixelgrade Care Plugin Data', 'pixelgrade_care' ),
			'resetPluginDescription' => esc_html__( 'In case you run into trouble, you can reset the plugin data and start over. No content will be lost.', 'pixelgrade_care' ),
			'resetPluginConfirmationMessage' => esc_html__( "Are you sure you want to reset Pixelgrade Care?\n\n\nOK, just do this simple calculation: ", 'pixelgrade_care' ),
		)
	);

	$config['pluginManager'] = array(
		'l10n' => array(
			'updateButton' => esc_html__( 'Update', 'pixelgrade_care' ),
			'installFailedMessage' => esc_html__( 'I could not install the plugin! You will need to install it manually from the plugins page!', 'pixelgrade_care' ),
			'activateFailedMessage' => esc_html__( 'I could not activate the plugin! You need to activate it manually from the plugins page!', 'pixelgrade_care' ),
			'pluginReady' => esc_html__( 'Plugin ready!', 'pixelgrade_care' ),
			'pluginUpdatingMessage' => esc_html__( 'Updating ...', 'pixelgrade_care' ),
			'pluginInstallingMessage' => esc_html__( 'Installing ...', 'pixelgrade_care' ),
			'pluginActivatingMessage' => esc_html__( 'Activating ...', 'pixelgrade_care' ),
			'pluginUpToDate' => esc_html__( 'Plugin up to date!', 'pixelgrade_care' ),
			'tgmpActivatedSuccessfully' => esc_html__( 'The following plugin was activated successfully:', 'pixelgrade_care' ),
			'tgmpPluginActivated' => esc_html__( 'Plugin activated successfully.', 'pixelgrade_care' ),
			'tgmpPluginAlreadyActive' => esc_html__( 'No action taken. Plugin was already active.', 'pixelgrade_care' ),
			'tgmpNotAllowed' => esc_html__( 'Sorry, you are not allowed to access this page.', 'pixelgrade_care' ),
			'groupByRequiredLabels' => array(
				'required' => esc_html__( 'Core plugins needed for your website (required).', 'pixelgrade_care' ),
				'recommended' => esc_html__( 'Recommended plugins to enhance your website (optional).', 'pixelgrade_care' ),
			),
			'noPlugins' => esc_html__( 'No plugins needed at this time.', 'pixelgrade_care' ),
		),
	);

	$config['starterContent'] = array(
		'l10n' => array(
			'importTitle' => esc_html__( '{{theme_name}} demo content', 'pixelgrade_care' ),
			'importContentDescription' => esc_html__( 'Import the content from the theme demo.', 'pixelgrade_care' ),
			'noSources' => esc_html__( 'Unfortunately, we don\'t have any starter content to go with your theme right now.', 'pixelgrade_care' ),
			'alreadyImportedConfirm' => esc_html__( 'Starter content was already imported! Are you sure you want to import it again?', 'pixelgrade_care' ),
			'alreadyImportedDenied' => esc_html__( 'It\'s OK!', 'pixelgrade_care' ),
			'importingData' => esc_html__( 'Getting data about available content...', 'pixelgrade_care' ),
			'somethingWrong' => esc_html__( 'Something went wrong!', 'pixelgrade_care' ),
			'errorMessage' => esc_html__( "This starter content is not available right now.\nPlease try again later!", 'pixelgrade_care' ),
			'mediaAlreadyExistsTitle' => esc_html__( 'Media already exists!', 'pixelgrade_care' ),
			'mediaAlreadyExistsContent' => esc_html__( 'We won\'t import again as there is no need to!', 'pixelgrade_care' ),
			'mediaImporting' => esc_html__( 'Importing media: ', 'pixelgrade_care' ),
			'postsAlreadyExistTitle' => esc_html__( 'Posts already exist!', 'pixelgrade_care' ),
			'postsAlreadyExistContent' => esc_html__( 'We won\'t import them again!', 'pixelgrade_care' ),
			'postImporting' => esc_html__( 'Importing ', 'pixelgrade_care' ),
			'taxonomiesAlreadyExistTitle' => esc_html__( 'Taxonomies (like categories) already exist!', 'pixelgrade_care' ),
			'taxonomiesAlreadyExistContent' => esc_html__( 'We won\'t import them again!', 'pixelgrade_care' ),
			'taxonomyImporting' => esc_html__( 'Importing taxonomy: ', 'pixelgrade_care' ),
			'widgetsAlreadyExistTitle' => esc_html__( 'Widgets already exist!', 'pixelgrade_care' ),
			'widgetsAlreadyExistContent' => esc_html__( 'We won\'t import them again!', 'pixelgrade_care' ),
			'widgetsImporting' => esc_html__( 'Importing widgets ...', 'pixelgrade_care' ),
			'importingPreSettings' => esc_html__( 'Preparing the scene for awesomeness...', 'pixelgrade_care' ),
			'importingPostSettings' => esc_html__( 'Wrapping it up... ', 'pixelgrade_care' ),
			'importSuccessful' => esc_html__( 'Successfully Imported!', 'pixelgrade_care' ),
			'imported' => esc_html__( 'Imported', 'pixelgrade_care' ),
			'import' => esc_html__( 'Import', 'pixelgrade_care' ),
			'importSelected' => esc_html__( 'Import selected', 'pixelgrade_care' ),
			'stop' => esc_html__( 'Pause import', 'pixelgrade_care' ),
			'resume' => esc_html__( 'Resume import', 'pixelgrade_care' ),
			'stoppedMessage' => esc_html__( 'Currently paused...', 'pixelgrade_care' ),
		),
		'defaultSceRestPath' => 'wp-json/sce/v2', // this will be appended to the starter content source URL if we are not given a baseRestUrl
	);

	$config['knowledgeBase'] = array(
		'selfHelp'   => array(
			'name'   => esc_html__( 'Self Help', 'pixelgrade_care' ),
			'blocks' => array(
				'search' => array(
					'class'  => 'support-autocomplete-search',
					'fields' => array(
						'placeholder' => esc_html__( 'Search through the Knowledge Base', 'pixelgrade_care' )
					),
				),
				'info'   => array(
					'class'  => '',
					'fields' => array(
						'title'     => array(
							'type'  => 'h1',
							'value' => esc_html__( 'Theme Help & Support', 'pixelgrade_care' ),
						),
						'content'   => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( 'You have an <strong>active theme license</strong> for {{theme_name}}. This means you\'re able to get <strong>front-of-the-line support service.</strong> Be sure to check out the documentation in order to <strong>get quick answers</strong> in no time. Chances are it\'s <strong>already been answered!</strong>', 'pixelgrade_care' ) ),
							'applicableTypes' => array(
								"theme",
								"theme_modular",
							),
						),
						'content_free_theme'   => array(
							'type'  => 'text',
							'value' => wp_kses_post( __( 'Your site is <strong>connected to {{shopdomain}}.</strong> This means you\'re able to get <strong>premium support service.</strong><br>We strive to answer as fast as we can, but sometimes it can take a day or two. Be sure to check out the documentation in order to <strong>get quick answers</strong> in no time. Chances are it\'s <strong>already been answered!</strong>', 'pixelgrade_care' ) ),
							'applicableTypes' => array(
								"theme_wporg",
								"theme_modular_wporg",
							)
						),
						'subheader' => array(
							'type'  => 'h2',
							'value' => esc_html__( 'How can we help?', 'pixelgrade_care' )
						),
					),
				),
			),
		),
		'openTicket' => array(
			'name'   => esc_html__( 'Open Ticket', 'pixelgrade_care' ),
			'blocks' => array(
				'topics'        => array(
					'class'  => '',
					'fields' => array(
						'title'  => array(
							'type'  => 'h1',
							'value' => esc_html__( 'What can we help with?', 'pixelgrade_care' )
						),
						'topics' => array(
							'class'  => 'topics-list',
							'fields' => array(
								'start'          => array(
									'type'  => 'text',
									'value' => esc_html__( 'I have a question about how to start', 'pixelgrade_care' )
								),
								'feature'        => array(
									'type'  => 'text',
									'value' => esc_html__( 'I have a question about how a distinct feature works', 'pixelgrade_care' )
								),
								'plugins'        => array(
									'type'  => 'text',
									'value' => esc_html__( 'I have a question about plugins', 'pixelgrade_care' )
								),
								'productUpdates' => array(
									'type'  => 'text',
									'value' => esc_html__( 'I have a question about product updates', 'pixelgrade_care' )
								),
								'billing'        => array(
									'type'  => 'text',
									'value' => esc_html__( 'I have a question about payments', '' )
								),
							),
						),
					),
				),
				'ticket'        => array(
					'class'  => '',
					'fields' => array(
						'title'             => array(
							'type'  => 'h1',
							'value' => esc_html__( 'Give us more details', 'pixelgrade_care' )
						),
						'changeTopic'       => array(
							'type'  => 'button',
							'label' => esc_html__( 'Change Topic', 'pixelgrade_care' ),
							'class' => 'btn btn__dark',
							'url'   => '#'
						),
						'descriptionHeader' => array(
							'type'  => 'text',
							'value' => esc_html__( 'How can we help?', 'pixelgrade_care' )
						),
						'descriptionInfo'   => array(
							'type'  => 'text',
							'class' => 'label__more-info',
							'value' => esc_html__( 'Briefly describe how we can help.', 'pixelgrade_care' )
						),
						'detailsHeader'     => array(
							'type'  => 'text',
							'value' => esc_html__( 'Tell Us More', 'pixelgrade_care' )
						),
						'detailsInfo'       => array(
							'type'  => 'text',
							'class' => 'label__more-info',
							'value' => wp_kses_post( __( 'Share all the details. Be specific and include some steps to recreate things and help us get to the bottom of things more quickly! Use a free service like <a href="http://imgur.com/" target="_blank">Imgur</a> or <a href="http://tinypic.com/" target="_blank">Tinypic</a> to upload files and include the link.', 'pixelgrade_care' ) ),
						),
						'nextButton'        => array(
							'type'  => 'button',
							'label' => esc_html__( 'Next Step', 'pixelgrade_care' ),
							'class' => 'form-row submit-wrapper',
						),
					),
				),
				'searchResults' => array(
					'class'  => '',
					'fields' => array(
						'title'       => array(
							'type'  => 'h1',
							'value' => esc_html__( 'Try these solutions first', 'pixelgrade_care' )
						),
						'description' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Based on the details you provided, we found a set of articles that could help you instantly. Before you submit a ticket, please check these resources first:', 'pixelgrade_care' )
						),
						'noResults'   => array(
							'type'  => 'text',
							'value' => esc_html__( 'Sorry, we couldn\'t find any articles suitable for your question. Submit your ticket using the button below.', 'pixelgrade_care' )
						),
					),
				),
				'sticky'        => array(
					'class'  => 'notification__blue clear sticky',
					'fields' => array(
						'notConnected'       => array(
							'type'  => 'text',
							'value' => esc_html__( 'Please connect to {{shopdomain}} in order to be able to submit tickets.', 'pixelgrade_care' ),
						),
						'noLicense'       => array(
							'type'  => 'text',
							'value' => esc_html__( 'Please activate your theme in order to be able to submit tickets.', 'pixelgrade_care' )
						),
						'initialQuestion' => array(
							'type'  => 'text',
							'value' => esc_html__( 'Did any of the above resources answer your question?', 'pixelgrade_care' ),
						),
						'success'         => array(
							'type'  => 'text',
							'value' => '???? ' . esc_html__( 'Yaaay! You did it by yourself!', 'pixelgrade_care' ),
						),
						'noSuccess'       => array(
							'type'  => 'text',
							'value' => '???? ' . esc_html__( 'Sorry we couldn\'t find an helpful answer.', 'pixelgrade_care' ),
						),
						'submitTicket'    => array(
							'type'  => 'button',
							'label' => esc_html__( 'Submit ticket', 'pixelgrade_care' ),
							'class' => 'btn btn__dark'
						),
						'cancelSubmitTicket'    => array(
							'type'  => 'button',
							'label' => esc_html__( 'Cancel', 'pixelgrade_care' ),
							'class' => 'btn btn__dark'
						),
					),
				),
			),
		),
		'l10n' => array(
			'selfHelp' => esc_html__( 'Self Help', 'pixelgrade_care' ),
			'searchResults' => esc_html__( 'Search Results', 'pixelgrade_care' ),
			'closeLabel' => esc_html__( 'Close', 'pixelgrade_care' ),
			'backLabel' => esc_html__( 'Back to Self Help', 'pixelgrade_care' ),
			'missingTicketDetails' => esc_html__( 'Customer service is a two-way street. Help us help you and everyone wins. Please fill the boxes with relevant details.', 'pixelgrade_care' ),
			'missingTicketDescription' => esc_html__( 'You have not described how can we help out. Please enter a description in the box above.', 'pixelgrade_care' ),
			'searchingMessage' => esc_html__( 'Hang tight! We\'re searching for the best results.', 'pixelgrade_care' ),
			'emailMessage' => esc_html__( 'the email used to register on {{shopdomain}}.', 'pixelgrade_care' ),
			'ticketSendSuccessTitle' => esc_html__( '???? Thanks!', 'pixelgrade_care' ),
			'ticketSendSuccessContent' => esc_html__( 'Your ticket was successfully delivered! As soon as a member of our crew has had a chance to review it they will be in touch with you at', 'pixelgrade_care' ),
			'ticketSendSuccessGreeting' => esc_html__( 'Cheers!', 'pixelgrade_care' ),
			'ticketSendingLabel' => esc_html__( 'Submitting the ticket...', 'pixelgrade_care' ),
			'backTo' => esc_html__( 'Back to ', 'pixelgrade_care' ),
			'articleHelpfulQuestion' => esc_html__( 'Was this article helpful?', 'pixelgrade_care' ),
			'articleNotHelpful' => esc_html__( 'We\'re sorry to hear that. How can we improve this article?', 'pixelgrade_care' ),
			'articleHelpful' => esc_html__( 'Great! We\'re happy to hear about that.', 'pixelgrade_care' ),
			'articleHelpfulYesLabel' => esc_html__( 'Yes', 'pixelgrade_care' ),
			'articleHelpfulNoLabel' => esc_html__( 'No', 'pixelgrade_care' ),
			'sendFeedbackLabel' => esc_html__( 'Send Feedback', 'pixelgrade_care' ),
			'sendFeedbackPlaceholder' => esc_html__( 'Send Feedback', 'pixelgrade_care' ),
			'notConnectedTitle' => esc_html__( 'Not connected!', 'pixelgrade_care' ),
			'notConnectedContent' => esc_html__( 'You haven\'t connected to {{shopdomain}} yet! Go to your Pixelgrade Dashboard to connect.', 'pixelgrade_care' ),
			'dashboardButtonLabel' => esc_html__( 'Pixelgrade Dashboard', 'pixelgrade_care' ),
			'backToSelfHelpLabel' => esc_html__( 'Back to Self Help', 'pixelgrade_care' ),
			'searchFieldLabel' => esc_html__( 'Search the knowledge base', 'pixelgrade_care' ),
			'searchNoResultsMessage' => esc_html__( 'Sorry - we couldn\'t find any results in our docs matching your search query.', 'pixelgrade_care' ),
			'errorGetSelection' => esc_html__( 'An error has occurred while trying to get your selection.', 'pixelgrade_care' ),
			'backToMainSection' => esc_html__( 'Back to your main section', 'pixelgrade_care' ),
			'errorFetchCategories' => esc_html__( 'Could not fetch categories!', 'pixelgrade_care' ),
			'errorFetchArticles' => esc_html__( 'Something went wrong while fetching the knowledge base articles for this theme. If the error persists, please create a ticket from the Open Ticket tab.', 'pixelgrade_care' ),
		),
	);

	// the authenticator config is based on the component status which can be: not_validated, loading, validated
	$config['authentication'] = array(
		// general strings
		'title'               => esc_html__( 'You are almost finished!', 'pixelgrade_care' ),
		// validated string
		'validatedTitle'      => '<span class="c-icon c-icon--success"></span> ' . esc_html__( 'Site connected! You\'re all set ????', 'pixelgrade_care' ),
		'validatedContent'    => wp_kses_post( __( '<strong>Well done, {{username}}!</strong> Your site successfully connects to your Pixelgrade.com account and all the tools are available to make it shine.', 'pixelgrade_care' ) ),
		'validatedButton'     => esc_html__( '{{theme_name}} Activated!', 'pixelgrade_care' ),
		'validatedContentRefresh'  => esc_html__( 'Have you purchased or expect something new from us and doesn\'t show up? Please use the refresh button above to check for any further information associated with your account.', 'pixelgrade_care' ),
		//  not validated strings
		'notValidatedContent' => wp_kses_post( __( 'In order to get access to <strong>premium support, starter content, in-dashboard documentation,</strong> and many others, your site needs to have <strong>an active connection and a valid license</strong> to {{shopdomain}}.<br/><br/>This <strong>does not mean</strong> we gain direct (admin) access to this site. You remain the only one who can log in and make changes. <strong>Connecting means</strong> that this site and {{shopdomain}} share a few details needed to communicate securely.', 'pixelgrade_care' ) ),
		'notValidatedButton'  => esc_html__( 'Activate the Theme License!', 'pixelgrade_care' ),
		// no themes from shop
		'noThemeContent'      => esc_html__( 'Ups! You are logged in, but it seems you haven\'t purchased this theme yet.', 'pixelgrade_care' ),
		'noThemeRetryButton'  => esc_html__( 'Retry to activate', 'pixelgrade_care' ),
		'noThemeLicense'      => esc_html__( 'You don\'t seem to have any licenses for this theme', 'pixelgrade_care' ),
		// Theme of ours but broken
		'oursBrokenTitle'      => esc_html__( 'Huston, we have a problem..', 'pixelgrade_care' ),
		'oursBrokenContent'    => wp_kses_post( __( 'You seem to be using a Pixelgrade theme, but something is wrong with it. Are you sure you are <strong>using the theme code</strong> downloaded from <a href="https://pixelgrade.com">pixelgrade.com</a> or maybe the marketplace you\'ve purchased from?<br/><strong>We can\'t activate this theme</strong> in it\'s current state.<br/><br/>Reach us at <a href="mailto:help@pixelgrade.com?Subject=Help%20with%20broken%20theme" target="_top">help@pixelgrade.com</a> if you need further help.', 'pixelgrade_care' ) ) ,
		// Not our theme or broken beyond recognition
		'brokenTitle'      => esc_html__( 'Huston, we have a problem.. Really!', 'pixelgrade_care' ),
		'brokenContent'    => wp_kses_post( __( 'This doesn\'t seem to be <strong>a Pixelgrade theme.</strong> Are you sure you are <strong>using the theme code</strong> downloaded from <a href="https://pixelgrade.com">pixelgrade.com</a> or maybe the marketplace you\'ve purchased from?<br/><strong>We can\'t activate this theme</strong> in it\'s current state.<br/><br/>Reach us at <a href="mailto:help@pixelgrade.com?Subject=Help%20with%20broken%20theme" target="_top">help@pixelgrade.com</a> if you need further help.', 'pixelgrade_care' ) ),
		// loading strings
		'loadingTitle' => esc_html__( 'Connection in progress', 'pixelgrade_care' ),
		'loadingContent'      => esc_html__( 'Getting a couple of details...', 'pixelgrade_care' ),
		'loadingLicensesTitle' => esc_html__( 'Licenses on the way', 'pixelgrade_care' ),
		'loadingLicenses'     => esc_html__( 'Take a deep breath. We are looking carefully through your licenses...', 'pixelgrade_care' ),
		'loadingPrepare'      => esc_html__( 'Preparing...', 'pixelgrade_care' ),
		'loadingError'        => esc_html__( 'Sorry... I can\'t do this right now!', 'pixelgrade_care' ),
		'loadingWaitOAuthTitle' => esc_html__( 'Connection in progress', 'pixelgrade_care' ),
		'loadingWaitOAuthContent'      => esc_html__( 'Thank you for allowing the connection. Running some checks and will proceed shortly.', 'pixelgrade_care' ),
		'loadingWaitOAuthButton'    => esc_html__( 'Please wait while this browser tab closes...', 'pixelgrade_care' ),
		// license urls
		'buyThemeUrl'         => esc_url( trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'pricing' ),
		'renewLicenseUrl'     => esc_url( trailingslashit( PIXELGRADE_CARE__SHOP_BASE ) . 'my-account' )
	);

	// the recommended plugins config is based on the component status which can be: not_validated, loading, validated
	$config['recommendedPlugins'] = array(
		// general strings
		'title'               => esc_html__( 'Manage plugins', 'pixelgrade_care' ),
		'content'               => esc_html__( '{{theme_name}} recommends these plugins so you can take full advantage of everything that it offers.', 'pixelgrade_care' ),
		// validated string
		'validatedTitle'      => '<span class="c-icon c-icon--success"></span> ' . esc_html__( 'Plugins ready ???????', 'pixelgrade_care' ),
		'validatedContent'    => wp_kses_post( __( 'You can rest assured that {{theme_name}} can do its best for you and your site.', 'pixelgrade_care' ) ),
	);

	$update_core = get_site_transient( 'update_core' );

	if ( ! empty( $update_core->updates ) && ! empty( $update_core->updates[0] ) ) {
		$new_update                                     = $update_core->updates[0];
		$config['systemStatus']['wpRecommendedVersion'] = $new_update->current;
	}

	$config = apply_filters( 'pixcare_default_config', $config );

	return $config;
}

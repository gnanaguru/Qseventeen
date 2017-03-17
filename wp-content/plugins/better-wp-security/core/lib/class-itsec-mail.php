<?php

final class ITSEC_Mail {
	private $content = '';
	private $subject = '';
	private $recipients = array();
	private $attachments = array();
	private $template_path = '';

	public function __construct() {
		$this->template_path = dirname( __FILE__ ) . '/mail-templates/';
	}

	public function add_header( $title, $banner_title ) {
		$header = $this->get_template( 'header.html' );

		$replacements = array(
			'lang'         => esc_attr( get_bloginfo( 'language' ) ),
			'charset'      => esc_attr( get_bloginfo( 'charset' ) ),
			'title_tag'    => $title,
			'banner_title' => $banner_title,
			'logo'         => ITSEC_Core::is_pro() ? 'https://ithemes.com/email_images/itsec-pro-logo-300x127.png' : 'https://ithemes.com/email_images/itsec-logo-300x127.png',
			'title'        => $title,
		);

		$this->content .= $this->replace_all( $header, $replacements );
	}

	private function replace( $content, $variable, $value ) {
		return preg_replace( '/{{ \$' . preg_quote( $variable, '/' ) . ' }}/', $value, $content );
	}

	private function replace_all( $content, $replacements ) {
		foreach ( $replacements as $variable => $value ) {
			$content = preg_replace( '/{{ \$' . preg_quote( $variable, '/' ) . ' }}/', $value, $content );
		}

		return $content;
	}

	public function add_footer() {
		$footer = '';

		if ( ! ITSEC_Core::is_pro() ) {
			$callout = $this->get_template( 'pro-callout.html' );

			$replacements = array(
				'two_factor' => esc_html__( 'Want two-factor authentication, scheduled malware scanning, ticketed support and more?', 'better-wp-security' ),
				'get_pro'    => esc_html__( 'Get iThemes Security Pro', 'better-wp-security' ),
				'why_pro'    => sprintf( wp_kses( __( 'Why go Pro? <a href="%s">Check out the Free/Pro comparison chart.</a>', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://ithemes.com/security/why-go-pro/' ) ),
			);

			$footer .= $this->replace_all( $callout, $replacements );
		} else {
			$this->add_divider();
		}

		$footer .= $this->get_template( 'footer.html' );

		$replacements = array(
			'security_resources'     => esc_html__( 'Security Resources', 'better-wp-security' ),
			'articles'               => esc_html__( 'Articles', 'better-wp-security' ),
			'articles_content'       => sprintf( wp_kses( __( 'Read the latest in WordPress Security news, tips, and updates on <a href="%s">iThemes Blog</a>.', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://ithemes.com/category/wordpress-security/' ) ),
			'tutorials'              => esc_html__( 'Tutorials', 'better-wp-security' ),
			'tutorials_content'      => sprintf( wp_kses( __( 'Make the most of iThemes Security features with our <a href="%s">free iThemes Security tutorials</a>.', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://ithemes.com/tutorial/category/ithemes-security/' ) ),
			'help_and_support'       => esc_html__( 'Help & Support', 'better-wp-security' ),
			'documentation'          => esc_html__( 'Documentation', 'better-wp-security' ),
			'documentation_content'  => sprintf( wp_kses( __( 'Read iThemes Security documentation and Frequently Asked Questions on <a href="%s">the Codex</a>.', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'http://ithemes.com/codex/page/IThemes_Security' ) ),
			'support'                => esc_html__( 'Support', 'better-wp-security' ),
			'pro'                    => esc_html__( 'Pro', 'better-wp-security' ),
			'support_content'        => sprintf( wp_kses( __( 'Pro customers can contact <a href="%s">iThemes Helpdesk</a> for help. Our support team answers questions Monday – Friday, 8am – 5pm (CST).', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://members.ithemes.com/panel/helpdesk.php' ) ),
			'security_settings_link' => esc_url( ITSEC_Core::get_settings_page_url() ),
			'unsubscribe_link_text'  => esc_html__( 'This email was generated by the iThemes Security plugin.', 'better-wp-security' ) . '<br>' . esc_html__( 'To unsubscribe from these updates, visit the Settings page in the iThemes Security plugin menu.', 'better-wp-security' ),
			'security_guide'         => esc_html__( 'Free WordPress Security Guide', 'better-wp-security' ),
			'security_guide_content' => sprintf( wp_kses( __( 'Learn simple WordPress security tips — including 3 kinds of security your site needs and 4 best security practices for keeping your WordPress site safe with our <a href="%s">free guide</a>.', 'better-wp-security' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://ithemes.com/publishing/wordpress-security/' ) ),

		);

		$footer = $this->replace_all( $footer, $replacements );

		$this->content .= $footer;
	}

	public function add_text( $content ) {
		$module = $this->get_template( 'text.html' );
		$module = $this->replace( $module, 'content', $content );

		$this->content .= $module;
	}

	public function add_divider() {
		$this->content .= $this->get_template( 'divider.html' );
	}

	public function add_large_text( $content ) {
		$module = $this->get_template( 'large-text.html' );
		$module = $this->replace( $module, 'content', $content );

		$this->content .= $module;
	}

	public function add_info_box( $content, $icon_type = 'info' ) {
		$icon_url = "http://ithemes.com/email_images/itsec-$icon_type-icon.png";

		$module = $this->get_template( 'info-box.html' );
		$module = $this->replace_all( $module, compact( 'content', 'icon_url' ) );

		$this->content .= $module;
	}

	public function add_details_box( $content ) {
		$module = $this->get_template( 'details-box.html' );
		$module = $this->replace( $module, 'content', $content );

		$this->content .= $module;
	}

	public function add_section_heading( $content, $icon_type = false ) {
		if ( empty( $icon_type ) ) {
			$heading = $this->get_template( 'section-heading.html' );
			$heading = $this->replace_all( $heading, compact( 'content' ) );
		} else {
			$icon_url = "https://ithemes.com/email_images/itsec-icon-$icon_type.png";

			$heading = $this->get_template( 'section-heading-with-icon.html' );
			$heading = $this->replace_all( $heading, compact( 'content', 'icon_url' ) );
		}

		$this->content .= $heading;
	}

	public function add_lockouts_summary( $user_count, $host_count ) {
		$lockouts = $this->get_template( 'lockouts-summary.html' );

		$replacements = array(
			'users_text' => esc_html__( 'Users', 'better-wp-security' ),
			'hosts_text' => esc_html__( 'Hosts', 'better-wp-security' ),
			'user_count' => $user_count,
			'host_count' => $host_count,
		);

		$lockouts = $this->replace_all( $lockouts, $replacements );

		$this->content .= $lockouts;
	}

	public function add_button( $link_text, $href ) {
		$module = $this->get_template( 'module-button.html' );
		$module = preg_replace( '/{{ \$href }}/', $href, $module );
		$module = preg_replace( '/{{ \$link_text }}/', $link_text, $module );

		$this->content .= $module;
	}

	public function add_lockouts_table( $lockouts ) {
		$entry = $this->get_template( 'lockouts-entry.html' );
		$entries = '';

		foreach ( $lockouts as $lockout ) {
			if ( 'user' === $lockout['type'] ) {
				/* translators: 1: Username */
				$lockout['description'] = sprintf( wp_kses( __( '<b>User:</b> %1$s', 'better-wp-security' ), array( 'b' => array() ) ), $lockout['id'] );
			} else {
				/* translators: 1: Hostname */
				$lockout['description'] = sprintf( wp_kses( __( '<b>Host:</b> %1$s', 'better-wp-security' ), array( 'b' => array() ) ), $lockout['id'] );
			}

			$entries .= $this->replace_all( $entry, $lockout );
		}

		$table = $this->get_template( 'lockouts-table.html' );

		$replacements = array(
			'heading_types'        => __( 'Host/User', 'better-wp-security' ),
			'heading_until'        => __( 'Lockout in Effect Until', 'better-wp-security' ),
			'heading_reason'       => __( 'Reason', 'better-wp-security' ),
			'entries'              => $entries,
		);

		$table = $this->replace_all( $table, $replacements );

		$this->content .= $table;
	}

	public function get_content() {
		return $this->content;
	}

	public function set_subject( $subject, $add_site_url = true ) {
		if ( $add_site_url ) {
			/* translators: 1: site URL, 2: email subject */
			$subject = sprintf( __( '[%1$s] %2$s', 'better-wp-security' ), get_option( 'siteurl' ), $subject );
		}

		$this->subject = esc_html( $subject );
	}

	public function set_recipients( $recipients ) {
		$this->recipients = array();

		foreach ( (array) $recipients as $recipient ) {
			$recipient = trim( $recipient );

			if ( is_email( $recipient ) ) {
				$this->recipients[] = $recipient;
			}
		}
	}

	public function set_default_recipients() {
		$recipients  = ITSEC_Modules::get_setting( 'global', 'notification_email' );
		$this->set_recipients( $recipients );
	}

	public function set_attachments( $attachments ) {
		$this->attachments = $attachments;
	}

	public function add_attachment( $attachment ) {
		$this->attachments[] = $attachment;
	}

	public function send() {
		if ( empty( $this->recipients ) ) {
			$this->set_default_recipients();
		}

		if ( empty( $this->subject ) ) {
			$this->set_default_subject();
		}

		return wp_mail( $this->recipients, $this->subject, $this->content, array( 'Content-Type: text/html; charset=UTF-8' ), $this->attachments );
	}

	private function get_template( $template ) {
		return file_get_contents( $this->template_path . $template );
	}
}

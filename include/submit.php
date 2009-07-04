<?php

	if ( isset( $_POST['submit'] ) ) {
		// let's rock and roll

		unset( $_POST['submit'] );
		$a = array();

		if ( isset( $_POST['enable-post-excerpts'] ) ) {
			$a['enable-post-excerpts'] = 1;
		} else {
			$a['enable-post-excerpts'] = 0;
		}

		if ( isset( $_POST['enable-page-coms'] ) ) {
			$a['enable-page-coms'] = 1;
		} else {
			$a['enable-page-coms'] = 0;
		}

		if ( isset( $_POST['enable-cats-button'] ) ) {
			$a['enable-cats-button'] = 1;
		} else {
			$a['enable-cats-button'] = 0;
		}

		if ( isset( $_POST['enable-tags-button'] ) ) {
			$a['enable-tags-button'] = 1;
		} else {
			$a['enable-tags-button'] = 0;
		}

		if ( isset( $_POST['enable-login-button'] ) ) {
			$a['enable-login-button'] = 1;
		} else {
			$a['enable-login-button'] = 0;
		}

		if ( isset($_POST['enable-redirect'] ) ) {
			$a['enable-redirect'] = 1;
		} else {
			$a['enable-redirect'] = 0;
		}

		if ( isset( $_POST['enable-gravatars'] ) ) {
			$a['enable-gravatars'] = 1;
		} else {
			$a['enable-gravatars'] = 0;
		}

		if ( isset( $_POST['enable-main-home'] ) ) {
			$a['enable-main-home'] = 1;
		} else {
			$a['enable-main-home'] = 0;
		}
		
		if ( isset( $_POST['enable-main-rss'] ) ) {
			$a['enable-main-rss'] = 1;
		} else {
			$a['enable-main-rss'] = 0;
		}
		
		if ( isset( $_POST['enable-main-email'] ) ) {
			$a['enable-main-email'] = 1;
		} else {
			$a['enable-main-email'] = 0;
		}
		
		if ( isset( $_POST['enable-main-name'] ) ) {
			$a['enable-main-name'] = 1;
		} else {
			$a['enable-main-name'] = 0;
		}
		
		if ( isset( $_POST['enable-main-tags'] ) ) {
			$a['enable-main-tags'] = 1;
		} else {
			$a['enable-main-tags'] = 0;
		}

		if ( isset( $_POST['enable-main-categories'] ) ) {
			$a['enable-main-categories'] = 1;
		} else {
			$a['enable-main-categories'] = 0;
		}

		if ( isset( $_POST['home-page'] ) ) {
			$a['home-page'] = $_POST['home-page'];
			if (strlen($a['home-page']) == 0) {
				$a['home-page'] = 'Default';
			}
		} else {
			$a['home-page'] = 'Default';
		}

		if ( isset($_POST['statistics']) ) {
			$a['statistics'] = $_POST['statistics'];
		}

		if ( isset($_POST['sort-order']) ) {
			$a['sort-order'] = $_POST['sort-order'];
		}

		if ( isset($_POST['enable-regular-default']) ) {
			$a['enable-regular-default'] = 1;
		} else {
			$a['enable-regular-default'] = 0;
		}

		if ( isset($_POST['adsense-id']) ) {
			$a['adsense-id'] = $_POST['adsense-id'];
		}

		if ( isset($_POST['adsense-channel']) ) {
			$a['adsense-channel'] = $_POST['adsense-channel'];
		}		

		if ( isset($_POST['style-text-size']) ) {
			$a['style-text-size'] = $_POST['style-text-size'];
		}

		if ( isset($_POST['style-text-justify']) ) {
			$a['style-text-justify'] = $_POST['style-text-justify'];
		}

		if ( isset($_POST['style-background']) ) {
			$a['style-background'] = $_POST['style-background'];
		}
		
		if ( isset( $_POST['enable-exclusive'] ) ) {
			$a['enable-exclusive'] = 1;	
		} else {
			$a['enable-exclusive'] = 0;
		}

		foreach ($_POST as $k => $v) {
			if ($k == 'enable_main_title') {
				$a['main_title'] = $v;
			} else {
				if (preg_match('#enable_(.*)#', $k, $matches)) {
					$id = $matches[1];
					if (!isset($a[$id]))
					$a[$id] = $_POST['icon_' . $id];
				}
			}
		}

		$a['header-title'] = $_POST['header-title'];
		if (!isset($a['header-title']) || (isset($a['header-title']) && strlen($a['header-title']) == 0)) {
		$a['header-title'] = get_bloginfo('title');
	}

	$a['header-background-color'] = $_POST['header-background-color'];
	$a['header-border-color'] = $_POST['header-border-color'];
	$a['header-text-color'] = $_POST['header-text-color'];
	$a['link-color'] = $_POST['link-color'];

	$values = serialize($a);
	update_option('bnc_iphone_pages', $values);

// The Master Kill Switch
 	} elseif ( isset( $_POST['reset'] ) ) {
		update_option( 'bnc_iphone_pages', '' );
 }

global $wptouch_settings;
$wptouch_settings = bnc_wptouch_get_settings();
?>
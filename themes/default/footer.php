<!-- Here the switch code is very important, as well as the php code which deals with admin links and WordPress -->
	<div id="footer">
	<ul id="links">
		<?php if (current_user_can('edit_posts')) : ?>
			<li><a class="text" href="<?php bloginfo('wpurl'); ?>/wp-admin/"><?php _e("Admin", "wptouch"); ?></a></li>
		<?php endif; ?>
		<?php if (get_option('comment_registration')) { ?>
			<li><a class="text" href="<?php bloginfo('wpurl'); ?>/wp-register.php"><?php _e( "Register for this site", "wptouch" ); ?></a></li>
		<?php } ?>
		<?php if (is_user_logged_in()) { ?>
			<li><a class="text" href="<?php bloginfo('wpurl'); ?>/wp-admin/profile.php"><?php _e( "Account Profile", "wptouch" ); ?></a></li>
			<li><a class="text" href="<?php $version = (float)get_bloginfo('version'); if ($version >= 2.7) { ?><?php echo wp_logout_url($_SERVER['REQUEST_URI']); ?><?php } else { ?><?php bloginfo('wpurl'); ?>/wp-login.php?action=logout&redirect_to=<?php echo $_SERVER['REQUEST_URI']; ?><?php } ?>"><?php _e( "Logout", "wptouch" ); ?></a></li>	
		<?php } ?>
			 <li><a onclick="javascript:document.getElementById('switch-on').style.display='none';javascript:document.getElementById('switch-off').style.display='block';" href="<?php echo bloginfo('home') . '/?bnc_view=normal'; ?>"class="text"><?php _e( "Mobile Theme", "wptouch" ); ?></a><img id="switch-on" src="<?php echo compat_get_plugin_url( 'wptouch' ); ?>/images/on.jpg" alt="on switch image" class="wptouch-switch-image" /><img id="switch-off" style="display:none" src="<?php echo compat_get_plugin_url( 'wptouch' ); ?>/images/off.jpg" alt="off switch image" class="wptouch-switch-image" /></li>
	</ul>

			<?php _e( "All content Copyright &copy;", "wptouch" ); ?> <?php $str = bnc_get_header_title(); echo stripslashes($str); ?>
			<br />
			<?php _e( 'Powered by <a href="http://www.wordpress.org/">WordPress</a> with', 'wptouch' ); ?> <a href="http://www.wptouch.com"><?php WPtouch(); ?></a>
	<?php if ( !bnc_wptouch_is_exclusive() ) { wp_footer(); } ?>
	</div>
<br />
<?php wptouch_get_stats(); 
//WPtouch theme designed and developed by Dale Mugford and Duane Storey for BraveNewCode.com
//If you modify it, please keep the link credit *visible* in the footer (and keep the WordPress credit, too!), that's all we ask, folks.
?>
</body>
</html>
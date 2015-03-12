<?php
$plugins = get_plugins();
$selected = '';
?><div class="wrap">
	<h2>WP Rollback</h2>
	<p>Page for information relevant to rollback.</p>
	<?php if( isset($_GET['plugin_file']) && in_array($_GET['plugin_file'], array_keys($plugins) ) ) { 

		$plugin_file = WP_PLUGIN_DIR . '/' . $_GET['plugin_file'];
		
		$plugin_data = get_plugin_data( $plugin_file, $markup = true, $translate = true );

		$selected = $_GET['plugin_file'];

		var_dump($plugin_data);

		}





		if( !empty( $plugins ) ) {
			echo '<p>Choose from the list of installed plugins.</p>';
			echo '<form name="check_for_rollbacks" action="'.admin_url('/plugins.php').'">';
			echo '<select name="plugin_file">';
			foreach ($plugins as $key => $value) {
				echo '<option value="'.$key.'" '. selected( $selected, $key, false ) .' />'.$value['Name'].'</option>';
			}
			echo '</select>';
			echo '<input type="submit" value="Check" />';
			echo '<input type="hidden" name="page" value="wp-rollback"></form>';

		}else{
			echo '<a href="'.admin_url('/plugins.php').'">Check out the plugin list</a>';
		}


		 ?>
</div>
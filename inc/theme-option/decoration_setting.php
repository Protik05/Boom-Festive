<?php
/*
* Enqueue CSS
*/
// function boom_fest_admin_css(){
// 		wp_enqueue_style( 'boom-fest-admin', get_template_directory_uri() . '/inc/boom-fest-decoration/admin/css/boom-fest-admin.css', array(), '1.0.0', 'all' );
// 		wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/boom-fest-decoration/admin/css/bootstrap.min.css', array(), '5.2.3', 'all' );
// 		wp_enqueue_style('chosen-css', get_template_directory_uri() . '/inc/boom-fest-decoration/admin/css/chosen.min.css', array(), '1.8.7', 'all');
		
// 		wp_enqueue_script( 'boom-fest-admin-js',  get_template_directory_uri() . '/inc/boom-fest-decoration/admin/js/boom-fest-admin.js', array( 'jquery' ),'1.0.0' , false );
// 		wp_enqueue_script( 'bf_customfest', get_template_directory_uri() . '/inc/boom-fest-decoration/admin/js/boom-fest-customfest.js', array( 'jquery' ),'1.0.0', false );
		
		
// 		wp_enqueue_script( 'bootstrap-js',  get_template_directory_uri() .'/inc/boom-fest-decoration/admin/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.2.3', false );
// 		wp_enqueue_script('chosen-js', get_template_directory_uri() . '/inc/boom-fest-decoration/admin/js/chosen.jquery.min.js', array('jquery'), '1.8.7', false);
// 	}
// add_action( 'admin_enqueue_scripts', 'boom_fest_admin_css' );
?>
<div>
		<span>
			<?php 
			settings_errors(); 
			?>
		</span>
		<form action="options.php" method="post">
			<?php
			settings_fields("boom_fest_decor");
			do_settings_sections("boom_festive5");
			submit_button();
			?>
		</form>
	</div>
<?php
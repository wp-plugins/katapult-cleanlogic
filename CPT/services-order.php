<?php
// -------------- services Drag & Drop

add_action( 'admin_menu', 'crosstec_register_services_menu' );

function crosstec_services_order_page() {
?>
<script>
jQuery(function($) {

	$('#sortable-table tbody').sortable({
		axis: 'y',
		handle: '.column-order img',
		placeholder: 'ui-state-highlight',
		forcePlaceholderSize: true,
		update: function(event, ui) {
			var theOrder = $(this).sortable('toArray');

			var data = {
				action: 'crosstec_update_post_order',
				postType: $(this).attr('data-post-type'),
				order: theOrder
			};

			$.post(ajaxurl, data);
		}
	}).disableSelection();

});

</script>
	<div class="wrap">
		<h2>Sort services</h2>
		<p>Simply drag the services up or down and they will be saved in that order.</p>
	<?php $services = new WP_Query( array( 'post_type' => 'services', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order' ) ); ?>
	<?php if( $services->have_posts() ) : ?>

		<table class="wp-list-table widefat fixed posts" id="sortable-table">
			<thead>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-thumbnail">Thumbnail</th>
					<th class="column-title">Title</th>
				</tr>
			</thead>
			<tbody data-post-type="services">
			<?php while( $services->have_posts() ) : $services->the_post(); ?>
				<tr id="post-<?php the_ID(); ?>">
					<td class="column-order"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/css/images/move_icon.jpg'; ?>" title="" alt="Move Icon" width="30" height="30" class="" /></td>
					<td class="column-thumbnail"><?php the_post_thumbnail( 'thumbnail' ); ?></td>
					<td class="column-title"><strong><?php the_title(); ?></strong><div class="excerpt"><?php the_excerpt(); ?></div></td>
				</tr>
			<?php endwhile; ?>
			</tbody>
			<tfoot>
				<tr>
					<th class="column-order">Order</th>
					<th class="column-thumbnail">Thumbnail</th>
					<th class="column-title">Title</th>
				</tr>
			</tfoot>

		</table>

	<?php else: ?>

		<p>No services found, why not <a href="post-new.php?post_type=services">create one?</a></p>

	<?php endif; ?>
	<?php wp_reset_postdata(); // Don't forget to reset again! ?>

	<style>
		#sortable-table td { background: white; }
		#sortable-table .column-order { padding: 3px 10px; width: 50px; }
			#sortable-table .column-order img { cursor: move; }
		#sortable-table td.column-order { vertical-align: middle; text-align: center; }
		#sortable-table .column-thumbnail { width: 160px; }
	</style>

	</div><!-- .wrap -->

<?php

}


function crosstec_register_services_menu() {

    add_submenu_page(

        'edit.php?post_type=services',

        'Order services',

        'Order',

        'edit_pages', 'services-order',

        'crosstec_services_order_page'

    );
}



function crosstec_admin_enqueue_order_services() {
	wp_enqueue_script( 'jquery-ui-sortable' );
}

add_action( 'admin_enqueue_scripts', 'crosstec_admin_enqueue_order_services' );
add_action( 'wp_ajax_crosstec_update_post_order', 'crosstec_update_services_order' );

function crosstec_update_services_order() {
	global $wpdb;

	$post_type     = $_POST['postType'];
	$order        = $_POST['order'];

	/**
	*    Expect: $sorted = array(
	*                menu_order => post-XX
	*            );
	*/
	foreach( $order as $menu_order => $post_id )
	{
		$post_id         = intval( str_ireplace( 'post-', '', $post_id ) );
		$menu_order     = intval($menu_order);
		wp_update_post( array( 'ID' => $post_id, 'menu_order' => $menu_order ) );
	}

	die( '1' );
}
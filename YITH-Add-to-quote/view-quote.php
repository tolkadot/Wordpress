
 LINE 170
	do_action( 'woocommerce_order_items_table', $order );
	?>
	</tbody>
	<tfoot>
	<?php 
	$has_refund = false;

	if ( $total_refunded = $order->get_total_refunded() ) {
		$has_refund = true;
	}

	if ( $show_total_column && $totals = $order->get_order_item_totals() ) {

		foreach ( $totals as $key => $total ) {
			$value = $total['value'];
            $foo = $total['label'];
			?>
			<?php if ( $show_price && ($foo =="Shipping:") ): ?>
			    
				<tr>
					<th scope="row"><?php echo $foo; ?></th>
					<td><?php echo $value; ?></td>
				</tr>
			<?php endif ?>
			<?php if ( $show_price && ($foo =="Total:") ): ?>
			    
				<tr>
					<th scope="row"><?php echo $foo; ?></th>
					<td><?php echo $value; ?></td>
				</tr>
			<?php endif ?>
			
			<?php
		}
	}
	?>
	</tfoot>
</table>

<?php /*  do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

<header>
	<h2><?php _e( 'Customer\'s details', 'yith-woocommerce-request-a-quote' ); ?></h2>
</header>
<table class="shop_table shop_table_responsive customer_details">
	<?php
	if ( $order->billing_email ) {
		echo '<tr><th>' . __( 'Email:', 'yith-woocommerce-request-a-quote' ) . '</th><td data-title="' . __( 'Email', 'yith-woocommerce-request-a-quote' ) . '">' . $order->billing_email . '</td></tr>';
	}

	if ( $order->billing_phone ) {
		echo '<tr><th>' . __( 'Telephone:', 'yith-woocommerce-request-a-quote' ) . '</th><td data-title="' . __( 'Telephone', 'yith-woocommerce-request-a-quote' ) . '">' . $order->billing_phone . '</td></tr>';
	}

	// Additional customer details hook
	do_action( 'woocommerce_order_details_after_customer_details', $order );
	?>
</table>

<?php
$customer_message = get_post_meta( $order->id, 'ywraq_customer_message', true );
$af4 = get_post_meta( $order->id, 'ywraq_other_email_fields', true );
$admin_message = get_post_meta( $order->id, '_ywcm_request_response', true );

if ( '' != $customer_message || ! empty( $af4 ) || '' != $admin_message ) :
?>
<header>
	<h2><?php _e( 'Additional Information', 'yith-woocommerce-request-a-quote' ); ?></h2>
</header>
<table class="shop_table shop_table_responsive customer_details">
	<?php

	// Check for customer note
	if ( '' != $customer_message ) { ?>
		<tr>
			<th scope="row"><?php _e( 'Customer\'s Message:', 'yith-woocommerce-request-a-quote' ); ?></th>
			<td><?php echo wptexturize( $customer_message ); ?></td>
		</tr>
	<?php } //


	if( ! empty( $af4 ) ){
		foreach ( $af4 as $key => $value ) { ?>
			<tr>
				<th scope="row"><?php echo $key; ?></th>
				<td><?php echo $value ?></td>
			</tr>
	<?php }
	}


	if ( '' != $admin_message ) { ?>
		<tr>
			<th scope="row"><?php _e( 'Administrator\'s Message:', 'yith-woocommerce-request-a-quote' ); ?></th>
			<td><?php echo wptexturize( $admin_message ); ?></td>
		</tr>
	<?php } ?>


<?php endif */?>
<div class="clear"></div>

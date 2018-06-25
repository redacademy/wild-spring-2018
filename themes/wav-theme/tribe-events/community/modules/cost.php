<?php
// Don't load directly
defined( 'WPINC' ) or die;

/**
 * Event Submission Form Price Block
 * Renders the pricing fields in the submission form.
 *
 * Override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/community/modules/cost.php
 *
 * @since  3.1
 * @version 4.5
 *
 */

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();
$show_cost_on_community = apply_filters( 'tribe_events_community_display_cost_section', true );

if ( ! $show_cost_on_community ) {
	return;
}

global $post;

if ( $post instanceof WP_Post ) {
	$_EventCurrencyPosition = get_post_meta( $post->ID, '_EventCurrencyPosition', true );
}

if ( isset( $_EventCurrencyPosition ) && 'suffix' === $_EventCurrencyPosition ) {
	$suffix = true;
} elseif ( isset( $_EventCurrencyPosition ) && 'prefix' === $_EventCurrencyPosition ) {
	$suffix = false;
} elseif ( true === tribe_get_option( 'reverseCurrencyPosition', false ) ) {
	$suffix = true;
} else {
	$suffix = false;
}
?>

<div class="tribe-section tribe-section-cost">
	<div class="tribe-section-header">
		<h3><?php printf( esc_html__( '%s Cost', 'tribe-events-community' ), $events_label_singular ); ?></h3>
	</div>

	<?php
	/**
	 * Allow developers to hook and add content to the beginning of this section
	 */
	do_action( 'tribe_events_community_section_before_cost' );
	?>

	<table class="tribe-section-content">
		<colgroup>
			<col class="tribe-colgroup tribe-colgroup-label">
			<col class="tribe-colgroup tribe-colgroup-field">
		</colgroup>

		<tr class="tribe-section-content-row" style="display: none;">
			<td class="tribe-section-content-label">
				<?php tribe_community_events_field_label( 'EventCurrencySymbol', __( 'Currency Symbol:', 'tribe-events-community' ) ); ?>
			</td>
			<td class="tribe-section-content-field">
				<input
					disabled
					id="EventCurrencySymbol"
					class="event-currency-symbol"
					type="text"
					name="EventCurrencySymbol"
					size="2"
					value="<?php echo esc_attr( isset( $_POST['EventCurrencySymbol'] ) ? $_POST['EventCurrencySymbol'] : tribe_community_events_form_currency_symbol() ); ?>"
				/>
				<select
					disabled
					id="EventCurrencyPosition"
					class="event-currency-position tribe-dropdown"
					name="EventCurrencyPosition"
					aria-label="<?php esc_html_e( 'Events Currency Position', 'tribe-events-community' ); ?>"
				>
					<option value="prefix"> <?php _ex( 'Before cost', 'Currency symbol position', 'tribe-events-community' ) ?> </option>
					<option value="suffix"  <?php selected( $suffix, true ); ?>><?php _ex( 'After cost', 'Currency symbol position', 'tribe-events-community' ) ?></option>
				</select>
			</td>
		</tr>

		<tr class="tribe-section-content-row">
			<td class="tribe-section-content-label">
				<?php tribe_community_events_field_label( 'EventCost', __( 'Cost:', 'tribe-events-community' ) ); ?>
			</td>
			<td class="tribe-section-content-field">
				<input type="text" id="EventCost" name="EventCost" class="cost-input-field" size="6" value="<?php echo esc_attr( isset( $_POST['EventCost'] ) ? $_POST['EventCost'] : tribe_get_cost() ); ?>" />
				<p>
					<?php printf( __( 'Leave blank to hide the field. Enter a 0 for %s that are free.', 'tribe-events-community' ), $events_label_plural_lowercase ); ?>
				</p>
			</td>
		</tr>
	</table>

	<?php
	/**
	 * Allow developers to hook and add content to the end of this section
	 */
	do_action( 'tribe_events_community_section_after_cost' );
	?>
</div>


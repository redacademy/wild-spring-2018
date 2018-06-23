<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package WAV_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function WAV_Starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'WAV_Starter_body_classes' );

/** 
  * Change the display of tribe event tags 
  */ 
  function wav_tribe_meta_event_tags( $label = null, $separator = ' ', $echo = true ) { 
	// if ( ! $label ) { 
	// 	$label = esc_html__( 'Tags:', 'the-events-calendar' ); 
	// } 
 
	$tribe_ecp = Tribe__Events__Main::instance(); 
	$list      = get_the_term_list( get_the_ID(), 'post_tag', '<dt>'. $label . '</dt><dd class="tribe-event-tags">', $separator, '</dd>' ); 
	$list      = apply_filters( 'tribe_meta_event_tags', $list, $label, $separator, $echo ); 
	if ( $echo ) { 
		echo $list; 
	} else { 
		return $list; 
	} 
} 
 
/* 
* Change the value of the placeholder in the tribe event bar. src:https://theeventscalendar.com/knowledgebase/change-the-wording-of-any-bit-of-text-or-string/ 
*/ 
function tribe_custom_theme_text ( $translation, $text, $domain ) { 
 
	$custom_text = array( 
		'Keyword' => 'Search', 
		'Date' => 'Date' 
	); 
	// If this text domain starts with "tribe-", "the-events-", or "event-" and we have replacement text 
		if( (strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0 || strpos($domain, 'event-') === 0) && array_key_exists($translation, $custom_text) ) { 
		$translation = $custom_text[$translation]; 
	} 
	return $translation; 
} 
add_filter('gettext', 'tribe_custom_theme_text', 20, 3); 

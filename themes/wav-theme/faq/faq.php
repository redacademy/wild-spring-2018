<?php

add_shortcode( 'faq', array('FAQs', 'shortcode_callback') );
class FAQs {
	
	protected static $scripts_loaded = FALSE;
	
	public static function shortcode_callback( $atts, $content='') {
		if(!self::$scripts_loaded)
			self::enqueue_files();
		
		extract( shortcode_atts(array('title' => ''), $atts) );
		
		$html;
		$html = '<div class="faq-item">';
		$html   .= '<a class="question">' . $title . '</a>';
		$html	.= '<div class="answer">'. $content . '</div>';
		$html .='</div>';
		
		return $html;
		
	}
	
	protected static function enqueue_files() {}
}
?>
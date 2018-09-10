<?php

/**
 * @Author: Steffen Peschel
 * @Date:   2018-09-10 15:55:54
 * @Last Modified by:   Steffen Peschel
 * @Last Modified time: 2018-09-10 18:23:44
 */

namespace WP_KVM\Admin;

/**
 * KVM meta box
 */
class WP_KVM_Meta_Box {
	
	/**
	 * constructor
	 */
	public function __construct() {
	}

	/**
	 * Register meta box
	 *
	 * @return  void
	 */
	public function add_meta_box() {
		add_meta_box( 'wp_kvm_box', __( 'Create a Map of Tommorow shortcode', 'wp-kvm' ), array( $this, 'display_meta_box' ) );
	}

	/**
	 * Meta box display callback
	 * 
	 * @param  WP_Post $post Current post object.
	 * 
	 */
	public function display_meta_box( $post ) {
		
		$html = '<div class="kf-kvm-meta-box">';

			$html .= '<div class="tabsbox">';
				$html .= '<div class="tabsheader">';
					$html .= '<button class="tablink active" onclick="openTab(event, \'kvm_create_iframe\')">' . __( 'iFrame', 'kf-kvm' ) . '</button>';
					$html .= '<button class="tablink" onclick="openTab(event, \'kvm_create_list\')">' . __( 'List', 'kf-kvm' ) . '</button>';
				$html .= '</div>';
				$html .= $this->tab_create_iframe_shortcode();
				$html .= $this->tab_create_list_shortcode();
			$html .= '</div>';

		$html .= '</div>';

		echo $html;	
	}

	/**
	 * Renders the Tab for creating an iframe for KVM
	 *  
	 * @return string 	rendered HTML
	 */
	private function tab_create_iframe_shortcode() 	{
		$html = '<div id="kvm_create_iframe" class="tabcontent open">';
			$html .= 'Hallo Welt';
		$html .= '</div>';

		return $html;
	}

	private function tab_create_list_shortcode($value='') {
		$html = '<div id="kvm_create_list" class="tabcontent">';
			$html .= '… comming soon';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Save meta box content
	 * 
	 * @param int     $post_id Post ID.
     * @param WP_Post $post    Post object.
     * @return null
	 */
	public function save_meta_box( $post_id, $post ) {
		
	}
}
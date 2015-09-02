<?php

namespace SilverWpAddons\MetaBox;

use SilverWp\Helper\Control\PostFormat;
use SilverWp\Helper\Control\SidebarPosition;
use SilverWp\Helper\Control\Toggle;
use SilverWp\Helper\Option;
use SilverWp\MetaBox\MetaBoxAbstract;
use SilverWp\Translate;

if ( ! class_exists( 'SilverWpAddons\Blog' ) ) {
	/**
	 *
	 * Meta box for Blog
	 *
	 * @author        Michal Kalkowski <michal at silversite.pl>
	 * @version       0.3
	 * @category      WordPress
	 * @package       SilverWpAddons
	 * @subpackage    MetaBox
	 * @copyright (c) SilverSite.pl 2015
	 */
	class Blog extends MetaBoxAbstract {
		protected $id = 'post';
		protected $post_type = array( 'post' );
		protected $exclude_columns = array( 'category', 'tag' );
		protected $debug = false;

		protected function createMetaBox() {
			$sidebar = new SidebarPosition( 'sidebar' );
			$sidebar->setLabel( Translate::translate( 'Sidebar position' ) );
			$sidebar->removeOption( 1 );
			$sidebar->setDefault( Option::get_theme_option( 'blogposts_sidebar' ) );
			$this->addMetaBox( $sidebar );

			//Featured on the list
			$featured_list = new Toggle( 'featured' );
			$featured_list->setLabel( Translate::translate( 'Featured on the list' ) );
			$featured_list->setDefault( 0 );
			$this->addMetaBox( $featured_list );
			//ENDFeatured on the list

			$post_format = new PostFormat();
			$this->addMetaBox( $post_format );

		}

		/**
		 * Remove meta box
		 *
		 * @return array
		 * @see    https://codex.wordpress.org/Function_Reference/remove_meta_box
		 * @access public
		 */
		public function remove() {
			return array(
				array(
					'id'      => 'formatdiv',
					'page'    => 'post',
					'context' => 'side',
				),
			);
		}
	}
}
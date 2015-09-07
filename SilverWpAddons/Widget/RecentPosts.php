<?php
/*
 * Copyright (C) 2014 Michal Kalkowski <michal at silversite.pl>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
namespace SilverWpAddons\Widget;

use SilverWp\Helper\Control\CategoriesCheckboxes;
use SilverWp\Helper\Control\Checkbox;
use SilverWp\Helper\Control\Text;
use SilverWp\Widget\WidgetAbstract;
use SilverWp\Translate;

if ( ! class_exists( 'SilverWpAddons\Widget\RecentPosts' ) ) {
	/**
	 * Recent Posts Widget
	 *
	 * @author        Michal Kalkowski <michal at silversite.pl>
	 * @version       0.4
	 * @category      WordPress
	 * @package       SilverWpAddons
	 * @subpackage    Widget
	 * @copyright     2009 - 2015 (c) SilverSite.pl
	 */
	class RecentPosts extends WidgetAbstract {
		public function __construct() {

			$widget_options = array(
				'description' => Translate::translate( 'Blog posts with images from selected categories.' ),
			);
			parent::__construct( 'custom-recent-posts',
				Translate::translate( 'Recent Posts with Image' ),
				$widget_options );

			// Configure the widget fields
			$title = new Text( 'title' );
			$title->setLabel( Translate::translate( 'Title' ) );
			$title->setDefault( Translate::translate( 'Recent Posts With Image' ) );
			$this->addControl( $title );

			$number = new Text( 'number' );
			$number->setLabel( Translate::translate( 'Number of posts to show' ) );
			$number->setDefault( 5 );
			$this->addControl( $number );

			$show_date = new Checkbox( 'show_date' );
			$show_date->setLabel( Translate::translate( 'Display post date' ) );
			$show_date->setDefault( 1 );
			$this->addControl( $show_date );

			$show_author = new Checkbox( 'show_author' );
			$show_author->setLabel( Translate::translate( 'Display post author' ) );
			$show_author->setDefault( 1 );
			$this->addControl( $show_author );

			$show_category = new Checkbox( 'show_category' );
			$show_category->setLabel( Translate::translate( 'Display post category' ) );
			$this->addControl( $show_category );

			$show_image = new Checkbox( 'show_image' );
			$show_image->setLabel( Translate::translate( 'Display post image' ) );
			$this->addControl( $show_image );

			$categories = new CategoriesCheckboxes( 'categories' );
			$categories->setLabel( Translate::translate( 'Categories' ) );
			$categories->setMulti( true );
			$this->addControl( $categories );
		}
	}
}

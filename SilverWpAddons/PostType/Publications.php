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

namespace SilverWpAddons\PostType;

use SilverWp\PostType\PostTypeAbstract;
use SilverWp\Translate;

if ( ! class_exists( '\SilverWpAddons\Publications' ) ) {
	/**
	 * Publications custom post type
	 *
	 * @author        Michal Kalkowski <michal at silversite.pl>
	 * @version       $Revision:$
	 * @category      WordPress
	 * @package       SilverWpAddons
	 * @subpackage    PostType
	 * @copyright     SilverSite.pl (c) 2015
	 */
	class Publications extends PostTypeAbstract {
		protected $name = 'Publications';
		protected $supports = array( 'title' );

		protected function setLabels() {
			$this->labels = array(
				'menu_name'      => Translate::translate( 'Publications' ),
				'name'           => Translate::translate( 'Publications' ),
				'name_admin_bar' => Translate::translate( 'Publications' ),
				'all_items'      => Translate::translate( 'All Publications' )
			);
		}
	}
}

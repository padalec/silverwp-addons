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
namespace SilverWpAddons\MetaBox;

use SilverWp\Helper\Control\Attachments;
use SilverWp\Helper\Control\Textarea;
use SilverWp\Translate;
use SilverWp\MetaBox\MetaBoxAbstract;

if ( ! class_exists( '\SilverWpAddons\Publications' ) ) {
	/**
	 * Publications Meta box for Publications Post Type
	 *
	 * @author        Michal Kalkowski <michal at silversite.pl>
	 * @version       $Id:$
	 * @category      WordPress
	 * @package       SilverWpAddons
	 * @subpackage    MetaBox
	 * @copyright (c) SilverSite.pl 2015
	 */
	class Publications extends MetaBoxAbstract {

		protected function createMetaBox() {

			//todo add P2P connect with CPT authors

			$text_area = new Textarea( 'affiliation' );
			$text_area->setLabel( Translate::translate( 'Affiliation' ) );

			$this->addMetaBox( $text_area );

			//todo add P2P multiselect connect with Publications

		}
	}
}

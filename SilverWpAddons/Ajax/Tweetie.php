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
namespace SilverWp\Ajax;

use SilverWp\Helper\Option;
use TwitterOAuth;

if ( class_exists( '\TwitterOAuth' ) && ! class_exists( '\SilverWp\Tweetie' ) ) {
    /**
     * Tweetier post
     *
     * @author Michal Kalkowski <michal at silversite.pl>
     * @version $Id: Tweetie.php 2184 2015-01-21 12:20:08Z padalec $
     * @category WordPress
     * @package SilverWp
     * @subpackage Ajax
     * @copyright (c) SilverSite.pl 2015
     */
    class Tweetie extends AjaxAbstract {
        protected $name = 'tweetie';
        protected $ajax_js_file = 'plugins/tweetie/tweetie.min.js';
        protected $ajax_handler = 'TweetieAjax';

        /**
         *
         * connect with Tweetier API
         *
         * @todo config class from all Theme Options
         * @return \SilverWp\Ajax\TwitterOAuth
         */
        private function connect() {
            $cons_key     = Option::get_theme_option( 'plugin_social_key[twitter]' );
            $cons_secret  = Option::get_theme_option( 'plugin_social_secret[twitter]' );
            $oauth_token  = Option::get_theme_option( 'plugin_social_access_token[twitter]' );
            $oauth_secret = Option::get_theme_option( 'plugin_social_access_secret[twitter]' );
            $connection   = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_secret );

            return $connection;
        }

        public function ajaxResponse() {
            $username        = $this->getRequestData( 'username', FILTER_SANITIZE_SPECIAL_CHARS );
            $number          = $this->getRequestData( 'count', FILTER_SANITIZE_NUMBER_INT );
            $exclude_replies = $this->getRequestData( 'exclude_replies', FILTER_SANITIZE_SPECIAL_CHARS );
            $list_slug       = $this->getRequestData( 'list_slug', FILTER_SANITIZE_SPECIAL_CHARS );
            $hashtag         = $this->getRequestData( 'hashtag', FILTER_SANITIZE_SPECIAL_CHARS );

            $Tweets = $this->connect();
            // Get Tweets
            if ( ! empty( $list_slug ) ) {
                $params = array(
                    'owner_screenname' => $username,
                    'slug'             => $list_slug,
                    'per_page'         => $number
                );

                $url = '/lists/statuses';

            } elseif ( $hashtag ) {
                $params = array(
                    'count' => $number,
                    'q'     => '#' . $hashtag
                );

                $url = '/search/tweets';

            } else {
                $params = array(
                    'count'           => $number,
                    'exclude_replies' => $exclude_replies,
                    'screenname'      => $username
                );

                $url = '/statuses/user_timeline';
            }

            $tweets = $Tweets->get( $url, $params );
            $this->responseJson( $tweets );
        }
    }
}
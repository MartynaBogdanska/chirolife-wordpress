<?php
/*
Plugin Name: Don’t Muck My Markup
plugin uri: http://wordpress.org/extend/plugins/dont-muck-my-markup/
description: A necessity for any serious web designer, this plugin lets you disable all auto-generated HTML markup from your posts and pages on a page-by-page basis while keeping your shortcodes in tact. When activated, you'll find a little checkbox in the right sidebar of each Edit Post/Page interface.
version: 1.7
author: Martyn Chamberlin
author uri: http://perfectioncoding.com
license: gplv3
*/

/*	Copyright 2012 Martyn Chamberlin (email : martyn@perfectioncoding.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Fundtaion; either version 3 of the license, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

Class DMMM
{
  static $plugin_url;

  public static function initializeComponent()
  {
    self::$plugin_url = __FILE__;
    require plugin_dir_path( __FILE__ ) . 'class/admin.php';
    require plugin_dir_path( __FILE__ ) . 'class/view.php';
    $admin = new Admin();
    view::add_view_filter();

  }
}

/*	In a robust C language, every single line of code is object-oriented,
    meaning everything happens inside a class. Since method calls
    cannot happen in the body of a class declaration, this means that all
    method calls must occur inside other methods. Your author firmly
    believes in OOP, and thus in this plugin, the only exception to this
    methodology is in the method call below.
*/

DMMM::initializeComponent();

function dmmm_add_settings_link( $links ) {
    $settings_link = '<a href="tools.php?page=dont-muck-my-markup">' . __( 'Settings' ) . '</a>';
    array_unshift( $links, $settings_link );
    return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'dmmm_add_settings_link', 0 );

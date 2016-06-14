<?php

/**
 * @package Disable Plugin Deactivation
 */
/*
  Plugin Name: Disable Plugin Deactivation
  Plugin URI: http://www.clariontechnologies.co.in
  Description: Disable Plugin Deactivation
  Version: 1.0.0
  Author: Yogesh Pawar, Clarion Technologies
  Author URI: http://www.clariontechnologies.co.in
  License: GPLv2 or later
  Text Domain: Disable Plugin Deactivation
 */

//Plugin Constant
defined('ABSPATH') or die('Restricted direct access!');

if (!class_exists('Disable_Plugin_Deactivation')) {
    require_once 'classes/class.plugin.deactivation.php';
}

//Initialising Class Plugin
new Disable_Plugin_Deactivation();
?>
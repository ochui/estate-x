<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// Version

define('VERSION', '1.0.0.0');



// Configuration

if (is_file('config.php')) {

	require_once('config.php');

}



// Install

if (!defined('DIR_APPLICATION')) {

	header('Location: install/index.php');

	exit;

}



// Startup

require_once(DIR_SYSTEM . 'startup.php');



start('catalog');
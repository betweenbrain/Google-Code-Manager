<?php defined('_JEXEC') or die;

/**
 * File       pagecodemanager.php
 * Created    12/26/13 4:26 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

require_once(JPATH_COMPONENT . DS . 'controller.php');

// Require specific controller if requested
if ($controller = JRequest::getWord('controller'))
{
	$path = JPATH_COMPONENT . DS . 'controllers' . DS . $controller . '.php';
	if (file_exists($path))
	{
		require_once $path;
	}
	else
	{
		$controller = '';
	}
}

// Create the controller
$classname  = 'PagecodesController' . $controller;
$controller = new $classname();

// Perform the Request task
$controller->execute(JRequest::getVar('task'));

// Redirect if set by the controller
$controller->redirect();
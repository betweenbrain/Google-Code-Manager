<?php defined('_JEXEC') or die;

/**
 * File       codes.php
 * Created    12/30/13 3:12 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class PagesControllerCodes extends PagesController
{
	/**
	 * Method to display the view
	 *
	 * @access    public
	 */
	function display()
	{
		JRequest::setVar('view', 'codes');
		JRequest::setVar('hidemainmenu', 0);
		parent::display();
	}
}
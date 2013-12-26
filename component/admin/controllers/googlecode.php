<?php defined('_JEXEC') or die;

/**
 * File       googlecode.php
 * Created    12/26/13 4:56 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class GooglecodesControllerGooglecode extends GooglecodesController
{
	/**
	 * constructor (registers additional tasks to methods)
	 *
	 * @return void
	 */
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask('add', 'edit');
	}

	/**
	 * display the edit form
	 *
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar('view', 'googlecode');
		JRequest::setVar('layout', 'form');
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 *
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('googlecode');

		if ($model->store())
		{
			$msg = JText::_('Google Code Saved');
		}
		else
		{
			$msg = JText::_('Error Saving Google Code');
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_googlecodemanager';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 *
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('googlecode');
		if (!$model->delete())
		{
			$msg = JText::_('Error: One or More Google Codes Could not be Deleted');
		}
		else
		{
			$msg = JText::_('Google Code(s) Deleted');
		}

		$this->setRedirect('index.php?option=com_googlecodemanager', $msg);
	}

	/**
	 * cancel editing a record
	 *
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_('Operation Cancelled');
		$this->setRedirect('index.php?option=com_googlecodemanager', $msg);
	}

}
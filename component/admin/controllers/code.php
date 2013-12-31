<?php defined('_JEXEC') or die;

/**
 * File       code.php
 * Created    12/30/13 4:15 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class PagesControllerCode extends PagesController
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
		$this->registerTask('unpublish', 'publish');
	}

	/**
	 * cancel editing a record
	 *
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_('COM_PAGE_CODE_MANAGER_MESSAGE_CANCELLED');
		$this->setRedirect('index.php?option=com_pagecodemanager&controller=codes', $msg);
	}

	/**
	 * display the edit form
	 *
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar('view', 'code');
		JRequest::setVar('layout', 'form');
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * Set publish state of Code Type from list view
	 */
	function publish()
	{
		// Check for request forgeries
		// JRequest::checkToken() or jexit( 'Invalid Token' );

		$this->setRedirect('index.php?option=com_pagecodemanager&controller=codes');

		// Initialize variables
		$db      =& JFactory::getDBO();
		$cid     = JRequest::getVar('cid', array(), 'post', 'array');
		$task    = JRequest::getCmd('task');
		$publish = ($task == 'publish');
		$n       = count($cid);

		if (empty($cid))
		{
			return JError::raiseWarning(500, JText::_('COM_PAGE_CODE_MANAGER_WARNING_NONE_SELECTED'));
		}

		JArrayHelper::toInteger($cid);
		$cids  = implode(',', $cid);

		$query = 'UPDATE #__page_code_codes'
			. ' SET published = ' . (int) $publish
			. ' WHERE id IN ( ' . $cids . '  )';
		$db->setQuery($query);

		if (!$db->query())
		{
			return JError::raiseWarning(500, $db->getError());
		}

		$this->setMessage(JText::sprintf($publish ? 'COM_PAGE_CODE_MANAGER_MESSAGE_CODES_PUBLISHED' : 'COM_PAGE_CODE_MANAGER_MESSAGE_CODES_UNPUBLISHED', $n));
	}

	/**
	 * remove record(s)
	 *
	 * @return void
	 */
	function remove()
	{
		$cid   = JRequest::getVar('cid', array(), 'post', 'array');
		$n     = count($cid);
		$model = $this->getModel('code');

		if (!$model->delete())
		{
			$msg = JText::_('COM_PAGE_CODE_MANAGER_ERROR_CODE_DELETE');
		}
		else
		{
			$msg = JText::sprintf('COM_PAGE_CODE_MANAGER_MESSAGE_CODE_DELETED', $n);
		}

		$this->setRedirect('index.php?option=com_pagecodemanager&controller=codes', $msg);
	}

	/**
	 * save a record (and redirect to main page)
	 *
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('code');

		if ($model->store())
		{
			$msg = JText::_('COM_PAGE_CODE_MANAGER_MESSAGE_CODE_SAVED');
		}
		else
		{
			$msg = JText::_('COM_PAGE_CODE_MANAGER_ERROR_CODE_SAVE');
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_pagecodemanager&controller=codes';
		$this->setRedirect($link, $msg);
	}
}
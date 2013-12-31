<?php defined('_JEXEC') or die;

/**
 * File       view.html.php
 * Created    12/26/13 4:41 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.application.component.view');

class PagesViewPages extends JView
{
	/**
	 * Page codes view display method
	 *
	 * @return void
	 **/
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('COM_PAGE_CODE_MANAGER') . ': ' . JText::_('COM_PAGE_CODE_MANAGER_PAGES'), 'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

		// Get data from the model
		$items =& $this->get('Data');

		$this->assignRef('items', $items);

		parent::display($tpl);
	}
}
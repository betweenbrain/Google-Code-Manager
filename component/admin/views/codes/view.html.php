<?php defined('_JEXEC') or die;

/**
 * File       view.html.php
 * Created    12/30/13 3:15 PM 
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.application.component.view');

class PagesViewCodes extends JView
{
	/**
	 * Page codes view display method
	 *
	 * @return void
	 **/
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Page Code Types'), 'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

		// Get data from the model
		$items =& $this->get('Data');

		$this->assignRef('items', $items);

		parent::display($tpl);
	}
}
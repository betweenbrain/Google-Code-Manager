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

/**
 * Hellos View
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class GooglecodesViewGooglecodes extends JView
{
	/**
	 * Hellos view display method
	 *
	 * @return void
	 **/
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Google Code Manager'), 'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();

		// Get data from the model
		$items =& $this->get('Data');

		$this->assignRef('items', $items);

		parent::display($tpl);
	}
}
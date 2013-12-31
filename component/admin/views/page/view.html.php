<?php defined('_JEXEC') or die;

/**
 * File       view.html.php
 * Created    12/26/13 3:54 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.application.component.view');

class PagesViewPage extends JView
{
	/**
	 * display method of Page code view
	 *
	 * @return void
	 **/
	function display($tpl = null)
	{

		$page = $this->get('Data');
		$isNew    = ($page->id < 1);
		$text     = $isNew ? JText::_('COM_PAGE_CODE_MANAGER_NEW') : JText::_('COM_PAGE_CODE_MANAGER_EDIT');
		JToolBarHelper::title(JText::_('COM_PAGE_CODE_MANAGER_PAGE') . ': <small><small>[ ' . $text . ' ]</small></small>');
		JToolBarHelper::save();
		if ($isNew)
		{
			JToolBarHelper::cancel();
		}
		else
		{
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel('cancel', 'COM_PAGE_CODE_MANAGER_CLOSE');
		}

		$this->assignRef('page', $page);

		$this->assignRef('selectType', JHTML::_('select.genericlist', $this->get('Types'), 'codeId', '', 'value', 'text', $page->codeId));

		parent::display($tpl);
	}
}
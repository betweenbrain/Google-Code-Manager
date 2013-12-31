<?php defined('_JEXEC') or die;

/**
 * File       pagecodes.php
 * Created    12/26/13 4:31 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

jimport('joomla.application.component.model');

class PagecodesModelCodes extends JModel
{
	/**
	 * Page code data array
	 *
	 * @var array
	 */
	var $_data;

	/**
	 * Returns the query
	 *
	 * @return string The query to be used to retrieve the rows from the database
	 */
	function _buildQuery()
	{
		$query = ' SELECT * '
			. ' FROM #__page_code_codes';

		return $query;
	}

	/**
	 * Retrieves the Page code data
	 *
	 * @return array Array of objects containing the data from the database
	 */
	function getData()
	{
		// Lets load the data if it doesn't already exist
		if (empty($this->_data))
		{
			$query       = $this->_buildQuery();
			$this->_data = $this->_getList($query);
		}

		return $this->_data;
	}
}
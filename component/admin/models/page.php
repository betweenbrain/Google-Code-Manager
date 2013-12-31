<?php defined('_JEXEC') or die;

/**
 * File       page.php
 * Created    12/26/13 3:56 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class PagesModelPage extends JModel
{

	/**
	 * Constructor that retrieves the ID from the request
	 *
	 * @access    public
	 * @return    void
	 */
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid', 0, '', 'array');

		$this->setId((int) $array[0]);
	}

	/**
	 * Method to delete record(s)
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function delete()
	{
		$cids = JRequest::getVar('cid', array(0), 'post', 'array');
		$row  =& $this->getTable();

		foreach ($cids as $cid)
		{
			if (!$row->delete($cid))
			{
				$this->setError($row->getErrorMsg());

				return false;
			}
		}

		return true;
	}

	/**
	 * Method to get a Page code
	 *
	 * if !$this->_data sets default state of new item
	 * (e.g. $this->_data->published = 1 sets default published state)
	 *
	 * @return object with data
	 */

	function &getData()
	{
		// Load the data
		if (empty($this->_data))
		{
			$query = ' SELECT * FROM #__page_code_pages ' .
				'  WHERE id = ' . $this->_id;
			$this->_db->setQuery($query);
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data)
		{
			$this->_data            = new stdClass();
			$this->_data->id        = 0;
			$this->_data->url       = null;
			$this->_data->codeId    = null;
			$this->_data->published = null;
		}

		return $this->_data;
	}

	/**
	 * Returns array of code types for populating generic select list
	 *
	 * @return mixed
	 */
	function getTypes()
	{
		if (empty($this->_types))
		{

			$query = ' SELECT id as value, name as text ' .
				' FROM #__page_code_codes ' .
				' ORDER BY name' .
				' AND published = 1';
			$this->_db->setQuery($query);
			$this->_types = $this->_db->loadAssocList();
		}

		return $this->_types;
	}

	/**
	 * Method to set the Page code identifier
	 *
	 * @access    public
	 *
	 * @param    int Page code identifier
	 *
	 * @return    void
	 */
	function setId($id)
	{
		// Set id and wipe data
		$this->_id   = $id;
		$this->_data = null;
	}

	/**
	 * Method to store a record
	 *
	 * @access    public
	 * @return    boolean    True on success
	 */
	function store()
	{
		// retrieves a reference to our JTable object
		$row =& $this->getTable();

		// retrieve the data from the form and trim whitespace from inputs
		$post = JRequest::get('post');

		foreach ($post as $key => $value)
		{
			$data[$key] = trim($value);
		}

		/**
		 * Bind the form fields to the Pages table
		 *
		 * JTable/bind($from, $ignore=array());
		 *
		 * $from An associative array or object to be bind to the JTable instance.
		 */
		if (!$row->bind($data))
		{
			$this->setError($this->_db->getErrorMsg());

			return false;
		}

		/**
		 * Make sure the Page code record is valid
		 *
		 * JTable/check();
		 * can be overridden in our TablePage class
		 */
		if (!$row->check())
		{
			$this->setError($this->_db->getErrorMsg());

			return false;
		}

		/**
		 * Store the data object table to the database
		 *
		 * if id is 0, it will create a new record (INSERT), otherwise, it will update the existing record (UPDATE).
		 *
		 */
		if (!$row->store())
		{
			$this->setError($this->_db->getErrorMsg());

			return false;
		}

		return true;
	}
}
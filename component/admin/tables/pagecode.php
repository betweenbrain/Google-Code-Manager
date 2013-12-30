<?php defined('_JEXEC') or die;

/**
 * File       pagecode.php
 * Created    12/26/13 5:04 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class TablePagecode extends JTable
{
	/**
	 * Primary Key
	 *
	 * @var int
	 */
	var $id = null;

	/**
	 * @var string
	 */
	var $url = null;

	/**
	 * @var string
	 */
	var $typeId = null;

	/**
	 * @var string
	 */
	var $published = 0;

	/**
	 * @var string
	 */
	var $publish_up = null;

	/**
	 * @var string
	 */
	var $publish_down = null;

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__page_code_urls', 'id', $db);
	}
}
<?php defined('_JEXEC') or die;

/**
 * File       form.php
 * Created    12/26/13 3:54 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

JHTML::_('behavior.formvalidation');
?>
<script language="javascript" type="text/javascript">
	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancel') {
			submitform(pressbutton);
			return;
		}

		// do field validation
		if (form.url.value == "") {
			alert("<?php echo JText::_( 'You must provide a URL.', true ); ?>");
		}
		else if (form.typeId.value == "") {
			alert("<?php echo JText::_( 'You must provide a code.', true ); ?>");
		} else {
			submitform(pressbutton);
		}
	}
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" class="form-validate">
	<div class="col100">
		<fieldset class="adminform">
			<legend><?php echo JText::_('Details'); ?></legend>
			<table class="admintable">
				<tr>
					<td width="100" align="right" class="key">
						<label for="url">
							<?php echo JText::_('COM_PAGE_CODE_MANAGER_URL'); ?>:
						</label>
					</td>
					<td>
						<input class="text_area required" type="text" name="url" id="url" size="96" maxlength="250" value="<?php echo $this->page->url; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('Page Code'); ?>:
						</label>
					</td>
					<td>
						<?php echo $this->selectType; ?>
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('COM_PAGE_CODE_MANAGER_PUBLISHED'); ?>:
						</label>
					</td>
					<td>
						<?php echo JHTML::_('select.booleanlist', 'published', null, $this->page->published); ?>
					</td>
				</tr>
			</table>
		</fieldset>
	</div>

	<div class="clr"></div>

	<input type="hidden" name="option" value="com_pagecodemanager" />
	<input type="hidden" name="id" value="<?php echo $this->page->id; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="controller" value="page" />
</form>
<?php defined('_JEXEC') or die;

/**
 * File       form.php
 * Created    12/30/13 4:17 PM
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
		if (form.type.value == "") {
			alert("<?php echo JText::_( 'You must provide a name for this code type.', true ); ?>");
		}
		else if (form.code.value == "") {
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
							<?php echo JText::_('Type'); ?>:
						</label>
					</td>
					<td>
						<input class="text_area required" type="text" name="type" id="type" size="96" maxlength="250" value="<?php echo $this->codetype->type; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('Code'); ?>:
						</label>
					</td>
					<td>
						<input class="text_area required" type="text" name="code" id="code" size="32" maxlength="250" value="<?php echo $this->codetype->code; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('Published'); ?>:
						</label>
					</td>
					<td>
						<?php echo JHTML::_('select.booleanlist', 'published', null, $this->codetype->published); ?>
					</td>
				</tr>
			</table>
		</fieldset>
	</div>

	<div class="clr"></div>

	<input type="hidden" name="option" value="com_pagecodemanager" />
	<input type="hidden" name="id" value="<?php echo $this->codetype->id; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="controller" value="pagecodetype" />
</form>
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
<script type="text/javascript">
	function submitbutton(pressbutton) {
		if (pressbutton == 'cancel') {
			submitform(pressbutton);
		} else {
			var f = document.adminForm;
			if (document.formvalidator.isValid(f)) {
				f.check.value = '<?php echo JUtility::getToken(); ?>'; //send token
				submitform(pressbutton);
			}
			else {
				var msg = new Array();
				if ($('url').hasClass('invalid')) {
					msg.push('<?php echo JText::_( 'You must provide a URL.', true ); ?>');
				}
				if ($('code').hasClass('invalid')) {
					msg.push('<?php echo JText::_( 'You must provide a code.', true ); ?>');
				}
				alert(msg.join('\n'));
			}
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
							<?php echo JText::_('URL'); ?>:
						</label>
					</td>
					<td>
						<input class="text_area required" type="text" name="url" id="url" size="96" maxlength="250" value="<?php echo $this->googlecode->url; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('Google Code'); ?>:
						</label>
					</td>
					<td>
						<input class="text_area required" type="text" name="code" id="code" size="32" maxlength="250" value="<?php echo $this->googlecode->code; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="code">
							<?php echo JText::_('Published'); ?>:
						</label>
					</td>
					<td>
						<?php echo JHTML::_('select.booleanlist', 'published', null, $this->googlecode->published); ?>
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="publish_up">
							<?php echo JText::_('Start Date'); ?>:
						</label>
					</td>
					<td>
						<?php echo JHTML::calendar($this->googlecode->publish_up, 'publish_up', 'publish_up', $format = '%Y-%m-%d %H:%M:%S', $attribs = null) ?>
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<label for="publish_down">
							<?php echo JText::_('End Date'); ?>:
						</label>
					</td>
					<td>
						<?php echo JHTML::calendar($this->googlecode->publish_down, 'publish_down', 'publish_down', $format = '%Y-%m-%d %H:%M:%S', $attribs = null) ?>
					</td>
				</tr>
			</table>
		</fieldset>
	</div>

	<div class="clr"></div>

	<input type="hidden" name="option" value="com_googlecodemanager" />
	<input type="hidden" name="id" value="<?php echo $this->googlecode->id; ?>" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="controller" value="googlecode" />
</form>
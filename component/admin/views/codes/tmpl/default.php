<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    12/30/13 3:47 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
?>
<form action="index.php" method="post" name="adminForm">
	<div id="editcell">
		<table class="adminlist">
			<thead>
			<tr>
				<th width="20">
					<input type="checkbox" name="toggle" value=""
						onclick="checkAll(<?php echo count($this->items); ?>);" />
				</th>
				<th width="5">
					<?php echo JText::_('COM_PAGE_CODE_MANAGER_ID'); ?>
				</th>
				<th>
					<?php echo JText::_('Name'); ?>
				</th>
				<th>
					<?php echo JText::_('COM_PAGE_CODE_MANAGER_CODE'); ?>
				</th>
				<th width="150">
					<?php echo JText::_('Start Date'); ?>
				</th>
				<th width="150">
					<?php echo JText::_('End Date'); ?>
				</th>
				<th width="62">
					<?php echo JText::_('COM_PAGE_CODE_MANAGER_PUBLISHED'); ?>
				</th>
			</tr>
			</thead>
			<?php
			$k = 0;
			$i = 0;
			foreach ($this->items as &$row)
			{
				$i++;
				$checked = JHTML::_('grid.id', $i, $row->id);
				$link    = JRoute::_('index.php?option=com_pagecodemanager&controller=code&task=edit&cid[]=' . $row->id);
				?>
				<tr class="<?php echo "row" . $k; ?>">
					<td>
						<?php echo $checked; ?>
					</td>
					<td>
						<?php echo $row->id; ?>
					</td>
					<td>
						<a href="<?php echo $link; ?>">
							<?php echo $row->name; ?>
						</a>
					</td>
					<td>
						<?php echo $row->code; ?>
					</td>
					<td align="center">
						<?php echo $row->publish_up; ?>
					</td>
					<td align="center">
						<?php echo $row->publish_down; ?>
					</td>
					<td align="center">
						<?php echo JHtml::_('grid.published', $row, $i); ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
		</table>
	</div>
	<input type="hidden" name="option" value="com_pagecodemanager" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="controller" value="code" />
</form>
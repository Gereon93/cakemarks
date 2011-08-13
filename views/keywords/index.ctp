<div class="keywords index">
	<h2><?php __('Keywords');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('sticky');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($keywords as $keyword):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $keyword['Keyword']['title']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($keyword['ParentKeyword']['title'], array('controller' => 'keywords', 'action' => 'view', $keyword['ParentKeyword']['id'])); ?>
		</td>
			<td><?php if ($keyword['Keyword']['sticky']) echo '✓'; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $keyword['Keyword']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $keyword['Keyword']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $keyword['Keyword']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $keyword['Keyword']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

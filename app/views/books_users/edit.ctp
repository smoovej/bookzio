<div class="booksUsers form">
<?php echo $this->Form->create('BooksUser');?>
	<fieldset>
		<legend><?php __('Edit Books User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('book_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('BooksUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('BooksUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Books Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="booksUsers form">
<?php echo $this->Form->create('BooksUser');?>
	<fieldset>
		<legend><?php __('Add Books User'); ?></legend>
	<?php
		echo $this->Form->input('book_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Books Users', true), array('action' => 'index'));?></li>
	</ul>
</div>
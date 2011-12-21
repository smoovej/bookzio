<div class="booksUsers view">
<h2><?php  __('Books User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $booksUser['BooksUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Book Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $booksUser['BooksUser']['book_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $booksUser['BooksUser']['user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $booksUser['BooksUser']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $booksUser['BooksUser']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Books User', true), array('action' => 'edit', $booksUser['BooksUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Books User', true), array('action' => 'delete', $booksUser['BooksUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $booksUser['BooksUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Books Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Books User', true), array('action' => 'add')); ?> </li>
	</ul>
</div>

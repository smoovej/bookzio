<?php
/**
 *@var  View
 */
?>

<div class="grid_12" id="age_question">
    <?php echo $this->Form->create('Book', array('action' => 'recommend')); ?>
    <span class="huge">What's a great book for a&nbsp;</span>
    <?php echo $this->Form->input('age', array(
                                     'div' => null,
                                     'label' => false,
                                     'name' => 'age',
                                     'size' =>1,
                                     'align' => 'right',
                                     'id' => 'age'));?>
    <span class="huge">&nbsp;year old?</span>

    <?php echo $this->Form->end();?>
</div>
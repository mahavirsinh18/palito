<?php
/* @var $this TermsController */
/* @var $data Terms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conditions')); ?>:</b>
	<?php echo CHtml::encode($data->conditions); ?>
	<br />


</div>
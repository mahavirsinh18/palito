<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_title')); ?>:</b>
	<?php echo CHtml::encode($data->post_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_content')); ?>:</b>
	<?php echo CHtml::encode($data->post_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_views')); ?>:</b>
	<?php echo CHtml::encode($data->post_views); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_remark')); ?>:</b>
	<?php echo CHtml::encode($data->post_remark); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_at')); ?>:</b>
	<?php echo CHtml::encode($data->updated_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_deleted')); ?>:</b>
	<?php echo CHtml::encode($data->is_deleted); ?>
	<br />

	*/ ?>

</div>
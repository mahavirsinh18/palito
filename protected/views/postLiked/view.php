<?php
/* @var $this PostLikedController */
/* @var $model PostLiked */

$this->breadcrumbs=array(
	'Post Likeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PostLiked', 'url'=>array('index')),
	array('label'=>'Create PostLiked', 'url'=>array('create')),
	array('label'=>'Update PostLiked', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PostLiked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PostLiked', 'url'=>array('admin')),
);
?>

<h1>View PostLiked #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'post_id',
	),
)); ?>

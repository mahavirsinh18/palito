<?php
/* @var $this LikedController */
/* @var $model Liked */

$this->breadcrumbs=array(
	'Likeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Liked', 'url'=>array('index')),
	array('label'=>'Create Liked', 'url'=>array('create')),
	array('label'=>'Update Liked', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Liked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Liked', 'url'=>array('admin')),
);
?>

<h1>View Liked #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'article_id',
		'liked',
	),
)); ?>

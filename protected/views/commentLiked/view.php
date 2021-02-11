<?php
/* @var $this CommentLikedController */
/* @var $model CommentLiked */

$this->breadcrumbs=array(
	'Comment Likeds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CommentLiked', 'url'=>array('index')),
	array('label'=>'Create CommentLiked', 'url'=>array('create')),
	array('label'=>'Update CommentLiked', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CommentLiked', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CommentLiked', 'url'=>array('admin')),
);
?>

<h1>View CommentLiked #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'post_id',
		'comment_id',
	),
)); ?>

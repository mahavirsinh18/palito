<?php
/* @var $this CommentLikedController */
/* @var $model CommentLiked */

$this->breadcrumbs=array(
	'Comment Likeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CommentLiked', 'url'=>array('index')),
	array('label'=>'Create CommentLiked', 'url'=>array('create')),
	array('label'=>'View CommentLiked', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CommentLiked', 'url'=>array('admin')),
);
?>

<h1>Update CommentLiked <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CommentLikedController */
/* @var $model CommentLiked */

$this->breadcrumbs=array(
	'Comment Likeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CommentLiked', 'url'=>array('index')),
	array('label'=>'Manage CommentLiked', 'url'=>array('admin')),
);
?>

<h1>Create CommentLiked</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
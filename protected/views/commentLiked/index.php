<?php
/* @var $this CommentLikedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comment Likeds',
);

$this->menu=array(
	array('label'=>'Create CommentLiked', 'url'=>array('create')),
	array('label'=>'Manage CommentLiked', 'url'=>array('admin')),
);
?>

<h1>Comment Likeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

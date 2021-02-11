<?php
/* @var $this PostLikedController */
/* @var $model PostLiked */

$this->breadcrumbs=array(
	'Post Likeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PostLiked', 'url'=>array('index')),
	array('label'=>'Manage PostLiked', 'url'=>array('admin')),
);
?>

<h1>Create PostLiked</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
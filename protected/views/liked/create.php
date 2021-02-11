<?php
/* @var $this LikedController */
/* @var $model Liked */

$this->breadcrumbs=array(
	'Likeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Liked', 'url'=>array('index')),
	array('label'=>'Manage Liked', 'url'=>array('admin')),
);
?>

<h1>Create Liked</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this LikedController */
/* @var $model Liked */

$this->breadcrumbs=array(
	'Likeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Liked', 'url'=>array('index')),
	array('label'=>'Create Liked', 'url'=>array('create')),
	array('label'=>'View Liked', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Liked', 'url'=>array('admin')),
);
?>

<h1>Update Liked <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
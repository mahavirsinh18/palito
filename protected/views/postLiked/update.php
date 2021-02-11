<?php
/* @var $this PostLikedController */
/* @var $model PostLiked */

$this->breadcrumbs=array(
	'Post Likeds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PostLiked', 'url'=>array('index')),
	array('label'=>'Create PostLiked', 'url'=>array('create')),
	array('label'=>'View PostLiked', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PostLiked', 'url'=>array('admin')),
);
?>

<h1>Update PostLiked <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this LikedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Likeds',
);

$this->menu=array(
	array('label'=>'Create Liked', 'url'=>array('create')),
	array('label'=>'Manage Liked', 'url'=>array('admin')),
);
?>

<h1>Likeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

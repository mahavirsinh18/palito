<?php
/* @var $this PostLikedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Post Likeds',
);

$this->menu=array(
	array('label'=>'Create PostLiked', 'url'=>array('create')),
	array('label'=>'Manage PostLiked', 'url'=>array('admin')),
);
?>

<h1>Post Likeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

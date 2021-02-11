<?php
/* @var $this ReplyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Replies',
);

$this->menu=array(
	array('label'=>'Create Reply', 'url'=>array('create')),
	array('label'=>'Manage Reply', 'url'=>array('admin')),
);
?>

<h1>Replies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

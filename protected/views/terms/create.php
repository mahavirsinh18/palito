<?php
/* @var $this TermsController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	'Create',
);

/*$this->menu=array(
	array('label'=>'List Terms', 'url'=>array('index')),
	array('label'=>'Manage Terms', 'url'=>array('admin')),
);*/
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
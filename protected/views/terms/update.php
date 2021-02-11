<?php
/* @var $this TermsController */
/* @var $model Terms */

$this->breadcrumbs=array(
	'Terms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
?>

<!-- <h1>Update Terms <?php echo $model->id; ?></h1> -->

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
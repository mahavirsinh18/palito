<!-- <div class="block animation-fadeInQuick"> -->
    <!-- Login Title -->
   <!--  <div class="block-title">
        <h2>Change Password</h2>
        
    </div> -->
    <!-- END Login Title -->
    <h3>Change Password</h3>
    <?php
    /* @var $this SiteController */
    /* @var $model LoginForm */
    /* @var $form CActiveForm  */

    $this->pageTitle = Yii::app()->name . ' - Register';
    $this->breadcrumbs = array(
        'Register',
    );
    ?>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-register',
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'errorMessageCssClass'=>'help-block animation-slideUp form-error',
    ));
    ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'password', array('class' => 'col-xs-12')); ?>
        <div class="col-xs-12">
            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'confirmPassword', array('class' => 'col-xs-12')); ?>
        <div class="col-xs-12">
            <?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'confirmPassword'); ?>
        </div>
    </div>
    <?php echo CHtml::submitButton('Change',array('class'=>'btn btn-primary block full-width m-b')); ?>  
     <a href="<?php echo Yii::App()->createUrl('site/login');?>"><small>Back to Login</small></a>
    <?php $this->endWidget(); ?>
    </div>
   
    <?php //$this->endWidget(); ?>
<!-- </div> -->

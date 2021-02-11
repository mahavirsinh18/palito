<h3>Create an Account</h3>

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
        //'enableClientValidation' => true,
		'enableAjaxValidation' => true,
        'htmlOptions' => array('class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'errorMessageCssClass'=>'help-block animation-slideUp form-error',
    ));
    ?>
    <div class="form-group">
        <label>Username</label>
		<?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model, 'username'); ?>
    </div>  
    <div class="form-group">
        <label>Email</label>
		<?php echo $form->textField($model, 'email', array('class' => 'form-control', 'placeholder'=>'')); ?>
		<?php echo $form->error($model, 'email'); ?>    </div>
   
    <div class="form-group">
        <label>Password</label>
		<?php echo $form->passwordField($model, 'password', array('class' => 'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
		<?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control','placeholder'=>'')); ?>
		<?php echo $form->error($model, 'confirmPassword'); ?>
    </div>
    <div class="form-group">
        <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary block full-width m-b')); ?>
    </div>
    <div class="signuplink">
        Already have an account? <a class="link" href="<?php echo Yii::app()->createUrl('site/login');?>">Login</a>
    </div>
    <?php $this->endWidget(); ?>

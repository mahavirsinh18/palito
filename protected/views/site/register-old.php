<h3>Create an Account</h3>

<!-- <div class="block animation-fadeInQuick"> -->
    <!-- Login Title -->
    <!-- <div class="block-title">
        <h2></h2>
    </div> -->
    <!-- END Login Title -->

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
		//'enableAjaxValidation' => true,
        'htmlOptions' => array('class' => 'form-horizontal'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'errorMessageCssClass'=>'help-block animation-slideUp form-error',
    ));
    ?>
    <div class="form-group">
		<?php echo $form->textField($model, 'first_name', array('class' => 'form-control',
		'placeholder'=>'First Name')); ?>
		<?php echo $form->error($model, 'first_name'); ?>
    </div>
    <div class="form-group">
		<?php echo $form->textField($model, 'last_name', array('class' => 'form-control',
		'placeholder'=>'Last Name')); ?>
		<?php echo $form->error($model, 'last_name'); ?>
    </div>
    <div class="form-group">
		<?php echo $form->textField($model, 'email', array('class' => 'form-control',
		'placeholder'=>'Email')); ?>
		<?php echo $form->error($model, 'email'); ?>
    </div>
    <div class="form-group">
		<?php echo $form->textField($model, 'phone', array('class' => 'form-control',
		'placeholder'=>'Phone','data-mask'=>"999-999-9999")); ?>
		<?php echo $form->error($model, 'phone'); ?>
    </div>	
    <div class="form-group">
		<?php echo $form->textField($model, 'company_name', array('class' => 'form-control',
		'placeholder'=>'Company Name')); ?>
		<?php echo $form->error($model, 'company_name'); ?>
    </div>  
    <div class="form-group">
		<?php echo $form->passwordField($model, 'password', array('class' => 'form-control','placeholder'=>'Password')); ?>
		<?php echo $form->error($model, 'password'); ?>
    </div>
    <div class="form-group">
		<?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control','placeholder'=>'Confirm Password')); ?>
		<?php echo $form->error($model, 'confirmPassword'); ?>
    </div>
    <?php echo CHtml::submitButton('Register',array('class'=>'btn btn-primary block full-width m-b')); ?>
    <p class="text-muted text-center"><small>Already have an account?
    </small></p>
    <a class="btn btn-sm btn-white btn-block" href="<?php echo Yii::app()->createUrl('site/login');?>">Login</a>
    <?php $this->endWidget(); ?>
    </div>
    <br><Br><!-- 

</div> -->


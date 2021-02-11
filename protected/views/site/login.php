<h3>Welcome Back, Please login to<br /> <?php echo Yii::app()->name;?> account.</h3>
   <?php
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			echo '<div class="alert alert-' . $key . '">' . $message . "</div>\n";
		}
	?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'form-login',
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'form m-t'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
        'errorMessageCssClass'=>'help-block animation-slideUp form-error',
    ));
    ?>
    <div class="form-group">
        <label>Username or Email Address</label>
        <?php echo $form->textField($model, 'username', array('class' => 'form-control',
            'placeholder'=>'')); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="form-group">
        <label>Password</label>
        <?php echo $form->passwordField($model, 'password', array('class' => 'form-control','placeholder'=>'')); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="forgotpwd">
        <a href="<?php echo Yii::App()->createUrl('site/forgot');?>">Forgot password?</a>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton('Log In',array('class'=>'btn btn-primary block full-width m-b')); ?>
    </div>

    <div class="signuplink">
        Do not have an account? <a class="link" href="<?php echo Yii::app()->createUrl('site/register');?>">Sign Up</a>
    </div>
    
    <?php $this->endWidget(); ?>
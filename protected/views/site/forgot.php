
<h3>Forgot Password</h3>
<?php if (Yii::app()->user->hasFlash('success')): ?>

        <div class="alert alert-success alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <h4><strong>Success</strong></h4>

            <p><?php echo Yii::app()->user->getFlash('success'); ?></p>

        </div>

    <?php endif; ?>

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

        'htmlOptions' => array('class' => 'form m-t'),

        'clientOptions' => array(

            'validateOnSubmit' => true,

        ),

        'errorMessageCssClass'=>'help-block animation-slideUp form-error',

    ));

    ?>

    <div class="form-group">       

            <?php echo $form->textField($model, 'email', array('class' => 'form-control','Placeholder'=>'Email')); ?>

            <?php echo $form->error($model, 'email'); ?>

    </div>

    <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-check"></i> Remind Password</button>

    <a href="<?php echo Yii::App()->createUrl('site/login');?>"><small>Back to Login</small></a>

    <?php $this->endWidget(); ?>


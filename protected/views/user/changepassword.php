<div class="row wrapper border-bottom white-bg page-heading changepwd">

    <div class="col-lg-10">

        <h2>Change Password</h2>

        <ol class="breadcrumb">

            <li>

                <a href="<?php echo Yii::app()->createUrl('site/home');?>">Home</a>

            </li>                   

            <li class="active">

                <strong>Change Password</strong>

            </li>

        </ol>

    </div>

    <div class="col-lg-2">

    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">

                    <h5>Change Password</h5>

                    <div class="ibox-tools">

                        <a class="collapse-link">

                            <i class="fa fa-chevron-up"></i>

                        </a>

                    </div>

                </div>

                <div class="ibox-content">



                    <?php if (Yii::app()->user->hasFlash('success')): ?>

                    <div class="alert alert-success alert-dismissable animation-fadeIn">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <h4><strong>Success</strong></h4>

                        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>

                    </div>

                    

                    <?php endif; ?>

                    <!-- END Horizontal Form Title -->

                    <?php if (Yii::app()->user->hasFlash('success')): ?>

                    <div class="alert alert-success alert-dismissable animation-fadeIn">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                        <h4><strong>Success</strong></h4>

                        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>

                    </div>

                    <?php endif; ?>



                    <?php

                    $form = $this->beginWidget('CActiveForm', array(

                        'id' => 'user-form',

                        'enableAjaxValidation' => true,

                        'htmlOptions' => array('class' => 'form-horizontal form-bordered'),

                        'clientOptions' => array(

                            'validateOnSubmit' => true,

                        ),

                        'errorMessageCssClass' => 'help-block animation-slideUp form-error',

                            // Please note: When you enable ajax validation, make sure the corresponding

                            // controller action is handling ajax validation correctly.

                            // There is a call to performAjaxValidation() commented in generated controller code.

                            // See class documentation of CActiveForm for details on this.

                    ));

                    ?>

                     <div class="form-group">

                        <?php echo $form->labelEx($model, 'oldpassword', array('class' => 'col-md-3 control-label')); ?>

                        <div class="col-md-6">

                            <?php echo $form->passwordField($model, 'oldpassword', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>

                            <?php echo $form->error($model, 'oldpassword'); ?>

                        </div>

                    </div>

                    <div class="form-group">

                        <?php echo $form->labelEx($model, 'password', array('class' => 'col-md-3 control-label')); ?>

                        <div class="col-md-6">

                            <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>

                            <?php echo $form->error($model, 'password'); ?>

                        </div>

                    </div>

                    <div class="form-group">

                        <?php echo $form->labelEx($model, 'confirmPassword', array('class' => 'col-md-3 control-label')); ?>

                        <div class="col-md-6">

                            <?php echo $form->passwordField($model, 'confirmPassword', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>

                            <?php echo $form->error($model, 'confirmPassword'); ?>

                        </div>

                    </div>            

                    <div class="form-group form-actions">

                        <div class="col-md-9 col-md-offset-3">

                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Change ' : 'Change ', array('class' => 'btn btn-effect-ripple btn-primary')); ?>

                        </div>

                    </div>

                    <?php $this->endWidget(); ?>

                </div>

            </div>

        </div><!-- form -->

    </div>

</div>


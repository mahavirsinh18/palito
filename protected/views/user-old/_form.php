<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>User</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li><?php echo CHtml::link('Users', array('index')) ?></li>
                    <li><?php echo $model->isNewRecord ? 'Create' : 'Edit'; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form Block -->
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2><?php echo $model->isNewRecord ? 'Create' : 'Edit'; ?>User</h2>
            </div>
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'user-form',
                'enableAjaxValidation' => true,
                'htmlOptions' => array('class' => 'form-horizontal form-bordered'),
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'errorMessageCssClass'=>'help-block animation-slideUp form-error',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
            ));
            ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'first_name', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'first_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'first_name'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'last_name', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'last_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'last_name'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'email', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-6">
                    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($model, 'email'); ?>
                </div>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'user_type', array('class' => 'col-md-3 control-label')); ?>
                <div class="col-md-6">
                    <?php
                    echo $form->dropdownlist($model, 'user_type',array('1'=>'Admin','2'=>'Customer'), array(                        
                       'class' => 'form-control',
                    ));
                    ?>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <?php echo CHtml::link('Cancel', array('index'), array('class' => 'btn btn-effect-ripple btn-danger')) ?>
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save', array('class' => 'btn btn-effect-ripple btn-primary')); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>

        </div><!-- form -->
    </div>
</div>

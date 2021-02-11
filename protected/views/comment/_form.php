<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo "Post";?></h5>
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
                    <?php if (Yii::app()->user->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissable animation-fadeIn">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><strong>Error</strong></h4>
                            <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="row" style="clear: both;">
                    	<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'comment-form',
							'enableAjaxValidation'=>true,
							'htmlOptions' => array('class' => 'form-horizontal form-bordered','enctype'=>'multipart/form-data'),
							'clientOptions' => array(
			                    'validateOnSubmit' => true,
			                ),
			                'errorMessageCssClass'=>'help-block animation-slideUp form-error',
						)); ?>

						<div class="form-group">
							<?php echo $form->labelEx($model,'comment_content', array('class' => 'col-md-3 control-label')); ?>
							<div class="col-md-6">
								<?php echo $form->textArea($model,'comment_content',array('class' => 'form-control', 'rows'=>6, 'cols'=>50)); ?>
								<?php echo $form->error($model,'comment_content'); ?>
							</div>
						</div>

						<div class="form-group form-actions">
							<div class="col-md-9 col-md-offset-3">
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',['id'=>'submit','class' => 'btn btn-effect-ripple btn-primary submit']); ?>
							</div>
						</div>
						<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
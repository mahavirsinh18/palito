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
							'id'=>'post-form',
							'enableAjaxValidation'=>true,
							'htmlOptions' => array('class' => 'form-horizontal form-bordered','enctype'=>'multipart/form-data'),
							'clientOptions' => array(
			                    'validateOnSubmit' => true,
			                ),
			                'errorMessageCssClass'=>'help-block animation-slideUp form-error',
						)); ?>

						<div class="form-group">
							<?php
								echo $form->labelEx($model,'category_id',array('class'=>'col-md-3 control-label'));
								?> <div class="col-md-6"> <?php                            
								echo $form->dropDownList($model,'category_id', 
								CHtml::listData(Category::model()->findAll('is_deleted=0',array('order'=>'category_name ASC')), 'id', 'category_name'),
								array(
									'prompt'=>'Category',
									'class'=>'form-control',
								)); 
							?>
							<?php echo $form->error($model,'category_id'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'post_title', array('class' => 'col-md-3 control-label')); ?>
							<div class="col-md-6">
								<?php echo $form->textField($model,'post_title',array('class' => 'form-control','size'=>60,'maxlength'=>255)); ?>
								<?php echo $form->error($model,'post_title'); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $form->labelEx($model,'post_content', array('class' => 'col-md-3 control-label')); ?>
							<div class="col-md-6">
								<?php echo $form->textArea($model,'post_content',array('class' => 'form-control','rows'=>6, 'cols'=>50)); ?>
								<?php echo $form->error($model,'post_content'); ?>
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
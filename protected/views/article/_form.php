<?php

/*$js=Yii::app()->getClientScript();
$js->registerScriptFile(Yii::app()->baseUrl.'/ckeditor/ckeditor.js');
$js->registerScriptFile(Yii::app()->baseUrl.'/ckeditor/adapters/jquery.js');

$js->registerScript(
    'js2',
    'var config = {
        toolbar:
            [
                ["Bold", "Italic","Underline", "-", "NumberedList", "BulletedList", "-" ],  
                ["UIColor"],["TextColor"],["Undo","Redo","Link"],
                ["Image"],
                ["JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock"],
                ["NumberedList","BulletedList","FontSize","Font","Preview"]
            ],
        filebrowserUploadUrl: "/ckeditor/ajaxfile.php?type=file",
        filebrowserImageUploadUrl: "/ckeditor/ajaxfile.php?type=image",
        height:150,
        width:515
    };
    $("#Article_description").ckeditor(config);',
    CClientScript::POS_LOAD
);*/

?>

<?php $title="Article";?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createUrl('site/home');?>">Home</a>
            </li>
            <li class="active">
                <strong><?php echo $title;?></strong>
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
                    <h5><?php echo $title;?></h5>
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
							'id'=>'article-form',
							// Please note: When you enable ajax validation, make sure the corresponding
							// controller action is handling ajax validation correctly.
							// There is a call to performAjaxValidation() commented in generated controller code.
							// See class documentation of CActiveForm for details on this.
							'enableAjaxValidation'=>true,
							'htmlOptions' => array('class' => 'form-horizontal form-bordered','enctype'=>'multipart/form-data'),
							'clientOptions' => array(
                        		'validateOnSubmit' => true,
                    		),
                    		'errorMessageCssClass' => 'help-block animation-slideUp form-error',
						)); ?>

							<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

							<!-- <?php //echo $form->errorSummary($model); ?> -->

							<div class="form-group">
								<?php echo $form->labelEx($model,'article_image', array('class' => 'col-md-3 control-label')); ?>
								<div class="col-md-6">
									<?php echo $form->fileField($model,'article_image',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
									<?php echo $form->error($model,'article_image'); ?>
								</div>
							</div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model,'background_image', array('class' => 'col-md-3 control-label')); ?>
                                <div class="col-md-6">
                                    <?php echo $form->fileField($model,'background_image',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                                    <?php echo $form->error($model,'background_image'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model,'bg_image_mobile', array('class' => 'col-md-3 control-label')); ?>
                                <div class="col-md-6">
                                    <?php echo $form->fileField($model,'bg_image_mobile',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
                                    <?php echo $form->error($model,'bg_image_mobile'); ?>
                                </div>
                            </div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'article_name', array('class' => 'col-md-3 control-label')); ?>
								<div class="col-md-6">
									<?php echo $form->textField($model,'article_name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
									<?php echo $form->error($model,'article_name'); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'is_premium', array('class' => 'col-md-3 control-label')); ?>
								<div class="col-md-6">
									<?php echo $form->radioButtonList($model,'is_premium',array('1'=>'Yes','0'=>'No'),array( 
			                		'separator'=>'',
			                		'style'=>'margin-left:13px;',
	                				'labelOptions'=>array(
				                        'style'=>'padding-left:13px;'
				                       ),
					                )); ?>
					                <?php echo $form->error($model,'is_premium'); ?>
								</div>
							</div>

                            <div class="form-group">
                                <?php echo $form->labelEx($model,'featured', array('class' => 'col-md-3 control-label')); ?>
                                <div class="col-md-6">
                                    <?php echo $form->radioButtonList($model,'featured',array('1'=>'Yes','0'=>'No'),array( 
                                    'separator'=>'',
                                    'style'=>'margin-left:13px;',
                                    'labelOptions'=>array(
                                        'style'=>'padding-left:13px;'
                                       ),
                                    )); ?>
                                    <?php echo $form->error($model,'featured'); ?>
                                </div>
                            </div>

							<div class="form-group">
								<?php echo $form->labelEx($model,'description', array('class' => 'col-md-3 control-label')); ?>
								<div class="col-md-6">
									<?php echo $form->textArea($model,'description',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
									<?php echo $form->error($model,'description'); ?>
								</div>
							</div>

							<div class="form-group form-actions">
								<div class="col-md-9 col-md-offset-3">
									<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',['id'=>'submit','class' => 'btn btn-effect-ripple btn-primary submit']); ?>
								</div>
							</div>

						<?php $this->endWidget(); ?>

						</div><!-- form -->
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/ckeditor/ckeditor.js"></script>

<script type="text/javascript">    
    var path = '<?php echo Yii::app()->request->baseUrl;?>';
    CKEDITOR.replace('Article_description', {
        filebrowserBrowseUrl: path+'/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: path+'/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: path+'/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: path+'/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: path+'/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: path+'/kcfinder/upload.php?type=flash'
    });
</script>

<script type="text/javascript">

$('#submit').click(function(e)
{
	formValidation(e);		
});

function formValidation(e)
{
	$('.customeerror').remove();
	var article_image = $('#Article_article_image').val();
    var background_image = $('#Article_background_image').val();
    var bg_image_mobile = $('#Article_bg_image_mobile').val();
	var error = 0;

    var regex = new RegExp("(.*?)\.(png|jpg|jpeg|gif)$");
    if($.trim(article_image).length > 0)
    {
        if(!(regex.test(article_image.toLowerCase())))
        {
        	$('#Article_article_image').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp form-error');
            error = 1;
        }
    }
    else
    {
    	<?php
    	if($model->article_image == "")
    	{ ?>    	
        	error = 1;
        	$('#Article_article_image').after('<div class="errorMessage Invalid customeerror" id="" ">Article image cannot be blank.</div>');
        	$('.errorMessage').addClass('help-block animation-slideUp form-error');
      	<?php  }
    	?>
    }

    if($.trim(background_image).length > 0)
    {
        if(!(regex.test(background_image.toLowerCase())))
        {
            $('#Article_background_image').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
            $('.errorMessage').addClass('help-block animation-slideUp form-error');
            error = 1;
        }
    }
    else
    {
        <?php
        if($model->background_image == "")
        { ?>        
            error = 1;
            $('#Article_background_image').after('<div class="errorMessage Invalid customeerror" id="" ">Background image cannot be blank.</div>');
            $('.errorMessage').addClass('help-block animation-slideUp form-error');
        <?php  }
        ?>
    }

    if($.trim(bg_image_mobile).length > 0)
    {
        if(!(regex.test(bg_image_mobile.toLowerCase())))
        {
            $('#Article_bg_image_mobile').after('<div class="errorMessage Invalid customeerror" id="" ">Only jpg, jpeg, png, gif files allowed.</div>');
            $('.errorMessage').addClass('help-block animation-slideUp form-error');
            error = 1;
        }
    }
    else
    {
        <?php
        if($model->bg_image_mobile == "")
        { ?>        
            error = 1;
            $('#Article_bg_image_mobile').after('<div class="errorMessage Invalid customeerror" id="" ">Background image mobile cannot be blank.</div>');
            $('.errorMessage').addClass('help-block animation-slideUp form-error');
        <?php  }
        ?>
    }


	if(error == 0)
	{
		return true;
	}
	else
	{
		e.preventDefault();
		return false;
	}
}

</script>
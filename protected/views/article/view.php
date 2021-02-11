<?php $title="Article";?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title;?>s
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createUrl('site/home');?>"><?php echo $title;?>s</a>
            </li>   
                         
            <li class="active">
                <strong>View article data</strong>
            </li>
        </ol>
       	<!-- <p>
        	<a href="<?php //echo Yii::app()->createUrl('user/index');?>" class="btn btn-danger" style="margin-top: 5px;margin-bottom: -20px;">
            	Go Back</a>
        </p> -->
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
            	<div class="ibox-title">
                    <h5> View <?php echo $title;?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                	<?php if (Yii::app()->user->hasFlash('success')): ?>
	                <div class="alert alert-success alert-dismissable">
	                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                    <h4><strong>Success</strong></h4>
	                    <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
	                </div>
	            <?php endif; ?>

	            <div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Article Image : ');?>
							</label>
							<div class="col-md-4">
							 	<?php if(isset($model->article_image) && $model->article_image != ''): ?>		                    
		                        	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/'.$model->article_image, 'Article Image', array('height'=>'50px', 'width'=>'60px')); ?>
		                		<?php endif;?>
		                	</div>
						</div>
					</div>	
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Background Image : ');?>
							</label>
							<div class="col-md-4">
							 	<?php if(isset($model->background_image) && $model->background_image != ''): ?>		                    
		                        	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/'.$model->background_image, 'Background Image', array('height'=>'50px', 'width'=>'60px')); ?>
		                		<?php endif;?>
		                	</div>
						</div>
					</div>	
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Background Image Mobile : ');?>
							</label>
							<div class="col-md-4">
							 	<?php if(isset($model->bg_image_mobile) && $model->bg_image_mobile != ''): ?>		                    
		                        	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/'.$model->bg_image_mobile, 'Background Image', array('height'=>'50px', 'width'=>'60px')); ?>
		                		<?php endif;?>
		                	</div>
						</div>
					</div>	
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Article Name : ');?>
							</label>
							<?php echo $model->article_name;?>
						</div>
					</div>
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Is Premium : ');?>
							</label>
							<?php if($model->is_premium == 1){ echo "Yes"; }else{ echo "No"; } ?>
						</div>
					</div>
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Featured : ');?>
							</label>
							<?php if($model->featured == 1){ echo "Yes"; }else{ echo "No"; } ?>
						</div>
					</div>
				</div>

				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Description : ');?>
							</label>
							<?php echo $model->description;?>
						</div>
					</div>
				</div>

				</div>
			</div>
		</div>
	</div>
</div>

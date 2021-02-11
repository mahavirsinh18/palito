
<?php $title="Client";?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title;?>s
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createUrl('user/index');?>"><?php echo $title;?>s</a>
            </li>   
                         
            <li class="active">
                <strong>View client data</strong>
            </li>
        </ol>
       	<p>
        	<a href="<?php echo Yii::app()->createUrl('user/index');?>" class="btn btn-danger" style="margin-top: 5px;margin-bottom: -20px;">
            	Go Back</a>
        </p>
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
								<?php echo Yii::t('yii','First Name : ');?>
							</label>
							<?php echo $model->first_name;?>
						</div>
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Last Name');?>
							</label>
							<?php echo $model->last_name;?>
						</div>
					</div>	
				</div>
				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Email : ');?>
							</label>
							<?php echo $model->email;?>
						</div>
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Company Name');?>
							</label>
							<?php echo $model->company_name;?>
						</div>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Phone');?>
							</label>
							<?php echo $model->phone;?>
						</div>
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Twillio Phone 2');?>
							</label>
							<?php echo $model->twillio_phone_2;?>
						</div>
						
					</div>
				</div>
				
				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Area Code : ');?>
							</label>
							<?php echo $model->area_code;?>
						</div>
						<div class="col-md-6">
							<label class="control-label col-md-4">
								<?php echo Yii::t('yii','Twillio Phone 1');?>
							</label>
							<?php echo $model->twillio_phone_1;?>
						</div>
						
					</div>
				</div>
				<div class="row" style="margin-bottom:10px">
					<div class="col-md-12">
						
					<div class="col-md-6">
						<label class="control-label col-md-4">
							<?php echo Yii::t('yii','Logo');?>
						</label>
						<div class="col-md-4">
							 <?php if(isset($model->logo) && $model->logo!=''):?>		                    
		                            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/uploads/company_logo/'.$model->logo, 'Image', array('class'=>'img img-responsive')); ?>
		                	<?php endif;?>
		                </div>
					</div>						
				</div>
			</div>
		</div>
	</div>
</div>
</div>

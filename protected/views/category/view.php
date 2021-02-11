<?php $title="Category";?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title;?>
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createUrl('site/home');?>"><?php echo $title;?></a>
            </li>   
                         
            <li class="active">
                <strong>View category</strong>
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
		            				<?php echo Yii::t('yii','Category : ');?>
		            			</label>
		            			<?php echo $model->category_name;?>
		            		</div>
		            	</div>
		            </div>
	        	</div>
	    	</div>
		</div>
	</div>
</div>

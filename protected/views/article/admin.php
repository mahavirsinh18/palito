<?php $title="Article";?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?php echo $title;?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo Yii::app()->createUrl('site/home');?>">Home</a>
            </li>                   
            <li class="active">
                <strong>Manage <?php echo $title;?></strong>
            </li>
        </ol>
    </div>
    
    <div class="col-sm-2 text-right"><a href="<?php echo Yii::app()->createUrl('article/create');?>" class="add-new btn btn-effect-ripple btn-primary" >Add New</a>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> <?php echo $title;?></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="ibox-content table-responsive">
                    <?php if (Yii::app()->user->hasFlash('success')): ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><strong>Success</strong></h4>
                        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
                    </div>
                <?php endif; ?>

                <div class="table-responsive">

				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'article-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'pagerCssClass'=>'pager pagination-sm',
					'pager'=>array(
                        'header'=>' ',
                        'selectedPageCssClass'=>'active',
                        'htmlOptions'=>array('class'=>'pagination table-bordered','align'=>'center'),
                    ),
                    'itemsCssClass' => 'table table-striped table-bordered table-vcenter',
					'columns'=>array(
						// 'id',
						// 'article_image',
						array(
			        		'name'=>'article_image',
			        		'type' => 'raw',
			        		'filter'=>false,
			        		'sortable'=>false, 
			        		'value'=>function($data){
			            		return CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
			        		},
		        		),
                        array(
                            'name'=>'background_image',
                            'type' => 'raw',
                            'filter'=>false,
                            'sortable'=>false, 
                            'value'=>function($data){
                                return CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->background_image , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
                            },
                        ),
                        array(
                            'name'=>'bg_image_mobile',
                            'type' => 'raw',
                            'filter'=>false,
                            'sortable'=>false, 
                            'value'=>function($data){
                                return CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->bg_image_mobile , "this is alt tag of image", array('height'=>'40px', 'width'=>'50px'));
                            },
                        ), 
						'article_name',
						// 'description',
                        array(
                            'name'=>'description',
                            'type' => 'raw',
                            'value'=>function($data){
                                if(isset($data->description) && $data->description){
                                    echo substr($data->description, 0,50);
                                }
                            } 
                        ),
                        // 'is_premium',
                        array(
                            'name'=>'is_premium',
                            'type'=>'text',
                            'filter' => array('1'=>'Yes','0'=>'No'),
                            'value'=>'$data->is_premium == 1 ? "Yes" : "No"',
                        ),
                        // 'featured',
                        array(
                            'name'=>'featured',
                            'type'=>'text',
                            'filter' => array('1'=>'Yes','0'=>'No'),
                            'value'=>'$data->featured == 1 ? "Yes" : "No"',
                        ),
						array(
							'class' => 'CButtonColumn',
                            'htmlOptions' => array('style' => 'width: 120px;'),
                            'template' => '{view} {update} {delete} ',
                            'buttons' => array(
                                'update' => array(
                                    'label' => '<i class="fa fa-pencil"></i>',
                                    'imageUrl' => false,
                                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-success', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Update')),
                                    'type' => 'raw',
                                ),
                                'view' => array(
                                    'label' => '<i class="fa fa-eye"></i>',
                                    'imageUrl' => false,
                                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-success', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'View')),
                                    'type' => 'raw',
                                ),
                                'delete' => array(
                                    'label' => '<i class="fa fa-trash-o"></i>',
                                    'imageUrl' => false,
                                    'options' => array('class' => 'btn btn-effect-ripple btn-sm btn-danger', 'rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Delete')),
                                    'type' => 'raw',
                                ),
                            ),
						),
					),
				)); ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

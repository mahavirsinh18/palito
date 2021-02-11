<?php $title="Clients";?>
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
    <div class="col-lg-2">
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
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'user-grid',
                    'dataProvider' => $model->search(),
                    'filter' => $model,
                   'pagerCssClass'=>'pager pagination-sm',
                    'pager'=>array(
                                'header'=>' ',
                                'selectedPageCssClass'=>'active',
                                'htmlOptions'=>array('class'=>'pagination table-bordered','align'=>'center'),
                            ),
                    'itemsCssClass' => 'table table-striped table-bordered table-vcenter',
                    'columns' => array(
                        'first_name',
                        'last_name',
                        'company_name',
                        'email',

    //                    'user_type',
                        // array(
                        //     'name' => 'user_type',
                        //     'filter' => array('1'=>'Admin','2'=>'User'),
                        //     'value' => function($model) {
                        //         $t = array('1'=>'Admin','2'=>'User');
                        //         if (isset($t[$model->user_type]))
                        //             return $t[$model->user_type];
                        //     }
                        // ),
                        

                        // 'city',
                        // 'contact',
                        /*
                          'forgot_token_expire',
                         
                          'deleted',
                         */
                        array(
                            'class' => 'CButtonColumn',
                            'htmlOptions' => array('style' => 'width: 100px;'),
                            'template' => '{view}  ',
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
                ));
                ?>
             </div>
        </div>
    </div>
</div>
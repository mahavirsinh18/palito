<style type="text/css">
    .stripe-button-el
    {
        /*background-color: #21b9bb !important; 
        border-color: #21b9bb !important; 
        color: #FFFFFF !important;
        margin-left: 20px !important;   
        background-image: none !important;*/
        display: none !important;

    }
    .pay_lable
    {
        font-size: 22px;
    }
    .count_pay_total
    {
        font-size: 22px;
    }

    .box-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
        font-size: 18px;
    }
    .box-dismissable, .box-dismissible {
        padding-right: 35px;
    }
    .box {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

   /* #page-wrapper
    {
        background-color: #f3f3f4 !important
    }*/
</style>
<?php $title="Thank You";?>
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


<div class="wrapper wrapper-content animated fadeInRight" style="background-color: transparent !important">
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
                        <div class="box box-success box-dismissable animation-fadeIn">

                            <button type="button" class="close" data-dismiss="box" aria-hidden="true">×</button>

                            <h2><strong>Success</strong></h2>

                            <p><?php echo Yii::app()->user->getFlash('success'); ?></p>

                        </div>
                    <?php endif; ?>          
                </div>
            </div>
        </div>
    </div>
</div>

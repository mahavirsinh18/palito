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
</style>
<?php $title="Company Information";?>
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
                        

                <!-- END Horizontal Form Title -->

                



                <?php

                $form = $this->beginWidget('CActiveForm', array(

                    'id' => 'user-form',

                    'enableAjaxValidation' => true,

                    'htmlOptions' => array('class' => 'form-horizontal form-bordered','enctype'=>'multipart/form-data'),

                    'clientOptions' => array(

                        'validateOnSubmit' => true,

                    ),

                    'errorMessageCssClass' => 'help-block animation-slideUp form-error',

                        // Please note: When you enable ajax validation, make sure the corresponding

                        // controller action is handling ajax validation correctly.

                        // There is a call to performAjaxValidation() commented in generated controller code.

                        // See class documentation of CActiveForm for details on this.

                ));

                ?>  

                <div class="form-group">

                    <?php echo $form->labelEx($model, 'username', array('class' => 'col-md-3 control-label')); ?>

                    <div class="col-md-6">

                        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>

                        <?php echo $form->error($model, 'username'); ?>

                    </div>

                </div>             

                

                <div class="form-group">

                    <?php echo $form->labelEx($model, 'email', array('class' => 'col-md-3 control-label')); ?>

                    <div class="col-md-6">

                        <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>

                        <?php echo $form->error($model, 'email'); ?>

                    </div>

                </div>
             
             





                        

                <div class="form-group form-actions">

                    <div class="col-md-9 col-md-offset-3">

                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-effect-ripple btn-primary submit')); ?>

                    </div>

                </div>

                <?php $this->endWidget(); ?>

            </div><!-- form -->

         </div>

    </div>

</div>

</div>

<script type="text/javascript">
    $('body').on('change','.buy_total_sms',function(){
        $('.sms_error').remove();
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
        var sms=$(this).val();        
         if(sms==='') {
        $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be required.</div>');
        return false;
        }
        if(!numberRegex.test(sms)) {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be number.</div>');
            return false;
        }
        if(sms<=0)
        {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS greater than 0.</div>');
            return false;
        } 
        else{
            // $('.number_of_sms_buy').val(sms);

            total_amount_count=parseInt(sms)*parseFloat(0.4);
            total_amount_count=total_amount_count.toFixed(2);
            $('.count_pay_total').text("$"+total_amount_count);
        }

        
    });
    $('body').on('click','.buysmsbtn_with_connect',function(){
        $('.sms_error').remove();
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
        var sms=$('.buy_total_sms').val();
        if(sms==='') {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be required.</div>');
            return false;
        }
        if(!numberRegex.test(sms)) {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be number.</div>');
            return false;
        }
        if(sms<=0)
        {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS greater than 0.</div>');
            return false;
        } 
        else{
            $('.number_of_sms_buy').val(sms);
            $('.buysmsbtn_with_connect').parent('form').submit();
        }         
    });
     $('body').on('click','.buysmsbtn',function(){
        $('.sms_error').remove();
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
        var sms=$('.buy_total_sms').val();
        if(sms==='') {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be required.</div>');
            return false;
        }
        if(!numberRegex.test(sms)) {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS must be number.</div>');
            return false;
        }
        if(sms<=0)
        {
            $('.buy_total_sms').after('<div class="help-block animation-slideUp sms_error" id="" style="">Number of SMS greater than 0.</div>');
            return false;
        } 
        else{
            $('.number_of_sms_buy').val(sms);
             total_amount_count=parseInt(sms)*parseFloat(0.4);
             total_amount_count=total_amount_count.toFixed(2);
             $('.stripe-button').attr("data-amount",total_amount_count);
            $('.stripe-button-el').click();
        }         
    });
    

    $(document).on('click','.submit',function(){
    var erorr = 0;
    $('.help-block1').remove();
  
    var value = $('#User_logo').val();
    var test = $('.test').val();
    regex = new RegExp("(.*?)\.(png|jpg|gif)$");

    
    if(value){
        if (!(regex.test(value))) {
            erorr++;
            $("#User_logo").after('<div class="help-block animation-slideUp form-error help-block1">Image  only allows file types of jpg, png, gif.</div>');
        }
    }

    if (erorr == '0') {

    }else {
        return false;
    }
   });
</script>
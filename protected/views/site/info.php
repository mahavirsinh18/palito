<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

?>

<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>Info</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li><a href="">Info</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="block">
    <!-- Alert Messages Title -->
    <div class="block-title">
        <h2>How it works?</h2>
    </div>
    <!-- END Alert Messages Title -->

    <!-- Alert Messages Content -->
    <div class="row">
        <div class="col-sm-6 col-lg-6">
            <!-- Info Alert -->
            <div class="alert1 alert-info alert-info1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><b>Information</b></h4>
                <br><br>
                <h4><i class="fa fa-life-ring" aria-hidden="true"></i> <strong>Support:</strong> <a style="color: #fff;" href="mailto:pasi.toytari@revomedi.com"> pasi.toytari@revomedi.com</a></h4> 
            	<h4><i class="fa fa-phone" aria-hidden="true"></i> <strong>Phone:</strong> +358401626251</h4>
            </div>
            <!-- END Info Alert -->
        </div>
        <div class="col-sm-12 col-lg-12">
            <a href="#modal-regular" class="btn btn-effect-ripple btn-default" style='margin-left:10px;margin-bottom:10px;' data-toggle="modal" >Terms</a>
            <?php //echo CHtml::link('<i class="fa fa-question-circle"></i>',"https://youtube.com",array('class'=>'btn btn-effect-ripple  btn-success','title'=>'How it works?','target'=>'_blank','style'=>'margin-left:10px;')); ?>
            
                    
        </div>
        <div class="col-sm-12 col-lg-12">
	        <a class="fancybox" rel="video-gallery" href="#video1"></a>
            <iframe width="800" height="480" src="https://www.youtube.com/embed/zoozFV6SEvU?ecver=1" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
		</div>
    </div>
    <!-- END Alert Messages Content -->
</div>
<div id="modal-regular" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title"><strong>Terms</strong></h3>
                                </div>
                                <div class="modal-body">
                                    What are Terms and Conditions
Terms and Conditions are a set of rules and guidelines that a user must agree to in order to use your website or mobile app. It acts as a legal contract between you (the company) who has the website or mobile app and the user who access your website and mobile app.

<br><br>
It’s up to you to set the rules and guidelines that the user must agree to. You can think of your Terms and Conditions agreement as the legal agreement where you maintain your rights to exclude users from your app in the event that they abuse your app, and where you maintain your legal rights against potential app abusers, and so on.
<br><br>
Terms and Conditions are also known as Terms of Service or Terms of Use.
<br><br>
This type of legal agreement can be used for both your website and your mobile app. It’s not required (it’s not recommended actually) to have separate Terms and Conditions agreements: one for your website and one for your mobile app.
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-effect-ripple btn-primary">Save</button> -->
                                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
<style type="text/css">	
.alert1 {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
.alert1 {
    color: #ffffff;
    border-width: 0;
    border-radius: 3px;
}
</style>
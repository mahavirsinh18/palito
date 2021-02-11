<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo Yii::app()->name;?>| Login</title>

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/style.css" rel="stylesheet">
    <!-- input mask use -->
     <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>
     <!--  -->
    <style type="text/css">
        .help-block{
            color: #dc3545!important;
        }
    </style>
	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
</head>

<body class="gray-bg">
    <div class="loginpage">
        <div class="container">
            <div class="logo">
                <a href="<?php echo Yii::app()->createUrl('site/index');?>">
                    <img src="<?php echo Yii::app()->request->baseUrl;?>/img/Revised-Witan-Logo.png" style="width: 300px;padding-bottom:30px;">
                </a>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <?php echo $content;?>
                </div>
            </div>                 
        </div>
    </div>
    
    <!-- <script src="<?php //echo Yii::app()->request->baseUrl;?>/js/jquery-2.1.1.js"></script> -->  
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
</body>
</html>
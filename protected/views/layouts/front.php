<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo Yii::app()->name;?>| Login</title>

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/animate.css" rel="stylesheet">
    <!-- <link href="<?php //echo Yii::app()->request->baseUrl;?>/css/style.css" rel="stylesheet"> -->
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

<body>
            <?php echo $content;?>                 
       
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>

</body>

</html>

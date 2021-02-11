<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo Yii::app()->name;?> | Dashboard</title>

    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <!-- using datepicker -->
     <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
     <!-- dropzone -->
      <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/dropzone/dropzone.css" rel="stylesheet">

     <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/dropzone/basic.css" rel="stylesheet">
     <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

     <!-- use for choosen -->
      <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/chosen/chosen.css" rel="stylesheet">



    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl;?>/img/Revised-Witan-Logo.png" sizes="32x32">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/style.css" rel="stylesheet">
    <script type="text/javascript">
        if (typeof jQuery == 'undefined') {
            document.write('<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js">"></' + 'script>');
        }


    </script>
    <style type="text/css">
        .help-block{
            color: #dc3545!important;
        }
        .navbar-top-links .dropdown-menu li a
        {
            padding: 1px 5px !important;
        }
    </style>
</head>

<body>
    <?php 
        $user=array();
        $id= Yii::app()->user->id;
        if($id)
        {
            $user=User::model()->findbypk($id);           
        }
        ?>
        <?php
            $arr1 = array();
            $dashboard_li=$users_li='';
            $manage_file=$addfile='';
            $leadfile=$mailcontent='';
            $action = strtolower(Yii::app()->controller->action->id);
            $controller = strtolower(Yii::app()->controller->id);
            if($controller=='site'){
                $dashboard_li="active";
            }elseif($controller=='user'){
                $users_li="active";
            }elseif($controller=='leadfile' && $action=='create'){
                $leadfile="active";
                $addfile="active";
            }elseif($controller=='leadfile'){
                $leadfile="active";
                $manage_file="active";
            }
            elseif($controller=='leaduser'){
                 $manage_file="active";
                $leadfile="active";
            }
            elseif($controller=='mailcontent'){
                $mailcontent="active";
            }
            
            
        ?>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <?php 
                            // $image='';
                            // if($user && isset($user->image) && $user->image!='')
                            // {
                            //     $image=$user->image;
                            // }
                            // else
                            // {
                            //     $image='avatar.jpg';
                            // }
                            ?>
                           <!--  <img alt="image" class="img-circle profile_imagesview" src="<?php //echo Yii::app()->request->baseUrl;?>/uploads/profile_images/<?php //echo $image;?>" style="width: 50px;height: auto;"/>
                             </span> -->
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs"> 
                                        <strong class="font-bold">
                                        <?php 
                                        if($user && isset($user->first_name) && $user->first_name!='')
                                        {
                                            echo $user->first_name." ";
                                        }
                                        if($user && isset($user->last_name) && $user->last_name!='')
                                        {
                                            echo $user->last_name." ";
                                        }
                                        ?>
                                    </strong>
                                    </span> 
                                    <span class="text-muted text-xs block">
                                        <?php 
                                        if($user && isset($user->first_name) && $user->first_name!='')
                                        {
                                            echo $user->first_name." ";
                                        }
                                        if($user && isset($user->last_name) && $user->last_name!='')
                                        {
                                            echo $user->last_name." ";
                                        }
                                        ?>
                                        <b class="caret"></b>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs <?php echo  $users_li;?>">
                                <li><a href="<?php echo Yii::app()->createUrl('user/profile');?>">Profile</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('user/changepassword');?>">Change Password</a></li>
                               <!--  <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li> -->
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->createUrl('site/logout');?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <?php // echo Yii::app()->name;?>							<img src="http://amcodr.co/web/witancapital/img/Revised-Witan-Logo.png" />
                        </div>
                    </li>
                    <li class="<?php echo  $dashboard_li;?>">
                        <a href="<?php echo Yii::app()->createUrl('site/home');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Dashboard</span></a>
                    </li> 
                    <li class="<?php echo $leadfile;?>">
                    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> <span class="nav-label">Lead Files</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse" style="height: 0px;">
                        <li class="<?php echo $manage_file;?>">
                            <a href="<?php echo Yii::app()->createUrl('leadfile/index');?>">Manage Files</a>
                        </li>
                        <li class="<?php echo $addfile;?>">
                            <a href="<?php echo Yii::app()->createUrl('leadfile/create');?>">Add Files</a>
                        </li>
                    
                    </ul>
                </li>
                 <li class="<?php echo  $mailcontent;?>">
                        <a href="<?php echo Yii::app()->createUrl('mailcontent/index');?>"><i class="fa fa-diamond"></i> <span class="nav-label">Mail Content</span></a>
                    </li> 
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form> -->
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo Yii::app()->name;?></span>
                </li>
             

            <li>
                <a href="<?php echo Yii::app()->createUrl('site/logout');?>">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>                
            <li class="dropdown">
                <a class="right-sidebar-toggle" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-tasks"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <?php echo CHtml::link('<i class="fa fa-pencil fa-fw pull-right"></i> Profile', array('user/profile')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('<i class="fa fa-pencil fa-fw pull-right"></i> Change Password', array('user/changepassword')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('<i class="fa fa-power-off fa-fw pull-right"></i> Log out', array('site/logout')); ?>
                    </li>
                </ul>
            </li>
        </ul>
        </nav>
        </div>
         <?php echo $content;?>
       
        
        <!-- <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div> -->
        </div>
        </div>

        </div>
     
        </div>
    </div>
    <script type="text/javascript">
        $('.datepicker').datepicker({
             format: "yyyy-mm-dd",
            // todayBtn: "linked",
             // autoclose: true

            // keyboardNavigation: false,
            // forceParse: false,
            // calendarWeeks: true,
            // autoclose: true
    });
    $(document).ready(function(){
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
    </script>
    <!-- Mainly scripts -->
    <!-- <script src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-2.1.1.js"></script> -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/inspinia.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/summernote/summernote.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/toastr/toastr.min.js"></script>

    <!-- choosen us -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- dropzone -->
     <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/dropzone/dropzone.js"></script>




    
    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

       });
         var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>
</body>
</html>

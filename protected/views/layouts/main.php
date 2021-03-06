<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo Yii::app()->name;?> | Dashboard</title>
    <script type="text/javascript">
        if (typeof jQuery == 'undefined') {
            document.write('<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js">"></' + 'script>');
        }
    </script>
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
      <!-- <script src="<?php echo Yii::app()->request->baseUrl;?>/js/plugins/daterangepicker/daterangepicker.js"></script> -->

     <!-- use for choosen -->
      <link href="<?php echo Yii::app()->request->baseUrl;?>/css/plugins/chosen/chosen.css" rel="stylesheet">



    <link rel="icon" href="<?php echo Yii::app()->request->baseUrl;?>/img/Revised-Witan-Logo.png" sizes="32x32">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl;?>/css/style.css" rel="stylesheet">

      <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.mousewheel.pack.js"></script>

        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fancybox//jquery.fancybox.css?v=2.1.5" media="screen" />

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fancybox/jquery.fancybox-buttons.css?v=1.0.5" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox-buttons.js?v=1.0.5"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/fancybox/jquery.fancybox-thumbs.css?v=1.0.7" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/fancybox/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- added 28-8-2019 -->
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jasny/jasny-bootstrap.min.js"></script>

        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">


        <!-- end 28-8-2019 -->
    <!--
	<script type="text/javascript">
        if (typeof jQuery == 'undefined') {
            document.write('<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.js">"></' + 'script>');
        }
     $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });


    </script>
	-->

    <!-- using hieght chart -->
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/highcharts.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/exporting.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/export-data.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/series-label.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/no-data-to-display.js"></script>

	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <style type="text/css">
        .help-block{
            color: #dc3545!important;
        }
        .navbar-top-links .dropdown-menu li a
        {
            padding: 10px !important;
        }
        .ibox-content
        {
            padding: 0px !important;
        }
        .grid-view
        {
            padding: 0px !important;
        }
        /*.page-heading
        {
            margin-top: 63px;
        }*/
        .pager .previous > a
        {
            float: none !important;
        }
        #content{padding:100px 0 0 0;}
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
            $dashboard_li=$users_li=$inbox_li = $bookmark_li = $settings_li = $gopremium_li = $article_li = $terms_li = $category_li = $post_li = $comment_li = $reply_li = $forum_li = '';
            $manage_file=$addfile=$support=$account='';
            $leadfile=$mailcontent= $smscontent = $offerexample=$company_profile=$marketnumbers=$templates=$buy_sms=$buy_phone_number='';
            $supporttickets='';
            $action = strtolower(Yii::app()->controller->action->id);
            $controller = strtolower(Yii::app()->controller->id);
            if($controller=='site' && $action=='support'){
                $support="active";
            }
            elseif($controller == 'site' && $action == 'bookmark'){
                $bookmark_li="active";
            }
            elseif($controller == 'site' && $action == 'settings'){
                $settings_li="active";
            }
            elseif($controller == 'site' && $action == 'gopremium'){
                $gopremium_li="active";
            }
            elseif($controller == 'article'){
                $article_li="active";
            }
            elseif($controller == 'terms'){
                $terms_li="active";
            }
            elseif($controller=='site'){
                $dashboard_li="active";
            }elseif($controller=='user' && $action=='profile'){
                $company_profile="active";
            }
            elseif($controller=='user'){
                $users_li="active";
            }
            elseif($controller=='category'){
                $category_li="active";
            }
            elseif($controller=='post'){
                $forum_li="active";
            }
            elseif($controller=='comment'){
                $forum_li="active";
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
                                <?php 
                                if($user->user_type==1 || $user->user_type==2)
                                {?>
                                    <li><a href="<?php echo Yii::app()->createUrl('user/profile');?>">Company Information</a></li>
                                    <?php 
                                }?>
                                <li><a href="<?php echo Yii::app()->createUrl('user/changepassword');?>">Change Password</a></li>
                               <!--  <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li> -->
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::app()->createUrl('site/logout');?>">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <?php // echo Yii::app()->name;?>							
                            <img src="<?php echo Yii::app()->request->baseUrl;?>/img/Revised-Witan-Logo.png" />
                        </div>
                    </li>
                    <!-- it for admin site -->
                    <?php if($user->user_type==1)
                    {?>
                        <li class="<?php echo  $dashboard_li;?>">
                            <a href="<?php echo Yii::app()->createUrl('site/home');?>"><i class="icon-home"></i> <span class="nav-label">Dashboard</span></a>
                        </li>
                        <li class="<?php echo  $users_li;?>">
                            <a href="<?php echo Yii::app()->createUrl('user/admin');?>"><i class="icon-bookmark"></i> <span class="nav-label">Users</span></a>
                        </li>   
                        <li class="<?php echo $article_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('article/admin');?>"><i class="icon-bookmark"></i> <span class="nav-label">Article</span></a>
                        </li>
                        <li class="<?php echo $terms_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('terms/admin');?>"><i class="icon-bookmark"></i> <span class="nav-label">Terms</span></a>
                        </li>
                        <li class="<?php echo $category_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('category/admin');?>"><i class="icon-bookmark"></i> <span class="nav-label">Category</span></a>
                        </li>                    
                        <?php 
                    }
                    else if($user->user_type==2)
                    {?>
                        <!-- it is for user site. -->
                        <li class="<?php echo  $dashboard_li;?>">
                            <a href="<?php echo Yii::app()->createUrl('site/home');?>"><i class="icon-home"></i> <span class="nav-label">Home</span></a>
                        </li> 
						<li class="<?php echo $bookmark_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('site/bookmark');?>"><i class="icon-bookmark"></i> <span class="nav-label">Bookmarks</span></a>
                        </li> 
						<li class="<?php echo $settings_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('site/settings');?>"><i class="icon-settings"></i> <span class="nav-label">Settings</span></a>
                        </li> 
						<li class="<?php echo $gopremium_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('site/gopremium');?>"><i class="icon-gopremium"></i> <span class="nav-label">Go Premium</span></a>
                        </li>
                        <li class="<?php echo $forum_li; ?>">
                            <a href="<?php echo Yii::app()->createUrl('post/forum');?>"><i class="icon-bookmark"></i> <span class="nav-label">Forum</span></a>
                        </li> 
						<li class="">
                            <a href="<?php echo Yii::app()->createUrl('site/logout');?>"><i class="icon-logout"></i> <span class="nav-label">Logout</span></a>
                        </li> 
                        <?php 
                    }?>
                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="" class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="hide">
                    <span class="m-r-sm text-muted welcome-message">Welcome 
                     <!-- added 28-8-2019 -->
                    <?php 
                        $username=$company_name="";
                        if($user && isset($user->first_name) && $user->first_name!='')
                        {
                            $username.= $user->first_name." ";
                        }
                        if($user && isset($user->last_name) && $user->last_name!='')
                        {
                           $username.= $user->last_name." ";
                        }
                         if($user && isset($user->company_name) && $user->company_name!='')
                        {
                            $company_name.= $user->company_name." ";
                        }

                    ?>                   
                        <?php if($user->user_type==1)
                        {
                            echo $username;
                        }
                        else
                        {
                                // echo $username.' / '.$company_name;
                                 echo $company_name;
                        }
                        ?>
                    </span>
                <!-- end -->
                </span>
            </li>
			<!-- <li><a href="#"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/icon-notification.png"></a></li> -->
            <!-- <li><a href="#"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/icon-chat.png"></a></li>			 -->
            <li class="dropdown">
                <a class="right-sidebar-toggle" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="profile-icon-img">
                        <img src="<?php echo Yii::app()->request->baseUrl;?>/img/avatar.jpg">
                    </div>
                    <?php
                    $id=Yii::app()->user->id;
                    $user=User::model()->findByPk($id);
                    echo $user->username; ?><i class="fa fa-angle-down"></i><?php
                    ?>
                    <!-- Name Here <i class="fa fa-angle-down"></i> -->
                </a>
                <ul class="dropdown-menu dropdown-menu-right" style="width: 190px;">
                    <?php 
                    if($user->user_type==1 || $user->user_type==2){?>
                    <li>
                        <?php echo CHtml::link('User Profile', array('site/settings')); ?>
                    </li>
                    <?php }?>
                    <li>
                        <?php echo CHtml::link('Change Password', array('user/changepassword')); ?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Log out', array('site/logout')); ?>
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
      $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
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

    <script src="<?php echo Yii::app()->request->baseUrl;?>/js/owl.carousel.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/owl.carousel.min.css" />

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

        $(document).ready(function(){
            $('#homeslider').owlCarousel({
                loop:true,
                stagePadding: 250,
                margin:40,
                nav:true,
                responsive:{ 
                    0:{
                        items:1
                    },
                    600:{
                        items:1
                    }, 
                    1000:{
                        items:1
                    }
                }
            });
        });

    </script>
</body>
</html>

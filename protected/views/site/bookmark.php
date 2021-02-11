<?php
	$user_data = array();
	if(!Yii::app()->user->isGuest){
		$user_id = Yii::app()->user->id;	
		$user_data = User::model()->findByPk($user_id);
	}
?>
<style type="text/css">
    .box-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
       
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
    .box-warning {
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
        font-size: 18px;
    }
    .pager .previous > a
    {
    	float: none !important;
    }
</style>
<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<!-- <h3>Welcome to <?php echo Yii::app()->name; ?></h3> -->
<div class="row wrapper border-bottom white-bg page-heading">
	
	<div class="section grid bookmark-secction">
		<h2 class="title">Bookmarks</h2>
		<div class="item_container">
			<div class="item_container">
				 <?php $this->widget('zii.widgets.CListView', array(
	                'dataProvider'=>$model->search(),
	                'itemView'=>'_bookmark_list',
	                'template'=>'{items}<div class="col-md-12">{pager}</div>',
	                'id'=>'_bookmark_list',
	                'summaryText'=>"",
	                'emptyText'=>"",
	                'pager'=> array(
		                'selectedPageCssClass'=>'active',
		                'maxButtonCount' => '10',
		                'firstPageLabel'=>'<<',
		                'lastPageLabel'=>'>>',
		                'prevPageLabel'=>'<',
		                'nextPageLabel'=>'>',
		                'cssFile'=>Yii::app()->baseurl.'/css/bootstrap.css',
		                'header'=>''
	                ),
	            )); ?> 
			</div>
		</div>
	</div>
</div>

<!--message event-->
<script>
	$(document).ready(function(){
		$('body').on('click', '.delbook', function(){
			var $close = $(this);
			$close.closest(".item").addClass('active');
		})
	})
</script>

<!--yes event-->
<script>
	$(document).ready(function(){
		$('body').on('click', '.btn-yes', function(){
			var $close = $(this);
			id = $(this).attr("data-id");
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('bookmark/deletebookmark');?>',
				data: {'id':id},
				success: function(){
					$close.closest(".item").remove();
				},
			})
		})
	})
</script>

<!--cancel event-->
<script>
	$(document).ready(function(){
		$('body').on('click', '.btn-cancel', function(){
			var $close = $(this);
			$close.closest(".item").removeClass('active');
		})
	})
</script>
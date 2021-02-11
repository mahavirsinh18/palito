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
</style>
<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<!-- <h3>Welcome to <?php echo Yii::app()->name; ?></h3> -->
<div class="row wrapper border-bottom white-bg page-heading">
	
	<div class="section grid bookmark-secction">
		<h2 class="title">Bookmarked</h2>
		<div class="item_container">

		<?php
			$id = Yii::app()->user->id;
			$user = User::model()->findByPk($id);
			if($user->is_premium == 1)
			{
				$model = Bookmark::model()->findAll('user_id='.$id);
				foreach($model as $key => $book)
			    {
					$article = Article::model()->findByPk($book->article_id);
					if($article)
					{
						?>
		    			<div class="item">
							<a href="javascript:void(0)" class="delbook" id="delbook"><div class="bookmarkbtn"></div></a>
							<div class="image">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $article->article_image , "this is alt tag of image"); ?>
								<div class="hover">
									<div>
										<p>Are You Sure You Want To Remove The Article?</p>
										<p>
											<a href="javascript:void(0)" class="yes" data-id="<?php echo $book->id ?>">YES</a>
											<a href="javascript:void(0)" class="cancel">CANCEL</a>
										</p>
									</div>
								</div>
							</div>
							<div class="text"> 
								<h4><?php echo $article->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
								<p class="desc"><?php echo $article->description ?></p>
							</div>
						</div>
		    			<?php
			    	}
			    }
	    	}
	    	elseif($user->is_premium == 0)
	    	{
	    		$model = Bookmark::model()->findAll('user_id='.$id);
				foreach($model as $key => $book)
			    {
					$article = Article::model()->find('id='.$book->article_id.' and is_premium=0');
					if($article)
					{?>
		    			<div class="item">
							<a href="javascript:void(0)" class="delbook" id="delbook"><div class="bookmarkbtn"></div></a>
							<div class="image">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $article->article_image , "this is alt tag of image"); ?>
								<div class="hover">
									<div>
										<p>Are You Sure You Want To Remove The Article?</p>
										<p>
											<a href="javascript:void(0)" class="yes" data-id="<?php echo $book->id ?>">YES</a>
											<a href="javascript:void(0)" class="cancel">CANCEL</a>
										</p>
									</div>
								</div>
							</div>
							<div class="text"> 
								<h4><?php echo $article->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
								<p class="desc"><?php echo $article->description ?></p>
							</div>
						</div>
		    			<?php
		    		}
			   	}
			}
    	?>
		</div>
	</div>
</div>

<!--message event-->
<script>
	$(document).ready(function(){
		$(".delbook").click(function(){
			var $close = $(this);
			$close.closest(".item").addClass('active');
		})
	})
</script>

<!--yes event-->
<script>
	$(document).ready(function(){
		$(".yes").click(function(){
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
		$(".cancel").click(function(){
			var $close = $(this);
			$close.closest(".item").removeClass('active');
		})
	})
</script>
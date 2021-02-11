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

<?php 
if($user_data->user_type == 1)
{

}
else
{
?>
<!-- <h3>Welcome to <?php echo Yii::app()->name; ?></h3> -->
<div class="row wrapper border-bottom white-bg page-heading">

	<!-- Most popular starts -->

    <div class="section grid">
    	<h2 class="title">Most Popular <a href="#"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore.png" class="circle" /> See More <img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore-arrow.png" class="arrow" /></a></h2>
		<div class="item_container">
    		<?php
			$id = Yii::app()->user->id;
			$user = User::model()->findByPk($id);
				if($user->is_premium == 1)
				{
					$model = Article::model()->findAll('is_premium=0');
					foreach($model as $key => $value)
					{
						if($value->is_premium == 0)
						{
							?>
							<div class="item">
								<a href="javscript:void(0)" class="book" data-id="<?php echo $value->id ?>"><div class="bookmarkbtn"></div></a>
								<div class="image"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $value->article_image , "this is alt tag of image"); ?></div>
								<div class="text"> 
									<h4><?php echo $value->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
									<p class="desc"><?php echo $value->description ?></p>
								</div>
							</div>
							<?php
						}
					}
				}
				else
				{
					$model = Article::model()->findAll('is_premium=0');
					foreach($model as $key => $value)
					{
						if($value->is_premium == 0)
						{
							?>
							<div class="item">
								<a href="javscript:void(0)" class="book" data-id="<?php echo $value->id ?>"><div class="bookmarkbtn"></div></a>
								<div class="image"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $value->article_image , "this is alt tag of image"); ?></div>
								<div class="text"> 
									<h4><?php echo $value->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
									<p class="desc"><?php echo $value->description ?></p>
								</div>
							</div>
							<?php
						}
					}
				}
			?>
		</div>
	</div>

	<!-- Most popular ends -->

	<!-- New articles starts -->
	
	<div class="section grid">
		<h2 class="title">New Articles</h2>
		<div class="item_container">
    		<?php
			$id = Yii::app()->user->id;
			$user = User::model()->findByPk($id);
				if($user->is_premium == 1)
				{
					$model = Article::model()->findAll('is_premium=0');
					foreach($model as $key => $value)
					{
						if($value->is_premium == 0)
						{
							?>
							<div class="item">
								<a href="javscript:void(0)" class="book" data-id="<?php echo $value->id ?>"><div class="bookmarkbtn"></div></a>
								<div class="image"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $value->article_image , "this is alt tag of image"); ?></div>
								<div class="text"> 
									<h4><?php echo $value->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
									<p class="desc"><?php echo $value->description ?></p>
								</div>
							</div>
							<?php
						}
					}
				}
				else
				{
					$model = Article::model()->findAll('is_premium=0');
					foreach($model as $key => $value)
					{
						if($value->is_premium == 0)
						{
							?>
							<div class="item">
								<a href="javscript:void(0)" class="book" data-id="<?php echo $value->id ?>"><div class="bookmarkbtn"></div></a>
								<div class="image"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $value->article_image , "this is alt tag of image"); ?></div>
								<div class="text"> 
									<h4><?php echo $value->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
									<p class="desc"><?php echo $value->description ?></p>
								</div>
							</div>
							<?php
						}
					}
				}
			?>
		</div>
	</div>

	<!-- New articles ends -->

	<!-- Premium starts -->
	
	<div class="section grid">
		<h2 class="title">Premium<a href="javascript:null(0)"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore.png" class="circle" /> See More <img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore-arrow.png" class="arrow" /></a></h2>
		<div class="item_container">
			<?php
			$id = Yii::app()->user->id;
			$user = User::model()->findByPk($id);
				if($user->is_premium == 1)
				{
					$premium = Article::model()->findAll('is_premium=1');
					foreach($premium as $key => $data)
					{
						if($data->is_premium == 1)
						{
							?>
							<div class="item">
								<a href="javscript:void(0)" class="book" data-id="<?php echo $data->id ?>"><div class="bookmarkbtn"></div></a>
								<div class="image"><?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image"); ?></div>
								<div class="text"> 
									<h4><?php echo $data->article_name ?> <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></h4>
									<p class="desc"><?php echo $data->description ?></p>
								</div>
							</div>
							<?php
						}
					}
				}
			?>
		</div>
	</div>

	<!-- Premium ends-->
</div>

<?php } ?>

<script>
	$(document).ready(function(){
		$(".book").click(function(){
			id = $(this).attr("data-id");
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('site/setbookmark');?>',
				data: {'id':id},
				success: function(){
					alert("Bookmarked");
				},
			});
		})
	})
</script>

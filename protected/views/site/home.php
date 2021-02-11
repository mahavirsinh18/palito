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

	<div class="homeslider hide-mobile">
		<div class="owl-carousel owl-theme" id="homeslider">
			<?php
				$id=Yii::app()->user->id;
				$model = Article::model()->findAll();
				foreach($model as $key => $data)
				{
					if($data->featured == 1)
					{
						// echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image");
						?>
						<div class="item">
							<img src="<?php echo Yii::app()->request->baseUrl. "/uploads/" . $data->article_image;?>" />
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>

	<div class="homeslider hide-desktop">
		<div class="owl-carousel owl-theme" id="homeslider2">
			<?php
				$id=Yii::app()->user->id;
				$model = Article::model()->findAll();
				foreach($model as $key => $data)
				{
					if($data->featured == 1)
					{
						// echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image");
						?>
						<div class="item">
							<img src="<?php echo Yii::app()->request->baseUrl. "/uploads/" . $data->article_image;?>" />
						</div>
						<?php
					}
				}
			?>
		</div>
	</div>

	<!-- Most popular starts -->

    <div class="section grid p1">
    	<h2 class="title">Most Popular
    		<a href="<?php echo Yii::app()->createUrl('site/mostpopular');?>" class="more">
    			<?php $total=$popular_article->popular_article()->getTotalItemCount(); ?>
				<?php
					if($total > 5)
					{
						?>
						<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore.png" class="circle" /> See More 
						<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore-arrow.png" class="arrow" />
						<?php
					}
				?>
    		</a>
    	</h2>

		<div class="item_container">			
			 <?php 
			 $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$popular_article->popular_article(),
                'itemView'=>'_popular_article',
                'id'=>'_popular_article',
                'summaryText'=>"",
                'emptyText'=>"",
            ));
             ?>
		</div>
	</div>

	<!-- Most Popular ends -->

	<!--New Articles starts -->

	<div class="section grid a1">
		<h2 class="title">New Articles
			<a href="<?php echo Yii::app()->createUrl('site/newarticles');?>" class="more2">
				<?php $total=$new_article->new_article()->getTotalItemCount(); ?>
				<?php
					if($total > 5)
					{
						?>
						<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore.png" class="circle" /> See More 
						<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore-arrow.png" class="arrow" />
						<?php
					}
				?>
    		</a>
		</h2>

		<div class="item_container">
			 <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$new_article->new_article(),
                'itemView'=>'_new_article',
                'id'=>'_new_article',
                'summaryText'=>"",
                'emptyText'=>"",
            )); ?>  		
		</div>
	</div>

	<!-- New Articles ends -->

	<!-- Premium starts -->

	<?php 
	$id=Yii::app()->user->id;
	$user=User::model()->findByPk($id);
	if($user->is_premium==1)
	{
		?>
		<div class="section grid premium b1">
			<h2 class="title">Premium
				<a href="<?php echo Yii::app()->createUrl('site/premium');?>" class="more3">
					<?php $total=$premium_article->premium_article()->getTotalItemCount(); ?>
					<?php
						if($total > 5)
						{
							?>
							<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore.png" class="circle" /> See More 
							<img src="<?php echo Yii::app()->request->baseUrl;?>/img/btn-icon-seemore-arrow.png" class="arrow" />
							<?php
						}
					?>
				</a>
			</h2>

			<div class="item_container">
				<?php $this->widget('zii.widgets.CListView', array(
	                'dataProvider'=>$premium_article->premium_article(),
	                'itemView'=>'_premium_article',
	                'id'=>'_premium_article',
	                'summaryText'=>"",
	                'emptyText'=>"",
	            )); ?>			
			</div>
		</div>
		<?php 
	} 
	?>

	<!-- Premium ends -->

</div>

<?php } ?>

<script>
	$(document).ready(function(){
		$('body').on('click', '.book', function(){
			id = $(this).attr("data-id");
			$('.book[data-id="'+id+'"]').find('.remove').attr('checked','checked');
			$('.book[data-id="'+id+'"]').find('.remove').attr('disabled','disabled');
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('site/setbookmark');?>',
				data: {'id':id},
				success: function(){
					$('.book[data-id="'+id+'"]').find('.remove').attr('checked','checked');
					$('.book[data-id="'+id+'"]').find('.remove').attr('disabled','disabled');
				},
			});
		})
	})
</script>

<script>
	$(document).ready(function(){
		$('body').on('click', 'button', function(){
			id = $(this).attr("data-id");
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('site/liked');?>',
				data: {'id':id},
				success: function(){
					$('.likebtn[data-id="'+id+'"]').find('.thumb').addClass("fa fa-thumbs-up");
					$('.likebtn[data-id="'+id+'"]').attr('disabled','disabled');
				},
			});
		})
	})
</script>

<script>
	/*$(document).ready(function(){
		$('.more').click(function(){
			$('.p1').addClass('hidden');
			$('.p2').removeClass('hidden');
		})
	})*/
</script>

<script>
	/*$(document).ready(function(){
		$('.more2').click(function(){
			$('.a1').addClass('hidden');
			$('.a2').removeClass('hidden');
		})
	})*/
</script>
<div class="item">
	<?php $article=Article::model()->findByPk($data->article_id);
	if($article){ ?>
	<a href="javascript:void(0)" class="delbook" id="delbook"><div class="bookmarkbtn"></div></a>
	<div class="image">
		<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$article->id));?>">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $article->article_image , "this is alt tag of image"); ?>
		</a>
		<div class="hover">
			<div>
				<p>Are You Sure You Want To Remove The Article?</p>
				<p>
					<input type="button" class="btn-yes" value="YES" data-id="<?php echo $data->id ?>" />
					<input type="button" class="btn-cancel" value="CANCEL" />
				</p>
			</div>
		</div>
	</div>
	<div class="text" style="height: 200px !important;overflow: hidden;">
		<h4>
			<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$article->id));?>">
				<?php 
					/*if(isset($article->article_name) && $article->article_name!=''){
						$article_name = substr($article->article_name,0,40);
						if(strlen($article->description)>40){
							echo $article_name.'...';
						}
						else
						{
							echo $article_name;
						}
					}*/
				?>
				<?php echo $article->article_name ?>
			</a>
			<?php
				$id = Yii::app()->user->id;
				$liked = Liked::model()->find('user_id='.$id.' and article_id='.$article->id);
				if(!$liked)
				{
					?>
					<span>
						<button class="likebtn" style="border: none; border-radius: 50%;" data-id="<?php echo $article->id ?>">
							<i class="thumb fa fa-thumbs-o-up"></i>
						</button>
					</span>
					<?php
				}
				else
				{
					?>
					<span>
						<button class="likebtn" style="border: none; border-radius: 50%;" data-id="<?php echo $article->id ?>" disabled="disabled">
							<i class="thumb fa fa-thumbs-up"></i>
						</button>
					</span>
					<?php
				}
			?> 
			<!-- <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> -->
		</h4>
		<!-- <p class="desc"><?php echo $string = substr($article->description,0,200); ?></p> -->
		<!-- <p class="desc"><?php //echo $article->description; ?></p> -->
		<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$article->id));?>">
			<p class="desc">
			<?php
			if(isset($article->description) && $article->description!=''){ 
				$string = substr($article->description,0,200);
					if(strlen($article->description)>200){
						echo $string.'...';
					}
					else
					{
						echo $string;
					}
				}
			?>
			</p>
		</a>
	</div>
	<?php } ?>
</div>

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
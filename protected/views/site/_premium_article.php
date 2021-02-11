<div class="item">
	<?php

	$id = Yii::app()->user->id;
	$bookmark = Bookmark::model()->find('user_id='.$id.' and article_id='.$data->id);
	if(!$bookmark)
	{
		?>
		<a href="javascript:void(0)" class="book" data-id="<?php echo $data->id ?>">
			<div class="bookmarkbtn">
				<input type="checkbox" class="remove" />
				<span></span>
			</div>
		</a>
		<?php
	}
	else
	{
		?>
		<a href="javascript:void(0)" class="book" data-id="<?php echo $data->id ?>">
			<div class="bookmarkbtn">
				<input type="checkbox" class="remove" checked="checked" disabled="disabled" />
				<span></span>
			</div>
		</a>
		<?php
	}

	?>
	
	<div class="image">
		<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$data->id));?>">
			<?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image");?>
		</a>
	</div>
	
	<div class="text" style="height: 200px !important;overflow: hidden;"> 
		<h4>
			<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$data->id));?>">
				<?php echo $data->article_name ?>
				<?php 
					/*if(isset($data->article_name) && $data->article_name!=''){
						$article_name = substr($data->article_name,0,40);
						if(strlen($data->description)>40){
							echo $article_name.'...';
						}
						else
						{
							echo $article_name;
						}
					}*/
				?>
			</a>
			<?php
				$id = Yii::app()->user->id;
				$liked = Liked::model()->find('user_id='.$id.' and article_id='.$data->id);
				if(!$liked)
				{
					?>
					<span>
						<button class="likebtn" style="border: none; border-radius: 50%;" data-id="<?php echo $data->id ?>">
							<i class="thumb fa fa-thumbs-o-up"></i>
						</button>
					</span>
					<?php
				}
				else
				{
					?>
					<span>
						<button class="likebtn" style="border: none; border-radius: 50%;" data-id="<?php echo $data->id ?>" disabled="disabled">
							<i class="thumb fa fa-thumbs-up"></i>
						</button>
					</span>
					<?php
				}
			?> 
			<!-- <span><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> -->
		</h4>
		<!-- <p class="desc"><?php echo $string = substr($data->description,0,200); ?></p> -->
		<!-- <p class="desc"><?php //echo $data->description; ?></p> -->
		<a href="<?php echo Yii::app()->createUrl('site/article_details',array('id'=>$data->id));?>">
			<p class="desc">			
				<?php 
				if(isset($data->description) && $data->description!=''){ 
					$string = substr($data->description,0,200);
					if(strlen($data->description)>200){
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
</div>
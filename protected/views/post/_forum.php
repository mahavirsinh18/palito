<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<style type="text/css">
		.viewbtn {background-color: #01d5bd; padding: 7px 14px; color: white; border-radius: 20px; float: right; font-weight: 500;}
		.viewbtn:hover {background-color: #002157; color: white;}
		.viewbtn:active {background-color: #18a689; color: white;}
		.viewbtn:focus {color: white;}
		.cat-heading {text-align: center; background-color: gray; color: white;}
		th, td {border: 1px solid gray !important;}
	</style>
	<body>
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-sm-2 text-right">
				<a href="<?php echo Yii::app()->createUrl('post/create');?>" class="add-new btn btn-effect-ripple btn-primary" >Post a Question</a>
			</div>
		</div>

		<div class="row">
			<?php
			$categories=Category::model()->findAll('is_deleted=0');

			foreach($categories as $key => $category)
			{
				$post = Post::model()->findAll('is_deleted=0 and category_id='.$category->id);
				?>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th colspan="4" class="cat-heading">
								<?php
									if(isset($category->category_name) && $category->category_name!='')
									{ 
										echo $category->category_name; 
									}
								?>
							</th>
						</tr>
						<tr style="background-color: #ebebeb;">
							<th style="width: 43%;">Post Title</th>
							<th style="width: 25%; text-align: center;">Post Views</th>
							<th style="width: 25%; text-align: center;">Post Remarks</th>
							<th style="width: 7%;"></th>
						</tr>
						<?php 
						foreach($post as $key => $value)
						{
							?>							
							<tr style="background-color: #ebebeb;">
								<td><?php echo $value->post_title; ?></td>
								<td style="text-align: center;">
									<i class="fa fa-eye"></i>&nbsp;&nbsp;
									<?php echo $value->post_views; ?>
								</td>
								<td style="text-align: center;">
									<i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;
									<?php
									$post_liked = PostLiked::model()->findAll('post_id='.$value->id);
									echo count($post_liked);
									?>
								</td>
								<td>
									<a href="<?php echo Yii::app()->createUrl('post/view_forum',array('id'=>$value->id)); ?>" class="viewbtn" data-id="<?php echo $value->id; ?>">View</a>
								</td>
							</tr>
							<?php 
						}
						?>
					</tbody>
				</table>
				<?php 
			}
			?>
		</div>
	</body>
</html>
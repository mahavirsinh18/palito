<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<style type="text/css">
		.viewbtn {background-color: #01d5bd; padding: 10px 20px; color: white; border-radius: 20px; font-weight: 500;}
		.viewbtn:hover {background-color: #002157; color: white;}
		.viewbtn:active {background-color: #18a689; color: white;}
		.viewbtn:focus {color: white;}

		div.vertical-line{
	      	width: 1px;
	      	background-color: silver;
	      	height: 100%;
	      	float: left;
	      	border: 2px ridge silver ;
	      	border-radius: 2px;
	      	margin-left: 90px;
	    }

	    hr {margin-top: 10px !important; margin-bottom: 10px !important;}
	    .abc1 {padding: 5px; border-top-left-radius: 3px; border-bottom-left-radius: 3px; color: #fa6c8d; border: 1px solid #fa6c8d; border-right: none;}
	    .likebtn {border: 1px solid #5d7791; padding: 5px; border-top-left-radius: 3px; border-bottom-left-radius: 3px; color: #5d7791; border-right: none;}
	    .likenum {border: 1px solid #5d7791; padding: 2px 5px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; margin-left: -10px;}
	    .viewborder {border: 1px solid #5d7791; padding: 5px; border-top-left-radius: 3px; border-bottom-left-radius: 3px; color: #5d7791; border-right: none;}
	    .view2 {border: 1px solid #5d7791; padding: 2px 5px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; margin-left: -4px;}
	    .heartbtn {border: 1px solid #fa6c8d; padding: 2px 5px; margin-left: -10px; border-top-right-radius: 3px; border-bottom-right-radius: 3px; color: #fa6c8d;}
	    .clicklike {border: none; background-color: white;}
	    .redbtn {border: none; background-color: white;}
	</style>
	<body>
		<div class="go-premium-section">
			<div class="white-box">
				<div class="row" style="border: 2px solid silver; padding: 10px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
					<?php
						$id = $_GET['id'];
						$post = Post::model()->findByPk($id);
						if($post->post_views!='')
						{
							$post->post_views=$post->post_views+1;
							$post->save(false);
						}
						$user = User::model()->findByPk($post->user_id);
					?>
					<div class="col-md-9">
						<h2><?php echo $post->post_title; ?></h2>
						<p><?php echo $post->post_content; ?></p>
					</div><br>

					<div class="col-md-3">
						Posted on : <?php echo date("d-M-Y", strtotime($post->created_at)); ?>
						<br><br>
						Posted by : <?php echo $user->username; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12" style="border: 2px solid silver; border-top: none; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
						<div style="padding: 15px;">
							<a href="<?php echo Yii::app()->createUrl('comment/create',array('id'=>$post->id)); ?>" class="viewbtn" data-id="<?php echo $post->id; ?>">Post a Comment</a>
							<span style="margin-left: 540px;">
								<i class="fa fa-eye viewborder"></i>
								<span class="view2">
									<?php echo $post->post_views; ?>
								</span>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php
								$id = Yii::app()->user->id;
								$liked = PostLiked::model()->find('user_id='.$id.' and post_id='.$post->id);

								if(!$liked)
								{
									?>
									<button class="clicklike" data-id="<?php echo $post->id; ?>">
										<i class="fa fa-thumbs-o-up likebtn"></i>
									</button>
									<?php
								}
								else
								{
									?>
									<button class="clicklike" data-id="<?php echo $post->id; ?>" disabled="disabled">
										<i class="fa fa-thumbs-up likebtn"></i>
									</button>
									<?php
								}
								?>
								<span class="likenum">
									<?php
									$post_liked = PostLiked::model()->findAll('post_id='.$post->id);
									$count_like = count($post_liked);

									echo $count_like;
									?>
								</span>
							</span>
						</div>
					</div>
				</div>
				<br><br><br>

				<div class="row">
					<?php
						$comment = Comment::model()->findAll('post_id='.$post->id);
						$total_comment=count($comment);
						$i=0;
						foreach($comment as $key => $value)
						{
							$i++;
							$user = User::model()->findByPk($value->user_id);
							?>
							<div class="col-md-12" style="border: 1px solid silver; padding: 10px; border-radius: 10px;">
								<div>
									Posted on : <?php echo date("d-M-Y", strtotime($value->created_at)); ?>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									Posted by : <?php echo $user->username.' (<a href="mailto:">'.$user->email.'</a>)'; ?>
									<span style="margin-right: 70px; float: right;">
										<?php
										$id = Yii::app()->user->id;
										$post = Post::model()->find('user_id='.$id);
										$commment_liked = CommentLiked::model()->find('user_id='.$id.' and comment_id='.$value->id);

										if(!$commment_liked)
										{
											?>
											<button class="redbtn" data-id="<?php echo $value->id; ?>" post-id="<?php echo $value->post_id; ?>"> 
												<i class="fa fa-heart-o abc1"></i>
											</button>
											<?php
										}
										else 
										{
											?>
											<button class="redbtn" data-id="<?php echo $value->id; ?>" post-id="<?php echo $value->post_id; ?>" disabled="disabled"> 
												<i class="fa fa-heart abc1"></i>
											</button>
											<?php
										}
										?>
										<span class="heartbtn">
											<?php
											$comm_like = CommentLiked::model()->findAll('comment_id='.$value->id);
											$count_like = count($comm_like);

											echo $count_like;
											?>
										</span>
									</span>
									<hr>
									<?php echo $value->comment_content; ?>
								</div>
							</div>
							<?php if($total_comment!=$i)
							{
								?>
								<div class="vertical-line" style="height: 30px;"></div>
								<?php 
							}							
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>

<script>
	$(document).ready(function(){
		$('body').on('click', '.clicklike', function(){
			id = $(this).attr("data-id");
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('postLiked/liked');?>',
				data: {'id':id},
				success: function(){
					$('.clicklike[data-id="'+id+'"]').find('.likebtn').addClass("fa fa-thumbs-up");
					$('.clicklike[data-id="'+id+'"]').attr('disabled','disabled');
				},
			});
		})
	})
</script>

<script>
	$(document).ready(function(){
		$('body').on('click', '.redbtn', function(){
			id = $(this).attr("data-id");
			post_id = $(this).attr("post-id");
			$.ajax({
				type: "post",
				url: '<?php echo Yii::app()->createUrl('commentLiked/liked');?>',
				data: {'id':id,'post_id':post_id},
				success: function(){
					$('.redbtn[data-id="'+id+'"]').find('.abc1').addClass("fa fa-heart");
					$('.redbtn[data-id="'+id+'"]').attr('disabled','disabled');
				},
			});
		})
	})
</script>
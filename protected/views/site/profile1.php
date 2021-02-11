<div class="blog">
		
		<div class="blogimage">
			<div class="text">
				<h1><?php echo $model->article_name; ?></h1>
				<!-- <h1>THE CONFIDENCE CONUNDRUM</h1> -->
				<!-- <p>March 12, 2015 <i></i> 5 minute read <i></i> by Mark Manson</p> -->
				<p><?php echo $date = date('M d, Y', strtotime($model->created_at)) ?></p>
			</div>
			<img src="<?php echo Yii::app()->request->baseUrl. "/uploads/" . $model->background_image;?>" />
			<!-- <img src="https://markmanson.net/wp-content/uploads/2015/03/confidence.jpg" alt="" /> -->
		</div>
		<div class="content">
			<p><?php echo $model->description; ?></p>
		</div>
		<!-- <div class="content">
			<p>How are you supposed to be confident about something when you have nothing to feel confident about?</p>
			<p>Like, how are you supposed to be confident at your new job if you’ve never done this type of work before? Or how are you supposed to be confident in social situations when no one has ever liked you before? Or how are you supposed to be confident in your relationship when you’ve never been in a successful relationship before?</p>
			<p>On the surface, confidence appears to be an area where the rich get richer and the poor stay the fucking losers they are. After all, if you’ve never experienced much social acceptance, and you lack confidence around new people, then that lack of confidence will make people think you’re clingy and weird and not accept you. Same deal goes for relationships. No confidence in intimacy will lead to bad breakups and awkward phone calls and emergency Ben and Jerry’s runs at three in the morning.</p>
			<p class="subimg"><img src="https://markmanson.net/wp-content/uploads/2015/03/confidence_body.jpg" alt="" /></p>
			<h3>THE CONFIDENCE CONUNDRUM</h3>
			<p>If you’ve always lost in life, then how could you ever rationally expect to be a winner? And if you never expect to be a winner, then you’re going to act like a loser. Thus the cycle of suckage continues.</p>
			<p>This is the confidence conundrum, where in order to be happy or loved or successful, first you need to be confident; but then to be confident, first you need to be happy or loved or successful.</p>
			<p>It’s like a dog chasing its own tail. Or Dominos ordering its own pizza. You can spend a lot of time cuticle-gazing trying to mentally sort everything out, but just like with your lack of confidence, you’re likely to end up right back where you started.</p>
			<p>We know a few things about confidence just from observing people. So before you run off and order that pizza, let’s break this down quickly:</p>
			<ul>
				<li>Just because somebody has something (tons of friends, a million dollars, a bitchin’ beach body) doesn’t necessarily mean that this person is confident in it. There are tycoons who totally lack confidence in their own wealth, models who lack confidence in their looks, and celebrities who lack confidence in their own popularity. So I think the first thing we can establish is that confidence is not necessarily linked to any external marker. Rather, our confidence is rooted in our perception of ourselves regardless of any tangible external reality.</li>
				<li>Because our confidence is not necessarily linked to any external tangible measurement, we can conclude that improving the external, tangible aspects of our lives won’t necessarily build confidence.
Chances are that if you’ve lived more than a couple decades, you’ve experienced this in some form or another. Getting a promotion at your job doesn’t necessarily make you more confident in your professional abilities. In fact, it can often make you feel less confident. Dating and/or sleeping with more people doesn’t necessarily make you feel more confident about how attractive you are. Moving in together or getting married doesn’t necessarily make you feel any more confident in your relationship.</li>
				<li>Confidence is a feeling. An emotional state and a state of mind. It’s the perception that you lack nothing. That you are equipped with everything you need, both now and for the future. A person confident in their social life will feel as though they lack nothing in their social life. A person with no confidence in their social life believes that they lack the prerequisite coolness to be invited to everyone’s pizza party. It’s this perception of lacking something that drives their needy, clingy and/or bitchy behavior.</li>	
			</ul>
			<h3>HOW TO BE MORE CONFIDENT</h3>
			<p>The obvious and most common answer to the confidence conundrum is to simply believe that you lack nothing. That you already have, or at least deserve, whatever you feel you would need to make you confident.</p>
			<p>But this sort of thinking — believing you’re already beautiful even though you’re a frumpy slob, or believing you’re a raving success even though your only profitable business venture was selling weed in high school — leads to the kind of insufferable narcissism that causes people to argue that obesity (something that is more detrimental to your health than smoking cigarettes) should be celebrated as beauty and that it’s, like, totally OK to carve your name into the Roman Colosseum, because, you know, selfies.</p>
			<p>No, the solution to the confidence conundrum is not to feel as though you lack nothing and delude yourself into believing you already possess everything you could ever dream. The solution is to simply become comfortable with what you potentially lack.</p>
			  
		</div> -->
		
		<div class="section grid related-post">
			<h2 class="title">Related Post</h2>
			<div class="item_container">
				<?php
				$model = Article::model()->findAll(array('select'=>'*, rand() as rand','order'=>'rand','limit'=>'5'));
				foreach($model as $key => $data)
				{
					?>
					<div class="item">
						<div class="image">
							<a href="<?php echo Yii::app()->createUrl('site/details',array('id'=>$data->id));?>">
								<?php echo CHtml::image(Yii::app()->request->baseUrl . "/uploads/" . $data->article_image , "this is alt tag of image");?>
							</a>
						</div>
						<div class="text">
							<h4>
								<a href="<?php echo Yii::app()->createUrl('site/details',array('id'=>$data->id));?>">
									<?php echo $data->article_name ?>
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
							</h4>
							<!-- <p class="graytext"><?php echo $string = substr($data->description,0,200); ?></p> -->
							<p class="graytext"><?php echo $data->description; ?></p>
						</div>
					</div>
					<?php
				}
				?>
				<!-- <div class="item">
					<div class="image"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/item-img.png" /></div>
					<div class="text"> 
						<h4><a href="#">Blog Title Name</a></h4>
						<p class="graytext">Lorem ipsum dolor sit amet, perci pitur sadip scing ea mea.</p>
					</div> -->
			</div>
		</div>
	
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
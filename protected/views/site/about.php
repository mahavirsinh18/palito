<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$cms = Cms::model()->findAll();
$data = CHtml::listData($cms,'title','content');
?>

<!-- SPLITSCREEN -->
		<div class="eloisa_fn_page_splitscreen portfolio_page">
			<div class="eloisa_fn_page_splitleft">
				<div class="splitscreen_title">
					<div class="in">
						<div class="title_holder">
							<h1>About Me</h1>
							<p><?php echo @$data['ABOUT_ME']; ?></p>
						</div>
					</div>
				</div>
				<div class="splitscreen_title_back about">
					<div class="bg" style="background-image: url(<?php echo Yii::app()->request->baseUrl.'/images/'.$data['ABOUT_PHOTO']; ?>)"></div>
					<div class="eloisa_fn_split_overlay"></div>
				</div>
			</div>
			<div class="eloisa_fn_page_splitright">
				<div class="in">
				
					<!-- RIGHT CONTENT HERE -->

					<!-- ABOUT PAGE -->
					<div class="container">
						<div class="eloisa_fn_about_page_title split">
							<h3><?php echo @$data['ABOUT_TITLE']; ?></h3>
						</div>
						<div class="space60"></div>
						<div class="eloisa_fn_portfolio_text">
							<?php echo @$data['ABOUT_CONTENT']; ?>
						</div>

						<!-- SOCIAL ICONS -->
						<div class="eloisa_fn_social_icons">
							<label>Share:</label>
							<ul>
								<li><a href="<?php echo @$data['FACEBOOK_PROFILE']; ?>"><i class="xcon-facebook"></i></a></li>
								<li><a href="<?php echo @$data['TWITTER_PROFILE']; ?>"><i class="xcon-twitter"></i></a></li>
								<li><a href="<?php echo @$data['INSTA_PROFILE']; ?>"><i class="xcon-instagram"></i></a></li>
								<li><a href="<?php echo @$data['PINTEREST_PROFILE']; ?>"><i class="xcon-pinterest"></i></a></li>
								<li><a href="<?php echo @$data['GITHUB_PROFILE']; ?>"><i class="xcon-github"></i></a></li>
							</ul>
						</div>
						<!-- /SOCIAL ICONS -->

					</div>
					<!-- /ABOUT PAGE-->

					<!-- FOOTER -->
					<div class="space70"></div>
					<div class="space40"></div>
					<footer class="eloisa_fn_footer">
						<div class="eloisa_fn_footer_wrap">
							<p>Copyright 2017. Designed by <a href="#">Photographer</a></p>
						</div>
					</footer>
					<div class="space70"></div>
					<div class="space50"></div>
					<!-- /FOOTER -->

					 

					<!-- /RIGHT CONTENT HERE -->
				</div>
			</div>
		</div>		
    	<!-- /SPLITSCREEN -->
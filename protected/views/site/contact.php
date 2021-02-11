<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);

$cms = Cms::model()->findAll();
$data = CHtml::listData($cms,'title','content');
?>

<!-- SPLITSCREEN -->
		<div class="eloisa_fn_page_splitscreen contact">
			<div class="eloisa_fn_page_splitleft">
				<div class="splitscreen_title">
					<div class="in">
						<div class="eloisa_fn_address_wrap">
							<div class="eloisa_fn_address_wrap_in">
								<div class="address_info">
									<p class="address">Address: <?php echo @$data['CONTACT_ADDRESS']; ?></p>
									<p class="phone">Phone: <?php echo @$data['CONTACT_PHONE']; ?></p>
									<p class="email">Email: <a href="#"><?php echo @$data['CONTACT_EMAIL']; ?></a></p>
								</div>
								<div class="address_social_icons">
									<ul>
										<li><a href="<?php echo @$data['FACEBOOK_PROFILE']; ?>"><i class="xcon-facebook"></i></a></li>
										<li><a href="<?php echo @$data['TWITTER_PROFILE']; ?>"><i class="xcon-twitter"></i></a></li>
										<li><a href="<?php echo @$data['INSTA_PROFILE']; ?>"><i class="xcon-instagram"></i></a></li>
										<li><a href="<?php echo @$data['LINKEDIN_PROFILE']; ?>"><i class="xcon-linkedin"></i></a></li>
										<li><a href="<?php echo @$data['GITHUB_PROFILE']; ?>"><i class="xcon-github"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="splitscreen_title_back">
					<div class="bg"></div>
					<div class="eloisa_fn_split_overlay"></div>
				</div>
			</div>
			<div class="eloisa_fn_page_splitright contact" style="overflow: auto;">
				<div class="in">
					<div class="eloisa_fn_main_contact_wrap" >
						<div class="container">
							<div class="eloisa_fn_title contact">
								<h3><span>Contact Us</span></h3>
							</div>
							<?php if(Yii::app()->user->hasFlash('contact')): ?>
							<div class="flash-success">
								<?php echo Yii::app()->user->getFlash('contact'); ?>
							</div>
							<?php endif; ?>
							<div class="eloisa_fn_input_wrap">
								<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'contact-form',
										'enableClientValidation'=>true,
										'htmlOptions'=>array('class'=>'contact_form'),
										'clientOptions'=>array(
											'validateOnSubmit'=>true,
										),
									)); ?>


									<div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
									<div class="empty_notice"><span>Please Fill Required Fields</span></div>
									<div class="first_row">
										<ul>
											<li>
												<div class="item">
													<!-- <input id="name" type="text" placeholder="Your Name" /> -->
													<?php echo $form->textField($model,'name',array('placeholder'=>'Name')); ?>
													<?php echo $form->error($model,'name'); ?>
												</div>
											</li>
											<li>
												<div class="item">
													<?php echo $form->textField($model,'email',array('placeholder'=>'Email')); ?>
													<?php echo $form->error($model,'email'); ?>

												</div>
											</li>
										</ul>
									</div>
									<div class="subject">
										<!-- <input id="subject" type="text" placeholder="Subject" /> -->
										<?php echo $form->textField($model,'subject',array('placeholder'=>'Subject','size'=>60,'maxlength'=>128)); ?>
										<?php echo $form->error($model,'subject'); ?>
									</div>
									<div class="message">
										<!-- <textarea id="message" placeholder="Message"></textarea> -->
										<?php echo $form->textArea($model,'body',array('placeholder'=>'Message','rows'=>6, 'cols'=>50)); ?>
										<?php echo $form->error($model,'body'); ?>
									</div>
									<div class="eloisa_fn_button_effect" data-position="left" data-text-color="" data-border-color="" data-bg-color="">
										<a id="send_message" href="#"><span>Send</span></a>
										<?php //echo CHtml::submitButton('<span>Send</span>'); ?>
									</div>
								<?php $this->endWidget(); ?>
							</div>
						</div>
					</div>
					<!-- /CONTACT -->
						
					<!-- FOOTER -->
					<footer class="eloisa_fn_footer">
						
					</footer>
					<!-- /FOOTER -->
						
					<!-- /RIGHT CONTENT HERE -->
				</div>
			</div>
		</div>		
    	<!-- /SPLITSCREEN -->
    	<script type="text/javascript">
    		$(document).ready(function(){
    			$('#send_message').click(function(){
    				$('#contact-form').submit();
    			})

    		})
    	</script>

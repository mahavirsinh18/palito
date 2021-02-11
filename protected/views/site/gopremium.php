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
    .stripe-button-el{
    	display: none;
    }
</style>
<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<!-- <h3>Welcome to <?php echo Yii::app()->name; ?></h3> -->
<div class="row wrapper border-bottom white-bg page-heading">
	
	<div class="section grid go-premium-section">
		<h2 class="title">Go Premium</h2>
		<div class="white-box">
			<div class="row">
				<?php if (Yii::app()->user->hasFlash('success')): ?>
			        <div class="alert alert-success alert-dismissable">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><strong>Success</strong></h4>
			            <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
			        </div>
				<?php endif; ?>
				<?php if (Yii::app()->user->hasFlash('danger')): ?>
			        <div class="alert alert-danger alert-dismissable">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><strong>Error</strong></h4>
			            <p><?php echo Yii::app()->user->getFlash('danger'); ?></p>
			        </div>
				<?php endif; ?>
				<div class="col-sm-6">
					<img src="<?php echo Yii::app()->request->baseUrl;?>/img/go-premium-img.png" />
				</div>
				<!-- <div class="col-sm-6">
					<div class="text">
					<p>Lorem ipsum dolor sit amet, perci pitur sadip scing ea mea. Vel ex apeirian definitionem, in vis duis sanctus appellantur.</p>
					<p><a href="javascript:void(0)" class="btn btn-primary" id="checkbtn">Checkout</a></p>
					</div>
				</div> -->
				<div class="col-sm-6">
					<div class="text">
					<p>Lorem ipsum dolor sit amet, perci pitur sadip scing ea mea. Vel ex apeirian definitionem, in vis duis sanctus appellantur.</p>
					<?php 
					$user=User::model()->findByPk(Yii::app()->user->id);
					if($user->user_type==2)
					{
						if(isset($user->is_premium) && $user->is_premium==1)
						{
							?>
								<p><a href="<?php echo Yii::app()->createUrl('site/cancel_subscription');?>" class="btn btn-danger" style="border-radius: 20px;padding: 10px 20px;" id="cancel_subscription">Cancel Subscription</a></p>
							<?php 
						}
						else
						{
							?>							
								<p><a href="javascript:void(0)" class="btn btn-primary" id="checkbtn">Subscribe</a></p>
							<?php
						}
					}?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $stripe=Yii::app()->params['stripe'];?>

<form method="POST">
	<script
		src="https://checkout.stripe.com/checkout.js"
		class="stripe-button"
		data-key="<?php echo $stripe['publishable_key'];?>"
		data-amount="100"
		data-name="Palito">
	</script>
</form>

<script>
	$("#checkbtn").click(function(){
		$(".stripe-button-el").trigger("click");
	});
</script>
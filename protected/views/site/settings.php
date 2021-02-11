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
<!-- <h3>Welcome to <?php echo Yii::app()->name; ?></h3> -->
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="section grid settings-section">
		<h2 class="title"><img src="<?php echo Yii::app()->request->baseUrl;?>/img/icon-settings-blue.png" /> Settings</h2>
		<div class="cus_tabs">
		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#accountsettings" aria-controls="accountsettings" role="tab" data-toggle="tab">Account Settings</a></li>
			<?php
				$user = User::model()->findByPk(Yii::app()->user->id);
				if($user->user_type == 1)
				{

				}
				else
				{
					?><li role="presentation"><a href="#priacypolicy" aria-controls="priacypolicy" role="tab" data-toggle="tab">Privacy &amp; Terms</a></li><?php
				}
			?>
		  </ul>
		  <!-- Tab panes -->
		  <div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="accountsettings">
				<div class="form">
					<div class="ibox-content">
                    	<div class="row" style="clear: both;">

                    	<?php if (Yii::app()->user->hasFlash('success')): ?>
                        <div class="alert alert-success alert-dismissable animation-fadeIn">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><strong>Success</strong></h4>
                            <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
                        </div>
                    	<?php endif; ?>
                    	<?php if (Yii::app()->user->hasFlash('error')): ?>
                        <div class="alert alert-danger alert-dismissable animation-fadeIn">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><strong>Error</strong></h4>
                            <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
                        </div>
                    	<?php endif; ?>
                    		
		                <?php
		                $form = $this->beginWidget('CActiveForm', array(
		                    'id' => 'user-form',
		                    'enableAjaxValidation' => true,
		                    // 'htmlOptions' => array('class' => 'form-horizontal form-bordered','enctype'=>'multipart/form-data'),
		                    'clientOptions' => array(
		                        'validateOnSubmit' => true,
		                    ),
		                    'errorMessageCssClass' => 'help-block animation-slideUp form-error',
		                ));
		                ?>  

		                <div class="form-group">
		                    <?php echo $form->labelEx($model, 'username', array('class' => 'control-label')); ?>
	                        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
	                        <?php echo $form->error($model, 'username'); ?>
		                </div>

		                <div class="form-group">
		                    <?php echo $form->labelEx($model, 'email', array('class' => 'control-label')); ?>
	                        <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?>
	                        <?php echo $form->error($model, 'email'); ?>
		                </div>

		                <div class="form-group">
		                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save Changes', array('class' => 'btn btn-effect-ripple btn-primary submit')); ?>
		                </div>

	                	<?php $this->endWidget(); ?>
            			</div><!-- form -->
         			</div>	
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="priacypolicy">
				<div id="success"></div>
				<?php
				$id=Yii::app()->user->id;
				$terms = Terms::model()->findAll();

				foreach($terms as $key => $value)
				{
					$user = User::model()->findByPk($id);
					$new = explode(",",$user['terms_id']);
					$check = "";

					if(in_array($value->id, $new))
					{
						$check = "checked";
					}
					?>

					<div class="checkbox checkbox-primary">
						<input type="checkbox" id="check<?php echo $value->id; ?>" name="chk" value="<?php echo $value->id; ?>" class="chk" <?php echo $check; ?> >
						<label for="check<?php echo $value->id; ?>"><?php echo $value->conditions; ?><br><br></label>
					</div>
					<?php
				}
				?>
				<div class="form-group">						
					<input type="button" id="btn2" class="btn btn-primary" value="Save Changes" />
				</div>
			</div>
		  </div>
		</div>
	</div>	
</div>

<script>
    $(document).ready(function(){
        $("#btn2").click(function(){
            var checked = [];
            $.each($("input[name='chk']:checked"), function(){
                checked.push($(this).val());
            });
            $.ajax({
            	type: 'post',
            	data: {'checked':checked},
            	url: '<?php echo Yii::app()->createUrl('site/checkpost');?>',
            	success: function(data){
            		// alert("You selected: " + checked.join(", "));
            		// alert("Saved");
            		var message='<div class="alert alert-success alert-dismissable animation-fadeIn" id="success">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                        '<h4><strong>Success</strong></h4>'+
                        '<p>Changes saved successfully'+
                    	'</div>';
					$('#success').html(message).fadeIn().delay(2000).hide("slow");
            	}
            })
        });
    });
</script>
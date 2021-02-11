<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
			$modal = Yii::app()->user->getState('modal');
			if(!$modal)
		    {		    	
		    	$this->redirect(array('site/login'));
		    }
            $id = $modal->id;
            $user = User::model()->findByPk($id);
            $arr=array('profile','account','changepassword','subscription','stripeconnect','buy_sms_with_connect','buy_sms','buy_phone_number','new_subscription','purchasephone','thank_you');
            // manage permission by user
		 	if(isset($user->user_type) && $user->user_type == "1"){
	            $arr = array('create','edit','view','update','admin','delete','index','profile','account','changepassword','subscription','Stripeconnect','buy_sms_with_connect','buy_sms','buy_phone_number','new_subscription','purchasephone','thank_you');
	        }
		
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>$arr,
                'users'=>array('@'),
            ),
		// return array(
		// 	array('allow',  // allow all users to perform 'index' and 'view' actions
		// 		'actions'=>array('index','view','profile','account','changepassword'),
		// 		'users'=>array('@'),
		// 	),
		// 	array('allow', // allow authenticated user to perform 'create' and 'update' actions
		// 		'actions'=>array('create','update'),
		// 		'users'=>array('@'),
		// 	),
		// 	array('allow', // allow admin user to perform 'admin' and 'delete' actions
		// 		'actions'=>array('admin','delete'),
		// 		'users'=>array('@'),
		// 	),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}



	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$model->phone=preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $model->phone);

		$this->render('view',array(
			'model'=>$model
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			  if ($model->save(false)) 
			  {
                Yii::app()->user->setFlash('success', 'User has been added successfully');
                $this->redirect(array('index'));
           	  }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if ($model->save(false))
			{
                Yii::app()->user->setFlash('success', 'User has been updated successfully');
                 $this->redirect(array('index'));
			}
           
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
        $modal = $this->loadModel($id);
        $modal->is_deleted = 1;
        $modal->save(false);

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('User');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
		$this->actionAdmin();
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}


	public function actionProfile() {

        $id = Yii::app()->user->id;
        if (!$id)
            $this->redirect(array('index'));
        $user = User::model()->findByPk($id);
        $oldlogo=$user->logo;
        $user->setScenario('changeprofile');
        $this->performAjaxValidation($user);
        if ($user) {
   // //      	require_once(Yii::getPathOfAlias('ext').'/stripe/init.php');
			$stripe = Yii::app()->params['stripe'];
			// // \Stripe\Stripe::setApiKey($stripe['secret_key']);
			// if(!empty($_POST)){
			// 		// pre($_REQUEST);
			// 		if (isset($_POST['stripeToken']) && $_POST['stripeToken'] != '') {
			// 		$token  = $_POST['stripeToken'];
			// 		$email  = $_POST['stripeEmail'];
			// 		$total_sms_buy=0;
			// 		if(isset($_POST['number_of_sms_buy']) && $_POST['number_of_sms_buy']!='')
			// 		{
			// 			$total_sms_buy=$_POST['number_of_sms_buy'];
			// 		}	
			// 		$total_amount=$total_sms_buy*0.4;
			// 		$payment_amount=$total_amount*100;	

	  //       		$customer = \Stripe\Customer::create(array(
			// 		  'email' => $email,
			// 		  'source'  => $token
			// 		));
			// 		$charge = \Stripe\Charge::create(array(
			// 			  'customer' => $customer->id,
			// 			  'amount'   => $payment_amount,
			// 			  'currency' => 'usd'
			// 		));					
			// 		// pr($charge);
			// 		if ($charge->paid == 1) {
			// 			// $sms_buy_history=new Smsbuyhistory;
			// 			// $sms_buy_history->sms_token = $_POST["stripeToken"];
			// 			// $sms_buy_history->total_sms_buy=$total_sms_buy;
			// 			// $sms_buy_history->total_amount=$total_amount;
			// 			// $sms_buy_history->sale_id= $charge->id;
			// 			// $sms_buy_history->user_id=$user->id;
			// 			// $sms_buy_history->buy_date=date('Y-m-d H:i:s');
			// 			// $sms_buy_history->created_date=date('Y-m-d H:i:s');
			// 			// $sms_buy_history->save(false);
			// 			if(isset($user->total_sms) && $user->total_sms!=''){
			// 				$user->total_sms=$user->total_sms+$total_sms_buy;
			// 			}
			// 			else
			// 			{
			// 				$user->total_sms=$total_sms_buy;
			// 			}
			// 			$user->save(false);	

			// 			Yii::app()->user->setFlash('success', Yii::t('yii', 'Payment successfully done.'));
			// 			$this->refresh();
			// 		}else{
			// 			Yii::app()->user->setFlash('error', Yii::t('yii', 'Something went wrong.'));
			// 			$this->redirect(array('user/profile'));
			// 		}
	  //       	}
	  //       }
            if (isset($_POST['User'])) {
                $user->attributes = $_POST['User'];
                if(isset($_POST['User']['phone']) && $_POST['User']['phone']!='')
                {	               
	                $phone_number=trim($_POST['User']['phone']);
	                $phone_number=preg_replace('/[^0-9]/', '', $phone_number);
	                $ph_l = substr($phone_number,0,1);
	                if($ph_l == '+'){
	                    $phone_number = $phone_number;
	                    $ph_oe = substr($phone_number,1,1);
	                    if($ph_oe == 1){
	                        $phone_number = $phone_number;
	                    }else{
	                        $phone_number = str_replace('+','+1',$phone_number);
	                    }
	                }else{
	                    $ph_e = substr($phone_number,0,1);
	                    if($ph_e == 1){
	                        $phone_number = '+'.$phone_number;
	                    }else{
	                        $phone_number = '+1'.$phone_number;
	                    }
	                }
	               $user->phone=$phone_number;			
				}
                if ($user->email) {
                    $check = User::model()->findByAttributes(array('email' => $user->email, 'is_deleted' => 0), 'id<>' . $id);
                    if ($check) {
                        $user->addError('email', 'Email already taken');
                        $this->render('profile', array('model' => $user));
                        Yii::app()->end();
                    }
                }
                if ($user->validate()) {
                	if (isset($_FILES['User']['name']['logo']) && !empty($_FILES['User']['name']['logo'])) {
		                $pro = $_FILES['User']['name']['logo'];
		                $filename = md5(time().rand(0,9999));
		                $ext = '';
		                $uploads_dir = Yii::getPathOfAlias('webroot').'/uploads/company_logo/';
		                $ext = pathinfo($pro);
		                $new_image = $filename.'.'.$ext['extension'];
		                $user->logo = $new_image;		  
		                if($oldlogo!=''){     
			                if(file_exists(Yii::app()->basePath.'/../uploads/company_logo/'.$oldlogo))
			                {
			                	unlink($uploads_dir.$oldlogo);
			                }
			            }
		                move_uploaded_file($_FILES['User']['tmp_name']['logo'],$uploads_dir.'/'.$new_image);
	            }
	            else
	            {
	            	$user->logo=$oldlogo;
	            }	            
                $user->save(false);
//                    die;
                    Yii::app()->user->setFlash('success', 'Profile has been update successfully');
                    $this->refresh();
                } else {
//                    print_r($user->getErrors());
                }
            }
            $user->password = "";

            if(isset($user->phone) && $user->phone!='')
			{
				$phone_number=preg_replace('/[^0-9]/','',$user->phone);
				$user->phone=preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $phone_number);
			}           
            $this->render('profile', array(
                'model' => $user,'stripe'=>$stripe
            ));
        } else {
            $this->redirect(array('index'));
        }
    }

   
    public function actionChangepassword() {
        // $this->layout = 'login';
        $model = User::model()->findByAttributes(array('id' => Yii::app()->user->id));       
        $model->scenario ='changepassword';
        $this->performAjaxValidation($model);       
        if ($model) {
        	if (isset($_REQUEST['User'])) {
                    $model->attributes = $_POST['User'];
                    if ($model->validate()) {
                        $model->password = md5($_POST['User']['password']);
                        if ($model->save(false)) {
                            Yii::app()->user->setFlash('success', "Your password has been changed successfully.");
                            $this->redirect(array('changepassword'));
                        }
                    }
                }
                $model->password = "";
                $model->oldpassword = "";
                $this->render('changepassword', array(
                    'model' => $model,
                ));
            } 
        }
    public function actionAccount() {
        $id = Yii::app()->user->id;
        if (!$id)
            $this->redirect(array('index'));
        $user = User::model()->findByPk($id);      
        $this->render('account', array(
            'model' => $user
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
    public function actionThank_you()
    {
    	Yii::app()->user->setFlash('success', 'You have successfully subscribe package.');
    	$this->render('thank_you');
    }
	
	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

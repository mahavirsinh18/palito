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
		// $model->phone=preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $model->phone);

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
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if(isset($_POST['User']['password']) && $_POST['User']['password']!='')
		  	{
		  		$model->password=md5($_POST['User']['password']);
		  	}
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
        $user->setScenario('changeprofile');
        $this->performAjaxValidation($user);
        if ($user) {   // //      
            if (isset($_POST['User'])) {
                $user->attributes = $_POST['User'];                
                if ($user->email) {
                    $check = User::model()->findByAttributes(array('email' => $user->email, 'is_deleted' => 0), 'id<>' . $id);
                    if ($check) {
                        $user->addError('email', 'Email already taken');
                        $this->render('profile', array('model' => $user));
                        Yii::app()->end();
                    }
                }
                if ($user->validate()) {

	                                  
                $user->save(false);//                    die;
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
                'model' => $user
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

<?php

class ArticleController extends Controller
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
        $arr=array('');
        // manage permission by user
	 	if(isset($user->user_type) && $user->user_type == "1"){
            $arr = array('index','delete','create','view','update','delete','newarticle','admin');
        }	        
        return array(
		array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=>$arr,
            'users'=>array('@'),
        ),
		// return array(
		// 	array('allow',  // allow all users to perform 'index' and 'view' actions
		// 		'actions'=>array('index','view'),
		// 		'users'=>array('@'),
		// 	),
		// 	array('allow', // allow authenticated user to perform 'create' and 'update' actions
		// 		'actions'=>array('create','update','newarticle'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Article;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];
			$article_image=CUploadedFile::getInstance($model,'article_image');
			$background_image=CUploadedFile::getInstance($model,'background_image');
			$bg_image_mobile=CUploadedFile::getInstance($model,'bg_image_mobile');

			if($article_image)
			{
				$rand = rand(0,9999).$article_image->name;
				$model->article_image=$rand;
			}
			if($background_image)
			{
				$rand2 = rand(0,9999).$background_image->name;
				$model->background_image=$rand2;
			}
			if($bg_image_mobile)
			{
				$rand3 = rand(0,9999).$bg_image_mobile->name;
				$model->bg_image_mobile=$rand3;
			}
			$model->created_at=date('Y-m-d');
			if($model->save())
				$article_image->saveAs(Yii::app()->basePath .'/../uploads/' . $model->article_image);
				$background_image->saveAs(Yii::app()->basePath .'/../uploads/' . $model->background_image);
				$bg_image_mobile->saveAs(Yii::app()->basePath .'/../uploads/' . $model->bg_image_mobile);
				$this->redirect(array('view','id'=>$model->id));
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
		$oldImage = $model->article_image;
		$oldImage2 = $model->background_image;
		$oldImage3 = $model->bg_image_mobile;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Article']))
		{
			$model->attributes=$_POST['Article'];

			$article_image=CUploadedFile::getInstance($model,'article_image');
			$background_image=CUploadedFile::getInstance($model,'background_image');
			$bg_image_mobile=CUploadedFile::getInstance($model,'bg_image_mobile');
			if($article_image != "")
			{
				$rand = rand(0,9999).$article_image->name;
				$model->article_image=$rand;
			}
			else
			{
				$model->article_image = $oldImage;
			}
			if($background_image != "")
			{
				$rand = rand(0,9999).$background_image->name;
				$model->background_image=$rand;
			}
			else
			{
				$model->background_image = $oldImage2;
			}
			if($bg_image_mobile != "")
			{
				$rand = rand(0,9999).$bg_image_mobile->name;
				$model->bg_image_mobile=$rand;
			}
			else
			{
				$model->bg_image_mobile = $oldImage3;
			}

			if($model->save())
			{
				if($article_image != "")
				{
					$article_image->saveAs(Yii::app()->basePath .'/../uploads/' . $model->article_image);
					if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage))
					{
						unlink(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage);
					}
				}
				if($background_image != "")
				{
					$background_image->saveAs(Yii::app()->basePath .'/../uploads/' . $model->background_image);
					if($oldImage2 != '')
					{
						if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage2))
						{
							unlink(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage2);
						}
					}
				}
				if($bg_image_mobile != "")
				{
					$bg_image_mobile->saveAs(Yii::app()->basePath .'/../uploads/' . $model->bg_image_mobile);
					if($oldImage3 != '')
					{
						if(file_exists(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage3))
						{
							unlink(Yii::app()->basePath.'/..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$oldImage3);
						}
					}
				}
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionDelete($id)
	{
		$model = Article::model()->find(array("condition"=>"id =  $id"));
		unlink(Yii::app()->basePath.'/../uploads/'.$model->article_image);
		unlink(Yii::app()->basePath.'/../uploads/'.$model->background_image);

		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/*public function actionNewArticle()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }

        $this->render('admin');
    }*/

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Article');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Article('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Article']))
			$model->attributes=$_GET['Article'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Article the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Article $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

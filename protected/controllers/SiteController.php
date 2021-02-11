<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
    
    public function actionProfile1(){
        //$this->layout="front";
        $this->render('profile1');
    }
    public function actionProfile2(){
        //$this->layout="front";
        $this->render('profile2');
    }
    public function actionProfile3(){
        //$this->layout="front";
        $this->render('profile3');
    }
    public function actionProfile4(){
        //$this->layout="front";
        $this->render('profile4');
    }
    /*public function actionDetails(){
        if(isset($_GET['id']))
        {
            $model = Article::model()->findByPk($_GET['id']);
        }

        $this->render('profile1',array(
            'model'=>$model,
        ));
    }*/
    public function actionHome() {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }

        $new_article=new Article('new_article');
        $new_article->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
            $new_article->attributes=$_GET['Article'];

        $new_article1=new Article('new_article1');
        $new_article1->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
            $new_article1->attributes=$_GET['Article'];

        $popular_article=new Article('popular_article');
        $popular_article->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
            $popular_article->attributes=$_GET['Article'];

        $popular_article1=new Article('popular_article1');
        $popular_article1->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
        {
            $popular_article1->attributes=$_GET['Article'];
        }

        $premium_article=new Article('premium_article');
        $premium_article->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
            $premium_article->attributes=$_GET['Article'];

        $premium_article1=new Article('premium_article1');
        $premium_article1->unsetAttributes();  // clear any default values
        if(isset($_GET['Article']))
            $premium_article1->attributes=$_GET['Article'];   

        // $new_article=new CActiveDataProvider('Article');

        // $premium_article=new CActiveDataProvider('Article');

        // $popular_article=new CActiveDataProvider('Article');
        $this->render('home',array(
            'new_article'=>$new_article, 'new_article1'=>$new_article1, 'popular_article'=>$popular_article, 'popular_article1'=>$popular_article1, 'premium_article'=>$premium_article, 'premium_article1'=>$premium_article1
        ));

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
       
    }

    public function actionArticle_details(){
        $id=Yii::app()->user->id;
        if($id){
            $user=User::model()->findByPk($id);            
            if(isset($_GET['id']))
            {            
                $model = Article::model()->findByPk($_GET['id']);
                if($model===null)
                {
                    throw new CHttpException(404,'The requested page does not exist.');
                }
                else
                {
                    if($model->is_premium==1 && $user->is_premium==1)
                    {                    
                      $this->render('article_details',array(                
                        'model'=>$model,
                        ));
                    }
                    elseif ($model->is_premium==0) {
                        $this->render('article_details',array(                
                        'model'=>$model,
                        ));
                    }
                    else
                    {
                        throw new CHttpException(404,'The requested page does not exist.');
                    }
                }
            }          
        }
    }

    public function actionMostPopular()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $popular_article1=new Article('popular_article1');
        $popular_article1->unsetAttributes();

        if(isset($_GET['Article']))
        {
            $popular_article1->attributes=$_GET['Article'];
        }

        

        $this->render('_popular_more',array(
            'popular_article1'=>$popular_article1,
        ));
    }

    public function actionNewArticles()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }

        $new_article1=new Article('new_article1');
        $new_article1->unsetAttributes();

        if(isset($_GET['Article']))
        {
            $new_article1->attributes=$_GET['Article'];
        }

        

        $this->render('_new_more',array(
            'new_article1'=>$new_article1,
        ));
    }

    public function actionPremium()
    {
         $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $premium_article1=new Article('premium_article1');
        $premium_article1->unsetAttributes();

        if(isset($_GET['Article']))
        {
            $premium_article1->attributes=$_GET['Article'];
        }

       

        $this->render('_premium_more',array(
            'premium_article1'=>$premium_article1,
        ));
    }

    public function actionBookmark()
    {
       
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $model=new Bookmark('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Bookmark']))
            $model->attributes=$_GET['Bookmark'];

        $this->render('bookmark',array(
            'model'=>$model,
        ));
    }

    public function actionSettings()
    {
        $id = Yii::app()->user->id;
        if(!$id)
            $this->redirect(array('index'));

        $user = User::model()->findByPk($id);
        $user->setScenario('changeprofile');
        $this->performAjaxValidation($user);

        if($user)
        {   
            if(isset($_POST['User']))
            {
                $user->attributes = $_POST['User'];

                if($user->email)
                {
                    $check = User::model()->findByAttributes(array('email' => $user->email, 'is_deleted' => 0), 'id<>' . $id);

                    if($check)
                    {
                        $user->addError('email', 'Email already taken');
                        $this->render('profile', array('model' => $user));
                        Yii::app()->end();
                    }
                }
                Yii::app()->user->setFlash('success','Profile updated successfully');
                $user->save(false);
                $this->refresh();
            }
            $this->render('settings', array(
                'model' => $user
            ));
        }
        else
        {
            $this->redirect(array('index'));
        }
    }

    public function actionGoPremium()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $user=User::model()->findByPk($id);
        $package = Package::model()->find();

        $stripe = Yii::app()->params['stripe'];
        // pr($package);die;
        // require_once(Yii::app()->basePath . '/../vendor/stripe-php-master/init.php');
        require_once(Yii::getPathOfAlias('ext').'/stripe/init.php');
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        if(isset($_POST['stripeToken']))
        {
            // print_r($_POST['stripeToken']); die();
            $token = $_POST['stripeToken'];
            $email = $_POST['stripeEmail'];

            $customer = \Stripe\Customer::create(array(
                // 'name' => 'test',
                // 'description' => 'test description',
                'email' => $email,
                'source' => $token,
                // 'address' => ['city'=>'Ahmedabad', 'country'=>'India', 'line1'=>'A32', 'line2'=>'', 'postal_code'=>'364001', 'state'=>'Gujarat']
            ));
            // print_r($customer); die();
            if($package)
            {                       
                try 
                { 
                    $subscribe = \Stripe\Subscription::create([
                        "customer" => $customer->id,
                        "items" => [
                            [
                                "plan" => $package->package_id,                                 
                            ],
                        ],
                    ]);
                }catch(\Stripe\Error\Card $e) {
                    pr($e);die;
                    $body = $e->getJsonBody();
                    $err  = $body['error'];
                    Yii::app()->user->setFlash('danger', $err['message']);
                    $this->refresh();
                } catch (Exception $e) {
                    Yii::app()->user->setFlash('danger', 'Something went wrong.');
                    pr($e);die;
                    $this->refresh(); 
                }
                // print_r($package); die();
                if ($subscribe->status == 'active') {
                    $invoice = \Stripe\Invoice::retrieve($subscribe->latest_invoice);
                    $user->package_id = $package->id;
                    $user->subscription_id = $subscribe->id;
                    $user->subscription_date = date('Y-m-d H:i:s');
                    $user->sub_period_start = date('Y-m-d H:i:s',$subscribe->current_period_start);
                    $user->sub_period_end = date('Y-m-d H:i:s',$subscribe->current_period_end);
                    $user->is_premium=1;
                    $user->save(false);
                    $trasaction = new Transaction;
                    $trasaction->package_id = $package->id;
                    $trasaction->user_id = $user->id;
                    $trasaction->subscription_id = $subscribe->id;
                    $trasaction->invoice_id = $subscribe->latest_invoice;
                    $trasaction->subscription_date = date('Y-m-d H:i:s');
                    $trasaction->sub_period_start = date('Y-m-d H:i:s',$subscribe->current_period_start);
                    $trasaction->sub_period_end = date('Y-m-d H:i:s',$subscribe->current_period_end);
                    $trasaction->response = json_encode($subscribe);
                    $trasaction->status = $subscribe->status;
                    $trasaction->save();                               
                    $trasaction->transaction_id = $invoice->charge;
                    $trasaction->amount = $invoice->amount_paid / 100;
                    $amt = $trasaction->amount;
                    $txn_id = $trasaction->transaction_id;
                    $trasaction->save(false);
                    Yii::app()->user->setFlash('success', 'Subscribed successfully');
                    $this->refresh();
                }
            }
        }
        $this->render('gopremium');
    }

    public function actionCancel_subscription()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $user=User::model()->findByPk($id);
        $package = Package::model()->find();

        $stripe = Yii::app()->params['stripe'];
        require_once(Yii::getPathOfAlias('ext').'/stripe/init.php');
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        if($package)
        {                       
            try {
                $subscribe = \Stripe\Subscription::update($user->subscription_id, [
                    'cancel_at_period_end' => true,                    
                ]);
            } catch(\Stripe\Error\Card $e) {
                // Since it's a decline, \Stripe\Error\Card will be caught
                $body = $e->getJsonBody();
                $err  = $body['error'];
                Yii::app()->user->setFlash('danger', $err['message']);
                $this->error_email(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id,768,$err);
                $this->redirect(array('packages'));
            } catch (Exception $e) {
                // Something else happened, completely unrelated to Stripe
                Yii::app()->user->setFlash('danger', 'Something went wrong.');
                $this->redirect(array('packages'));
            }
            if ($subscribe->status == 'active') {                
                $user->package_id ='';
                $user->subscription_id ='';
                $user->sub_period_start ='';
                $user->sub_period_end ='';
                $user->is_premium=0;
                $user->save(false);
            }
        }  
        Yii::app()->user->setFlash('success', 'Subscription successfully canceled');
        $this->redirect('gopremium');
    }

    public function actionWebhook()
    {
        require_once(Yii::getPathOfAlias('ext').'/stripe/init.php');
        $stripe = Yii::app()->params['stripe'];
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        $input = file_get_contents("php://input");
        $event = json_decode($input);
        $this->sendmail(Yii::app()->params['testing_email'], 'test','webhook event occur on  palito');
        if ($event)
        {   
            // $to="radheshyam.amcodr@gmail.com";
            // $this->sendmail($to, 'test',$input);
            if($event->type=='customer.subscription.deleted')
            {
                $this->sendmail(Yii::app()->params['testing_email'], 'test','customer.subscription.deleted event occur on  palito');
                $user = User::model()->findByAttributes(array('subscription_id'=>$event->data->object->id,'is_deleted'=>0));
                if ($user) {
                    $user->package_id ='';
                    $user->subscription_id ='';
                    $user->sub_period_start ='';
                    $user->sub_period_end ='';
                    $user->is_premium=0;
                    $user->save(false);
                } 
            }
            else
            {
                if($event->data->object->billing_reason=='subscription_cycle')
                {
                    $this->sendmail(Yii::app()->params['testing_email'], 'test','subscription_cycle event occur on  palito');
                    $user = User::model()->findByAttributes(array('subscription_id'=>$event->data->object->subscription,'is_deleted'=>0));
                    if ($user) {
                        $subscribe = \Stripe\Subscription::retrieve($user->subscription_id);
                        $trasaction = Transaction::model()->findByAttributes(array('subscription_id'=>$subscribe->id,'invoice_id'=>$event->data->object->id,'user_id'=>$user->id));
                        
                        if (empty($trasaction) && $subscribe) {
                            $trasaction = new Transaction;
                            $trasaction->user_id = $user->id;
                            $trasaction->subscription_id = $subscribe->id;
                            $trasaction->invoice_id = $event->data->object->id;
                            $trasaction->subscription_date = date('Y-m-d H:i:s');
                            $trasaction->sub_period_start = date('Y-m-d H:i:s',$subscribe->current_period_start);
                            $trasaction->sub_period_end = date('Y-m-d H:i:s',$subscribe->current_period_end);
                            
                            $trasaction->response = json_encode($subscribe);
                            $trasaction->status = $subscribe->status;
                            $trasaction->transaction_id = $event->data->object->charge;
                            $trasaction->amount = $event->data->object->amount_paid / 100;
                            $trasaction->package_id = $user->package_id;
                            $trasaction->save(false);

                            $user->sub_period_start = date('Y-m-d H:i:s',$subscribe->current_period_start);
                            $user->sub_period_end = date('Y-m-d H:i:s',$subscribe->current_period_end);                            
                            $user->save(false);
                        }
                        else
                        {
                            $this->error_email(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id,213,array($trasaction,$subscribe));
                        }
                    }
                }
            }
        }
        else
        {
            $this->error_email(Yii::app()->controller->id.'/'.Yii::app()->controller->action->id,219,$event);
        }
    }

    public function actionCheck_subscription(){
        $users = User::model()->findAllByAttributes(array('is_deleted'=>'0','user_type'=>2),array('condition'=>'DATE(sub_period_end) = DATE(NOW() - INTERVAL 1 DAY)'));
        // pr($users);die;
        $this->sendmail(Yii::app()->params['testing_email'], 'test','cron job successful run');
        if ($users) {
            foreach ($users as $key => $value) {
                if ($value->subscription_id) {                    
                    require_once(Yii::getPathOfAlias('ext').'/stripe/init.php');
                    $stripe = Yii::app()->params['stripe'];
                    \Stripe\Stripe::setApiKey($stripe['secret_key']);

                    $subscription = \Stripe\Subscription::retrieve($value->subscription_id);
                    // pre($subscription);
                    if ($subscription->status == 'active') {
                        $value->subscription_id = $subscription->id;
                        $value->sub_period_start = date('Y-m-d H:i:s',$subscription->current_period_start);
                        $value->sub_period_end = date('Y-m-d H:i:s',$subscription->current_period_end);
                        $value->save();
                    }else if($subscription->status == 'canceled'){
                        $value->package_id = '';
                        $value->subscription_id = '';
                        $value->subscription_date = '';
                        $value->sub_period_start = '';
                        $value->sub_period_end = '';
                        $value->is_premium=0;
                        $value->save(false);
                    }                    
                }
            }
        }
        $this->redirect(array('index'));
    }

    /*public function actionGoPremium()
    {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }

        $stripe = array(
            "secret_key" => "sk_test_bVDQEeKxR0qxhurOiTJUUThH00gEGGuyzt",
            "publishable_key" => "pk_test_s0dN2EsNG62WQZpcMNZ8IPL900Ptyv2jCC"
        );

        require_once(Yii::app()->basePath . '/../vendor/stripe-php-master/init.php');
        \Stripe\Stripe::setApiKey($stripe['secret_key']);

        if(isset($_POST['stripeToken']))
        {
            // print_r($_POST['stripeToken']); die();
            $token = $_POST['stripeToken'];
            $email = $_POST['stripeEmail'];

            $customer = \Stripe\Customer::create(array(
                'email' => $email,
                'source' => $token
            ));
            // print_r($customer); die();

            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount' => 100,
                'currency' => 'inr',
                // 'description' => 'Example charge',
                // 'shipping'=>array('name'=>'dev','address'=>array('line1'=>'ahmedabad','postal_code'=>'380015','city'=>'ahmedabad','state'=>'gujarat','country'=>'IN'))   
                // 'source' => $token,
            ));
            // print_r($charge); die();

            $pay=new Payment;

            $pay->email=$charge->billing_details->name;
            $pay->amount=$charge->amount;
            $pay->currency_code=$charge->currency;
            $pay->txn_id=$charge->balance_transaction;
            $pay->payment_status=$charge->paid;
            $pay->payment_response=$charge;

            $pay->save(false);
        }

        $this->render('gopremium');
    }*/

    public function actionSetBookmark()
    {
        $model=new Bookmark;

        if(isset($_POST['id']))
        {
            $id = Yii::app()->user->id;
            $model->article_id=$_POST['id'];
            $model->user_id=$id;

            if($model->save())
            {
                // $this->redirect(array('view','id'=>$model->id));
            }
        }
    }

    public function actionLiked()
    {
        $model=new Liked;

        if(isset($_POST['id']))
        {
            $id = Yii::app()->user->id;
            $model->article_id=$_POST['id'];
            $model->user_id=$id;

            if($model->save())
            {
 
            }
        }        
    }

    public function actionCheckPost()
    {
        $id = Yii::app()->user->id;
        $model = User::model()->findByPk($id);

        if(isset($_POST['checked']))
        {
            $model->terms_id=implode(",",$_POST['checked']);

            if($model->save(false))
            {
                
            }
        }
    }

    public function actionIndex() {
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        else
        {
              $this->redirect(array('home'));
        }
        $this->render('index');
    }
    public function actionAbout() {
        $this->render('about');
    }
    public function actionInfo() {
        $this->layout = 'main';
        $id = Yii::app()->user->id;
        if (!$id) {
            $this->redirect(array('login'));
        }
        $this->render('info');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        
        $model = new ContactForm;
        $model->scenario = 'contact';
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                
                $this->refresh();
                //$this->redirect(array('contact'));
            }
        }
        // $this->layout = 'front_main';
        $this->render('contact', array('model' => $model));
    }
    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        $this->layout = 'login';

        $id = Yii::app()->user->id;
        if ($id) {
            $this->redirect(array('home'));
        }

         // if it is ajax validation request
         if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
         {
         	echo CActiveForm::validate($model);
         	Yii::app()->end();
         }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()){
				$this->redirect(array('home'));
			}else{
				
			}
            
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    public function actionRegister() {
        $model = new User;
        $this->layout = 'login';
        $model->setScenario('register');
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'form-register') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        $id = Yii::app()->user->id;
        if ($id) {
            $this->redirect(array('home'));
        }
        // collect user input data
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->email) {
                $check = User::model()->findByAttributes(array('email' => $model->email, 'is_deleted' => 0));
                if ($check) {
                    $model->addError('email', 'Email already taken');
                    $this->render('register', array('model' => $model));
                    Yii::app()->end();
                }
            }
            if ($model->validate() && $model->save()){                
                $model->password = md5($model->password);
                $model->save(false);
                Yii::app()->user->setFlash('success', 'Register successful! Please login now.');
                 $this->redirect(array('login'));
             }
             else
             {
                // pr($model->getErrors());die;
             }
        }
        // display the login form
        $this->render('register', array('model' => $model));
    }

     public function actionForgot() {
        $model = new User;
        $this->layout = 'login';
        $id = Yii::app()->user->id;
        if ($id) {
            $this->redirect(array('home'));
        }

        // collect user input data
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
                $check = User::model()->findByAttributes(array('email' => $model->email, 'is_deleted' => 0));
                if (!$check) {
                    $model->addError('email', 'Email does not exists!');
                    $this->render('forgot', array('model' => $model));
                    Yii::app()->end();
                }
                $model = $check;
                $token = md5(time().'-'.$model->id);
                $model->forgot_password_token = $token;
                $model->forgot_token_expire = time()+3600;
                $model->save(false);

               

                $url = Yii::app()->createAbsoluteUrl('site/resetpassword?id=' . $check->forgot_password_token);
                $subject= Yii::app()->name . " : Reset Password";
                $user_data = array();
                $login_user_name='';
                $firstname='';
                $lastname='';
                if(isset($check->firstname) && $check->firstname!=''){
                    $firstname=$check->firstname;
                }
                if(isset($check->lastname) && $check->lastname!=''){
                    $lastname=$check->lastname;
                }
               $login_user_name=$firstname.' '.$lastname;
                $message = 'Hello '.$login_user_name.'<br/><br/> 

                Click below link for reset your password. Link will be expire in 1 hr<br/>
                $message=<table role="presentation" class="main">
                <tr>
                    <td class="wrapper">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td> 
                                    <center>
                                    <h2 class="title">Here is your reset button</h2><br>
                                    
                                    <br>
                                    <a href="'.$url.'" target="_blank" class="btn btn-primary">Click to Reset Password</a>
                                    </center>                                                  
                                    <hr>
                                    <p style="color: #d9534f;"><label>Warning:</label> Do not forward this email to others or else they will have access to your document (on your behalf).</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </table>';
                    $mail = new YiiMailer();
                    $mail->setFrom(Yii::app()->params['adminEmail'], Yii::app()->name . ' : Reset Password');
                    $mail->setTo($check->email);
                    $mail->setSubject($subject);
                    $mail->setBody($message);
                    $mail->setLayout('maillayout');
                    if ($mail->send()) {
                         Yii::app()->user->setFlash('success', 'Please check mail for resetting password! Link will expire in 1 hour!');
                    }else{
                         echo '<pre>';
                        var_dump($mail->getError());
                        echo '</pre>';
                        exit;
                    }
                   /* $to=$check->email;
                    $docs='';
                    if($this->sendmail($to, $subject, $message))
                    {
                        Yii::app()->user->setFlash('success', 'Please check mail for resetting password! Link will be expire in 1 hour!');
                    }*/
                    $this->refresh();
                
        }
        $this->render('forgot', array('model' => $model));
    }

   /* function sendmail($to, $subject, $message){
        require Yii::app()->basePath.'/../vendor/autoload.php';
        $email = new \SendGrid\Mail\Mail(); 
        $email->setfrom(Yii::app()->params['adminEmail'], Yii::app()->name . ' : Offer ');
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent(
            "text/html", $message
        );
        
        $sendgrid = new \SendGrid("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");
        // pr($sendgrid);die;
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }*/

    public function actionResetpassword($id) {
        $this->layout = 'login';
        $model = User::model()->findByAttributes(array('forgot_password_token' => $id));
       
        // $this->performAjaxValidation($model);
        if ($model) {
             $model->setScenario('resetpassword');

            if ($model->forgot_password_token == $id && $model->forgot_token_expire > time()) {
                
                
                if (isset($_REQUEST['User'])) {
                    $model->attributes = $_POST['User'];
                    if ($model->validate()) {
                        $model->password = md5($_POST['User']['password']);
                        $model->forgot_password_token = "";
                        if ($model->save(false)) {
                            Yii::app()->user->setFlash('success', "Your password has been changed successfully. you may login with your new password");
                            $this->redirect(array('login'));
                        }
                    }
                }
                $model->password = "";
                $this->render('resetpassword', array(
                    'model' => $model,
                ));
            } else {
                Yii::app()->user->setFlash('danger', "Your token has been expired try again.");
                $this->redirect(array('login'));
            }
        } else {
            Yii::app()->user->setFlash('danger', "Your token has been expired try again.");
            $this->redirect(array('login'));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
		
        Yii::app()->user->logout();
        $this->redirect(array('login'));
    }
    public function actionSupport()
    {
        $this->layout="main";
        $this->render('support');
    }
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}

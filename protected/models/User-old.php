<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $user_type
 * @property string $password_reset_token
 * @property integer $is_active
 * @property integer $is_deleted
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plt_user';
	}
	 public $confirmPassword,$oldpassword,$total_market;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('first_name,last_name,email,phone,company_name,total_market,select_plan','required','on'=>'register'),
			array('first_name,last_name,email,phone,company_name','required','on'=>'register'),
			array('first_name,last_name,email,user_type','required','on'=>'create'),
			array('user_type,  is_deleted', 'numerical', 'integerOnly'=>true),
			array('first_name', 'length', 'max'=>50),
			array('email', 'length', 'max'=>100),
			array('password, forgot_password_token', 'length', 'max'=>255),
			array('password,confirmPassword', 'required', 'on' => 'changepassword,register,resetpassword'),
            array('confirmPassword', 'compare', 'compareAttribute' => 'password', 'on' => 'changepassword,register,resetpassword'),
            array('first_name,last_name,phone,logo','safe'),
          
            // it is user of change password
             array('oldpassword','checkoldpassword','on'=>'changepassword'),
             array('oldpassword, password, confirmPassword','required','on'=>'changepassword'),
             // end of change password
            array('email','email'),
            array('email,first_name,last_name,company_name','required','on'=>'changeprofile'),
			array('email','required','on'=>'forgotpassword'),
			 array('email', 'unique',
                 'criteria' => array(
                  'condition' => 'is_deleted= :ruleid',
                  'params' => array(':ruleid' => 0)),'on'=>'insert,register,changeprofile'),        
            array('email', 'unique',
                 'criteria' => array(
                  'condition' => 'is_deleted= :ruleid and id!=:id',
                  'params' => array(':ruleid' => 0,'id'=>$this->id)),'on'=>'changeprofile,insert,update'), 


            
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, email, password, user_type,forgot_password_token,  is_deleted,company_name,phone', 'safe', 'on'=>'search'),
		);
	}
	public function checkoldpassword()
	{
		if($this->oldpassword!='')
		{
			$check=User::model()->findbypk(Yii::app()->user->id);
			if($check->password!=md5($this->oldpassword))
			{
				$this->addError('oldpassword','Old Password is wrong');
			}
		}
	}

	
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Company Email',
			'password' => 'Password',
			'user_type' => 'User Type',
			'password_reset_token' => 'Password Reset Token',
			'is_active' => 'Is Active',
			'is_deleted' => 'Is Deleted',
			'oldpassword'=>'Old-Password',
			'logo'=>'Company Logo',
			'phone'=>'Company Phone',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('user_type',2);
		$criteria->compare('forgot_password_token',$this->forgot_password_token,true);
		$criteria->compare('is_deleted',0);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

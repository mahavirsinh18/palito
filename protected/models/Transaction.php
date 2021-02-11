<?php

/**
 * This is the model class for table "plt_transaction".
 *
 * The followings are the available columns in table 'plt_transaction':
 * @property integer $id
 * @property integer $user_id
 * @property string $subscription_id
 * @property string $invoice_id
 * @property string $subscription_date
 * @property string $sub_period_start
 * @property string $sub_period_end
 * @property string $transaction_id
 * @property integer $package_id
 * @property double $amount
 * @property string $response
 * @property double $refundable_amount
 * @property integer $status
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plt_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, package_id, status', 'numerical', 'integerOnly'=>true),
			array('amount, refundable_amount', 'numerical'),
			array('subscription_id, invoice_id, transaction_id', 'length', 'max'=>255),
			array('subscription_date, sub_period_start, sub_period_end, response', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, subscription_id, invoice_id, subscription_date, sub_period_start, sub_period_end, transaction_id, package_id, amount, response, refundable_amount, status', 'safe', 'on'=>'search'),
		);
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
			'user_id' => 'User',
			'subscription_id' => 'Subscription',
			'invoice_id' => 'Invoice',
			'subscription_date' => 'Subscription Date',
			'sub_period_start' => 'Sub Period Start',
			'sub_period_end' => 'Sub Period End',
			'transaction_id' => 'Transaction',
			'package_id' => 'Package',
			'amount' => 'Amount',
			'response' => 'Response',
			'refundable_amount' => 'Refundable Amount',
			'status' => 'Status',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('subscription_id',$this->subscription_id,true);
		$criteria->compare('invoice_id',$this->invoice_id,true);
		$criteria->compare('subscription_date',$this->subscription_date,true);
		$criteria->compare('sub_period_start',$this->sub_period_start,true);
		$criteria->compare('sub_period_end',$this->sub_period_end,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('response',$this->response,true);
		$criteria->compare('refundable_amount',$this->refundable_amount);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

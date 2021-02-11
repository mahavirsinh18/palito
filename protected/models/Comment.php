<?php

/**
 * This is the model class for table "plt_comment".
 *
 * The followings are the available columns in table 'plt_comment':
 * @property integer $id
 * @property integer $post_id
 * @property integer $user_id
 * @property string $comment_content
 * @property integer $comment_remark
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_deleted
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plt_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment_content', 'required'),
			array('post_id, user_id, comment_remark, is_deleted', 'numerical', 'integerOnly'=>true),
			array('comment_content, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_id, user_id, comment_content, comment_remark, created_at, updated_at, is_deleted', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'user_id' => 'User',
			'comment_content' => 'Comment Content',
			'comment_remark' => 'Comment Remark',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'is_deleted' => 'Is Deleted',
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
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment_content',$this->comment_content,true);
		$criteria->compare('comment_remark',$this->comment_remark);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforesave()
	{
		$id=Yii::app()->user->id;
		// $user=User::Model()->findByPk($id);		
		// $this->user_id=$id;
		if($this->isNewRecord){
			$this->created_at = date('Y-m-d H:i:s');
		}else{
			$this->updated_at = date('Y-m-d H:i:s');
		}
		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

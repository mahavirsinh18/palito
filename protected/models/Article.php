<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $article_image
 * @property string $article_name
 * @property string $description
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plt_article';
	}
	public $most_popular_article;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_name, description, is_premium, featured', 'required'),
			array('article_image, article_name', 'length', 'max'=>255),
			array('background_image,article_image,created_at,most_popular_article,bg_image_mobile','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, article_name, description,created_at,most_popular_article', 'safe', 'on'=>'search'),
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
			// 'user_data'=>array(self::BELONGS_TO, 'User', 'us'),
			// 'like_data'=>array(self::BELONGS_TO, 'Liked', '', 'on'=>'lk.article_id=t.id and lk.user_id='.Yii::app()->user->id, 'joinType'=>'LEFT join', 'alias'=>'lk'),
			'like_data' => array(self::HAS_MANY, 'Liked', 'article_id'),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'article_image' => 'Article Image',
			'article_name' => 'Article Name',
			'description' => 'Description',
			// 'is_premium' => 'Premium',
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
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_premium',$this->is_premium,true);
		$criteria->compare('featured',$this->featured,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 10,
			),
		));
	}

	public function new_article()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);

		$id=Yii::app()->user->id;
		$user=User::model()->findByPk($id);
		$criteria->limit = 5;

		if($user->is_premium==0)
		{
			$criteria->compare('is_premium',0);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => false,
			'sort'=>array(
    			'defaultOrder'=>'id desc'
    		),

		));
	}

	public function new_article1()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);

		$id=Yii::app()->user->id;
		$user=User::model()->findByPk($id);

		if($user->is_premium==0)
		{
			$criteria->compare('is_premium',0);
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 10,
			),
			'sort'=>array(
    			'defaultOrder'=>'id desc'
    		),
		));
	}

	public function popular_article()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$post_table = Liked::model()->tableName();
	    $post_count_sql = "(select count(*) from $post_table pt where pt.article_id = t.id)";

	    $criteria->select = array(
	        '*',
	        $post_count_sql . " as most_popular_article",
	    );

		// $criteria->with=array('like_data');

		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);

		$id=Yii::app()->user->id;
		$user=User::model()->findByPk($id);
		$criteria->limit = 5;

		if($user->is_premium==0)
		{
			$criteria->compare('is_premium',0);
		}
		$criteria->order='most_popular_article desc';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => false,
		));
	}

	public function popular_article1()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$post_table = Liked::model()->tableName();
	    $post_count_sql = "(select count(*) from $post_table pt where pt.article_id = t.id)";

	    $criteria->select = array(
	        '*',
	        $post_count_sql . " as most_popular_article",
	    );
		// $criteria->with=array('like_data');

		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);

		$id=Yii::app()->user->id;
		$user=User::model()->findByPk($id);

		if($user->is_premium==0)
		{
			$criteria->compare('is_premium',0);
		}
		// print_r($criteria);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 10,
			),
		));
	}

	public function premium_article()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_premium',1);

		$criteria->limit = 5;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => false,
		));
	}

	public function premium_article1()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->compare('id',$this->id);
		$criteria->compare('article_image',$this->article_image,true);
		$criteria->compare('article_name',$this->article_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('is_premium',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' => 10,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

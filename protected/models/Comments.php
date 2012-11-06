<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $id
 * @property string $user_name
 * @property string $email
 * @property string $homepage
 * @property string $text
 */
class Comments extends CActiveRecord{
	public $verifyCode;
    public $file;
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, email,  text', 'required'),
			array('user_name, email, homepage', 'length', 'max'=>50),
            array('email', 'email'),
            array('verifyCode', 'captcha','allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements()),
            array('file','file','allowEmpty'=>true,'maxSize'=>102400,'types'=>'jpg, gif, png,txt'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, email, homepage, text', 'safe', 'on'=>'search'),
		);
	}

	

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_name' => 'User Name',
			'email' => 'E-mail',
			'homepage' => 'Homepage',
			'text' => 'Message',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search(){
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('homepage',$this->homepage,true);
		$criteria->compare('text',$this->text,true);
        $criteria->compare('date',$this->date,true);
        $criteria->order='date DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>array(
                'pageSize'=>'5',
                
            )
		));
	}
    public function getImageForGrid($id){
        $row=Comments::model()->find('id=:id',array(':id'=>$id));
        $img=$row->file_name;
        if (!$img) return ;
        return '<a rel="lightbox" href="upl_files/'.$img.'"><img src="upl_files/'.$img.'"/></a>';
    }
}
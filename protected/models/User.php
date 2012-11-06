<?php
	// Стандартный шаблон для любой модели.
     
    class User extends CActiveRecord{        
        
        // для поля "повтор пароля"
        public $password2;
         
        public static function model($className=__CLASS__)
        {
            return parent::model($className);
        }
        public function tableName()
        {
            return 'user';
        }
        
        public $name;
    	public $email;
    	public $subject='Подтверждение пароля';
    	public $body;
        public $user_hash;
    
       
         
          /**
     * Правила валидации
     */
        public function rules()
	{
	
		return array(
			array('login, email, password,password2, name, last_name, skype, phone, city, country', 'required','on'=>'registration'),
            array('login, password', 'required'),
			array('phone', 'numerical', 'integerOnly'=>true),
            array('email','email'),
            array('email','unique'),
			array('login, email, password', 'length', 'max'=>100),
            array('password', 'authenticate', 'on' => 'login'),
            array('password2', 'compare', 'compareAttribute'=>'password', 'on'=>'registration'),
            array('name, last_name, skype, city, country', 'length', 'max'=>20),
            array('login', 'match', 'pattern' => '/^[A-Za-z0-9А-Яа-я\s,]+$/u'),
        );
	}
        /**
     * Собственное правило для проверки
     * Данный метод является связующем звеном с UserIdentity
     */
         public function authenticate($attribute,$params) 
    {
        // Проверяем были ли ошибки в других правилах валидации.
        // если были - нет смысла выполнять проверку
         if(!$this->hasErrors())
        {
            // Создаем экземпляр класса UserIdentity
            // и передаем в его конструктор введенный пользователем логин и пароль (с формы)
            $identity= new UserIdentity($this->login, $this->password);
             // Выполняем метод authenticate (о котором мы с вами говорили пару абзацев назад)
            // Он у нас проверяет существует ли такой пользователь и возвращает ошибку (если она есть)
            // в $identity->errorCode
             $identity->authenticate();
                
                // Теперь мы проверяем есть ли ошибка..    
                switch($identity->errorCode)
                {
                    // Если ошибки нету...
                     case UserIdentity::ERROR_NONE: {
                        // Данная строчка говорит что надо выдать пользователю
                        // соответствующие куки о том что он зарегистрирован, срок действий
                         // у которых указан вторым параметром. 
                        Yii::app()->user->login($identity, 0);
                        break;
                    }
                    case UserIdentity::ERROR_USERNAME_INVALID: {
                         // Если логин был указан наверно - создаем ошибку
                        $this->addError('login','wrong login');
                        break;
                    }
                     case UserIdentity::ERROR_PASSWORD_INVALID: {
                        // Если пароль был указан наверно - создаем ошибку
                        $this->addError('password','wrong password');
                         break;
                    }

                }
        }
    }
    public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login:',
			'email' => 'Email:',
			'password' => 'Password:',
            'password2' => 'Repeat password:',
			'name' => 'Name:',
			'last_name' => 'Last Name:',
			'skype' => 'Skype',
			'phone' => 'Phone:',
			'city' => 'City:',
			'country' => 'Country:',
		);
	}
    
    public function hashPass($passwd, $salt="registration"){
        $hash=md5($passwd.$salt);
        return $hash;
    }
         
}
?>
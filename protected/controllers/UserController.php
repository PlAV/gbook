<?php
	class UserController extends CController{      
        public $layout='//layouts/column1';
    
    public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
   
   
    
    /**
     * Метод входа на сайт
      */
     public function actionLogin(){
        $form = new User('login');
        $this->performAjaxValidation($form);
        // Проверяем является ли пользователь гостем
        // ведь если он уже зарегистрирован - формы он не должен увидеть.
        if (!Yii::app()->user->isGuest) {
            $this->redirect(array("user/registration"));
            
         } else {
            if (!empty($_POST['User'])) {
                $form->attributes = $_POST['User'];
                    if($form->validate('login')) {
                        $this->redirect(array("comments/index"));
                     }
               
               } 
            $this->render('login', array('model' => $form));
        }
    }         
    
    /**
     * Метод выхода с сайта
      */
    public function actionLogout(){
        // Выходим
        Yii::app()->user->logout();
        // Перезагружаем страницу
        $this->redirect(Yii::app()->user->returnUrl);
    
    }
    
    /**
     * Метод регистрации
     */
     
    public function actionRegistration(){
        
       $model = new User('registration');
        $this->performAjaxValidation($model);

            if (!empty($_POST['User'])) {
                
                 // Заполняем $form данными которые пришли с формы
                $model->attributes = $_POST['User'];
                     if($model->validate('registration')) {
                        

                            if ($model->model()->count("login = :login", array(':login' => $model->login))) {
                                 // Указанный логин уже занят. Создаем ошибку и передаем в форму
                                $model->addError('login', 'Логин уже занят');
                                $this->render("registration", array('model' => $model));
                             } else {
                                
                                $model->password = $model->hashPass($_POST['User']['password']);
                                $model->password2 = $model->hashPass($_POST['User']['password2']);
                                
                                $model->user_hash=rand(10000,90000);
                                $model->body="Здравствуйте, ".$model->name."! Чтобы подтвердить заявку на регистрацию, перейдите по ссылке: ".Yii::app()->createAbsoluteUrl('user/confirmEmail',array('hash'=>$model->user_hash));
                                $name='=?UTF-8?B?'.base64_encode($model->name).'?=';
                				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
                				$headers="From: TestSite\r\n".
                					"Reply-To: {$model->email}\r\n".
                					"MIME-Version: 1.0\r\n".
                					"Content-type: text/plain; charset=UTF-8";
                                $model->save();
                				mail($model->email,$subject,$model->body,$headers);
                				//$this->refresh();
                                $this->renderPartial("registration_req",array('model'=>$model));
                            }
                                             
                    } else {
                        
                        
                        $this->render("registration", array('model' => $model));
                    }
             } else {
               
                $this->render("registration", array('model' => $model));
            }
    }
    
    public function actionConfirmEmail($hash){
        if ($hash){
            if ($user=User::model()->find('user_hash=:hash',array(':hash'=>$hash))){
                $user->user_status=1;
                $user->save();
                $this->renderPartial("registration_ok",array('model'=>$user));   
            }
        }
    }
    
    protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
} 
?>
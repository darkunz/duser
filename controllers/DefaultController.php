<?php

class DefaultController extends UController 
{

    public function actionIndex() 
    {
        $this->render('index');
    }

    /**
     * 
     */
    public function actionLogin()
    {
        $form = new LoginForm;
        
        if (Yii::app()->request->isPostRequest) {
            $form->attributes = $_POST['LoginForm'];
            if ($form->validate() && $form->login())
                $this->redirect('/');
        }
        
        $this->render('login', array(
            'model' => $form,
        ));
    }
    
    /**
     * 
     */
    public function actionRegister()
    {
        $model = new URegistrationForm();
        
        if (Yii::app()->request->isPostRequest) {
  
            $model->setAttributes($_POST['URegistrationForm']);
            
            if ($model->save()) {
                $this->redirect(array('login'));
            }
            
        }
        
        $this->render('register', array(
            'model' => $model,
        ));
    }
    
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('/');
    }
}
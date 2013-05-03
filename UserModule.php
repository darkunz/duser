<?php

class UserModule extends CWebModule 
{

    public $userRelations = array();
    
    public $adminLayout = 'user.views.layouts.admin-default';
//    public $adminLayout = 'admin.views.layouts.main';
    
    public $appLayout;
    
    public function init() 
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'user.models.*',
            'user.components.*',
            'user.modules.auth.components.*',
        ));
        
        $this->modules = array('auth' => array(
            'strictMode' => true,
            'userClass' => 'User',
            'userIdColumn' => 'id',
            'userNameColumn' => 'email',
            'appLayout' => $this->adminLayout,
        ));
    }

    public function beforeControllerAction($controller, $action) 
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }
}
<?php

/**
 * 
 */
class UWebUser extends CWebUser
{
    public $loginUrl = array('/user/login');
    
    public function getIsAdmin()
    {
        return $this->checkAccess('superadmin');
    }
    
}
<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity 
{
    
    const ERROR_AUTH_FAILED = 10;
    
    private $_id;
    
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() 
    {
        $filters = array(
            'email' => $this->username,
            'password' => User::hashPassword($this->password),
        );
        $user = User::model()->filterByAttributes($filters)->find();
        if ($user) {
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $user->id;
            $this->setState('umodel', $user);
            $this->setState('__id', $user->id);
        } else {
            $this->errorCode = self::ERROR_AUTH_FAILED;
        }
        
        return !$this->errorCode;
    }
}
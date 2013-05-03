<?php

class URegistrationForm extends User
{
    public $email;
    public $password;
    public $confirmPassword;
    
    /**
     * 
     * @return type
     */
    public function rules()
    {
        return array(
            array('email, password, confirmPassword', 'required'),
            array('email', 'unique'),
            array('email', 'email'),
            array('password, confirmPassword', 'length', 'min' => 4),
        );
    }
    
    /**
     * 
     */
    public function validate() 
    {
        $result = parent::validate();
        
        if ($this->confirmPassword != $this->password) {
            $this->addError('password', 'Password does not match');
            $this->addError('confirmPassword', 'Password does not match!');
            return false;
        }
        
        return $result;
    }
    
    /**
     * 
     * @return Boolean
     */
    public function save()
    {
        if (!$this->validate()) 
            return false;
        
        $user = new User();
        $user->attributes = array(
            'email' => $this->email,
            'username' => $this->email,
            'status' => 1,
            'password' => $this->password,
            'type' => User::TYPE_NORMAL,
        );
        
        return $user->save();
    }
}
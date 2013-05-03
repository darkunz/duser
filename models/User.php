<?php

class User extends UActiveRecord
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $createdAt;
    public $updatedAt;
    public $status;
    public $lastLogin;
    
    const SALT = '$2a$10$yarubrebr4bruf4sametraxaxupak783astUvebraspuyakeme';
    
    /**
     * 
     * @param string $className
     * @return User
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
    /**
     * 
     * @return string
     */
    public function tableName() 
    {
        return 'users';
    }
    
    /**
     * 
     * @return type
     */
    public function rules()
    {
        return array(
            array('username, email', 'unique'),
            array('username, email, password', 'required'),
            array('status', 'default', 'value' => 1),
            array('email', 'email'),
        );
    }
    
    /**
     * 
     * @return type
     */
    public function relations()
    {
        return Yii::app()->getModule('user')->userRelations;
    }
    
    /**
     * 
     */
    public function beforeSave() 
    {
        if ($this->isNewRecord) {
            $this->password = User::hashPassword($this->password);
        }
        
        return parent::beforeSave();
    }
    
    /**
     * 
     * @param string $rawPassword
     * @return string
     */
    public static function hashPassword($rawPassword)
    {
        return crypt($rawPassword, self::SALT);
    }
}
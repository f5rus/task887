<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    
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
                $model = Users::model()->find('name=:name',array(':name'=>$this->username));
		if(!$model){
                   $this->errorCode=self::ERROR_USERNAME_INVALID;
                }
                else if(!CPasswordHelper::verifyPassword($this->password,$model->password))
                {
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
                }
                else {
                    $this->_id=$model->id;
                    $this->username=$this->username;
                    $this->errorCode=self::ERROR_NONE;    
                }
                return !$this->errorCode;
                
	}
        public function getId()
        {
            return $this->_id;
        }
}
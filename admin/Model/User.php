<?php 
class User extends AppModel
{
	public $name = "User";
	public $validate = array(
        'username' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Tên tài khoản không được để trống',
					'allowEmpty' => false
				)
		)
    );
}
?>
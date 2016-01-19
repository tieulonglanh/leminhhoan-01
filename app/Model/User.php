<?php
class User extends AppModel
{
    public $name = 'User';

    public $validate = array(
        'username' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Tên đăng nhập không được để trống',
                'allowEmpty' => false
            ),
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Tên đăng nhập chỉ có thể là chữ không dấu và số'
            )
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Mật khẩu không được để trống',
                'allowEmpty' => false
            )
        ),
        'email' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Email không được để trống',
                'allowEmpty' => false
            ),
            'email' => array(
                'rule' => 'email',
                'message' => 'Email không đúng định dạng'
            )
        ),
        'captcha' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Mã xác nhận không được để trống',
                'allowEmpty' => false
            )
        )
    );


    public function check_user($username, $password)
    {
        return $this->find(
            'first', array(
                'conditions' => array(
                    'User.username' => $username,
                    'User.password' => $password,
                    'User.status' => 1
                )
            )
        );
    }

    public function check_exist_username($username)
    {
        return $this->find('first', array('conditions' => array('User.username' => $username)));
    }

    public function check_exist_email($email)
    {
        return $this->find('first', array('conditions' => array('User.email' => $email)));
    }
}
?>
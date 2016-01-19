<?php
/*
**
** Class xử lý phần Login, logout vào admin
** author: Nguyen Tat Loi
** All rights reserved 
** date: 12/03/2012
**
*/
class LoginController extends AppController {

    public $name = 'Login';
    public  $helpers = array('Session', 'Form', 'Html');
    public $uses = array('Administrator','Role');

	/*
	**
	** hàm khởi tạo
	**
	*/
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'login';
    }

	/*
	**
	** form login
	** truyền đường dẫn mà admin muốn vào
	** sau khi đăng nhập, sẽ đẩy admin vào đấy
	**
	*/
    public function index() {
        $redirect_url = empty($this->params->query['redirect_url']) ? '' : $this->params->query['redirect_url'];
		$this->set('redirect_url', $redirect_url);
    }

	/*
	**
	** Kiểm tra đăng nhập
	**
	*/
    public 	function login() {
		if($this->request->is('post')) {
			$data['Administrator'] = $this->data['Administrator'];
			if (empty($data['Administrator']['name'])) {
				$this->Session->setFlash(__('Please enter your username', true));
				$this->redirect($_SERVER['HTTP_REFERER']);
			} elseif (empty($data['Administrator']['password'])) {
				$this->Session->setFlash(__('Please enter your password', true));
				$this->redirect($_SERVER['HTTP_REFERER']);
			} else {
				$chek = $this->Administrator->findByName($data['Administrator']['name']);
				if ($chek['Administrator']['id']) {
					if ($chek['Administrator']['password'] == md5($data['Administrator']['password'])) {
						$this->Session->write('id', $chek['Administrator']['id']);
						$this->Session->write('name', $chek['Administrator']['name']);
                                                $this->Session->write('user_assign_id', $chek['Administrator']['user_assign_id']);
                                                $role = $this->Role->findById($chek['Administrator']['role']);
                                                $this->Session->write('role', $role['Role']['pemission']);
                                                $this->Session->write('role_id', $chek['Administrator']['role']);
						$this->redirect('/'.$data['Administrator']['redirect_url']);
					} else {
						$this->Session->setFlash(__('Password Wrong!', true));
						$this->redirect($_SERVER['HTTP_REFERER']);
					}
				} else {
						$this->Session->setFlash(__('Please try again!', true));
						$this->redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}else{
			$this->redirect(array('controller'=>'login', 'action'=>'index'));
		}
    }

    /*
	**
	** Hàm lấy lại mật khẩu
	**
	*/
    function password() {
        $this->layout = 'password';
    }
	
	/*
	**
	** Hàm logout
	**
	*/
    function logout() {
        $this->Session->delete('id');
        $this->Session->delete('name');
        $this->redirect(array('action' => 'index'));
    }

}

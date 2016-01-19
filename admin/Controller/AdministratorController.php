<?php
/*
**
** Class xử lý phần quản lý tài khoản quản trị
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class AdministratorController extends AppController {

    public $name = 'Administrator';
    public $uses = array('Administrator', 'Role', 'User');

    /*
    **
    ** Hàm khỏi tạo
    **
    */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->layout = 'admin';
        if (!$this->Session->read("id") || !$this->Session->read("name")) {
            $url = '/login?redirect_url='.$this->params->url;
            $this->redirect($url);
        }
    }

    /*
    **
    ** Trang index
    **
    */
    public function index() {
        $this->paginate = array('limit'=>15, 'order'=>'Administrator.id DESC');
        $Administrator = $this->paginate('Administrator');
        $this->set('Administrator', $Administrator);
    }


    /*
    **
    ** Trang thêm
    **
    */
    public function add() {
        $this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {
            if(!empty($this->request->data['Administrator']['role'])){
                $data = $this->request->data;
                $check = $this->Administrator->findByName($data['Administrator']['name']);
                if(empty($check)){
                    if($data['Administrator']['password'] == $data['Administrator']['repassword']){
                        $data['Administrator']['password'] = md5($data['Administrator']['password']);
                        $data['Administrator']['repassword'] = md5($data['Administrator']['repassword']);
                        if ($this->Administrator->save($data)){
                            $this->Session->setFlash(__('Thêm mới thành công !', true));
                            $this->redirect(array('action' => 'index'));
                        }else{
                            $this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
                        }
                    }else{
                        $this->Session->setFlash(__('Mật khẩu xác nhận không đúng!', true));
                    }
                }else{
                    $this->Session->setFlash(__('Tên truy cập đã có người sử dụng, mời bạn chọn tên khác!', true));
                }
            }else{
                $this->Session->setFlash(__('Phải chọn quyền cho tài khoản quản trị !', true));
            }
        }
        $list_role = $this->Role->find(
            'list', array(
                'fields' => array('Role.id', 'Role.role_name')
            )
        );
        $list_user = $this->User->find(
            'list', array(
                'conditions' => array(
                    'type' => 2
                ),
                'fields' => array('User.id', 'User.username')
            )
        );
        $this->set('list_role', $list_role);
        $this->set('list_user', $list_user);
    }

    /*
    **
    ** Trang sửa đổi thông tin
    **
    */
    public function edit($id = null)
    {
        $this->Session->setFlash(__('', true));
        $list_role = $this->Role->find(
            'list', array(
                'fields' => array('Role.id', 'Role.role_name')
            )
        );
        $list_user = $this->User->find(
            'list', array(
                'conditions' => array(
                    'type' => 2
                ),
                'fields' => array('User.id', 'User.username')
            )
        );
        $this->set('list_role', $list_role);
        $this->set('list_user', $list_user);

        if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'Administrator', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['Administrator'] = $this->request->data['Administrator'];
            if(empty($data['Administrator']['password'])){
                unset($data['Administrator']['password']);
            }else{
                if($data['Administrator']['password'] != $data['Administrator']['repassword']){
                    $this->Session->setFlash(__('Mật khẩu xác nhận không đúng', true));
                    return $this->view;
                }else{
                    $data['Administrator']['password'] = md5($data['Administrator']['password']);
                }
            }
            if($this->Session->read('role_id') != 5):
                unset($data['Administrator']['name']);
            endif;
            if ($this->Administrator->save($data['Administrator'])){
                $this->Session->setFlash(__('Sửa thông tin quản trị viên thành công.', true));
                
                if($this->Session->read('role_id') == 5):
                    $this->redirect(array('action' => 'index'));
                else:
                    $this->redirect(array('controller'=> 'Home','action' => 'index'));
                endif;
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->Administrator->read(null, $id);
        }
    }


    /*
    **
    ** Hàm copy nội dung
    **
    */
    public function copy($id)
    {
        $this->Session->setFlash(__('', true));
        if(!empty($id)){
            $data = $this->Administrator->read(null, $id);
            $this->data = $data;
            $this->render('add');
        }else{
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     *
     ** Hàm xóa
     **
     */
    public function delete($id = null) {
        $this->Session->setFlash(__('', true));
        if (!empty($id)){
            $this->Administrator->delete($id);
            $this->Session->setFlash(__('Xóa tài khoản quản trị thành công', true));
        }else{
            $this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Delete', true));
        }
        $this->redirect(array('action' => 'index'));
    }


    /*
    **
    ** Hàm xóa nhiều
    **
    */
    public function delete_all($data_action)
    {
        $this->Session->setFlash(__('', true));
        if(!empty($data_action)){
            $condition = array();
            foreach($data_action as $key=>$value){
                $condition[] = $key;
            }
            if($this->Administrator->delete($condition)){
                $this->Session->setFlash(__('Xóa tất cả thành công', true));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Delete All', true));
            }
        }
        $this->redirect(array('action' => 'index'));
    }


    /*
    **
    ** Hàm active
    **
    */
    public function active($id = null)
    {
        $this->Session->setFlash(__('', true));
        if (!empty($id)){
            if($this->Administrator->save(array('Administrator'=>array('status'=>1, 'id'=>$id)))){
                $this->Session->setFlash(__('Active thành công', true));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể sử dụng chắc năng Active', true));
            }
        }else{
            $this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Active', true));
        }
        $this->redirect(array('action' => 'index'));
    }


    /*
    **
    ** Hàm active nhiều
    **
    */
    public function active_all($data_action)
    {
        $this->Session->setFlash(__('', true));
        if(!empty($data_action)){
            $condition = array();
            foreach($data_action as $key=>$value){
                $condition[] = $key;
            }
            if($this->Administrator->updateAll(array('status'=>1), array('Administrator.id'=>$condition))){
                $this->Session->setFlash(__('Active tất cả thành công', true));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Active All', true));
            }
        }
        $this->redirect(array('action' => 'index'));
    }


    /*
    **
    ** Hàm hủy Active
    **
    */
    public function close($id = null)
    {
        $this->Session->setFlash(__('', true));
        if (!empty($id)){
            $conditions = array('Administrator'=>array('status'=>0, 'id'=>$id));
            if($this->Administrator->save($conditions)){
                $this->Session->setFlash(__('Close thành công', true));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng Close', true));
            }
        }else{
            $this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng Close', true));
        }
        $this->redirect(array('action' => 'index'));
    }

    /*
    **
    ** Hàm hủy active nhiều
    **
    */
    public function close_all($data_action)
    {
        $this->Session->setFlash(__('', true));
        if(!empty($data_action)){
            $condition = array();
            foreach($data_action as $key=>$value){
                $condition[] = $key;
            }
            if($this->Administrator->updateAll(array('status'=>0), array('Administrator.id'=>$condition))){
                $this->Session->setFlash(__('Close tất cả thành công', true));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể sử dụng chức năng Close All', true));
            }
        }
        $this->redirect(array('action' => 'index'));
    }


    /*
    **
    ** Hàm điều hướng khi check all
    ** xem action là gì thì gọi hàm xử lý action đó
    **
    */
    public function action_all()
    {
        if($this->request->is('POST')){
            $action = $this->request->data['process'];
            $data_action = $this->request->data['chose_active'];
            if($action == 'none'){
                $this->redirect(array('action'=>'index'));
            }else if($action == 'active_all'){
                $this->active_all($data_action);
            }else if($action == 'close_all'){
                $this->close_all($data_action);
            }else if($action == 'delete_all'){
                $this->delete_all($data_action);
            }
        }else{
            $this->redirect(array('action'=>'index'));
        }
    }

    /*
    **
    ** Hàm tìm kiếm
    **
    */
    public function search()
    {
        if($this->request->is('POST')){
            $keyword = $this->request->data['keyword'];
            $conditions = array(
                'or'=>array(
                    'Administrator.name like "%'.$keyword.'%"',
                  //  'Administrator.name_en like "%'.$keyword.'%"',
                )
            );
            $this->paginate = array(
                'conditions'=>$conditions,
                'limit'=>15,
                'order'=>'Administrator.id DESC, Administrator.modified DESC'
            );
            $Administrator = $this->paginate('Administrator');
            $this->set('Administrator', $Administrator);
            $this->render('index');
        }else{
            $this->redirect(array('action'=>'index'));
        }
    }
}

?>

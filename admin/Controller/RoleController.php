<?php
/*
**
** Class xử lý phần quản lý quyền
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class RoleController extends AppController {

    public $name = 'Role';
    public $uses = array('Role');

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
        $this->paginate = array('limit'=>15, 'order'=>'Role.id DESC');
        $Role = $this->paginate('Role');
        $this->set('Role', $Role);
    }


    /*
    **
    ** Trang thêm
    **
    */
    public function add() {
        $this->Session->setFlash(__('', true));
        $list_controller = $this->get_list_controller();
        $this->set('list_controller', $list_controller);
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $data['Role']['pemission'] = json_encode($data['action']);
            unset($data['action']);
            if ($this->Role->save($data)){
                $this->Session->setFlash(__('Thêm mới thành công !', true));
                $this->redirect(array('action' => 'index'));
            }else{
                $this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
            }
        }
    }

    /*
    **
    ** Trang sửa đổi thông tin
    **
    */
    public function edit($id = null)
    {
        $this->Session->setFlash(__('', true));
        $list_controller = $this->get_list_controller();
        $this->set('list_controller', $list_controller);
        if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'Role', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['Role'] = $this->request->data['Role'];
            if ($this->Role->save($data['Role'])){
                $this->Session->setFlash(__('Sửa thành công.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->Role->read(null, $id);
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
            $data = $this->Role->read(null, $id);
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
            $this->Role->delete($id);
            $this->Session->setFlash(__('Xóa thành công', true));
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
            if($this->Role->delete($condition)){
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
            if($this->Role->save(array('Role'=>array('status'=>1, 'id'=>$id)))){
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
            if($this->Role->updateAll(array('status'=>1), array('Role.id'=>$condition))){
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
            $conditions = array('Role'=>array('status'=>0, 'id'=>$id));
            if($this->Role->save($conditions)){
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
            if($this->Role->updateAll(array('status'=>0), array('Role.id'=>$condition))){
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
                    'Role.name like "%'.$keyword.'%"',
                    'Role.name_en like "%'.$keyword.'%"',
                )
            );
            $this->paginate = array(
                'conditions'=>$conditions,
                'limit'=>15,
                'order'=>'Role.id DESC, Role.modified DESC'
            );
            $Role = $this->paginate('Role');
            $this->set('Role', $Role);
            $this->render('index');
        }else{
            $this->redirect(array('action'=>'index'));
        }
    }


    private function get_list_controller()
    {
        $controller_allow = array(
            'Administrator', 'Contact', 'News', 'NewsCategory', 'Partner', 'Setting', 'Role'
        );
        $list_controller = $this->Ctrl->get();
        $array_return = array();
        foreach($list_controller as $key => $value){
            if(in_array($key, $controller_allow)){
                $array_return[$key] = $value;
            }
        }
        return $array_return;
    }
}

?>

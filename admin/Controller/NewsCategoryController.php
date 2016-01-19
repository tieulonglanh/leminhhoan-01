<?php
/*
**
** Class xử lý phần quản lý danh mục tin tức
** author: Nguyễn Tất Lợi
** All rights reserved 
** date: 12/03/2012
**
*/
class NewsCategoryController extends AppController {

    public $name = 'NewsCategory';
    public $uses = array('NewsCategory');

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
		$this->paginate = array('limit'=>15, 'order'=>'NewsCategory.id DESC');
		$news_category = $this->paginate('NewsCategory');
        $this->set('news_category', $news_category);
    }

	
	/*
	**
	** Trang thêm
	**
	*/
    public function add() {
		$this->Session->setFlash(__('', true));
        if (!empty($this->request->data)) {	
			if(empty($this->request->data['NewsCategory']['parent_id'])) $this->request->data['NewsCategory']['parent_id'] = 0;
			if ($this->NewsCategory->save($this->request->data)){
				$this->Session->setFlash(__('Thêm mới thành công !', true));
				$this->redirect(array('action' => 'index'));
			}else{
				$this->Session->setFlash(__('Hiện tại không thể thực hiện chức năng thêm mới. Mời thử lại !', true));
			}
		}
        $list_cat = $this->get_category('NewsCategory');
        $this->set('list_cat', $list_cat);
    }

	/*
	**
	** Trang sửa đổi thông tin
	**
	*/
	public function edit($id = null)
	{
		$this->Session->setFlash(__('', true));
		if (!$id && empty($this->request->data)) {
            $this->redirect(array('controller'=>'NewsCategory', 'action'=>'index'));
        }else if (!empty($this->request->data)) {
            $data['NewsCategory'] = $this->request->data['NewsCategory'];
            if($data['NewsCategory']['parent_id'] == '') {
                $data['NewsCategory']['parent_id'] = 0;
            }
            if ($this->NewsCategory->save($data['NewsCategory'])){
                $this->Session->setFlash(__('Sửa thành công.', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Hiện tại hệ thống không thể sử dụng chức năng Edit, mời thử lại sau.', true));
            }
        }else if (empty($this->request->data)) {
            $this->data = $this->NewsCategory->read(null, $id);
        }
        $list_cat = $this->get_category('NewsCategory');
        $this->set('list_cat', $list_cat);
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
			$data = $this->NewsCategory->read(null, $id);
			$this->data = $data;
            $list_cat = $this->get_category('NewsCategory');
            $this->set('list_cat', $list_cat);
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
            $this->NewsCategory->delete($id);
			$this->Session->setFlash(__('Xóa liên hệ thành công', true));
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
			if($this->NewsCategory->delete($condition)){
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
            $this->NewsCategory->save(array('NewsCategory'=>array('status'=>1, 'id'=>$id)));
			$this->Session->setFlash(__('Active thành công', true));
		}else{
			$this->Session->setFlash(__('Hiện tại không thể sử dụng chắc năng Active', true));
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
			if($this->NewsCategory->updateAll(array('status'=>1), array('NewsCategory.id'=>$condition))){
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
            $this->NewsCategory->save(array('NewsCategory'=>array('status'=>0, 'id'=>$id)));
			$this->Session->setFlash(__('Close thành công', true));
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
			if($this->NewsCategory->updateAll(array('status'=>0), array('NewsCategory.id'=>$condition))){
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
							'NewsCategory.name like "%'.$keyword.'%"',
							'NewsCategory.name_en like "%'.$keyword.'%"',
						)
					); 
			$this->paginate = array(
					'conditions'=>$conditions,
					'limit'=>15,
					'order'=>'NewsCategory.id DESC, NewsCategory.modified DESC'
			);
			$news_category = $this->paginate('NewsCategory');
        	$this->set('news_category', $news_category);
			$this->render('index');
		}else{
			$this->redirect(array('action'=>'index'));
		}
	}
}

?>

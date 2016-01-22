<?php 
	/**
	* 
	*/
	class NewsController extends AppController
	{
		public $name = 'News';

        public $uses = array('Content', 'ContentCategory', 'Group','GroupCategory','Menuleft','News','NewsCategory','Right','RightCategory','Setting','Slideshow');
		public function index($id=null)
		{
				 $login_register = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'login-register'
            ),
            'order' => 'created DESC'
        ));
        $this->set('login_register', $login_register);
        
        $under_slide_menu = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'under-slide-menu'
            ),
            'order' => 'created DESC'
        ));
        $this->set('under_slide_menu', $under_slide_menu);
        
        $under_slide_ads = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'ads-under-slide'
            ),
            'order' => 'created DESC'
        ));
        $this->set('under_slide_ads', $under_slide_ads);
        
        $menu_footer_1 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-1'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_1', $menu_footer_1);
        
        $menu_footer_12 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-1-2'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_12', $menu_footer_12);
        
        $menu_footer_2 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-2'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_2', $menu_footer_2);

			 $this->paginate = array(
            'conditions' => array(
                'News.status' => 1,
                
            ),
            'order' => 'News.id DESC, News.modified DESC',
            'limit' => '5'
        );
			$listNews= $this->paginate('News');
			$this->set('listNews',$listNews);

				$cat_product_right = $this->RightCategory->find('all', array(
                                    'conditions' => array(
                                        'RightCategory.status' => 1
                                    )
		                ));
				$this->set('cat_product_right',$cat_product_right);
				// pr($cat_product_right);die;
				$list_cate_id = array();
				foreach($cat_product_right as $right_cate) {
					$list_cate_id[] = $right_cate['RightCategory']['id'];
				}
				
				// pr($list_cate_id); die;
				
		        $product_right= $this->Right->find('all', array(
		            'conditions' => array(
		                'Right.status' => 1,
		                'Right.right_category_id' => $list_cate_id
		            ))
		            
		        );
		         // pr($product_right); die;

		        $mang=array();
				foreach($list_cate_id as $key=>$value){
					foreach($product_right as $product){
						if($product['Right']['right_category_id'] == $value){
							$mang[$value][]= $product;
						}
					}
					
				}
				// pr($mang);die;

		        $this->set('mang', $mang);
		        // pr($product_right);die;
		        // 

		}
		public function detail($id=null){
				 $detailNews = $this->News->findById($id);
		        $this->set('detailNews', $detailNews);

				
				$typeName = $this->NewsCategory->read(null, $detailNews['News']['news_category_id']);
				$this->set('typeName', $typeName);
				// list all News

		        $this->paginate = array(
		            'conditions' => array(
		                'News.status' => 1,
		                'News.news_category_id' => $detailNews['News']['news_category_id'],
		            ),

		            'order' => 'News.id DESC, News.modified DESC',
		            'limit' => '5'

		        );
		        $listNews = $this->paginate('News');
		        $this->set('listNews', $listNews);

		         $login_register = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'login-register'
            ),
            'order' => 'created DESC'
        ));
        $this->set('login_register', $login_register);
        
        $under_slide_menu = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'under-slide-menu'
            ),
            'order' => 'created DESC'
        ));
        $this->set('under_slide_menu', $under_slide_menu);
        
        $under_slide_ads = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'ads-under-slide'
            ),
            'order' => 'created DESC'
        ));
        $this->set('under_slide_ads', $under_slide_ads);
        
        $menu_footer_1 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-1'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_1', $menu_footer_1);
        
        $menu_footer_12 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-1-2'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_12', $menu_footer_12);
        
        $menu_footer_2 = $this->Setting->find('first', array(
            'conditions' => array(
                'name' => 'footer-menu-2'
            ),
            'order' => 'created DESC'
        ));
        $this->set('menu_footer_2', $menu_footer_2);
		}
	}
 ?>
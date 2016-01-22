<?php 
	/**
	* 
	*/
	class CommentController extends AppController
	{
		public $name = 'Comment';

       	public $uses = array('Content', 'ContentCategory', 'Group','GroupCategory','Menuleft','News','NewsCategory','Right','RightCategory','Setting','Slideshow');
		public function left()
		{
			 return $this->Menuleft->find('all', array('conditions' => array('Menuleft.status' => 1)));
		}
		public function rightcat()
		{
			 return $this->RightCategory->find('all', array('conditions' => array('RightCategory.status' => 1)));
		}
		public function right()
		{
			 return $this->Right->find('all', array('conditions' => array('Right.status' => 1,'Right.right_category_id' => $id)));
		}
		public function slideshow() {
        $slideshow = $this->Slideshow->find('all', array('conditions' => array('Slideshow.status' => 1,'Slideshow.display' => 1),'order' => 'Slideshow.modified DESC'));
        return $slideshow;

    }
		function product_right($catId = null) {$cat1 = array();
        $cat1[0]=$catId;$i=1;
        $cat = $this-> RightCategory ->find('all', array('conditions' => array('RightCategory.status' => 1)));
        	//var_dump($cat);die;
        foreach ($cat as $row){
            $cat1[]=$row['RightCategory']['id'];
        }
        //var_dump($cat1);die;
        $product_right= $this->Right->find('all', array('conditions' => array('Right.status' => 1, 'Right.right_category_id' => $cat1)));
        pr($product_right);die;
    	}
	}
 ?>
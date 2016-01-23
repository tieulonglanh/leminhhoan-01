<?php

/**
 * 
 */
class HomeController extends AppController {

    public $name = 'Home';
    public $uses = array('Content', 'Setting', 'ContentCategory', 'Group', 'GroupCategory', 'Menuleft', 'News', 'NewsCategory', 'Right', 'RightCategory', 'Setting', 'Slideshow');

    public function index($id = null) {

        $cat_product_right = $this->RightCategory->find('all', array(
            'conditions' => array(
                'RightCategory.status' => 1
            )
        ));
        $this->set('cat_product_right', $cat_product_right);
        // pr($cat_product_right);die;
        $list_cate_id = array();
        foreach ($cat_product_right as $right_cate) {
            $list_cate_id[] = $right_cate['RightCategory']['id'];
        }

        // pr($list_cate_id); die;

        $product_right = $this->Right->find('all', array(
            'conditions' => array(
                'Right.status' => 1,
                'Right.right_category_id' => $list_cate_id
            ))
        );
        // pr($product_right); die;

        $mang = array();
        foreach ($list_cate_id as $key => $value) {
            foreach ($product_right as $product) {
                if ($product['Right']['right_category_id'] == $value) {
                    $mang[$value][] = $product;
                }
            }
        }
        // pr($mang);die;

        $this->set('mang', $mang);
        // pr($product_right);die;
        // 
///////////////////////////////////////////////////////////////////////////////////////////// 
///Content
        $cat_product_content = $this->ContentCategory->find('all', array(
            'conditions' => array(
                'ContentCategory.status' => 1
            )
        ));
        $this->set('cat_product_content', $cat_product_content);
        // pr($cat_product_content);die;
        $list_cate_id = array();
        foreach ($cat_product_content as $content_cate) {
            $list_cate_id[] = $content_cate['ContentCategory']['id'];
        }

        // pr($list_cate_id); die;

        $product_content = $this->Content->find('all', array(
            'conditions' => array(
                'Content.status' => 1,
                'Content.content_category_id' => $list_cate_id
            ))
        );
        // pr($product_content); die;

        $mang1 = array();
        foreach ($list_cate_id as $key => $value) {
            foreach ($product_content as $product) {
                if ($product['Content']['content_category_id'] == $value) {
                    $mang1[$value][] = $product;
                }
            }
        }
        // pr($mang);die;

        $this->set('mang1', $mang1);

        ///
//////////////////////////////////////////////////////////////////////////////////////// Gruop
        $cat_product_group = $this->GroupCategory->find('all', array(
            'conditions' => array(
                'GroupCategory.status' => 1,
                'GroupCategory.parent_id' => 0
            )
        ));
        $this->set('cat_product_group', $cat_product_group);
        // pr($cat_product_group);die;

        $list_cate_id1 = array();
        foreach ($cat_product_group as $group_cate) {
            $list_cate_id1[] = $group_cate['GroupCategory']['id'];
        }

        // pr($list_cate_id1); die;
        $cat_product_group1 = $this->GroupCategory->find('all', array(
            'conditions' => array(
                'GroupCategory.status' => 1,
                'GroupCategory.parent_id' => $list_cate_id1
            )
        ));
        // $this->set('cat_product_group1',$cat_product_group1);
        // pr($cat_product_group1);die;
        $mang2 = array();
        foreach ($list_cate_id1 as $key => $value) {
            foreach ($cat_product_group1 as $product) {
                if ($product['GroupCategory']['parent_id'] == $value) {
                    $mang2[$value][] = $product;
                }
            }
        }


        $this->set('mang2', $mang2);
        // pr($mang2);die;
        // pr($cat_product_group1);die;
        // 
        $list_cate_id2 = array();
        foreach ($cat_product_group as $group_cate1) {

            $list_cate_id2[] = $group_cate1['GroupCategory']['id'];
        }

        // pr($list_cate_id2); die;

        $product_group = $this->Group->find('all', array(
            'conditions' => array(
                'Group.status' => 1,
                'Group.group_category_id' => $list_cate_id2
            ))
        );
        // pr($product_group); die;

        $mang3 = array();
        foreach ($list_cate_id2 as $key => $value) {
            foreach ($product_group as $product) {
                if ($product['Group']['group_category_id'] == $value) {
                    $mang3[$value][] = $product;
                }
            }
        }
        // pr($mang);die;

        $this->set('mang3', $mang3);
        // pr($mang3);die;
        
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
        
        ///////////////////////////////////
         $anhpc1 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '34'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc1', $anhpc1);
        //////////////////////////////////
         $anhpc2 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '35'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc2', $anhpc2);
        //////////////////////////////////
         $anhpc3 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '36'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc3', $anhpc3);
        //////////////////////////////////
         $anhpc4 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '37'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc4', $anhpc4);
        //////////////////////////////////
         $anhpc5 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '38'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc5', $anhpc5);
        //////////////////////////////////
         $anhpc6 = $this->Slideshow->find('first', array(
            'conditions' => array(
                'id' => '39'
            ),
            'order' => 'created DESC'
        ));
        $this->set('anhpc6', $anhpc6);
        //////////////////////////////////
        
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
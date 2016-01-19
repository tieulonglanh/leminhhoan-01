<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::import('Utility','Sanitize');
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class VideoController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array('Video', 'VideoCategory', 'Tag', 'VideoVote', 'Advertisement');

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function index() {
        if (!Cache::read('home_videos')) {
            $home_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_home' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 3
            ));
            Cache::write('home_videos', $home_videos);
        } else {
            $home_videos = Cache::read('home_videos');
        }

        $this->set('home_videos', $home_videos);

        if (!Cache::read('hot_videos_home')) {
            $hot_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_hot_home' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('hot_videos_home', $hot_videos);
        } else {
            $hot_videos = Cache::read('hot_videos_home');
        }
        $this->set('hot_videos', $hot_videos);

        if (!Cache::read('vote_videos_home')) {
            $vote_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_vote_home' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('vote_videos_home', $vote_videos);
        } else {
            $vote_videos = Cache::read('vote_videos_home');
        }
        $this->set('vote_videos', $vote_videos);

        if (!Cache::read('latest_videos_home')) {
            $latest_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_new_home' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 12
            ));
            Cache::write('latest_videos_home', $latest_videos);
        } else {
            $latest_videos = Cache::read('latest_videos_home');
        }
//            var_dump($latest_videos); die;
        $this->set('latest_videos', $latest_videos);
        $ads_right_hot = Cache::read('ads_righ_hot_home');
        if(!$ads_right_hot){
            $ads_right_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 1
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_righ_hot_home', $ads_right_hot);
        }
        $this->set('ads_right_hot', $ads_right_hot);
        
        $ads_center_hot = Cache::read('ads_center_home');
        if(!$ads_center_hot){
            $ads_center_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 2
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_center_home', $ads_center_hot);
        }
        $this->set('ads_center_hot', $ads_center_hot);
        
        $ads_bottom_hot = Cache::read('ads_bottom_home');
        if(!$ads_bottom_hot){
            $ads_bottom_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 3
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_bottom_home', $ads_bottom_hot);
        }
        $this->set('ads_bottom_hot', $ads_bottom_hot);
    }

    public function category($alias) {
        $alias = Sanitize::escape($alias);
        $category = $this->VideoCategory->find('first', 
                array(
                    'conditions' => array(
                        'VideoCategory.alias' => $alias,
                        'VideoCategory.status' => 1,
                    )
                )
        );
        
        $this->set('category_id', $category['VideoCategory']['id']);
        
        if (!Cache::read('category_videos_'.$category['VideoCategory']['alias'])) {
            $category_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $category['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.is_top_category' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 3
            ));
            Cache::write('category_videos_'.$category['VideoCategory']['alias'], $category_videos);
        } else {
            $category_videos = Cache::read('category_videos_'.$category['VideoCategory']['alias']);
        }
        $this->set('category_videos', $category_videos);

        if (!Cache::read('hot_videos_category_'.$category['VideoCategory']['alias'])) {
            $hot_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $category['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.is_hot' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('hot_videos_category_'.$category['VideoCategory']['alias'], $hot_videos);
        } else {
            $hot_videos = Cache::read('hot_videos_category_'.$category['VideoCategory']['alias']);
        }
        $this->set('hot_videos', $hot_videos);

        if (!Cache::read('vote_videos_category_'.$category['VideoCategory']['alias'])) {
            $vote_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $category['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.is_vote' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('vote_videos_category_'.$category['VideoCategory']['alias'], $vote_videos);
        } else {
            $vote_videos = Cache::read('vote_videos_category_'.$category['VideoCategory']['alias']);
        }
        $this->set('vote_videos', $vote_videos);

        if (!Cache::read('latest_videos_category_'.$category['VideoCategory']['alias'])) {
            $latest_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $category['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 15
            ));
            Cache::write('latest_videos_category_'.$category['VideoCategory']['alias'], $latest_videos);
        } else {
            $latest_videos = Cache::read('latest_videos_category_'.$category['VideoCategory']['alias']);
        }
        
        $this->set('latest_videos', $latest_videos);
        
        $ads_right_hot = Cache::read('ads_righ_hot_category');
        if(!$ads_right_hot){
            $ads_right_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 4
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_righ_hot_category', $ads_right_hot);
        }
        $this->set('ads_right_hot', $ads_right_hot);
        
        $ads_center_hot = Cache::read('ads_center_category');
        if(!$ads_center_hot){
            $ads_center_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 5
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_center_category', $ads_center_hot);
        }
        $this->set('ads_center_hot', $ads_center_hot);
        
        $ads_bottom_hot = Cache::read('ads_bottom_category');
        if(!$ads_bottom_hot){
            $ads_bottom_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 6
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_bottom_category', $ads_bottom_hot);
        }
        $this->set('ads_bottom_hot', $ads_bottom_hot);
    }

    public function detail($alias) {
        $alias = Sanitize::escape($alias);
        
        $has_view = $this->Session->read('has_view_'.$alias);
        $rand = rand(1, 10);
        if(!$has_view) {
            $this->Video->updateAll(
                array(
                  'Video.view' => "Video.view+$rand"
                ),
                array('Video.alias' => $alias));
            
            $this->Session->write('has_view_'.$alias, 1);
        }
        
        if (!Cache::read('detail_video_'.$alias)) {
            $video = $this->Video->find('first', 
                    array(
                        'conditions' => array(
                            'Video.alias' => $alias,
                            'Video.status' => 1,
                            'Video.publish_date <=' => date('Y-m-d H:i:s'),
                        )
                    )
            );
            Cache::write('detail_video_'.$alias, $video);
        }else {
            $video = Cache::read('detail_video_'.$alias);
        }
		if(!$video) {
			return $this->redirect("/");
		}
        $tags =  $this->Tag->find('all', array(
            'conditions' => array(
                'post_id' => $video['Video']['id'],
                'post_type' => 2
            )
        ));
        $this->set('tags', $tags);
        $keywords = 'xôn xao, clip hai xôn xao, phim hai xôn xao, phim ngan xon xao, ';
        if(!empty($tags)) {
            foreach($tags as $tag){                
                $keywords .= $tag['Tag']['tag_name'] .",";
            }
        }
        $keywords .= " xonxao";
        $this->set('video', $video);
        $this->set('keywords', $keywords);
        $this->set('title_tag', $video['Video']['name']);
        $this->set('meta_description', $video['Video']['meta_description']);
        $this->set('fbimg', $video['Video']['images']);
        $this->set('url', DOMAIN. 'chi-tiet/' . $video['Video']['alias']);
        
        if (!Cache::read('hot_videos_category_'.$video['VideoCategory']['alias'])) {
            $hot_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $video['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.is_hot' => 1,
                    'Video.id !=' => $video['Video']['id'],
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('hot_videos_category_'.$video['VideoCategory']['alias'], $hot_videos);
        } else {
            $hot_videos = Cache::read('hot_videos_category_'.$video['VideoCategory']['alias']);
        }
        $this->set('hot_videos', $hot_videos);

        if (!Cache::read('vote_videos_detail_'.$video['Video']['alias'])) {
            $vote_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $video['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.is_vote' => 1,
                    'Video.id !=' => $video['Video']['id'],
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.vote DESC',
                'limit' => 15
            ));
            Cache::write('vote_videos_detail_'.$video['Video']['alias'], $vote_videos);
        } else {
            $vote_videos = Cache::read('vote_videos_detail_'.$video['Video']['alias']);
        }
        $this->set('vote_videos', $vote_videos);

        if (!Cache::read('latest_videos_detail_'.$video['Video']['alias'])) {
            $latest_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.video_category_id' => $video['VideoCategory']['id'],
                    'Video.status' => 1,
                    'Video.id !=' => $video['Video']['id'],
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 6
            ));
            Cache::write('latest_videos_detail_'.$video['Video']['alias'], $latest_videos);
        } else {
            $latest_videos = Cache::read('latest_videos_detail_'.$video['Video']['alias']);
        }        
        $this->set('latest_videos', $latest_videos);
        
        $ads_right_hot = Cache::read('ads_righ_hot_detail');
        if(!$ads_right_hot){
            $ads_right_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 7
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_righ_hot_detail', $ads_right_hot);
        }
        $this->set('ads_right_hot', $ads_right_hot);
        
        $ads_center_hot = Cache::read('ads_center_detail');
        if(!$ads_center_hot){
            $ads_center_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 8
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_center_detail', $ads_center_hot);
        }
        $this->set('ads_center_hot', $ads_center_hot);
        
        $ads_bottom_hot = Cache::read('ads_bottom_detail');
        if(!$ads_bottom_hot){
            $ads_bottom_hot = $this->Advertisement->find('first', array(
                'conditions' => array(
                    'Advertisement.status' => 1,
                    'Advertisement.position' => 9
                ),
                'order' => "Advertisement.created DESC"
            ));
            Cache::write('ads_bottom_detail', $ads_bottom_hot);
        }
        $this->set('ads_bottom_hot', $ads_bottom_hot);
        
    }

    public function ajaxLoadMore() {

        $this->autoRender = false;
        $this->layout = false;

        $page = (int) $_GET['page'];
        $limit = 12;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.is_new_home' => 1,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMore');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
    
    public function ajaxCateLoadMore() {

        $this->autoRender = false;
        $this->layout = false;

        $page = (int) $_GET['page'];
        $category_id = (int) $_GET['category_id'];
        $limit = 15;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.video_category_id' => $category_id,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMoreCate');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
    
    public function getVideoCategory() {
        $this->autoRender = false;
        $this->layout = false;
        $video_category = $this->VideoCategory->find('all', array(
                'conditions' => array(
                    'VideoCategory.status' => 1
                ),
                'order' => 'created DESC'
            )
        );
        return $video_category;
    }
    
    public function vote() {
        $this->autoRender = false;
        $this->layout = false;
        $id = (int) $_POST['id_vote'];
        $ip = Sanitize::escape($_POST['ip_vote']);
        $point = (int) $_POST['point'];
        $data = array();
        $data['VideoVote']['video_id'] = $id;
        $data['VideoVote']['ip'] = $ip;
        $count = $this->VideoVote->find('count', array(
            'conditions' => array(
                'video_id' => $id,
                'ip' => $ip
            )
        ));
        
        if($count > 0){
            echo "Bạn đã bình chọn cho video này rồi. Xin cảm ơn!";
        }else{
            if($point > 0){
                $this->Video->updateAll(
                array(
                  'Video.vote' => 'Video.vote+1'
                ),
                array('Video.id' => $id));
            }else{
                $this->Video->updateAll(
                array(
                  'Video.vote' => 'Video.vote-1'
                ),
                array('Video.id' => $id));
            }
            $this->VideoVote->save($data);
            echo "Bạn đã bình chọn thành công. Xin cảm ơn!";
        }
        exit;
    }
    
    public function latest() {
        if (!Cache::read('latest_videos_latest')) {
            $latest_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.created DESC',
                'limit' => 15
            ));
            Cache::write('latest_videos_latest', $latest_videos);
        } else {
            $latest_videos = Cache::read('latest_videos_latest');
        }        
        $this->set('latest_videos', $latest_videos);
    }
    
    public function ajaxLatestLoadMore() {

        $this->autoRender = false;
        $this->layout = false;

        $page = (int) $_GET['page'];
        $limit = 15;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMoreCate');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
    
    public function topHot() {
        if (!Cache::read('hot_videos_hot')) {
            $hot_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_hot' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.vote DESC',
                'limit' => 15
            ));
            Cache::write('hot_videos_hot', $hot_videos);
        } else {
            $hot_videos = Cache::read('hot_videos_hot');
        }
        $this->set('latest_videos', $hot_videos);
    }
    
    public function ajaxTopHotLoadMore() {

        $this->autoRender = false;
        $this->layout = false;

        $page = (int) $_GET['page'];
        $limit = 15;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.is_hot' => 1,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMoreCate');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
    
    public function topVote() {
        if (!Cache::read('vote_videos_vote')) {
            $vote_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.is_vote' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                ),
                'order' => 'Video.vote DESC',
                'limit' => 15
            ));
            Cache::write('vote_videos_vote', $vote_videos);
        } else {
            $vote_videos = Cache::read('vote_videos_vote');
        }
        $this->set('latest_videos', $vote_videos);
    }
    
    public function ajaxTopVoteLoadMore() {

        $this->autoRender = false;
        $this->layout = false;

        $page = (int) $_GET['page'];
        $limit = 15;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.is_vote' => 1,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMoreCate');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
    
    public function search() {
        $keywords = Sanitize::escape($_GET['keywords']);
        if(!$keywords) {
            return $this->redirect('/');
        }
//		$keywords_arr = explode(' ', $keywordsz);
//                $keywords = "";
//                if(count($keywords_arr) > 1)
//                    $keywords .= "+";
//		$keywords .= implode(" +", $keywords_arr);
//        echo $keywords;
        if (!Cache::read('hot_videos_search_'.Inflector::slug($keywords, '_'))) {
            $search_videos = $this->Video->find('all', array(
                'conditions' => array(
                    'Video.status' => 1,
                    'Video.publish_date <=' => date('Y-m-d H:i:s'),
                    'Video.name like "%'.$keywords.'%"'
                ),
                'order' => 'Video.created DESC',
                'limit' => 15
            ));
            Cache::write('hot_videos_search_'.Inflector::slug($keywords, '_'), $search_videos);
        } else {
            $search_videos = Cache::read('hot_videos_search_'.Inflector::slug($keywords, '_'));
        }
        $this->set('keyword', $keywords);
        $this->set('latest_videos', $search_videos);
    }
    
    public function ajaxSearchLoadMore() {

        $this->autoRender = false;
        $this->layout = false;
        $keywords = Sanitize::escape($_GET['keywords']);
        if(!$keywords) {
            return $this->redirect('/');
        }
//		$keywords_arr = explode(' ', $keywords);
//		$keywords = "+";
//		$keywords .= implode(" +", $keywords_arr);
        $page = (int) $_GET['page'];
        $limit = 15;

        $offset = ($page - 1) * $limit;

        $videos = $this->Video->find('all', array(
            'conditions' => array(
                'Video.status' => 1,
                'Video.publish_date <=' => date('Y-m-d H:i:s'),
                'Video.name like "%'.$keywords.'%"'
            ),
            'order' => 'Video.created DESC',
            'offset' => $offset,
            'limit' => $limit
        ));
        
        if (count($videos) > 0) {

            $view = new View($this, false);

            $view->set(compact('videos', $videos));
            $html = $view->render('ajaxLoadMoreCate');
        } else {
            $html = 'disabled';
        }
        echo $html;
        exit;
    }
}

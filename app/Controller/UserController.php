<?php
App::import('Utility', 'Validation');
require_once(WWW_APP.'Vendor/Facebook/autoload.php');
class UserController extends AppController
{
    public $name = 'User';

    public $uses = array('User', 'Video', 'VideoCategory');

    /**
     * Tính năng đăng ký tài khoản
     */
    public function register()
    {
        $data_post = $this->request->data;
        $error_message = '';
        if(!empty($data_post)){
            $data = $data_post['User'];
            if(!empty($data_post['txtCapcha']) && $data_post['txtCapcha'] == $this->Session->read('captcha')){
                if(!empty($data['fullname'])){
                    if(!empty($data['username'])){
                        $check_user = $this->_check_user($data['username']);
                        if($check_user['success']){
                            if(!empty($data['email'])){
                                $check_email = $this->_check_email($data['email']);
                                if($check_email['success']){
                                    if(!empty($data['password'])){
                                        if(!empty($data['re_password']) && $data['re_password'] == $data['password']){
                                            $user_insert = array(
                                                'id' => false,
                                                'username' => $data['username'],
                                                'gender' => 0,
                                                'active_key' => "",
                                                'fullname' => $data['fullname'],
                                                'email' => $data['email'],
                                                'password' => md5($data['password']),
                                                'status' => 1
                                            );
                                            $this->User->save($user_insert);
                                            $user_insert_id = $this->User->getInsertID();
                                            $user_login = $this->User->findById($user_insert_id);
                                            $this->Session->write('user', $user_login);
                                            echo '<script>alert("Đăng ký tài khoản thành công"); location.href="'.DOMAIN.'"</script>';
                                            die;
                                        }else{
                                            $error_message = 'Mật khẩu xác nhận không trùng khớp';
                                        }
                                    }else{
                                        $error_message = 'Bạn chưa nhập mật khẩu';
                                    }
                                }else{
                                    $error_message = $check_email['message'];
                                }
                            }else{
                                $error_message = 'Bạn chưa nhập email';
                            }
                        }else{
                            $error_message = $check_user['message'];
                        }
                    }else{
                        $error_message = 'Bạn phải nhập tên đăng nhập';
                    }
                }else{
                    $error_message = 'Bạn chưa nhập họ tên đầy đủ';
                }
            }else{
                $error_message = 'Mã xác nhận không đúng';
            }
        }
        $this->set('error_message', $error_message);
    }


    /**
     * check username
     * @param $username
     * @return bool
     */
    private function _check_user($username)
    {
        if(!empty($username)){
            if(preg_match("/[A-Za-z0-9-_]+$/", $username)){
                $check_user = $this->User->findByUsername($username);
                if(empty($check_user)){
                    return array('success' => true, 'message' => 'Thành công');
                }else{
                    return array('success' => false, 'message' => 'Tên tài khoản đã tồn tại trên hệ thống');
                }
            }else{
                return array('success' => false, 'message' => 'Tên tài khoản không đúng định dạng');
            }
        }else{
            return array('success' => false, 'message' => 'Bạn chưa nhập tên tài khoản');
        }
    }


    private function _check_email($email)
    {
        if(!empty($email)){
            if(Validation::email($email)){
                $check_email = $this->User->findByEmail($email);
                if(empty($check_email)){
                    return array('success' => true, 'message' => 'Thành công');
                }else{
                    return array('success' => false, 'message' => 'Email đã tồn tại trên hệ thống');
                }
            }else{
                return array('success' => false, 'message' => 'Email không đúng định dạng');
            }
        }else{
            return array('success' => false, 'message' => 'Bạn phải nhập email');
        }
    }

    /**
     * Chức năng kiểm tra tên tài khoản đã tồn tại chưa
     */
    public function check_user()
    {
        $this->autoLayout = false;
        $this->autoRender = false;
        $data = $this->request->query;
        $username = $data['username'];
        if(!empty($username)){
            if(preg_match("/[A-Za-z0-9-_]+$/", $username)){
                $check_user = $this->User->findByUsername($username);
                if(empty($check_user)){
                    echo '<span style="color: green;">Bạn có thể sử dụng</span>';
                }else{
                    echo '<span style="color: red;">Tên truy cập đã tồn tại trên hệ thống</span>';
                }
            }else{
                echo '<span style="color: red;">Tên truy cập không đúng định dạng</span>';
            }
        }else{
            echo '<span style="color: red;">Bạn phải nhập tên tài khoản</span>';
        }
    }

    /**
     * Chức năng kiểm tra user có tồn tại hay không
     */
    public function check_email()
    {
        $this->autoLayout = false;
        $this->autoRender = false;
        $data = $this->request->query;
        $email = $data['email'];
        if(!empty($email)){
            if(Validation::email($email)){
                $check_email = $this->User->findByEmail($email);
                if(empty($check_email)){
                    echo '<span style="color: green;">Bạn có thể sử dụng</span>';
                }else{
                    echo '<span style="color: red;">Email đã tồn tại trên hệ thống</span>';
                }
            }else{
                echo '<span style="color: red;">Email không đúng định dạng</span>';
            }
        }else{
            echo '<span style="color: red;">Bạn phải nhập email</span>';
        }
    }

    /**
     * Tính năng đăng nhập qua facebook
     * Gọi sang API xác nhận truy cập facebook
     * Nếu đã có tài khoản này rồi thì login
     * Nếu chưa có thì tạo tài khoản cho KH. Để mật khẩu bằng trống
     * Đến lúc kiểm
     */
    public function login_facebook()
    {
        if (!session_id()) {
            session_start();
        }

        $this->autoLayout = false;
        $this->autoRender = false;

        $fb = new Facebook\Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_APP_SECRET,
            'default_graph_version' => 'v2.2',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
           /* echo 'Graph returned an error: ' . $e->getMessage();
            exit;*/
            //get login url, if login error: retry login via login url
            $permissions = ['email', 'public_profile']; // Optional permissions
            $loginUrl = $helper->getLoginUrl(DOMAIN.Router::url(array('controller' => 'User', 'action' => 'login_facebook')), $permissions);
            $login_href = htmlspecialchars($loginUrl);
            $this->redirect($login_href);
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            /*echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;*/
            //get login url, if login error: retry login via login url
            $permissions = ['email', 'public_profile']; // Optional permissions
            $loginUrl = $helper->getLoginUrl(DOMAIN.Router::url(array('controller' => 'User', 'action' => 'login_facebook')), $permissions);
            $login_href = htmlspecialchars($loginUrl);
            $this->redirect($login_href);
        }

        if (! isset($accessToken)) {
            $permissions = ['email', 'public_profile']; // Optional permissions
            $loginUrl = $helper->getLoginUrl(DOMAIN.Router::url(array('controller' => 'User', 'action' => 'login_facebook')), $permissions);
            $login_href = htmlspecialchars($loginUrl);
            $this->redirect($login_href);

            /*if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;*/
        }

        // Logged in
        //echo '<h3>Access Token</h3>';
        //var_dump($accessToken->getValue());

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Get the access token metadata from /debug_token
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        //echo '<h3>Metadata</h3>';
        //var_dump($tokenMetadata);

        // Validation (these will throw FacebookSDKException's when they fail)
        $tokenMetadata->validateAppId(FB_APP_ID);
        // If you know the user ID this access token belongs to, you can validate it here
        //$tokenMetadata->validateUserId('123');
        $tokenMetadata->validateExpiration();

        $response = $fb->get('/me?fields=id,name,email, gender', $accessToken->getValue());

        $user_fb = $response->getGraphUser();

        /**
         * check xem user da ton tai chua
         * Neu chua ton tai thi tao tai khoan cho user
         * con neu ton tai roi thi login vao cho user va redirect sang trang chu
        */
        $check_user = $this->User->findByUsername($user_fb['id']);
        if(!empty($check_user)){
            $this->Session->write('user', $check_user);
        }else{
            $user_insert = array(
                'id' => false,
                'username' => $user_fb['id'],
                'password' => '123456',
                'gender' => 0,
                'active_key' => "",
                'phone' => '123456',
                'captcha' => '123456',
                'email' => $user_fb['email'],
                'fullname' => $user_fb['name'],
                'avatar' => 'https://graph.facebook.com/'.$user_fb['id'].'/picture?type=large',
                'status' => 1
            );
            $this->User->save($user_insert);
            $user_insert_id = $this->User->getInsertID();
            $user_login = $this->User->findById($user_insert_id);
            $this->Session->write('user', $user_login);
        }
        $_SESSION['fb_access_token'] = (string) $accessToken;

        $this->redirect(DOMAIN);
    }

    /**
     * Tính năng login thường
     * User nhập tên tài khoản và mật khẩu để login vào tài khoản
     */
    public function login()
    {
        $data = $this->request->data;
        $error_message = '';
        if(!empty($data)){
            if(!empty($data['username']) && !empty($data['password'])){
                $username = $data['username'];
                $password = md5($data['password']);
                $check_user = $this->User->check_user($username, $password);
                if(!empty($check_user)){
                    $this->Session->write('user', $check_user);
                    $this->redirect(DOMAIN);
                }else{
                    $error_message = 'Tên tài khoản hoặc mật khẩu không đúng';
                }
            }else{
                $error_message = 'Bạn phải nhập đầy đủ thông tin';
            }
        }
        $this->set('error_message', $error_message);
    }

    /**
     * Hiển thị thông tin của KH
     * Cho phép khách hàng đăng nhập từ facebook đc cập nhật tài khoản
     */
    public function user_info()
    {
        if($user = $this->Session->read('user')){
            $data = $this->request->data;
            if(empty($data['User']['password'])){
                unset($data['User']['password']);
            }else{
                if($data['User']['password'] != $data['User']['repassword']){
                    $this->Session->setFlash(__('Mật khẩu không trùng khớp.', true));
                    $this->redirect(array('Controller' => 'User', 'action' => 'user_info'));
                }else{
                    $data['User']['password'] = md5($data['User']['password']);
                }
            }
            if(!empty($data)){
                $update_user = array(
                    'id' => $user['User']['id'],
                    'fullname' => $data['User']['fullname'],
                    'email' => $data['User']['email']
                );
                if(!empty($data['User']['password'])){
                    $update_user['password'] = $data['User']['password'];
                }
                if(!empty($data['User']['avatar']['name']) && $data['User']['avatar']['error'] == '0'){
                    //upload file to server
                    $target_dir = WWW_ROOT."uploads".DS;
                    $extends = explode('.', $data['User']['avatar']['name']);
                    $extends = $extends[1];
                    if(in_array($extends, array('jpg', 'jpeg', 'png', 'gif', 'bmp'))){
                        $file = basename('upload_'.date('YmdHis').'_'.substr(md5(time()), 0, 5).'.'.$extends);
                        $target_file = $target_dir . $file;
                        if(move_uploaded_file($data['User']['avatar']["tmp_name"], $target_file)) {
                            $update_user['avatar'] = DOMAIN.'uploads/'.$file;
                        }
                    }
                }
                if($this->User->save($update_user)){
                    $this->Session->setFlash(__('Cập nhật thông tin thành công!', true));
                }
            }
            $this->data = $this->User->findById($user['User']['id']);
        }else{
            $this->redirect(array('Controller' => 'User', 'action' => 'login'));
        }
    }


    /**
     * Chức năng video của tôi
     * list ra danh sách video đã đăng của user
     */
    public function my_video()
    {
        if($user = $this->Session->read('user')){
            if (!$hot_videos = Cache::read('hot_videos_home')) {
                $hot_videos = $this->Video->find('all', array(
                    'conditions' => array(
                        'Video.status' => 1,
                        'Video.is_hot_home' => 1
                    ),
                    'order' => 'Video.created DESC',
                    'limit' => 6
                ));
                Cache::write('hot_videos_home', $hot_videos);
            }
            $this->set('hot_video', $hot_videos);

            $my_video = $this->Video->find(
                'all', array(
                    'conditions' => array(
                        'created_by' => $user['User']['id']),
                    'order' => array('Video.id' => 'DESC'),
                    'limit' => 20
                )
            );
            $this->set('my_video', $my_video);
        }else{
            $this->redirect(array('Controller' => 'User', 'action' => 'login'));
        }
    }

    public function edit_video($id = null)
    {
        if($user = $this->Session->read('user')){
            if(!empty($id)){
                $list_cat = $this->VideoCategory->find(
                    'list', array(
                        'fields' => array(
                            'VideoCategory.id', 'VideoCategory.name'
                        )
                    )
                );
                $this->set('list_cat', $list_cat);


                $check_video = $this->Video->find(
                    'first', array(
                        'conditions' => array(
                            'Video.created_by' => $user['User']['id'],
                            'Video.id' => $id
                        )
                    )
                );
                if(!empty($check_video)){
                    $data_post = $this->request->data;
                    if(!empty($data_post)){
                        $data = $data_post['Video'];

                        //check validate data
                        if(empty($data['name'])){
                            $this->set('error_message', 'Bạn phải nhập tiêu đề video');
                            return $this->view;
                        }else if(empty($data['video_category_id'])){
                            $this->set('error_message', 'Bạn phải chọn thể loại cho video');
                            return $this->view;
                        }else if(empty($data['description'])){
                            $this->set('error_message', 'Bạn phải nhập mô tả cho video');
                            return $this->view;
                        }else if(empty($data['content'])){
                            $this->set('error_message', 'Bạn phải nhập nội dung cho video');
                            return $this->view;
                        }

                        $update_video = array(
                            'id' => $id,
                            'description' => $data['description'],
                            'content' => $data['content']
                        );

                        if(empty($data['link_youtube'])){
                            $target_dir = WWW_ROOT."uploads".DS;

                            if(!empty($data['images']['name'])){
                                if(empty($data['images']['name']) || $data['images']['error'] > 0 ||
                                    !in_array($data['images']['type'], array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp')) ||
                                    $data['images']['error'] > 5 * 1024 * 1024
                                ){
                                    $this->set('error_message', 'Ảnh đại diện không hợp lệ. Ảnh phải thuộc định dạng gif/jpg/jpeg/png/bmp và dung lượng nhỏ hơn 5Mb');
                                    return $this->view;
                                }else{
                                    //upload anh
                                    $image_ext = explode('.', $data["images"]["name"]);
                                    $image_ext = !empty($image_ext[1]) ? $image_ext[1] : 'jpg';
                                    $image_file_name = basename('upload_'.date('YmdHis').'_'.substr(md5(time()), 0, 5).'.'.$image_ext);
                                    $target_file = $target_dir . $image_file_name;
                                    if(move_uploaded_file($data["images"]["tmp_name"], $target_file)) {
                                        $link_image = DOMAIN.'uploads/'.$image_file_name;
                                        $update_video['images'] = $link_image;
                                    }else{
                                        $this->set('error_message', 'Upload ảnh đại diện không thành công. Mời bạn thử lại sau');
                                        return $this->view;
                                    }
                                }
                            }

                            if(!empty($data['upload_file']['name'])){
                                if(empty($data['upload_file']['name']) || $data['upload_file']['error'] > 0 ||
                                    !in_array($data['upload_file']['type'], array('video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/3gp')) ||
                                    $data['upload_file']['error'] > 50 * 1024 * 1024
                                ){
                                    $this->set('error_message', 'Video không hợp lệ. Video phải thuộc định dạng mp4/wav/flv/ và dung lượng nhỏ hơn 50Mb');
                                    return $this->view;
                                }else{
                                    //upload video
                                    $video_ext = explode('.', $data["upload_file"]["name"]);
                                    $video_ext = !empty($video_ext[1]) ? $video_ext[1] : 'mp4';
                                    $video_file_name = basename('upload_'.date('YmdHis').'_'.substr(md5(time()), 0, 5).'.'.$video_ext);
                                    $target_file = $target_dir . $video_file_name;
                                    if(move_uploaded_file($data["upload_file"]["tmp_name"], $target_file)) {
                                        $link_video = DOMAIN.'uploads/'.$video_file_name;
                                        $update_video['link'] = $link_video;
                                    }else{
                                        $this->set('error_message', 'Upload video không thành công. Mời bạn thử lại sau');
                                        return $this->view;
                                    }
                                }
                            }
                        }else{
                            /**
                             * Link video có 2 dạng:
                             * 1: https://youtu.be/DNTALvv3Trg
                             * 2: https://www.youtube.com/watch?v=DNTALvv3Trg
                             * => Cắt lấy ID để lấy ảnh video
                             */
                            if(!empty($data['link_youtube'])){
                                $link_video = $data['link_youtube'];
                                $youtube_id = str_replace(array('https', ':', '//', 'www.youtube.com/watch?v=', 'youtu.be/'), '', $link_video);
                                $link_image = 'https://i.ytimg.com/vi/'.$youtube_id.'/maxresdefault.jpg';
                                $update_video['images'] = $link_image;
                                $update_video['link'] = $link_video;
                            }
                        }

                        $this->Video->save($update_video);
                        echo '<script>alert("Sửa video thành công"); location.href="'.Router::url(array('controller' => 'User', 'action' => 'my_video')).'"</script>';
                    }else{
                        $this->data = $check_video;
                    }
                }else{
                    $this->redirect(array('controller' => 'User', 'action' => 'my_video'));
                }
            }else{
                $this->redirect(array('controller' => 'User', 'action' => 'my_video'));
            }
        }else{
            $this->redirect(array('Controller' => 'User', 'action' => 'login'));
        }
    }

    public function delete_video($id = null)
    {
        if($user = $this->Session->read('user')){
            if(!empty($id)){
                $check_video = $this->Video->find(
                    'first', array(
                        'conditions' => array(
                            'Video.created_by' => $user['User']['id'],
                            'Video.id' => $id
                        )
                    )
                );
                if(!empty($check_video)){
                    $this->Video->delete($id);
                    echo '<script>alert("Xóa video thành công"); location.href="'.Router::url(array('controller' => 'User', 'action' => 'my_video')).'"</script>';
                }else{
                    $this->redirect(array('controller' => 'User', 'action' => 'my_video'));
                }
            }else{
                $this->redirect(array('controller' => 'User', 'action' => 'my_video'));
            }
        }else{
            $this->redirect(array('Controller' => 'User', 'action' => 'login'));
        }
    }

    /**
     * Chức năng upload video của người dùng
     */
    public function upload_video()
    {
        if($user = $this->Session->read('user')){
            $list_cat = $this->VideoCategory->find(
                'list', array(
                    'fields' => array(
                        'VideoCategory.id', 'VideoCategory.name'
                    )
                )
            );
            $this->set('list_cat', $list_cat);

            $data_post = $this->request->data;
            if(!empty($data_post)){
                $data = $data_post['Video'];
                //check validate data
                if(empty($data['name'])){
                    $this->set('error_message', 'Bạn phải nhập tiêu đề video');
                    return $this->view;
                }else if(empty($data['video_category_id'])){
                    $this->set('error_message', 'Bạn phải chọn thể loại cho video');
                    return $this->view;
                }else if(empty($data['description'])){
                    $this->set('error_message', 'Bạn phải nhập mô tả cho video');
                    return $this->view;
                }else if(empty($data['content'])){
                    $this->set('error_message', 'Bạn phải nhập nội dung cho video');
                    return $this->view;
                }

                if(empty($data['link_youtube'])){
                    if(empty($data['upload_file']['name']) || $data['upload_file']['error'] > 0 ||
                        !in_array($data['upload_file']['type'], array('video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/3gp')) ||
                        $data['upload_file']['error'] > 50 * 1024 * 1024
                    ){
                        $this->set('error_message', 'Video không hợp lệ. Video phải thuộc định dạng mp4/wav/flv/ và dung lượng nhỏ hơn 50Mb');
                        return $this->view;
                    }else if(empty($data['images']['name']) || $data['images']['error'] > 0 ||
                        !in_array($data['images']['type'], array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp')) ||
                        $data['images']['error'] > 5 * 1024 * 1024
                    ){
                        $this->set('error_message', 'Ảnh đại diện không hợp lệ. Ảnh phải thuộc định dạng gif/jpg/jpeg/png/bmp và dung lượng nhỏ hơn 5Mb');
                        return $this->view;
                    }else{
                        $target_dir = WWW_ROOT."uploads".DS;

                        //upload anh
                        $image_ext = explode('.', $data["images"]["name"]);
                        $image_ext = !empty($image_ext[1]) ? $image_ext[1] : 'jpg';
                        $image_file_name = basename('upload_'.date('YmdHis').'_'.substr(md5(time()), 0, 5).'.'.$image_ext);
                        $target_file = $target_dir . $image_file_name;
                        if(move_uploaded_file($data["images"]["tmp_name"], $target_file)) {
                            $link_image = DOMAIN.'uploads/'.$image_file_name;
                        }else{
                            $this->set('error_message', 'Upload ảnh đại diện không thành công. Mời bạn thử lại sau');
                            return $this->view;
                        }

                        //upload video
                        $video_ext = explode('.', $data["upload_file"]["name"]);
                        $video_ext = !empty($video_ext[1]) ? $video_ext[1] : 'mp4';
                        $video_file_name = basename('upload_'.date('YmdHis').'_'.substr(md5(time()), 0, 5).'.'.$video_ext);
                        $target_file = $target_dir . $video_file_name;
                        if(move_uploaded_file($data["upload_file"]["tmp_name"], $target_file)) {
                            $link_video = DOMAIN.'uploads/'.$video_file_name;
                        }else{
                            $this->set('error_message', 'Upload video không thành công. Mời bạn thử lại sau');
                            return $this->view;
                        }
                    }
                }else{
                    /**
                     * Link video có 2 dạng:
                     * 1: https://youtu.be/DNTALvv3Trg
                     * 2: https://www.youtube.com/watch?v=DNTALvv3Trg
                     * => Cắt lấy ID để lấy ảnh video
                     */
                    $link_video = $data['link_youtube'];
                    $youtube_id = str_replace(array('https', ':', '//', 'www.youtube.com/watch?v=', 'youtu.be/'), '', $link_video);
                    $link_image = 'https://i.ytimg.com/vi/'.$youtube_id.'/maxresdefault.jpg';
                }

                $insert_video = array(
                    'name' => $data['name'],
                    'video_category_id' => $data['video_category_id'],
                    'alias' => Inflector::slug(strtolower($data['name']), '-'),
                    'link' => $link_video,
                    'images' => $link_image,
                    'status' => 0,
                    'type' => $data_post['upload_type'] == '1' ? '0' : '1',
                    'created_by' => $user['User']['id'],
                    'description' => $data['description'],
                    'content' => $data['content'],
                    'is_user_upload' => '1'
                );
                $this->Video->save($insert_video);
                $error_message = 'Upload thành công. Video của bạn sẽ được kiểm duyệt trước khi lên trang chủ';
                $this->set('error_message', $error_message);
            }
        }else{
            $this->redirect(array('Controller' => 'User', 'action' => 'login'));
        }
    }

    /**
     * Chức năng thoát
     */
    public function logout()
    {
        $this->Session->delete('user');
        $this->Session->delete('failed_time');
        $this->Session->delete('shopping_cart');
        unset($_SESSION['fb_access_token']);
        $this->redirect(DOMAIN);
    }

    /**
     * Chức năng tạo captcha
     */
    public function captcha()
    {
        $this->autoRender = false;
        $this->autoLayout = false;
        if(!isset($this->Captcha))	{
            $this->Captcha = $this->Components->load('Captcha', array(
                'width' => 130,
                'height' => 35,
                'characters' => 5,
                'theme' => 'default',
            ));
        }
        $this->Captcha->create();
    }



}
?>
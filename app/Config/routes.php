<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'Home', 'action' => 'index', 'home'));
        Router::connect('/danh-muc/*', array('controller' => 'Video', 'action' => 'category'));
        Router::connect('/chi-tiet/*', array('controller' => 'Video', 'action' => 'detail'));
        Router::connect('/clip-moi.html', array('controller' => 'Video', 'action' => 'latest'));
        Router::connect('/clip-hot.html', array('controller' => 'Video', 'action' => 'topHot'));
        Router::connect('/clip-binh-chon.html', array('controller' => 'Video', 'action' => 'topVote'));
        Router::connect('/dang-ky.html', array('controller' => 'User', 'action' => 'register'));
        Router::connect('/dang-nhap.html', array('controller' => 'User', 'action' => 'login'));
        Router::connect('/dang-video.html', array('controller' => 'User', 'action' => 'upload_video'));
        Router::connect('/login-facebook.html', array('controller' => 'User', 'action' => 'login_facebook'));
        Router::connect('/ho-so-ca-nhan.html', array('controller' => 'User', 'action' => 'user_info'));
        Router::connect('/video-cua-toi.html', array('controller' => 'User', 'action' => 'my_video'));
        Router::connect('/sua-video/*', array('controller' => 'User', 'action' => 'edit_video'));
        Router::connect('/tim-kiem.html', array('controller' => 'Video', 'action' => 'search'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

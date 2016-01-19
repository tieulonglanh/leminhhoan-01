<div id="top">
    <header id="header-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2" style="padding: 0px;">
                    <div class="header_menu_hidden_btn hidden-lg hidden-md">
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/" title="Xôn xao - Phim Ngắn Hài Hước">
                            <img width="161px" height="42px" alt="Xôn xao - Phim Ngắn Hài Hước" src="/images/logoxx.png">
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="collapse navbar-collapse" id="search-navbar-collapse">
                       <form class="navbar-form navbar-left" role="search" action="<?php echo DOMAIN ?>tim-kiem.html">
                            <div class="form-group">
                                <input id="ip-search" name="keywords" type="text" class="form-control" value="<?php if(isset($keyword)) echo $keyword; ?>" placeholder="Tìm kiếm video của bạn...">
                            </div>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="<?php echo DOMAIN ?>clip-moi.html">Mới</a></li>
                            <li><a href="<?php echo DOMAIN ?>clip-hot.html"> <i class="fa fa-fire"></i> Hot</a></li>
                            <li><a href="<?php echo DOMAIN ?>clip-binh-chon.html"><i class="fa fa-hand-o-up"></i> Bình chọn</a></li>
                            <li class="dropdown"><a href="">Thể loại</a>
                                <?php $video_category = $this->requestAction(array('controller'=>'Video','action'=>'getVideoCategory'));
                                ?>
                                <ul class="dropdown-menu">
                                    <?php foreach($video_category as $category): ?>
                                        <li>
                                            <?php echo $this->Html->link(
                                                $category['VideoCategory']['name'],
                                                array('controller' => 'Video', 'action' => 'category', $category['VideoCategory']['alias']),
                                                array('title' => '[Xôn xao] - '.$category['VideoCategory']['name'])
                                            ); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li ><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'upload_video')); ?>" > <i class="fa fa-cloud-upload"></i> Upload</a></li>
                            <?php if($user = $this->Session->read('user')){
                                ?>
                                <li class="dropdown">
                                    <a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'user_info')); ?>">
                                        <?php
                                        if(!empty($user['User']['avatar'])){
                                            $avatar = $user['User']['avatar'];
                                        }else{
                                            $avatar = DOMAIN.'images/user_default.png';
                                        }
                                        ?>
                                        <img width="30" height="30" src="<?php echo $avatar ?>">
                                        <?php echo $this->Text->truncate($user['User']['fullname'], 10); ?></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'user_info')); ?>">Hồ sơ cá nhân</a></li>
                                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'my_video')); ?>">Video của tôi</a></li>
                                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'logout')); ?>">Đăng xuất</a></li>
                                    </ul>
                                </li>
                                <?php
                            }else{ ?>
                                <li ><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'register')); ?>">Đăng ký</a></li>
                                <li ><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'login')); ?>">Đăng nhập</a></li>
                            <?php }?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>
    </header><!--End header-->

    <div class="header_menu_fix_left hidden-lg hidden-sm">
        <ul>
            <li><a href="<?php echo DOMAIN ?>clip-moi.html">Mới</a></li>
            <li><a href="<?php echo DOMAIN ?>clip-hot.html"> <i class="fa fa-fire"></i> Hot</a></li>
            <li><a href="<?php echo DOMAIN ?>clip-binh-chon.html"><i class="fa fa-hand-o-up"></i> Bình chọn</a></li>
            <li>
                <a href="">Thể loại</a>
                <?php $video_category = $this->requestAction(array('controller'=>'Video','action'=>'getVideoCategory'));
                ?>
                <ul>
                    <?php foreach($video_category as $category): ?>
                    <li>
                        <?php echo $this->Html->link(
                                $category['VideoCategory']['name'],
                                array('controller' => 'Video', 'action' => 'category', $category['VideoCategory']['alias']),
                                array('title' => '[Xôn xao] - '.$category['VideoCategory']['name'])
                            ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php if($user = $this->Session->read('user')){
                ?>
                <li>
                    <a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'user_info')); ?>">
                        <label style="color: red;"><?php echo 'Xin chào: '.$user['User']['fullname'] ?></label>
                    </a>
                    <ul>
                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'user_info')); ?>">Hồ sơ cá nhân</a></li>
                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'my_video')); ?>">Video của tôi</a></li>
                        <li><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'logout')); ?>">Đăng xuất</a></li>
                    </ul>
                </li>
            <?php
            }else{ ?>
                <li ><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'register')); ?>">Đăng ký</a></li>
                <li ><a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'login')); ?>">Đăng nhập</a></li>
            <?php }?>
        </ul>
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('.header_menu_hidden_btn').click(function(){
            $('.header_menu_fix_left').toggle(300);
            $(this).toggleClass('menu_fix_active');
        });
    });
</script>
<div style="margin-bottom: 60px; display: block;"></div>
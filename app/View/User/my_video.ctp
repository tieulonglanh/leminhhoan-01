<div class="container">
    <div class="col-xs-12 col-sm-8 col-md-8" id="content">
        <div class="content-inner">
            <!--Start Phim ngan hai uoc moi-->
            <div class="mm-short-film funny-video">
                <h2 class="branded-page-module-title">
                    <span class="mm-link-video branded-page-module-title-text">Danh sách video của bạn  </span>
                </h2>

                <div class="clear"></div>
                <!--Start list new video-->
                <div class="mm-new-video list">
                    <?php
                    if(!empty($my_video)){
                        foreach($my_video as $key => $value){
                    ?>
                        <div class="row">
                            <div class="col-md-5 row-video">
                                <div class="box-inner">
                                    <div class="mm-iframe-fr-yt">
                                        <a href="<?php echo Router::url(array('controller' => 'Video', 'action' => 'detail',$value['Video']['alias'])); ?>" title="<?php echo $value['Video']['name']; ?>">
                                            <img width="100%" height="auto" src="<?php echo $value['Video']['images']; ?>" alt="<?php echo $value['Video']['name']; ?>">
                                            <div class="icon_play"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 row-video">
                                <div class="mm-video-info">
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <a href="<?php echo Router::url(array('controller' => 'Video', 'action' => 'detail',$value['Video']['alias'])); ?>" class="mm-link-vd" title="<?php echo $value['Video']['name']; ?>">
                                                <?php echo $value['Video']['name']; ?>
                                            </a>
                                        </div>
                                        <div class="mm-lockup-meta">
                                            <p>Đăng bởi:  <a href="#"> <?php echo $value['User']['fullname']; ?> </a> - <?php echo $value['Video']['created']; ?></p>
                                            <ul class="mm-lockup-meta-info clearfix clearfix">
                                                <li><i class="fa fa-eye"></i> <?php echo number_format($value['Video']['view'], 0, ',', '.'); ?></li>
                                                <li><i class="fa fa-comment-o"></i> 0</li>
                                                <li><i class="fa fa-thumbs-o-up"></i> <?php echo number_format($value['Video']['vote'], 0, ',', '.'); ?></li>
                                                <li>
                                                    <a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'edit_video', $value['Video']['id'])); ?>">
                                                        <i class="fa fa-edit"></i> Sửa video
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="<?php echo Router::url(array('controller' => 'User', 'action' => 'delete_video', $value['Video']['id'])); ?>">
                                                        <i class="fa fa-close"></i> Xóa video
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }else{
                        echo '<p style="font-weight: bold; text-align: center;">Bạn chưa đăng video nào cả.</p>';
                    }
                    ?>
                </div><!--End list new video-->
            </div>
        </div>
    </div><!--End content-->
    <aside class="col-xs-12 col-sm-4 col-md-4" id="sidebar">
        <!--Sidebar-->
        <div class="sidebar-inner">
            <div class="user_info_sidebar" style="padding: 15px 0px;">
                <?php
                $user = $this->Session->read('user');
                if(!empty($user['User']['avatar'])){
                    $avatar = $user['User']['avatar'];
                }else{
                    $avatar = DOMAIN.'images/user_default.png';
                }
                ?>
                <div class="user_info_sidebar_img">
                    <p>
                        <img width="150" height="150" src="<?php echo $avatar ?>">
                    </p>
                </div>
                <label>Thông tin cá nhân</label>
                <label>Thông tin cá nhân</label>
                <p>
                    <label>Họ tên: </label> <?php echo $user['User']['fullname']; ?>
                </p>
                <p>
                    <label>Email: </label> <?php echo $user['User']['email']; ?>
                </p>
            </div>
            <div id="top-video-sidebar" class="video-sidebar">
                <div class="box-inner">
                    <h3 class="sidebar-title">
                        <span class="mm-link-video sidebar-title-text">
                             VIDEO HOT
                        </span>
                    </h3>
                    <ul class="mm-video-hot list-video">
                        <?php
                        if(!empty($hot_video)){
                            foreach($hot_video as $key => $value){
                        ?>
                        <li class="video-list-item hot-list-item show-video-view ">
                            <div class="thumb-wrapper">
                                <a title="<?php echo $value['Video']['name']; ?>" href="<?php echo Router::url(array('controller' => 'Video', 'action' => 'detail',$value['Video']['alias'])); ?>" tabindex="-1">
                                <span class="mm-thum-wrap" tabindex="0" data-mmid="PaYfFXJVzks">
                                    <img src="<?php echo $value['Video']['images']; ?>" alt="<?php echo $value['Video']['name']; ?>" width="100%">
                                    <div class="play-icon"></div>
                                </span>
                                </a>
                            </div>

                            <div class="content-wrapper">
                                <a href="<?php echo Router::url(array('controller' => 'Video', 'action' => 'detail',$value['Video']['alias'])); ?>" class="mm-hot-link-video mm-link-video" title="<?php echo $value['Video']['name']; ?>">
                                    <span class="title"><?php echo $value['Video']['name']; ?></span>
                                </a>
                            </div>
                        </li>
                        <?php
                            }
                        }
                        ?>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
</div>
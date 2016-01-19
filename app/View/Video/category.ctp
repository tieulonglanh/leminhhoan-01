<!--Start main content-->
<section class="main-content-wrap">

    <!-- hot -->

    <div class="stage">
        <div class="container">
            <!--<div class="row main-content-inner"> -->
            <div class="col-xs-12 col-sm-12 col-md-12" id="content">
                <div class="feature top-video">
                    <div class="row ft-video">
                        <div class="col-xs-12 col-sm-8 feature_one">
                            <div class="box-inner">
                                <div class="mm-iframe-fr-yt">
                                    <?php echo $this->Html->link(
                                        '<span class="wapImg"></span>',
                                        array('controller' => 'Video', 'action' => 'detail', $category_videos[0]['Video']['alias']), array('escape' => false, 'title' => $category_videos[0]['Video']['name'])
                                    ); ?>
                                    
                                        <img src="<?php echo $category_videos[0]['Video']['images'] ?>" alt="<?php echo '[Xôn xao] - ' . $category_videos[0]['Video']['name'] ?>" />
                                        <div class="icon_play"></div>
                                    
                                </div>
                                <div class="mm-video-info">
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <?php echo $this->Html->link(
                                                '[Xôn xao] - ' . $category_videos[0]['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail', $category_videos[0]['Video']['alias']),
                                                array('title' => '[Xôn xao] - '.$category_videos[0]['Video']['name'], 'class'=> 'mm-link-vd')
                                            ); ?>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 feature_two">
                            <div class="box-inner">
                                <div class="mm-iframe-fr-yt">
                                    <?php echo $this->Html->link(
                                        '<span class="wapImg"></span>',
                                        array('controller' => 'Video', 'action' => 'detail', $category_videos[1]['Video']['alias']), array('escape' => false, 'title' => $category_videos[1]['Video']['name'])
                                    ); ?>
                                        <img src="<?php echo $category_videos[1]['Video']['images'] ?>" alt="[xôn xao] <?php echo $category_videos[1]['Video']['name']; ?>" />
                                        <div class="icon_play"></div>
                                    
                                </div>
                                <div class="mm-video-info">
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <?php echo $this->Html->link(
                                                '[Xôn xao] - ' . $category_videos[1]['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail', $category_videos[1]['Video']['alias']),
                                                array('title' => '[Xôn xao] - '.$category_videos[1]['Video']['name'], 'class'=> 'mm-link-vd')
                                            ); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 feature_two">
                            <div class="box-inner">
                                <div class="mm-iframe-fr-yt">
                                    <?php echo $this->Html->link(
                                        '<span class="wapImg"></span>',
                                        array('controller' => 'Video', 'action' => 'detail', $category_videos[2]['Video']['alias']), array('escape' => false, 'title' => $category_videos[2]['Video']['name'])
                                    ); ?>
                                        <img src="<?php echo $category_videos[2]['Video']['images'] ?>" alt="[xôn xao] <?php echo $category_videos[2]['Video']['name']; ?>" />
                                        <div class="icon_play"></div>
                                    
                                </div>
                                <div class="mm-video-info">
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <?php echo $this->Html->link(
                                                '[Xôn xao] - ' . $category_videos[2]['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail', $category_videos[2]['Video']['alias']),
                                                array('title' => '[Xôn xao] - '.$category_videos[2]['Video']['name'], 'class'=> 'mm-link-vd')
                                            ); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="array_hot" name="array_hot" value="275,274,242" />
                        <input type="hidden" id="array_vote" name="array_vote" value="" />
                    </div>
                </div>
            </div>
            <!--</div>-->
        </div>
    </div>

    <!-- text -->


    <!-- content + sidebar -->
    <div class="container">
        <div class="row main-content-inner">            
            <!--Start content-->
            <div class="col-xs-12 col-sm-8 col-md-8" id="content">
                <div class="content-inner">
                    <!--Start Top video-->
                    <div class="feature top-video">
                        <div class="desc-site">
                            <b>Xôn xao</b>: Series phim ngắn hài, tổng hợp video clip hài hay và Hot nhất
                        </div>
                    </div>
                </div>
                <div class="content-inner">
                    <div class="mm-banner-ads banner-728x90">
                        <div id="ads_script_5" style="margin:0px 0px 0px 0px;display: inline-block;">
                            <?php if(isset($ads_center_hot)): if($ads_center_hot['Advertisement']['type'] == 1): ?>
                                <a href="<?php echo $ads_center_hot['Advertisement']['link']; ?>"><img style="width: 728px; height: 90px;" src="<?php echo $ads_center_hot['Advertisement']['images']; ?>" /></a>
                            <?php else: ?>
                                <?php echo $ads_center_hot['Advertisement']['script']; ?>
                            <?php endif; endif; ?>
                        </div>
                    </div>
                </div>
                <div class="content-inner">

                    <div class="clear"></div>
                    <!--Start list new video-->
                    <div class="mm-new-video row" id="result">
                        <!--Video new 1-->
                        <?php foreach($latest_videos as $video): ?>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="col-md-12 row-video">
                                <div class="box-inner">
                                    <div class="mm-iframe-fr-yt">
                                        <?php echo $this->Html->link(
                                            '<img width="100%" height="140px;" src="'.$video["Video"]["images"].'" alt="'.$video["Video"]["name"] .'" />
                                            <div class="icon_play"></div>',
                                            array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                                        ); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 row-video">
                                <div class="mm-video-info" >
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <?php echo $this->Html->link(
                                                $video['VideoCategory']['name'] .': '. $video['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail',$video['Video']['alias']),
                                                array('title' => '[Xôn xao] - '.$video['Video']['name'], 'class'=> 'mm-link-vd')
                                            ); ?>
                                        </div>
                                        <div class="mm-lockup-meta">
                                            <p>Đăng bởi:  <a href="#"> <?php echo isset($video['User']['fullname'])?$video['User']['fullname']:$video['Video']['User']['username']; ?> </a> - <?php echo $video['Video']['created'] ?></p>
                                            <ul class="mm-lockup-meta-info clearfix clearfix">
                                                <li><i class="fa fa-eye"></i> <?php echo $video['Video']['view'] ?></li>
                                                <li><i class="fa fa-thumbs-o-up"></i> <?php echo $video['Video']['vote'] ?></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div><!--End list new video-->

                    <!--Start button load more video-->
                    <div id="load-more-video" class="mm-load-more">
                        <div class="box-inner">
                            <div id="loader"><span></span> Loading...</div>
                            <button class="btn-default btn mm-btn-load-more" type="button" page='2' category_id="<?php echo $category_id; ?>" url="<?php echo DOMAIN.'Video/ajaxCateLoadMore' ?>">
                                <span class="mm-uix-button-content">Xem Tiếp <i class="fa fa-angle-right"></i></span>
                            </button>
                        </div>
                    </div><!--End button load more video-->
                    <div class="content-inner">
                        <div class="mm-banner-ads banner-728x90">
                            <div id="ads_script_5" style="margin:0px 0px 0px 0px;display: inline-block;">
                                <?php if(isset($ads_bottom_hot)): if($ads_bottom_hot['Advertisement']['type'] == 1): ?>
                                <a href="<?php echo $ads_bottom_hot['Advertisement']['link']; ?>"><img style="width: 728px; height: 90px;" src="<?php echo $ads_bottom_hot['Advertisement']['images']; ?>" /></a>
                                <?php else: ?>
                                    <?php echo $ads_bottom_hot['Advertisement']['script']; ?>
                                <?php endif; endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!--End content-->
            <aside class="col-xs-12 col-sm-4 col-md-4" id="sidebar">
                <div class="sidebar-inner">
                    <div class="banner-336x280 mm-banner-ads">
                        <div  id="ads_script_4" style="margin:0px 0px 0px 0px;display: inline-block;">
                            <?php if(isset($ads_right_hot)): if($ads_right_hot['Advertisement']['type'] == 1): ?>
                            <a href="<?php echo $ads_right_hot['Advertisement']['link']; ?>"><img style="width: 336px; height: 280px;" src="<?php echo $ads_right_hot['Advertisement']['images']; ?>" /></a>
                                <?php else: ?>
                                    <?php echo $ads_right_hot['Advertisement']['script']; ?>
                                <?php endif;endif; ?>
                        </div>
                    </div>
                </div>
                <!--Sidebar-->
                <div class="sidebar-inner">
                    <div class="clear"> </div>
                    <div class="scroll_top"> 
                        <br/>
                        <div id="top-video-sidebar" class="video-sidebar">
                            <div class="box-inner">
                                <h3 class="sidebar-title">
                                    <span class="mm-link-video sidebar-title-text">
                                        VIDEO HOT                         </span>
                                </h3>
                                <ul class="mm-video-hot list-video">
                                    <!-- video 0 -->
                                    <?php foreach($hot_videos as $video): ?>
                                    <li class="video-list-item hot-list-item show-video-view ">
                                        <div class="thumb-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="mm-thum-wrap" tabindex="0" ><img src="'.$video['Video']['images'].'" alt="'.$video['Video']['name'].'" width="100%">
                                                    <div class="play-icon"></div>
                                                </span>',
                                                array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                                            ); ?>
                                        </div>

                                        <div class="content-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="title">'.$video['VideoCategory']['name'] .': '.$video['Video']['name'].'</span>',
                                                array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                                            ); ?>
                                        </div>
                                    </li><!-- End video 1 -->
                                    <?php endforeach; ?>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </div>
                        <div id="top-video-sidebar" class="video-sidebar">
                            <div class="box-inner">
                                <h3 class="sidebar-title">
                                    <span class="mm-link-video sidebar-title-text">
                                        VOTE NHIỀU NHẤT                         </span>
                                </h3>
                                <ul class="mm-video-hot list-video">
                                    <!-- video 0 -->
                                    <?php foreach($vote_videos as $video): ?>
                                    <li class="video-list-item hot-list-item show-video-view ">
                                        <div class="thumb-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="mm-thum-wrap" tabindex="0" ><img src="'.$video['Video']['images'].'" alt="'.$video['Video']['name'].'" width="100%">
                                                    <div class="play-icon"></div>
                                                </span>',
                                                array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                                            ); ?>
                                        </div>

                                        <div class="content-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="title">'.$video['VideoCategory']['name'] .': '.$video['Video']['name'].'</span>',
                                                array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                                            ); ?>
                                        </div>
                                    </li><!-- End video 1 -->
                                    <?php endforeach; ?>
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"> </div>
                        <br />


                        <div class="clear"> </div>

                        <br/>

                    </div>
                    <div class="clear"> </div>
                </div>
            </aside>
        </div>
    </div>  
</section><!--End main content-->
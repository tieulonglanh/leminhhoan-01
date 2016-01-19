<!--Start main content-->
<section class="main-content-wrap">


    <!-- content + sidebar -->
    <div class="container">
        <div class="row main-content-inner">            
            <!--Start content-->
            <div class="col-xs-12 col-sm-8 col-md-8" id="content">
                <div class="content-inner">
                    <!--Start Top video-->
                    <div class="feature top-video">
                            <h1><b>Từ khóa</b>: <?php echo $keyword; ?></h1>
                    </div>
                </div>
                <div class="content-inner">

                    <div class="clear"></div>
                    <!--Start list new video-->
                    <div class="mm-new-video row" id="result">
                        <!--Video new 1-->
                        <?php foreach($latest_videos as $key => $video): 
                            ?>
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
                            <button class="btn-default btn mm-btn-load-more" type="button" page='2' keywords="<?php echo $keyword ?>" url="<?php echo DOMAIN.'Video/ajaxSearchLoadMore' ?>">
                                <span class="mm-uix-button-content">Xem Tiếp <i class="fa fa-angle-right"></i></span>
                            </button>
                        </div>
                    </div><!--End button load more video-->


                </div>
            </div><!--End content-->
            <aside class="col-xs-12 col-sm-4 col-md-4" id="sidebar">
                <!--Sidebar-->
                <div class="sidebar-inner">
                    <div class="clear"> </div>
                    <div class="scroll_top"> 
                        <br/>
                        <div id="top-video-sidebar" class="video-sidebar">
                            <div class="box-inner">
                                <div class="fb-page" data-href="https://www.facebook.com/XonxaoTV" data-width="350" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/XonxaoTV"><a rel="nofollow" href="https://www.facebook.com/XonxaoTV">Xôn Xao</a></blockquote></div></div>
                            </div>
                        </div>

                        <div class="clear"> </div>

                        <br/>

                    </div>
                    <div class="clear"> </div>
                </div>
            </aside>
        </div>
    </div>  
</section><!--End main content-->
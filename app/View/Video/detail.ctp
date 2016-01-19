<script type="text/javascript" src="/js/jwplayer/jwplayer.js"></script>
<script type="text/javascript">jwplayer.key="QqfXO20E5XYzywhjjOUypgnbSqti6SaPwzM2kQ==";</script>


<!--Start main content-->
<section class="main-content-wrap">
    <!--<div class="container">
        <div class="row main-content-inner">-->
    <!--Start content-->


    <div class="stage detail_video">
        <div class="col-xs-12 col-sm-8 col-md-8">
            <div id="player-view" class="mm-iframe-fr-yt iframe-video-details">
                
            </div>
            <script type="text/javascript">
                jwplayer("player-view").setup({
                    file: "<?php echo str_replace('https:', '', $video['Video']['link']); ?>",
                    image: "<?php echo $video['Video']['images'] ?>",
                    width: "100%",
                    aspectratio: "16:9",
					autostart: true,
                });
            </script>
			<script>
			  if(document.cookie.indexOf("jwplayerAutoStart") == -1) {
				document.cookie = "jwplayerAutoStart=1";
				playerInstance.play();
			  }
			</script>
            <div id="share">

                <div class="pull-left hidden-xs hidden-sm">
                    <li ip_client="<?php echo $this->request->clientIp(); ?>" data-id= "<?php echo $video['Video']['id']; ?>" data-point="1" class="vote" ><a class="badge-upvote-btn badge-evt btn btn-invert btn-lg" data-evt="PostAction,Vote,Upvote" href="javascript:void(0);"><i class="fa fa-arrow-up"></i></a></li>
                    <li ip_client="<?php echo $this->request->clientIp(); ?>" data-id= "<?php echo $video['Video']['id']; ?>" class="vote" data-point="-1" ><a class="badge-downvote-btn badge-evt btn btn-invert btn-lg" data-evt="PostAction,Vote,Downvote" href="javascript:void(0);"><i class="fa fa-arrow-down"></i></a></li>
                    <li class="report"> <i class="fa fa-exclamation-triangle"></i> Báo cáo vi phạm </li>
                </div>
                <div class="pull-right hidden-xs hidden-sm">
                    <a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo DOMAIN ?>chi-tiet/<?php echo $video['Video']['alias'] ?>"> Share on Facebook </a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 hidden-xs hidden-sm">
            <!-- item video same categorys -->
            <div class="row three_video_cat pc">
                <div class="demo-stage" class="jq-clearfix"> 
                    <ul>
                        <?php foreach($vote_videos as $videox): ?>
                        <div class="col-xs-12 col-sm-12 li_row">
                            <div class="box-inner">
                                <div class="mm-iframe-fr-yt item_rel">
                                    <?php echo $this->Html->link(
                                                '<img src="'.$videox['Video']['images'].'" alt="'.$videox['Video']['name'].'" width="100%" >',
                                                array('controller' => 'Video', 'action' => 'detail', $videox['Video']['alias']), array('escape' => false, 'title' => "[Xôn xao] - ".$videox['Video']['name'])
                                            ); ?>
                                </div>
                                <div class="mm-video-info">
                                    <div class="mm-lockup-content">
                                        <div class="mm-lockup-title">
                                            <?php echo $this->Html->link(
                                                "[Xôn xao] - " . $videox['VideoCategory']['name'] .': '.$videox['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail', $videox['Video']['alias']), array('escape' => false, 'class' => 'mm-link-video', 'title' => "[Xôn xao] - " . $videox['Video']['name'])
                                            ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </ul>
                    <div class="jq-clearfix"></div>
                </div>


            </div>
            <section id="demo-nav">
                <nav>
                    <span style="display:none">Scroll To: </span>
                    <button class="next badge-post-prev btn btn-lg btn-invert btn-block">Next <i class="fa fa-arrow-right"></i></button>
                    <button style="display:none" class="last">Last Chapter</button>
                    <button style="" class="first badge-post-prev btn btn-lg btn-invert btn-block"><i class="fa fa-arrow-left"></i> Back</button>
                </nav>
            </section>
        </div>
    </div>


    <div class="container">

        <div class="row main-content-inner">
            <div class="col-xs-12 col-sm-8 col-md-8" id="content">
                <div class="row main-content-inner">
                    <div id="mm-breadcrumb" vocab="http://schema.org/" typeof="BreadcrumbList">
                        <ol class="breadcrumb">
                            <li property="itemListElement" typeof="ListItem">
                                <a property="item" typeof="WebPage" href="<?php echo DOMAIN."/danh-muc/".$video['VideoCategory']['alias'] ?>" title="Phim hài">
                                    <span><?php echo $video['VideoCategory']['name']; ?></span>
                                </a> 
                            </li>
                            <li class="active" property="itemListElement" typeof="ListItem">
                                <a property="item" typeof="WebPage" href="http://xonxao.vn/phim-hai/full-4-phim-hai-18-hay-nhat-viet-nam.html" title="[xôn xao] Full #4 - Phim Hài 18+ Hay Nhất Việt Nam - Clip hài 2015">
                                    <span>[Xôn xao] <?php echo $video['Video']['name'] ?></span>
                                </a>
                            </li>
                        </ol>
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
                    <!--Start Phim ngan hai uoc moi-->
                    <article class="content-details">  

                        <section class="atc-content">
                            <!-- video player -->
                            <h1 class="atc-title">[Xôn xao] <?php echo $video['Video']['name']; ?></h1>
                            <div class="mm-social-views">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-5 col-md-6 mm-share-like">
                                        <!-- Start list social -->
                                        <ul class="mm-list-social clearfix">
                                            <li class="google-plusone">
                                                <a class="g-plusone" data-size="medium" onClick="renderPlusone();" data-href="<?php echo DOMAIN ?>/video/<?php echo $video['Video']['alias'] ?>"></a>
                                                <div id="plusone-div"></div>
                                            </li>
                                            <li class="facebook-like">
                                                <div class="fb-like" data-href="<?php echo DOMAIN ?>chi-tiet/<?php echo $video['Video']['alias'] ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                                                <div id="fb-root"></div>
                                            </li>
                                        </ul>
                                    </div><!-- End list social -->

                                    <!-- Start Views and date -->
                                    <div class="col-xs-12 col-sm-7 col-md-6 mm-view-date">
                                        <div id="watch-views-info">
                                            <ul class="list-info clearfix">
                                                <li>
                                                    <div class="watch-date-post">
                                                        <i class="fa fa-calendar"></i> Ngày đăng <time datetime="<?php echo date("Y-m-d",strtotime($video['Video']['created'])); ?>"><?php echo date("Y-m-d",strtotime($video['Video']['created'])) ?></time>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="watch-view-count">
                                                        <i class="fa fa-eye"></i> <?php echo $video['Video']['view'] ?> <span class="txt-view">lượt xem</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- End Views and date -->
                                </div>
                            </div>


                            <!-- Start Comment clips -->
                            <div id="action-panel-details" class="action-panel-content">
                                <div id="watch-description-text">
                                    <p id="watch-content-description">
                                    <p>
                                        <?php echo $video['Video']['description']; ?><br />
                                        <br />
                                        <?php echo $video['Video']['content']; ?><br />
                                        &nbsp;</p>                                                </p>
                                    <div class="tags_Box">
                                        <h3>Tags: </h3>        
                                        <?php if(isset($tags) && !empty($tags)): ?>
                                        <?php foreach($tags as $tag): ?>
                                            <?php echo $this->Html->link(
                                                $tag['Tag']['tag_name'],
                                                array('controller' => 'Video', 'action' => 'tag', $tag['Tag']['tag_alias']), array('escape' => false, "class" => "mm-link-video", 'title' => $tag['Tag']['tag_name'])
                                            ); ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            </div><!-- End Comment clips -->





                        </section>
                        <footer class="atc-footer">
                            <!-- category same -->

                            <!-- Facebook Comment -->
                            <div id="mm-fb-comment-box">
                                <div class="fb-comments" data-href="<?php echo DOMAIN ?>chi-tiet/<?php echo $video['Video']['alias'] ?>" data-width="769" data-numposts="5"></div>
                                <div id="fb-root"></div>
                            </div>
                            <div class="clear"></div>
                            
                            <h3 class="module-title_cat">Có thể bạn muốn xem</h3>
                            <?php foreach($latest_videos as $videoz): ?>
                            <div class="col-xs-12 col-sm-4">
                                <div class="box-inner">
                                    <div class="mm-iframe-fr-yt">
                                        <?php echo $this->Html->link(
                                                '<img src="'.$videoz['Video']['images'].'" alt="'.$videoz['Video']['name'].'" width="100%" height="140px;" >
                                                    <div class="play-icon"></div>',
                                                array('controller' => 'Video', 'action' => 'detail', $videoz['Video']['alias']), array('escape' => false, 'title' => "[Xôn xao] ".$videoz['Video']['name'])
                                            ); ?>
                                    </div>
                                    <div class="mm-video-info">
                                        <div class="mm-lockup-content">
                                            <div class="mm-lockup-title">
                                                <?php echo $this->Html->link(
                                                $videoz['VideoCategory']['name'] .': '.$videoz['Video']['name'],
                                                array('controller' => 'Video', 'action' => 'detail', $videoz['Video']['alias']), array('escape' => false, "class" => "mm-link-video", 'title' => "[Xôn xao] ".$videoz['Video']['name'])
                                            ); ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>                            
                        </footer>
                    </article>
                </div>
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
                                    <?php foreach($hot_videos as $hvideo): ?>
                                    <li class="video-list-item hot-list-item show-video-view ">
                                        <div class="thumb-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="mm-thum-wrap" tabindex="0" ><img src="'.$hvideo['Video']['images'].'" alt="'.$hvideo['Video']['name'].'" width="100%">
                                                    <div class="play-icon"></div>
                                                </span>',
                                                array('controller' => 'Video', 'action' => 'detail', $hvideo['Video']['alias']), array('escape' => false, 'title' => $hvideo['Video']['name'])
                                            ); ?>
                                        </div>

                                        <div class="content-wrapper">
                                            <?php echo $this->Html->link(
                                                '<span class="title">'.$hvideo['VideoCategory']['name'] .': '.$hvideo['Video']['name'].'</span>',
                                                array('controller' => 'Video', 'action' => 'detail', $hvideo['Video']['alias']), array('escape' => false, 'title' => $hvideo['Video']['name'])
                                            ); ?>
                                        </div>
                                    </li><!-- End video 1 -->
                                    <?php endforeach; ?>
                                    <div class="clear"></div>
                                </ul>
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

    <!--  
    </div>
</div>-->
</section><!--End main content-->
<script>
      $('.report').click(function(){
        alert('Cám ơn!');
      });
      // scroll
       var heightowl = $(".iframe-video-details").width();
        var heightimg =  heightowl / 5 * 3;
        $(".demo-stage").height(heightimg);
        function changeSize() {
            var width = parseInt($("#Width").val());
            var height = parseInt($("#Height").val());
                 $(".demo-stage").width(width).height(height);
                 $('.demo-stage').perfectScrollbar('update');
         }
        $(function() {
        $('.demo-stage').perfectScrollbar();
        }); 

    // Begin //
    var chapters = $('.demo-stage').find('ul').children('.li_row');
    var chScrollPositions = new Array();
    
    // Cache Scroll vị trí mỗi item video
    chapters.each(function(i){
        chScrollPositions[i] = Math.round($(this).offset().top - $('.demo-stage').offset().top) - 10;
    });
    chapters.eq(0).addClass('active'); // Set item đầu tiên active khi đc kích
    
    $('#demo-nav > nav > button').click(function(){
        var last = chapters.parent().find('.li_row.active').removeClass('active').index();
        var next;
        
        switch($(this).index()){
            case 1: // next từng item
                next = (last + 1 == chapters.length) ? 0 : last + 1; // next item tiếp theo
            break;
            case 2: // cuối trang
                next = chapters.length - 1;
            break;
            case 3: // trang đầu tiên
                //next = 0;
                next = (last - 1 == chapters.length) ? 0 : last - 1; // next item tiếp theo
            break;
        }
        chapters.eq(next).addClass('active'); // Set next item đc active
        $('.demo-stage').scrollTo(chScrollPositions[next]);
    });
// end //

    //tnv: like&Dislike
    $(document).ready(function(){
        $(".vote").click(function(){
            var data_id = $(this).attr('data-id');
            var data_point = $(this).attr('data-point');
            var ip_client = $(this).attr('ip_client');
            
            $.ajax({
                url: '/video/vote',
                type: "POST",
                data: {
                    'id_vote': data_id,
                    'point': data_point,
                    'ip_vote':ip_client,
                },
                success: function(data){
                    if(data!='') { alert(data); }
                }
            });
            
        });
    });
</script>
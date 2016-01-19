<?php 
if(isset($videos)):
    foreach ($videos as $video): ?>
    <div class="row">
        <div class="col-md-5 row-video">
            <div class="box-inner">
                <div class="mm-iframe-fr-yt">
                    <?php
                    echo $this->Html->link(
                            '<img width="100%" height="auto" src="' . $video["Video"]["images"] . '" alt="' . $video["Video"]["name"] . '" />
                                            <div class="icon_play"></div>', array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('escape' => false, 'title' => $video['Video']['name'])
                    );
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-7 row-video">
            <div class="mm-video-info" >
                <div class="mm-lockup-content">
                    <div class="mm-lockup-title">
                        <?php
                        echo $this->Html->link(
                                $video['VideoCategory']['name'] . ': ' . $video['Video']['name'], array('controller' => 'Video', 'action' => 'detail', $video['Video']['alias']), array('title' => '[Xôn xao] - ' . $video['Video']['name'], 'class' => 'mm-link-vd')
                        );
                        ?>
                    </div>
                    <div class="mm-lockup-meta">
                        <p>Đăng bởi:  <a href="#"> <?php echo isset($video['User']['fullname']) ? $video['User']['fullname'] : $video['Video']['User']['username']; ?> </a> - <?php echo $video['Video']['created'] ?></p>
                        <ul class="mm-lockup-meta-info clearfix clearfix">
                            <li><i class="fa fa-eye"></i> <?php echo $video['Video']['view'] ?></li>
                            <li><i class="fa fa-thumbs-o-up"></i> <?php echo $video['Video']['vote'] ?></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    endforeach; 
endif;
?>
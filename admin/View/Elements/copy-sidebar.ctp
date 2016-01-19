<?php
$setActive = $this->request->url;
$setActive = explode("/", $setActive);
$setActive = $setActive[0];
$tabindex = "";
if (in_array($setActive, array('product_category', 'product', 'order'))) {
    $tabindex = 0;
}
if (in_array($setActive, array('news_category', 'news'))) {
    $tabindex = 1;
}
if (in_array($setActive, array('gallery_category', 'gallery'))) {
    $tabindex = 2;
}
if (in_array($setActive, array('contact'))) {
    $tabindex = 3;
}
if (in_array($setActive, array('advertisement'))) {
    $tabindex = 4;
}
if (in_array($setActive, array('video', 'video_category'))) {
    $tabindex = 5;
}
if (in_array($setActive, array('user'))) {
    $tabindex = 6;
}
if (in_array($setActive, array('slideshow'))) {
    $tabindex = 7;
}
if (in_array($setActive, array('setting'))) {
    $tabindex = 8;
}
if (in_array($setActive, array('support'))) {
    $tabindex = 9;
}
if (in_array($setActive, array('question'))) {
    $tabindex = 10;
}
if (in_array($setActive, array('partner'))) {
    $tabindex = 11;
}
if (in_array($setActive, array('post'))) {
    $tabindex = 12;
}
if (in_array($setActive, array('link'))) {
    $tabindex = 13;
}
?>
<script type="text/javascript">
    ddaccordion.init({
        headerclass: "submenuheader",
        contentclass: "submenu",
        revealtype: "click",
        mouseoverdelay: 200,
        collapseprev: true,
        defaultexpanded: [<?php echo $tabindex; ?>],
        onemustopen: false,
        animatedefault: false,
        persiststate: false,
        toggleclass: ["", ""],
        animatespeed: "fast",
        oninit:function(headers, expandedindices){
            //do nothing
        },
        onopenclose:function(header, index, state, isuseractivated){
            //do nothing
        }
    })
</script>

<div id="sidebar">
    <div id="sidebar-wrapper">
        <h1 id="sidebar-title"><a href="#"></a></h1>
        <a href="#"><img id="logo" src="<?php echo DOMAINAD ?>images/logo.png" alt="Design by Vnxsoft.com" /></a>
        <div id="profile-links"> Xin chào, <a href="#" title="Edit your profile"><?php echo $this->Session->read('name'); ?></a><br />
            <br />
            <a href="<?php echo DOMAIN; ?>" title="View the Site" target="_blank">Xem trang chủ</a> | <a href="<?php echo DOMAINAD ?>login/logout" title="Sign Out">Thoát</a> </div>
        <div id="list">
            <ul id="main-nav">
                <li id="arrayorder_1"> <a href="<?php echo DOMAINAD ?>home" class="nav-top-item no-submenu"> Trang chủ </a> </li>
                <li id="arrayorder_2"> <a href="#" class="nav-top-item submenuheader"> Sản phẩm </a>
                    <div class="submenu">
                        <ul>
							<li><a href="<?php echo DOMAINAD ?>product_category" <?php
                                if ($setActive == 'product_category') {
                                    echo 'class="current"';
                                }
                                ?>>Danh mục sản phẩm</a></li>
								<li><a href="<?php echo DOMAINAD ?>product" <?php
                                if ($setActive == 'product') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách sản phẩm</a></li>
                                
                                <li><a href="<?php echo DOMAINAD ?>order" <?php
                                if ($setActive == 'order' || $setActive == 'order_detail') {
                                    echo 'class="current"';
                                }
                                ?>>Đơn hàng</a></li>
                                
						</ul>
                    </div>
                </li>
                <!--<li id="arrayorder_3">
                    <a href="#" class="nav-top-item submenuheader"> Tin tức </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>news_category" <?php
                                if ($setActive == 'news_category') {
                                    echo 'class="current"';
                                }
                                ?>>Danh mục tin tức</a></li>
                            <li><a href="<?php echo DOMAINAD ?>news" <?php
                                if ($setActive == 'news') {
                                    echo 'class="current"';
                                }
                            ?>>Danh sách tin tức</a></li>

                        </ul>
                    </div>
                </li> -->
                
                <!--li id="arrayorder_4">
                    <a href="#" class="nav-top-item submenuheader">Album ảnh </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>gallery_category" <?php
                                if ($setActive == 'gallery_category') {
                                    echo 'class="current"';
                                }
                                ?>>Danh mục Album</a></li>
                            <li><a href="<?php echo DOMAINAD ?>gallery" <?php
                                if ($setActive == 'gallery') {
                                    echo 'class="current"';
                                }
                            ?>>Danh sách Album</a></li>

                        </ul>
                    </div>
                </li-->
                
                <li id="arrayorder_5">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý liên hệ </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>contact" <?php
                                if ($setActive == 'contact') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách liên hệ</a></li>

                        </ul>
                    </div>
                </li>
                
                <!-- <li id="arrayorder_5">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý quảng cáo </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>advertisement" <?php
                                if ($setActive == 'advertisement') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách quảng cáo</a></li>

                        </ul>
                    </div>
                </li> -->
                
                <!--li id="arrayorder_6">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý video </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>video_category" <?php
                                if ($setActive == 'video_category') {
                                    echo 'class="current"';
                                }
                                ?>>Danh mục Video</a></li>
                            <li><a href="<?php echo DOMAINAD ?>video" <?php
                                if ($setActive == 'video') {
                                    echo 'class="current"';
                                }
                            ?>>Danh sách Video</a></li>

                        </ul>
                    </div>
                </li-->
                
                <li id="arrayorder_7">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý User </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>user" <?php
                                if ($setActive == 'user') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách User</a></li>

                        </ul>
                    </div>
                </li>
                
                <!--li id="arrayorder_7">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý Slideshow </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>slideshow" <?php
                                if ($setActive == 'slideshow') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách Slideshow</a></li>

                        </ul>
                    </div>
                </li-->
                
                <!--<li id="arrayorder_8">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý cấu hình </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>setting" <?php
                                if ($setActive == 'setting') {
                                    echo 'class="current"';
                                }
                                ?>>Cấu hình</a></li>

                        </ul>
                    </div>
                </li>-->
                
                <!--li id="arrayorder_9">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý hỗ trợ trực tuyến </a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>support" <?php
                                if ($setActive == 'support') {
                                    echo 'class="current"';
                                }
                                ?>>Hỗ trợ trực tuyến</a></li>

                        </ul>
                    </div>
                </li-->
                
                <!--li id="arrayorder_10">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý hỏi đáp</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>question" <?php
                                if ($setActive == 'question') {
                                    echo 'class="current"';
                                }
                                ?>>Hỏi đáp</a></li>

                        </ul>
                    </div>
                </li-->
                
                <!--li id="arrayorder_11">
                    <a href="#" class="nav-top-item submenuheader"> Quản lý đối tác</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>partner" <?php
                                if ($setActive == 'partner') {
                                    echo 'class="current"';
                                }
                                ?>>Đối tác</a></li>

                        </ul>
                    </div>
                </li-->
                
                
                <!--<li id="arrayorder_11">
                    <a href="#" class="nav-top-item submenuheader">Quản lý thông tin chung</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>post" <?php
                                if ($setActive == 'post') {
                                    echo 'class="current"';
                                }
                                ?>>Thông tin chung</a></li>

                        </ul>
                    </div>
                </li>-->
                
                <!--li id="arrayorder_11">
                    <a href="#" class="nav-top-item submenuheader">Quản lý liên kết</a>
                    <div class="submenu">
                        <ul>
                            <li><a href="<?php echo DOMAINAD ?>link" <?php
                                if ($setActive == 'link') {
                                    echo 'class="current"';
                                }
                                ?>>Danh sách liên kết web</a></li>

                        </ul>
                    </div>
                </li-->
                
                
            </ul>
        </div>
    </div>
</div>

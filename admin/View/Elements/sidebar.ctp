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



            <!-- Left side column. contains the logo and sidebar -->
            <aside style='margin-top: 50px;' class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="/admin/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Xin chào, <?php echo $this->Session->read('name'); ?></p>

                            <a><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <ul class="sidebar-menu">

                        <li>
                            <a href="<?php echo DOMAINAD ?>slideshow">
                                <i class="fa fa-dashboard"></i> <span> Slideshow</span>
                            </a>
                        </li> 
                        <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> Right</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" <?php if($setActive == 'video' || $setActive == 'video_category'){echo 'style="display: block"'; }?> >
                                    <li <?php if($setActive == 'video_category'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>right_category" ><i class="fa fa-angle-double-right"></i> Danh mục right</a></li>
                                    <li <?php if($setActive == 'video'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>right" ><i class="fa fa-angle-double-right"></i> Danh sách right</a></li>
                                                                       
                                </ul>
                        </li>
                        <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> Content</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" <?php if($setActive == 'video' || $setActive == 'video_category'){echo 'style="display: block"'; }?> >
                                    <li <?php if($setActive == 'video_category'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>content_category" ><i class="fa fa-angle-double-right"></i> Danh mục Content</a></li>
                                    <li <?php if($setActive == 'video'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>content" ><i class="fa fa-angle-double-right"></i> Danh sách Content</a></li>
                                                                       
                                </ul>
                        </li>
                        <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> Group</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" <?php if($setActive == 'video' || $setActive == 'video_category'){echo 'style="display: block"'; }?> >
                                    <li <?php if($setActive == 'video_category'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>Group_category" ><i class="fa fa-angle-double-right"></i> Danh mục Group</a></li>
                                    <li <?php if($setActive == 'video'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>Group" ><i class="fa fa-angle-double-right"></i> Danh sách Group</a></li>
                                                                       
                                </ul>
                        </li>
                        <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> Menuleft</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" <?php if($setActive == 'video' || $setActive == 'video_category'){echo 'style="display: block"'; }?> >
                                    <!-- <li <?php if($setActive == 'video_category'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>gallerycategory" ><i class="fa fa-angle-double-right"></i> Danh mục ảnh</a></li> -->
                                    <li <?php if($setActive == 'video'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>menuleft" ><i class="fa fa-angle-double-right"></i> Danh sách Menuleft</a></li>
                                                                       
                                </ul>
                        </li>
                        <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-edit"></i>
                                    <span> News</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu" <?php if($setActive == 'video' || $setActive == 'video_category'){echo 'style="display: block"'; }?> >
                                    <li <?php if($setActive == 'video_category'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>newscategory" ><i class="fa fa-angle-double-right"></i> Danh mục News</a></li>
                                    <li <?php if($setActive == 'video'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>news" ><i class="fa fa-angle-double-right"></i> Danh sách News</a></li>
                                                                       
                                </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span> Người quản trị</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" <?php if( $setActive == 'administrator'){echo 'style="display: block"'; }?> >
                                <li <?php if($setActive == 'administrator'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>administrator" ><i class="fa fa-angle-double-right"></i> Danh sách Quản trị viên</a></li>
                                <li <?php if($setActive == 'administrator'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>administrator/add"><i class="fa fa-angle-double-right"></i> Thêm mới quản trị viên</a></li>
                            </ul>
                        </li>
<!-- 
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span> Người dùng</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($setActive == 'user' || $setActive == 'user'){echo 'style="display: block"'; }?> >
                                <li <?php if($setActive == 'user'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>user" ><i class="fa fa-angle-double-right"></i> Danh sách người dùng</a></li>
                                <li <?php if($setActive == 'user'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>user/add"><i class="fa fa-angle-double-right"></i> Thêm người dùng mới</a></li>

                            </ul>
                        </li> -->

                        
                                                
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span> Cài đặt chung</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu" <?php if($setActive == 'setting' || $setActive == 'marketing' || $setActive == 'advertisement' ){echo 'style="display: block"'; }?> >
                               <!--  <li <?php if($setActive == 'advertisement'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>advertisement" ><i class="fa fa-angle-double-right"></i> Danh sách quảng cáo</a></li>
                                <li <?php if($setActive == 'marketing'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>marketing/send" ><i class="fa fa-angle-double-right"></i> Gửi email marketing</a></li> -->
                                <li <?php if($setActive == 'setting'){echo 'class="active"'; }?> ><a href="<?php echo DOMAINAD ?>setting/index" ><i class="fa fa-angle-double-right"></i> Cấu hình</a></li>
                            </ul>
                        </li>

                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>
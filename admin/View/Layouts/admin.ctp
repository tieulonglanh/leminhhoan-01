<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administractor</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <?php //echo $this->Html->css(array("reset", 'style')); ?>
        <?php //echo $this->Html->css(array("reset")); ?>
        <?php echo $this->Html->script(array('jquery.min', 'ddaccordion', 'function')); ?>
        <?php //echo $this->Html->script('ckeditor/ckeditor'); ?>
        <?php echo $this->Html->script('ckfinder/ckfinder'); ?>

        <!-- bootstrap 3.0.2 -->
        <?php echo $this->Html->css(array("bootstrap.min")); ?>
        <!-- font Awesome -->
        <?php echo $this->Html->css(array("font-awesome.min")); ?>
        <!-- Ionicons -->
        <?php echo $this->Html->css(array("ionicons.min")); ?>
        <!-- Morris chart -->
        <?php echo $this->Html->css(array("morris/morris")); ?>


        <!-- jvectormap -->
        <?php echo $this->Html->css(array("jvectormap/jquery-jvectormap-1.2.2")); ?>
        <!-- Date Picker -->
        <?php echo $this->Html->css(array("datepicker/datepicker3")); ?>
        <!-- Daterange picker -->
        <?php echo $this->Html->css(array("daterangepicker/daterangepicker-bs3")); ?>
        <!-- bootstrap wysihtml5 - text editor -->
        <?php echo $this->Html->css(array("bootstrap-wysihtml5/bootstrap3-wysihtml5.min")); ?>



        <!-- Theme style -->
        <?php echo $this->Html->css(array("AdminLTE")); ?>
        <?php echo $this->Html->css(array("chosen.min")); ?>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/admin" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                QUẢN TRỊ
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="javascript:void(0)" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="<?php echo DOMAIN ?>pages/clearcacheti3ul0ngl4nh">
                                Xóa Cache
                            </a>
                        </li>
                            <!--<ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="index.html#">
                                                <div class="pull-left">
                                                    <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="index.html#">See All Messages</a></li>
                            </ul>
                        </li-->

                        <!-- Notifications: style can be found in dropdown.less -->
                        <!--li class="dropdown notifications-menu">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="index.html#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="index.html#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="index.html#">View all</a></li>
                            </ul>
                        </li-->


                        <!-- Tasks: style can be found in dropdown.less -->
                        <!--li class="dropdown tasks-menu">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="index.html#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="index.html#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="index.html#">View all tasks</a>
                                </li>
                            </ul>
                        </li-->



                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->Session->read('name'); ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="/admin/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Xin chào <?php echo $this->Session->read('name'); ?>
                                        <!--small>Member since Nov. 2012</small-->
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!--li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="index.html#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="index.html#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="index.html#">Friends</a>
                                    </div>
                                </li-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!--a href="index.html#" class="btn btn-default btn-flat">Profile</a-->
                                        <a class="btn btn-default btn-flat" href="<?php echo DOMAINAD ?>administrator/edit/<?php echo $this->Session->read('id'); ?>" title="Edit">Sửa đổi</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo DOMAINAD ?>login/logout" class="btn btn-default btn-flat">Thoát</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>





        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?php echo $this->element('sidebar'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->






                      <?php echo $content_for_layout; ?>








            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <?php echo $this->Html->script('jquery-ui-1.10.3.min'); ?>
        <!-- Bootstrap -->
        <?php echo $this->Html->script('bootstrap.min'); ?>
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="/admin/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <?php echo $this->Html->script('plugins/sparkline/jquery.sparkline.min'); ?>
        <?php echo $this->Html->script('plugins/chosen/chosen.jquery.min'); ?>
        <!-- jvectormap -->
        <script src="/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <?php echo $this->Html->script('plugins/jqueryKnob/jquery.knob'); ?>
        <!-- daterangepicker -->
        <?php echo $this->Html->script('plugins/daterangepicker/daterangepicker'); ?>
        <!-- datepicker -->
        <?php echo $this->Html->script('plugins/datepicker/bootstrap-datepicker'); ?>
        <!-- Bootstrap WYSIHTML5 -->
        <?php echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min'); ?>
        <!-- iCheck -->
        <?php echo $this->Html->script('plugins/iCheck/icheck.min'); ?>

        <!-- AdminLTE App -->
        <?php echo $this->Html->script('AdminLTE/app'); ?>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <?php echo $this->Html->script('AdminLTE/dashboard'); ?>

        <!-- AdminLTE for demo purposes -->
        <?php echo $this->Html->script('AdminLTE/demo'); ?>

    </body>
</html>
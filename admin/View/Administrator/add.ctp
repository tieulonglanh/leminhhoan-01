<section class="content-header">
    <h1>
        Thêm tài khoản quản trị
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo DOMAINAD ?>" ><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="<?php echo DOMAINAD ?>administrator" > Danh sách tài khoản quản trị</a></li>
        <li class="active"> Thêm tài khoản quản trị</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


    <div class="row">
        <div class="col-xs-12">

            <div class="box-header">
                <div class="box-tools">

                    <div class="input-group">

                        <div class="input-group-btn">

                            <a href="<?php echo DOMAINAD; ?>administrator/add" class="btn btn-sm btn-success" ><i class="fa fa-fw fa-plus-square"></i> Thêm mới </a>
                            <a href="#messages" rel="modal" class="btn btn-sm btn-warning" > Trợ giúp </a>
                            <a href="<?php echo DOMAINAD; ?>home" class="btn btn-sm btn-danger" > Đóng </a>
                        </div>
                    </div>

                </div>
            </div><!-- /.box-header -->
            <div class="box">



                <!-- form start -->
                <?php echo $this->Form->create(null, array('url' => DOMAINAD . 'administrator/add', 'type' => 'post', 'enctype' => 'multipart/form-data', 'name' => 'image')); ?>


                <?php
                $my_error1 = $this->Session->flash();
                ?>
                <?php if($my_error1 !='<div id="flashMessage" class="message"></div>'){ ?>
                    <div class="alert alert-warning alert-dismissable">
                        <i class="fa fa-warning"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $my_error1; ?>
                    </div>
                <?php } ?>

                <div class="box-body">
                    <div class="form-group">
                        <label for="idtitle">Tên đăng nhập</label>
                        <?php echo $this->Form->input('Administrator.name', array('label' => '', 'class' => 'form-control')); ?>
                    </div>

                    <br />

                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <?php echo $this->Form->input('Administrator.password', array('type'=>'password', 'label' => '', 'class' => 'form-control', 'value' => '')); ?>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Xác nhận mật khẩu</label>
                        <?php echo $this->Form->input('Administrator.repassword', array('type'=>'password', 'label' => '', 'class' => 'form-control')); ?>
                    </div>
                    
                    <div class="form-group">
                        <label>Quyền</label>
                        <?php echo $this->Form->input('Administrator.role',array('type'=>'select','options'=>$list_role,'empty'=>'Chọn quyền','class'=>'small-input','label'=>''));?>
                    </div>
                    <div class="form-group">
                        <label>Gán người dùng</label>
                        <?php echo $this->Form->input('Administrator.user_assign_id',array('type'=>'select','options'=>$list_user,'empty'=>'Chọn người dùng','class'=>'large-input chosen','label'=>''));?>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                        <?php
                        echo $this->Form->radio(
                            'Administrator.status',
                            array(0=>'&nbspNgừng hoạt động&nbsp&nbsp&nbsp&nbsp&nbsp', 1=>'&nbspHoạt động'),
                            array('legend'=>false, 'style'=>'float: left; cursor: pointer; margin-left: 20px;', 'value'=>1)
                        );
                        ?>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <a href="javascript:void(0);" onclick="javascript:document.image.submit();" class="btn btn-primary"> <span class="icon-32-save"></span> Lưu </a>
                    <a href="javascript:void(0);" class="btn btn-primary" onclick="javascript:document.image.reset();"> <span class="icon-32-refresh"> </span> Làm mới </a>
                    <a href="#messages" rel="modal" class="btn btn-primary"> <span class="icon-32-help"></span> Trợ giúp </a>
                    <a href="<?php echo DOMAINAD ?>product_category" class="btn btn-primary"> <span class="icon-32-cancel"></span> Hủy </a>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>

</section><!-- /.content -->
<script>
jQuery(document).ready(function(){
    jQuery(".chosen").chosen();
});
</script>
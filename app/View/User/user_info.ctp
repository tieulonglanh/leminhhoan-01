<link type="text/css" rel="stylesheet" href="<?php echo DOMAIN; ?>css/user_style.css" />
<div class="container">
    <?php
    $my_error1 = $this->Session->flash();
    ?>
    <?php if ($my_error1) { ?>
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $my_error1; ?>
        </div>
    <?php } ?>
    <div class="info_video " >
        <h2>Thông tin tài khoản</h2>
        <?php echo $this->Form->create('', array('type' => 'post', 'enctype' => 'multipart/form-data')); ?>
        <fieldset>
            <div class="widget">
                <p style="color: red; text-align: center;">
                    <?php if(!empty($error_message)){
                        echo $error_message;
                    } ?>
                </p>
                <div class="col-sm-4 col-xs-12">
                    <div class="userinfo_avatar">
                        <?php
                        if(!empty($this->data['User']['avatar'])){
                            $avatar = $this->data['User']['avatar'];
                        }else{
                            $avatar = DOMAIN.'images/user_default.png';
                        }
                        ?>
                        <img src="<?php echo $avatar; ?>" width="200" height="200" class="img-responsive" />
                    </div>
                    <label>Upload ảnh đại diện</label>
                    <?php echo $this->Form->file('User.avatar', array('label' => false, 'class' => 'form-control')); ?>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <div class="row form_row">
                        <div class="col-sm-10 col-xs-12">
                            <label>Họ và tên</label>
                            <?php
                            echo $this->Form->input('User.fullname', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Nhập họ tên của bạn')); ?>
                        </div>
                    </div>
                    <?php if($this->data['User']['password'] != '123456'): ?>
                    <div  style="margin-left: 0px;" class="row form_row">
                        <input type="button" value="Đổi mật khẩu" class="btn btn-primary change_pass" />
                        <input type="button" value="Không đổi" class="btn btn-primary not_change_pass" style="display: none;"/>
                    </div>
                    <br />
                    <div style="margin-left: 0px;" class="row form_row show_re_pass">
                        <label>Mật khẩu</label>
                        <?php echo $this->Form->input('User.password', array('type'=>'password',"required"=>"", 'label' => '', 'class' => 'form-control', 'value' => '')); ?>

                        <label>Xác nhận mật khẩu</label>
                        <?php echo $this->Form->input('User.repassword', array('type'=>'password', 'label' => '', 'class' => 'form-control')); ?>
                    </div>
                    <?php endif; ?>
                    <div class="row form_row">
                        <div class="col-sm-10 col-xs-12">
                            <label>Email</label>
                            <?php echo $this->Form->input('User.email', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Nhập email của bạn')); ?>
                        </div>
                    </div>

                    <div class="clear"></div>
                    <div class="formSubmit" style="margin-top:10px" >
                        <?php echo $this->Form->submit('Cập nhật', array('class' => 'btn btn-primary')); ?>
                    </div>
                    <div class="clear"></div>
                </div>

            </div>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="noiquy">
        <h3>Quy định khi đăng video</h3>
        <div class="item"><span>1</span><p>Không đăng bài trùng. Bài đăng rồi nếu đăng lại sẽ bị xóa</p></div>
        <div class="item"><span>2</span><p>Đừng xóa copyright của người khác để tôn trọng tính sáng tạo</p></div>
        <div class="item"><span>3</span><p>Tiêu đề không được phép thô tục gây phản cảm</p></div>
        <div class="item"><span>4</span><p>Không đăng các nổi dung đả kích bôi nhọ người khác</p></div>
        <div class="item"><span>5</span><p>Không đặt tiêu đề câu Like hoặc kêu gọi Like trong bài</p></div>
        <div class="item"><span>6</span><p>Không sử dụng quá nhiều emotion(mặt cười) khi đặt tiêu đề</p></div>
        <div class="item"><span>7</span><p>Không đăng bài trái với thuần phong mỹ tục, văn hóa dân tộc</p></div>
        <div class="item"><span>8</span><p>Không đăng bài liên quan chính trị, tôn giáo, phân biệt vùng miền</p></div>
        <div class="item"><span>9</span><p>Cấm spam link bài của bạn trong phần comment bài của người khác</p></div>
        <div class="item"><span>10</span><p>Đăng bài đồi trụy phản động sẽ bị <b>xóa tài khoản vĩnh viễn</b></p></div>
    </div>

    <!--</div>-->
</div>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('.show_re_pass').hide();

        $('.change_pass').click(function(){
            $(this).hide();
            $('.not_change_pass').show();
            $('.show_re_pass').show();
        });

        $('.not_change_pass').click(function(){
            $(this).hide();
            $('.change_pass').show();
            $('.show_re_pass').hide();
            $('#AdministratorPassword').val('');
            $('#AdministratorRepassword').val('');
        });
    });
</script>
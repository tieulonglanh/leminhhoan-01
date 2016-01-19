<div class="page" style="margin-top: 30px;">
    <link href="<?php echo DOMAIN; ?>css/user_style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo  DOMAIN;  ?>js/user/register_member.js"></script>
    <script>
        (function (){
            var els = [	'section', 'article', 'hgroup', 'header', 'footer', 'nav', 'aside',
                'figure', 'mark', 'time', 'ruby', 'rt', 'rp' ];
            for (var i=0; i<els.length; i++){
                document.createElement(els[i]);
            }
        })();
    </script>
    <script type="text/javascript">
        function resetCaptcha(){
            document.getElementById('imgCaptcha').src = '<?php echo DOMAIN; ?>/User/captcha/'+Math.random();
        }
    </script>

    <?php echo $this->Form->create(null,
        array(
            'type' => 'post', 'id' => 'frm_login',
            'autocomplete' => 'off'
        ));
    ?>
        <div class="content-box corner">
            <div class="title">ĐĂNG KÝ TÀI KHOẢN</div>

            <div class="login_error" style="color: red; font-style: italic; text-align: center; margin-bottom: 10px;">
                <?php if(!empty($error_message)){
                    echo $error_message;
                } ?>
            </div><!--end .login_error-->

            <div class="content-input">
                <?php echo $this->Form->input('User.fullname', array('label' => false, 'class' => 'inputForm home_login_input', 'placeholder' => 'Họ và tên', 'autocomplete' => 'off')); ?>
            </div>
            <div class="content-input">
                <?php echo $this->Form->input('User.username', array('label' => false, 'class' => 'inputForm home_login_input', 'placeholder' => 'Tên truy cập (>=3 ký tự, viết liền, ko dấu)', 'autocomplete' => 'off')); ?>
            </div>
            <div class="content-input">
                <?php echo $this->Form->input('User.email', array('label' => false, 'class' => 'inputForm home_login_input', 'placeholder' => 'Email', 'autocomplete' => 'off')); ?>
            </div>
            <div class="content-input">
                <?php echo $this->Form->input('User.password', array('type' => 'password', 'label' => false, 'class' => 'inputForm home_login_input', 'placeholder' => 'Mật khẩu (>=6 ký tự)', 'autocomplete' => 'off')); ?>
            </div>
            <div class="content-input">
                <?php echo $this->Form->input('User.re_password', array('type' => 'password', 'label' => false, 'class' => 'inputForm home_login_input', 'placeholder' => 'Nhập lại mật khẩu', 'autocomplete' => 'off')); ?>
            </div>

            <div class="content-input">
                <input class="inputForm" placeHolder="Mã bảo vệ" name="txtCapcha" type="text" style="width: 100px;" size="10" maxlength="10" />
                <img id="imgCaptcha" src="<?php echo DOMAIN.'User/captcha/'.rand(0000, 9999); ?>" alt="captcha" />
                <span>
                    <img src="<?php echo DOMAIN; ?>images/refresh.png" onclick="resetCaptcha()" alt="refresh" style="padding-bottom: 4px; cursor: pointer;" />
                </span>
            </div>

            <div class="both"></div>
            <div class="bt1">
                <div class="btn-login">
                    <input type="submit" name="submit_form_register" class="button1 corner" value="Tạo tài khoản" />
                </div>
            </div>
        </div>
    <?php echo $this->Form->end(); ?>
</div>
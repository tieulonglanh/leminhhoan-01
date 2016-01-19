<?php
require_once(WWW_APP.'Vendor/Facebook/autoload.php');

$fb = new Facebook\Facebook([
    'app_id' => FB_APP_ID,
    'app_secret' => FB_APP_SECRET,
    'default_graph_version' => 'v2.2',
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'public_profile']; // Optional permissions
$loginUrl = $helper->getLoginUrl(DOMAIN.Router::url(array('controller' => 'User', 'action' => 'login_facebook')), $permissions);
$login_href = htmlspecialchars($loginUrl);
?>
<div class="page" style="margin-top: 30px;">
    <link href="<?php echo DOMAIN; ?>css/user_style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo  DOMAIN;  ?>js/user/register_member.js"></script>

    <?php echo $this->Form->create(null,
        array(
            'type' => 'post', 'id' => 'frm_login',
            'autocomplete' => 'off'
        ));
    ?>

    <div class="content-box corner">
        <div class="title">ĐĂNG NHẬP</div>
        <p style="margin: 10px auto; text-align: center; color: red;">
            <?php if(!empty($error_message)){
                echo $error_message;
            } ?>
        </p>
        <div class="content-input">
            <input class="inputForm" tabindex="1" type="text" name="username" placeholder="Username hoặc email" value="">
        </div>
        <div class="content-input">
            <input class="inputForm" tabindex="2" name="password" type="password" placeholder="Mật khẩu">
        </div>

        <div class="both"></div>
        <div class="bt1">
            <input type="submit" name="login_submit" class="btn-login button1 corner" value="Đăng nhập" />
        </div>

        <span id="lblError" style="font-size: 12px;padding: 10px 0px 20px 0px;color: red;"></span>

        <div class="Button_bg">
            <a href="<?php echo $login_href; ?>">
                <div class="btn_bg">
                    <div class="Button_1">
                        <img src="<?php echo DOMAIN; ?>/images/facebook55.png" class="icon">
                    </div>
                    <div class="Button_2">
                        Đăng nhập bằng Facebook
                    </div>
                    <div class="both"></div>
                </div>
            </a>
        </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>
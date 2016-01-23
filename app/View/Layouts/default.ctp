<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Color</title>
    <link href="<?php echo DOMAIN?>css/style.css" type="text/css" rel="stylesheet">
    <script src="<?php echo DOMAIN?>js/jquery-1.9.1.min.js"></script>
    <script src="<?php echo DOMAIN?>js/jssor.slider.min.js"></script>
</head>
<body>
 <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="c-wrapper fixCen">
        <header>
            <div class="innerHeader cf">
                <a href="/" class="logo"></a>
                <div class="fll box-search">
                    <input type="text" placeholder="Nội dung tìm kiếm">
                    <button></button>
                </div>
                <div class="fll box-account cf">
                    <a href="#" class="fll spr btn_help"></a>
                    <a href="#" class="fll spr btn_track"></a>
                    <a href="#" class="fll spr btn_acc"></a>
                    <a href="#" class="fll spr btn_bag"></a>
                </div>
            </div>
        </header>
        <?php echo $content_for_layout;?>
        <?php echo $this->element('footer')?>
    </div>
</body>

<script src="<?php echo DOMAIN?>js/jquery.scrollbox.js"></script>
<script src="<?php echo DOMAIN?>js/jquery.slides.min.js"></script>

<script src="<?php echo DOMAIN?>js/script.js"></script>
</html>
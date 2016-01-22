<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web Color</title>
    <link href="<?php echo DOMAIN?>css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="c-wrapper fixCen">
        <header>
            <div class="innerHeader cf">
                <a href="#" class="logo"></a>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo DOMAIN?>js/jquery.scrollbox.js"></script>
<script src="<?php echo DOMAIN?>js/jquery.slides.min.js"></script>
<script src="<?php echo DOMAIN?>js/script.js"></script>
</html>
<div class="main cf">
    <div class="box-left fll">
        <a href="#"><span class="spr btn-alloption"></span>All Offers</a>

        <div class="box-item">
            <?php
            $menuleft = $this->requestAction('Comment/left');
            $i = 1;
            foreach ($menuleft as $row) {
                $i++;
                ?>
                <a href="<?php echo $row['Menuleft']['link'] ?>"><span ><img src="<?php echo DOMAINAD ?>/timthumb.php?src=<?php echo $row['Menuleft']['images']; ?>&amp;h=20&amp;w=20&amp;zc=1" /></span><?php echo $row['Menuleft']['name'] ?></a>

            <?php } ?>
        </div>


    </div>
    <div class="fll box-main">
        <?php echo $login_register['Setting']['html']; ?>
        <div class="cf content-main">
            <div class="fll box_mainleft">
                <p style="background: #DAD8D3;padding: 5px;">
                    Tin tức
                </p>
                <?php
                foreach ($listNews as $key => $value) {
                    # code...
                    ?>
                    <div>
                        <img width="809" height="250" src="<?php echo DOMAINU ?><?php echo $value['News']['images']; ?>" />
                        <p><?php echo $value['News']['name'] ?></p>
                        <p><?php echo $value['News']['description'] ?></p>
                        <p><a href="<?php echo DOMAIN ?>chi-tiet-tin-tuc/<?php echo $value['News']['id'] ?>/<?php echo $value['News']['alias'] ?>.html" title="">Xem tiếp </a></p>
                    </div>
                <?php } ?>
                <div class="paginate">
                    <?php
                    if ($this->Paginator->counter('{:pages}') > 1) {
                        echo $this->Paginator->first('« Đầu ', array('tag' => 'span'), null, array('class' => 'disabled', 'tag' => 'span'));
                        echo $this->Paginator->prev('« Trước ', array('tag' => 'span'), null, array('class' => 'disabled', 'tag' => 'span'));
                        echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => '', 'currentClass' => 'active', 'tag' => 'span', 'first' => 1));
                        echo $this->Paginator->next(' Tiếp »', array('tag' => 'span'), null, array('class' => 'disabled', 'tag' => 'span'));
                        echo $this->Paginator->last('« Cuối ', array('tag' => 'span'), null, array('class' => 'disabled', 'tag' => 'span'));
                    }
                    ?>
                </div>

            </div>
            <div class="fll box-right">
                <?php
                if (!empty($cat_product_right)) {
                    foreach ($cat_product_right as $key => $value) {
                        ?>
                        <div class="box-newpro">

                            <span class="title-pro"><?php echo $value['RightCategory']['name']; ?></span>
        <?php foreach ($mang[$value['RightCategory']['id']] as $key => $row): ?>


                                <div class="item-new pRel">
                                    <a href="<?php echo $row['Right']['alias'] ?>" class="pAbs thumb-new"><img src="<?php echo DOMAINAD ?>/timthumb.php?src=<?php echo $row['Right']['images']; ?>&amp;h=86&amp;w=90&amp;zc=1" /></a>
                                    <a href="<?php echo $row['Right']['alias'] ?>" class="code-new"><?php echo $row['Right']['name'] ?></a>
                                    <span><?php echo $row['Right']['price'] ?></span>
                                </div>
        <?php endforeach ?>
                            <a href="#" class="readMore">ALL NEW PRODUCTS</a>
                        </div>
    <?php }
} ?>
            </div>
        </div>

    </div>
</div>
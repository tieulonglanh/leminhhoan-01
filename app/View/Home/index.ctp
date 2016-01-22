 <div class="main cf">
            <div class="box-left fll">
                <a href="#"><span class="spr btn-alloption"></span>All Offers</a>
                
                <div class="box-item">
                        <?php

                    $menuleft = $this->requestAction('Comment/left');   
                               $i=1;
                 foreach ($menuleft as $row) { 
                                 $i++;
                   ?>
                    <a href="<?php echo $row['Menuleft']['link']?>"><span ><img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row['Menuleft']['images'];?>&amp;h=20&amp;w=20&amp;zc=1" /></span><?php echo $row['Menuleft']['name']?></a>
                   
                    <?php }?>
                </div>
                
               
            </div>
            <div class="fll box-main">
                <?php echo $login_register['Setting']['html']; ?>
                <div class="cf content-main">
                    <div class="fll box_mainleft">
                        <div class="banner">
                            <div id="slides">
                                <?php 
                                    $slideshow=$this->requestAction('Comment/slideshow'); 
                                      foreach ($slideshow as $key => $value) {
                                         
                                      
                                ?>
                                <a href="<?php echo $value['Slideshow']['link'];?>" title=""><img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $value['Slideshow']['images'];?>&amp;h=332&amp;w=810&amp;zc=1" /></a>
                                <?php }?>
                               
                            </div>
                        </div>
                        <?php echo $under_slide_menu['Setting']['html'] ?>
                        <?php echo $under_slide_ads['Setting']['html'] ?>
                         <?php 
                            if(!empty($cat_product_content)){
                                foreach ($cat_product_content as $key => $value) {


                        ?>
                        <div class="sd-exclusives">
                            <span><?php echo $value['ContentCategory']['name']?></span>
                            <div class="cf box-sd">
                            <?php foreach ($mang1[$value['ContentCategory']['id']] as $key => $row1): ?>
                                <a href="<?php echo $row1['Content']['alias']?>" class="fll">
                                    <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row1['Content']['images'];?>&amp;h=118&amp;w=57&amp;zc=1" />
                                    <span><?php echo $row1['Content']['name']?></span>
                                </a>
                            <?php endforeach;?>
                               

                            </div>
                        </div>
                        <?php }}?>
                        
                        <?php 
                            if(!empty($cat_product_group)){
                                foreach ($cat_product_group as $key => $value) {


                        ?>
                        <div class="sd-exclusives">
                            <span><?php echo $value['GroupCategory']['name']?></span>
                            <div class="cf box-cate">
                                <div class="fll list-menu">
                                 <?php foreach ($mang2[$value['GroupCategory']['id']] as $key => $row2): ?>
                                    <a href="#"><?php echo $row2['GroupCategory']['name']?></a>
                                   <?php endforeach;?>
                                </div>
                                <?php 
                                     
                                foreach ($mang3[$value['GroupCategory']['id']] as $key => $row3){ ?>
                                    
                                
                                <div class="fll item-product">
                                    <a href="<?php echo $row3['Group']['alias']?>">
                                         <img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row3['Group']['images'];?>&amp;h=190&amp;zc=1" />
                                        <span><?php echo $row3['Group']['name']?></span>
                                    </a>
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <?php }}?>
                        
                    </div>
                    <div class="fll box-right">
                            <?php 
                            if(!empty($cat_product_right)){
                                foreach ($cat_product_right as $key => $value) {


                        ?>
                        <div class="box-newpro">
                        
                            <span class="title-pro"><?php echo $value['RightCategory']['name'];?></span>
                                <?php foreach ($mang[$value['RightCategory']['id']] as $key => $row): ?>
                                    
                                
                            <div class="item-new pRel">
                                <a href="<?php echo $row['Right']['alias']?>" class="pAbs thumb-new"><img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row['Right']['images'];?>&amp;h=86&amp;w=90&amp;zc=1" /></a>
                                <a href="<?php echo $row['Right']['alias']?>" class="code-new"><?php echo $row['Right']['name']?></a>
                                <span><?php echo $row['Right']['price']?></span>
                            </div>
                            <?php endforeach ?>
                            <a href="#" class="readMore">ALL NEW PRODUCTS</a>
                        </div>
                        <?php }}?>
                    </div>
                </div>

            </div>
        </div>
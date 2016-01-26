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
                       <div class="box-adv cf">
                            <a class="fll box-adv1" href="<?php echo $anhpc1['Slideshow']['link']?>"> <img src="<?php echo $anhpc1['Slideshow']['images']?>" /> </a>
                            <div class="fll box-adv2">
                                <a href="<?php echo $anhpc2['Slideshow']['link']?>" title=""><img alt="" src="<?php echo $anhpc2['Slideshow']['images']?>" style="width: 359px; height: 178px;" /></a> <a href="<?php echo $anhpc3['Slideshow']['link']?>"><img src="<?php echo $anhpc3['Slideshow']['images']?>" /></a></div>
                            <a class="box-adv3" href="<?php echo $anhpc4['Slideshow']['link']?>"><img src="<?php echo $anhpc4['Slideshow']['images']?>" /></a>
                            <div class="cf box-advbt">
                                <a class="fll box-adv4" href="<?php echo $anhpc5['Slideshow']['link']?>"><img src="<?php echo $anhpc5['Slideshow']['images']?>" /></a> <a class="fll box-adv5" href="<?php echo $anhpc6['Slideshow']['link']?>"><img src="<?php echo $anhpc6['Slideshow']['images']?>" /></a></div>
                        </div>
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
                                $i=1;
                                foreach ($cat_product_group as $key => $value) {
                                     $i++;

                        ?>
                        <div class="sd-exclusives">
                            <span><?php echo $value['GroupCategory']['name']?></span>
                            <div class="cf box-cate">
                                <div class="fll list-menu">
                                 <?php foreach ($mang2[$value['GroupCategory']['id']] as $key => $row2): ?>
                                    <a href="#"><?php echo $row2['GroupCategory']['name']?></a>
                                   <?php endforeach;?>
                                </div>
                                
                                <script>
                  jQuery(document).ready(function ($) {
                      
                      var jssor_1_options = {
                        $AutoPlay: false,
                        $AutoPlaySteps: 1,
                        $SlideDuration: <?php echo $i*3;?>00,
                        $SlideWidth: 300,
                        $SlideHeight: 220,
                        $SlideSpacing: 1,
                        $Cols: 2,
                        $ArrowNavigatorOptions: {
                          $Class: $JssorArrowNavigator$,
                          $Steps: 1
                        },
                        $BulletNavigatorOptions: {
                          $Class: $JssorBulletNavigator$,
                          $SpacingX: 1,
                          $SpacingY: 1
                        }
                      };
                      
                      var jssor_1_slider = new $JssorSlider$("jssor_<?php echo $i;?>", jssor_1_options);
                      
                      //responsive code begin
                      //you can remove responsive code if you don't want the slider scales while window resizing
                      function ScaleSlider() {
                          var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                          if (refSize) {
                              refSize = Math.min(refSize, 600);
                              jssor_1_slider.$ScaleWidth(refSize);
                          }
                          else {
                              window.setTimeout(ScaleSlider, 30);
                          }
                      }
                      ScaleSlider();
                      $(window).bind("load", ScaleSlider);
                      $(window).bind("resize", ScaleSlider);
                      $(window).bind("orientationchange", ScaleSlider);
                      //responsive code end
                  });
              </script>
              <div id="jssor_<?php echo $i;?>" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 220px; overflow: hidden; visibility: hidden;">
                                    <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 220px; overflow: hidden;">
                                <?php 
                                
                                foreach ($mang3[$value['GroupCategory']['id']] as $key => $row3){
                                ?>
                                    
                                 
                                <div class="fll item-product" style="display: none">
                                    <div>
                                         <a href="<?php echo $row3['Group']['alias']?>">
                                         <img data-u="image" src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row3['Group']['images'];?>&amp;h=190&amp;zc=1" />
                                        <span><?php echo $row3['Group']['name']?></span>
                                    </a>
                                    </div>
                                        
                                </div>
                                 <div class="fll item-product" style="display: none">
                                    <div>
                                         <a href="<?php echo $row3['Group']['alias']?>">
                                         <img data-u="image" src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $row3['Group']['images'];?>&amp;h=190&amp;zc=1" />
                                        <span><?php echo $row3['Group']['name']?></span>
                                    </a>
                                    </div>
                                        
                                </div>
                                 
                                <?php } ?>
                                   </div>
                                  <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                                  <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
                                 
                              </div>
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
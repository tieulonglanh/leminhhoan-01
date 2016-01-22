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
                        <div class="cf box-menu">
                            <a href="#" class="fll">Hourly Deals</a>
                            <a href="#" class="fll">Men's Fashion</a>
                            <a href="#" class="fll">Woman's Fashion</a>
                            <a href="#" class="fll">Personal Care</a>
                            <a href="#" class="fll">Coirfit</a>
                        </div>
                        <div class="box-adv cf">
                            <a href="#" class="fll box-adv1">
                                <img src="images/quangcao/1.jpg">
                            </a>
                            <div class="fll box-adv2">
                                <a href="#"><img src="images/quangcao/2.jpg"></a>
                                <a href="#"><img src="images/quangcao/3.jpg"></a>
                            </div>
                            <a href="#" class="box-adv3"><img src="images/quangcao/4.jpg"></a>
                            <div class="cf box-advbt">
                                <a href="#" class="fll box-adv4"><img src="images/quangcao/5.jpg"/></a>
                                <a href="#" class="fll box-adv5"><img src="images/quangcao/6.jpg"/></a>
                            </div>
                        </div>
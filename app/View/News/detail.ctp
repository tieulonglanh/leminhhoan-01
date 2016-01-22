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
                <div class="menu-main cf">
                    <a href="#" class="fll"><span class="spr btn-13"></span>Sell On Letshop</a>
                    <a href="#" class="fll"><span class="spr btn-14"></span>Sell On Letshop</a>
                    <a href="#" class="fll"><span class="spr btn-15"></span>Sell On Letshop</a>
                    <a href="#" class="fll"><span class="spr btn-16"></span>Sell On Letshop</a>
                    <div class="box-login cf">
                        <a href="#"class="fll ">Login</a>
                        <a href="#"class="fll ">Register</a>
                    </div>
                </div>
                <div class="cf content-main">
                    <div class="fll box_mainleft">
                    	<p style="background: #DAD8D3;padding: 5px;">
                    		<?php echo $detailNews['News']['name']?>
                    	</p>
                   
                        <div>
                        	<img src="<?php echo DOMAINAD?>/timthumb.php?src=<?php echo $detailNews['News']['images'];?>&amp;h=250&amp;w=809&amp;zc=1" />
                        	<!-- <p><?php echo $value['News']['name']?></p> -->
							<p><?php echo $detailNews['News']['description']?></p>
                        	<p><?php echo $detailNews['News']['detail']?></p>
                        </div>
                        <p style="background: #DAD8D3;padding: 5px;">
                    		Tin tức liên quan
                    	</p>
                    	 <?php foreach ($listNews as $key => $value) {
                    	# code...
                    	?>
                       <a href="" title=""><li><?php echo $value['News']['name']?></li></a>
                       <?php }?>
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
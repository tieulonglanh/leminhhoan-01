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
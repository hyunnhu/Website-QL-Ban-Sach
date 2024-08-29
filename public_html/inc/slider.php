	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$getLastestHealth = $product->getLastestHealth();
					if($getLastestHealth)
					{
						while($result = $getLastestHealth->fetch_assoc())
						{
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']?>"> <img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Health</h2>
						<p><?php echo $result['productName'] ?></p>
						<!-- <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>">Add to cart</a></span></div> -->
				   </div>
			   </div>	
			   <?php
			   			}
			   		}
			   ?>		
				<?php
					$getLastestRomantic = $product->getLastestComic();
					if($getLastestRomantic)
					{
						while($result = $getLastestRomantic->fetch_assoc())
						{
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $result['productId']?>""><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Truyện tranh</h2>
						  <p><?php echo $result['productName'] ?></p>
						  <!-- <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>">Add to cart</a></span></div> -->
					</div>
				</div>
					<?php
			   				}
			   			}
			  		 ?>	
			</div>
			<div class="section group">
				<?php
					$getLastestNovel = $product->getLastestNovel();
					if($getLastestNovel)
					{
						while($result = $getLastestNovel->fetch_assoc())
						{
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']?>""><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" / ></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Lãng mạn</h2>
						<p><?php echo $result['productName'] ?></p>
						<!-- <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>">Add to cart</a></span></div> -->
				   </div>
			   </div>
			   	<?php
			   			}
			   		}
			  	?>		
				<?php
					$getLastestComic = $product->getLastestRomantic();
					if($getLastestComic)
					{
						while($result = $getLastestComic->fetch_assoc())
						{
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						<h2>Tiểu thuyết</h2>
						<p><?php echo $result['productName'] ?></p>
						<!-- <div class="button ">
							<span><a href="details.php?proid=<?php echo $result['productId']?>">Chi tiết</a></span>
						</div> -->
					</div>
				</div>
				<?php
			   			}
			   		}
			  	?>		
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
							$get_slider = $product->select_slider();
							if($get_slider)
							{
								while($result = $get_slider->fetch_assoc())
								{
						?>
						<li><img width="400px" height="200px" src="admin/uploads/<?php echo $result['slider_image'] ?>" alt="<?php echo $result['sliderName'] ?>"/></li>
						<?php									
								}
							}
						?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

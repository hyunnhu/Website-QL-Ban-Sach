	<div class="header_bottom">
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
	  <div class="clear"></div>
  </div>	

</div>

   <div class="footer">
   		<div class="wrapper">	
	    	<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h4>Thông tin</h4>
					<ul>
						<li><a href="">Về chúng tôi</a></li>
						<li><a href="">Dịch vụ khách hàng</a></li>
						<li><a href="products.php"><span>Sản phẩm</span></a></li>
						<li><a href="contact.php">Liên lạc hỗ trợ</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài khoản</h4>
					<ul>
						<li><a href="login.php">Đăng nhập</a></li>
						<li><a href="cart.php">Giỏ hàng</a></li>
						<li><a href="wishlist.php">Danh sách yêu thích</a></li>
						<li><a href="orderdetails.php">Lịch sử mua hàng</a></li>
						<li><a href="faq.php">Hỗ trợ</a></li>
					</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
					<ul>
						<li><span>(+84) 934 125 933</span></li>					
					</ul>
					<div class="social-icons">
						<h4>Theo dõi tôi</h4>
						<ul>
							<li class="facebook"><a href="https://www.facebook.com/dang.khoa.986227" target="_blank"> </a></li>
							<li class="twitter"><a href="https://www.facebook.com/dang.khoa.986227" target="_blank"> </a></li>
							<li class="googleplus"><a href="https://www.facebook.com/dang.khoa.986227" target="_blank"> </a></li>
							<li class="contact"><a href="https://www.facebook.com/dang.khoa.986227" target="_blank"> </a></li>
							<div class="clear"></div>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Nguyễn Trần Đăng Khoa - 20078041 & Mai Thị Huỳnh Như - 20077621</p>
			</div>
    	</div>
    </div>

    <script type="text/javascript">
		$(document).ready(function() {
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1500,
				easingType: 'linear' 
	 		};
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css'/>
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>

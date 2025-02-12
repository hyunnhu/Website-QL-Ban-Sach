<!DOCTYPE HTML>
<head>
<title>BK Store</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link type="image/png" rel="shortcut icon" href="images/logoHN.jpg"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<script src="https://cdn.payos.vn/payos-checkout/v1/stable/payos-initialize.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function($){
		$('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
	});
</script>

<?php
include 'lib/session.php';
Session::init();
?>

<?php
	include_once 'lib/database.php';
	include_once 'helpers/format.php';	

	spl_autoload_register(function($className)
	{
		include_once 'classes/'.$className.'.php';
	});

	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$cs = new customer();
	$product = new product();
?>

<?php
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache"); 
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
	header("Cache-Control: max-age=2592000");
?>
</head>
<body>
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/HN.jpg" alt="" width="220px" height="150px" /></a>
			</div>
			  
			<div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="POST">
				    	<input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa">
				    	<input type="submit" name="search_product" value="Tìm">
				    </form>
			    </div>

			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
							<span class="cart_title">Giá:</span>
							<span class="no_product">
								<?php
									$check_cart = $ct->check_cart();
									if($check_cart)
									{
										$sum = Session::get("sum");
										$qty = Session::get("qty");
										echo $sum.' đ'.' - '.'SL:'.$qty;
									}
									else
									{
										echo '0đ';
									}
								?>
							</span>
						</a>
					</div>
			    </div>

				<?php
						if(isset($_GET['customer_id']))
						{
							$customer_id = $_GET['customer_id'];
							$delCart = $ct->del_all_data_cart();
							$delCompare = $ct->del_compare($customer_id);
							Session::destroy();
						}
				?>

				<div class="login">
					<?php
						$login_check = Session::get('customer_login');
						if($login_check == false)
						{
							echo'<a href="login.php">Đăng nhập</a></div>';
						}
						else
						{
							echo'<a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></div>';
						}
					?>
					<div class="clear"></div>
				</div>

				<div class="clear"></div>
			</div>
		<div class="menu">
			<ul id="dc_mega-menu-orange" class="dc_mm-orange">
				<li>
					<a href="index.php">Trang Chủ</a>
				</li>
				<li>
					<a href="products.php">Sản phẩm</a>
				</li>
	  
				<?php
					$check_cart = $ct->check_cart();
					if($check_cart == true)
					{
						echo'<li><a href="cart.php">Giỏ hàng</a></li>';
					}
					else
					{
						echo'';
					}
				?>	

				<?php
					$customer_id = Session::get('customer_id');
					$check_order = $ct->check_order($customer_id);
					if($check_order == true)
					{
						echo'<li>
								<a href="orderdetails.php">Lịch sử mua hàng</a>
							</li>';
					}
					else
					{
						echo'';
					}
				?>	 

				<?php
					$login_check = Session::get('customer_login');
					if($login_check == false)
					{
						echo'';
					}
					else
					{
						echo'<li>
								<a href="profile.php">Hồ sơ</a>
							</li>';
					}
				?>
	
				<?php
					$login_check = Session::get('customer_login');
					if($login_check)
					{
						echo'<li>
								<a href="wishlist.php">D<span style="text-transform: lowercase">s</span>. Yêu thích</a>
							</li>';
					}
				?>
	  	  
				<li>
					<a href="contact.php">Hỗ trợ</a>
				</li>

	  			<div class="clear"></div>
			</ul>
		</div>

<?php
	include 'inc/header.php';
	$filepath = realpath(dirname(__FILE__));
?>
<?php
		$login_check = Session::get('customer_login');
	  	if($login_check == false)
	  	{
	  		header('Location:login.php');
	  	}
		$kh= Session::get('customer_id');
	  	$ct = new cart();
		if(isset($_GET['confirmid']))
		{
			$cus_id = $_GET['confirmid'];
			$price = $_GET['price'];
			$id_order = $_GET['id'];
			$qr=$_GET['qr'];
			$createQR = $ct->createQR($id_order);
			$confirm_shifted = $ct->confirm_shifted($cus_id,$id_order,$price);
			header('Location:orderdetails.php');
		}
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    <h2 style="display: inline;border:none;">Lịch sử đặt hàng</h2>
				<table class="tblone">
					<tr>
						<th width="10%">STT</th>
						<th width="20%">Tên SP</th>
						<th width="10%">H.Ảnh</th>
						<th width="15%">Giá</th>
						<th width="5%">S.lượng</th>
						<th width="20%">Ngày đặt</th>
						<th colspan='1' width="10%">Tr.Thái</th>
						<th width="10%"></th>
					</tr>
					<?php
						$customer_id = Session::get('customer_id');
						$get_cart_ordered = $ct->get_cart_ordered($customer_id);
						if($get_cart_ordered)
						{
							$i =0;
							$qty = 0;
							while($result = $get_cart_ordered->fetch_assoc())
							{	
								$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $result['productName'] ?></td>
						<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
						<td><?php echo $fm->format_currency($result['price']) ?></td>
						<td><?php echo $result['quantity'] ?></td>
						
						<td><?php echo $fm->formatDate($result['date_order']) ?></td>
						<td>
							<?php
								if($result['status'] == '0')
								{
									echo '<p style="color: green;">Pending</p>';
								}
								else if($result['status'] == '1')
								{
							?>
								<span>Shipped</span>
								
							<?php
								}
								else if($result['status'] == '2')
								{
									echo'Received';
								}
							?>
						</td>

						<?php
							if($result['status'] == '0')
							{
						?>
						<td><?php echo 'N/A'; ?></td>							
						<?php
							}
							else if($result['status'] == '1')
							{
						?>
						<td><a href="?confirmid=<?php echo $customer_id ?>&price=<?php echo 
						$result['price']?>&id=<?php echo $result['id']?>&qr=<?php echo $result['qrcode']?>">Confirmed</a></td>
						<?php
							}
							else
							{
						?>
						<td><?php echo '<a href="order_QR.php?key='.$result['qrcode'].'">Kiểm tra QR</a>'; ?></td>
						<?php
							}
						?>
					</tr>
					<?php
							}
						}
					?>
				</table>
			</div>
			<div class="shopping">
				<center><a href="index.php"> <img src="images/shop.png" alt="" /></a></center>
			</div>
    	</div>  	
       	<div class="clear"></div>
    </div>
</div>
<?php
	include 'inc/footer.php';
?>
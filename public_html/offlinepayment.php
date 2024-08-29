<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
if(isset($_GET['orderid']))
{
	$customer_id = Session::get('customer_id');
    $insertOrder = $ct->insertOrder($customer_id);
    header('location:success.php');
    $delCart = $ct->del_all_data_cart();
}
?>
<style type="text/css">
	.box_left
	{
		width: 55%;
		border:1px solid #666;
		float: left;
		padding: 4px;
	}
	.box_right
	{
		width: 40%;
		border:1px solid #666;
		float: right;
		padding: 4px;
	}
	.box_right .btn-update{
		border-radius:10px;
		transition:0.2s all ease;
	}
	.box_right .btn-update:hover{
		background:purple;
		color:white;
	}
	.box_right .update{
		border:none;
		text-decoration:none;
		transition:0.2s all ease;
	}
	.box_right .update:hover{
		background:transparent;
		color:white;
	}
	center button{
		border-radius:10px;
		transition:0.2s all ease;		
	}
	center button:hover{
		background:purple;
		color:white;
	}
	a.a_submit_order
	{
		padding: 7px 20px;
		color: red;
		font-size: 30px;
		text-decoration:none;
	}
	a.a_submit_order:hover{
		color:white;
	}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
 		<div class="heading">
    		<h3>Xác nhận hoá đơn</h3></br>
    		</div>
    		<div class="clear"></div>
    		<div class="box_left">
    				<div class="cartpage">
			    	<h2 style="width:30rem;">Danh sách sản phẩm</h2>
			    	<?php
			    		if(isset($update_quantity_cart))
			    		{
			    			echo $update_quantity_cart;
			    		}
			    	?>
			    	<?php
			    		if(isset($delcart))
			    		{
			    			echo $delcart;
			    		}
			    	?>
						<table class="tblone">
							<tr>
								<th width="2%">STT</th>
								<th width="17%">Tên SP</th>
								<th width="10%">H.ảnh</th>
								<th width="25%">Đơn giá</th>
								<th width="10%">S.lượng</th>
								<th width="25%">Tạm tính</th>
							</tr>
							<?php
								$get_product_cart = $ct->get_product_cart();
								if($get_product_cart)
								{
									$subtotal = 0;
									$qty = 0;
									$i = 0;
									while($result = $get_product_cart->fetch_assoc())
									{	
										$i++;
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $fm->format_currency($result['price']) ?></td>
								<td>
									<?php echo $result['quantity'] ?>								</td>
								<td>
									<?php
										$total = $result['price'] * $result['quantity'];
										echo $fm->format_currency($total);
									?>
								</td>
							</tr>
							<?php
									$subtotal += $total;
									$qty = $qty + $result['quantity'];	
									}
								}
							?>
						</table>
							<?php
									$check_cart = $ct->check_cart();
									if($check_cart)
									{
										
							?>
						<table style="float:right;text-align:left; border:1px;" width="38%">
							<tr>
								<td><p style="color: #fe5800; display: inline; font-size: 20px;">Tổng cộng : </p>
								
									<?php
										echo $fm->format_currency($subtotal);
										Session::set('sum',$subtotal);
										Session::set('qty',$qty);
									?>
								</td>
							</tr>
					   </table>
					   <?php
					   		}
					   		else
					   		{
					   			echo '<span style="font-size:20px; color:red;">Your cart is Empty<s/span>';
					   		}
					   ?>
					</div>
    		</div>

    		<div class="box_right">
    			<div class="cartpage">
			    	<h2 style="width:30rem;">Thông tin cá nhân</h2>
    				<table width="400" border="1">
    		    <tbody>
    		   	<?php
    		   		$id = Session::get('customer_id');
    		   		$get_customers = $cs->select_customers($id);
    		   		if($get_customers)
    		   		{
    		   			while($result = $get_customers->fetch_assoc())
    		   			{
    		   	?>
    		      <tr>
    		        <td width="205" height="28" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;" >TÊN</td>
    		        <td width="179" style="font-family: 'Monda', sans-serif;"><?php echo $result['name'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">EMAIL</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['email'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">SĐT</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['phone'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">MÃ BƯU CHÍNH</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['zipcode'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">ĐỊA CHỈ</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['address'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">THÀNH PHỐ</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['city'] ?></td>
  		        </tr>
    		      <tr>
    		        <td height="35" style="color:#602D8D; font-family: 'Monda', sans-serif; font-size: 18px;">QUỐC GIA</td>
    		        <td style="font-family: 'Monda', sans-serif;"><?php echo $result['country'] ?></td>
  		        </tr>
  		        <tr>
  		        	<td height="40"><button class="btn-update" style="font-size: 18px;"><a class='update' href="editprofile.php">CHỈNH SỬA</a></button></td>
  		        </tr>
  		        <?php
    		   			}
    		   		}
  		        ?>
  		      </tbody>
  		    </table>
  		</div>
    		</div>	

    	</div>
    </div>
 </div>
 	<center><button><a href="?orderid=order" class="a_submit_order">Xác nhận</button></center>
 </form>
<?php
	// include 'inc/footer.php';
?>
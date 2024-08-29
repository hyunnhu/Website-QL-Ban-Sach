<?php
	include ('inc/header.php');
	$filepath = realpath(dirname(__FILE__));
?>
<?php
	$login_check = Session::get('customer_login');
	if(isset($_GET['key']))
	{
		if($login_check == false)
		{
			header('Location:login.php');
		}
		else
		{
		include_once('classes/order.php');
		include ('api/class.php');
		$o=new order();
		$a=new apiqr();
		$key=$_GET['key'];
		$cs_id=Session::get('customer_id');
		}
	}
	else
	{
		echo 'Không tìm thấy sản phẩm';
	}
?>
<?php
	// if(isset($_GET['id']))
	// {
	// 	include_once('classes/order.php');
	// 	include ('api/class.php');
	// 	$o=new order();
	// 	$a=new myapi();
	// 	$id=$_REQUEST['id'];

	// }
	// else
	// {
	// 	echo 'Không tìm thấy sản phẩm';
	// }
	// if(isset($_GET['key']))
	// {
	// 	include_once('classes/order.php');
	// 	include ('api/class.php');
	// 	$o=new order();
	// 	$a=new myapi();
	// 	$id=$_REQUEST['id'];
	// }
	// else
	// {
	// 	echo 'Không tìm thấy sản phẩm';
	// }
?>
<style>
	table{
		display: flex;
		justify-content: center; /* Căn giữa theo chiều ngang */
		align-items: center;     /* Căn giữa theo chiều dọc */
		height: 100%;
	}
	table *{
		border:1px solid black;
		border-radius:10px;
		overflow:hidden;
		background: #ccc;

	}
	table th{
		font-size:25px;
		align-content:center;
		justify-content: center;
		text-align:center;
	}
	span{
		border:none;
	}
	span.title{
		font-weight: bold;
		display: flex;
		justify-content: center; /* Căn giữa theo chiều ngang */
		align-items: center;     /* Căn giữa theo chiều dọc */
	}
	.title-content{
		display: flex;
		text-align:center;
		justify-content: center;
	}
	span.tbl-content{
		color:red;
	}
</style>
<div class="main">
	<div class="content">
			<?php 
				$result = $o->get_order_nonapi($_GET['key'],$cs_id); 
				$result = $result->fetch_assoc();
			?>
			<table border="borderless">

				<tr>
					<th colspan	="3" style="font-weight:bold;">THÔNG TIN SẢN PHẨM</th>
				</tr>
				<tr>
					<th colspan="3">Mã đơn hàng: <span class='tbl-content'><?php echo $result['qrcode'];?></span></th>
				</tr>
				<tr>
					<td rowspan="4"><img src="admin/uploads/<?php echo $result['image']?>" alt="" width="300rem"></td>
					<td><span class='title'>Tên sản phẩm: </span><?php echo $result['productName']?></td>
					<td rowspan="4"><span class='title'><img src="admin/qrcode/<?php echo $key;?>" alt=""></span></td>
				</tr>
				<tr>
					<td><span class='title'>Ngày mua:</span> <span class="title-content"><?php echo $result['date_order']?></span></td>
				</tr>
				<tr>
					<td><span class='title'>Giá tiền:</span> <span class="title-content"><?php echo $result['price']?> đ</span></td>
				</tr>
				<tr>
					<td><span class='title'>Tình trạng đơn hàng:</span> <span class='title-content tbl-content'><?php if($result['status'] == 0){echo 'Chưa giao';}
						elseif($result['status']==1){echo 'Đang giao';}
						else{echo 'Đã giao';}
						?></span>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table> 
	</div>
	<div class="clear"></div>
</div>
<?php
include_once ('inc/footer.php');
?>
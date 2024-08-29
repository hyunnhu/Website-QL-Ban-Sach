 <?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
include_once ($filepath.'/../qr-code/phpqrcode/qrlib.php');

?>
<?php
 class cart
 {
 	 private $db;
 	 private $fm;

	 public function __construct()
	 {
		$this->db = new Database();
		$this->fm = new Format();  
	 }

	 public function add_to_cart($quantity,$id)
	 {
	 	//Số lượng do khách nhập
	 	$GLOBALS['changed_cart'] = false;
	 	$quantity = $this->fm->validation($quantity);
	 	$quantity = mysqli_real_escape_string($this->db->link, $quantity);//51

		$id = mysqli_real_escape_string($this->db->link, $id); 
		$sId = session_id();

		//Số lượng tồn trong kho
		$query = "SELECT * FROM product WHERE productId = '$id'";
		$result = $this->db->select($query)->fetch_assoc();
		$quantity_in_stock = $result['quantity'];//50
		
		$image = $result['image'];
		$price = $result['price'];
		$productName = $result['productName'];

		$check_cart = "SELECT * FROM customer_cart WHERE productId = '$id' AND sId ='$sId'";
		$result_check = $this->db->select($check_cart);
		if($result_check)
		{
			$msg = "Product Already Added";
			return $msg;
		}
		else
		{
			if($quantity > $quantity_in_stock)
			{
				$GLOBALS['changed_cart'] = true;
				$quantity = $quantity_in_stock;
				$query_insert = "INSERT INTO customer_cart(productId,quantity,sId,image,price,productName) 
				VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart = $this->db->insert($query_insert);
				if($result)
				{
					header('Location:cart.php');
				}
			}
			else
			{
				$query_insert = "INSERT INTO customer_cart(productId,quantity,sId,image,price,productName) 
				VALUES('$id','$quantity','$sId','$image','$price','$productName')";
				$insert_cart = $this->db->insert($query_insert);
				if($result)
				{
					header('Location:cart.php');
				}	
			}
		}
	 }

	 public function get_product_cart()
	 {
	 	$sId  = session_id();
	 	$query = "SELECT * FROM customer_cart WHERE sId = '$sId'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function update_quantity_cart($quantity,$cartId,$productId)
	 {
	 	//Số lượng do khách nhập
	 	$quantity = mysqli_real_escape_string($this->db->link, $quantity);//51 
		$cartId = mysqli_real_escape_string($this->db->link, $cartId); 

		//Số lượng tồn trong kho
		$query = "SELECT * FROM customer_cart C JOIN product P ON C.productId = P.productId 
				  WHERE cartId = '$cartId'";
		$qty_result = $this->db->select($query)->fetch_assoc();
		$quantity_in_stock = $qty_result['quantity'];//50

		if($quantity > $quantity_in_stock)
		{
			$quantity = $quantity_in_stock;
			$query = "UPDATE customer_cart SET 
			quantity = '$quantity'
			WHERE cartId = '$cartId'";
			$result = $this->db->update($query);
		 	if($result)
		 	{
		 		header('Location:cart.php');
		 	}
		 	else
		 	{
		 		$msg = "<span style='color:red;font-size:18px'>Product Quantity Updated Not Successfully</span>";
				return $msg;
		 	}
		}
		else
		{
			$query = "UPDATE customer_cart SET 
			quantity = '$quantity'
			WHERE cartId = '$cartId'";
			$result = $this->db->update($query);
		 	if($result)
		 	{
		 		header('Location:cart.php');
		 	}
		 	else
		 	{
		 		$msg = "<span style='color:red;font-size:18px'>Product Quantity Updated Not Successfully</span>";
				return $msg;
		 	}
		}
		
	 }
	 public function del_product_cart($cartid)
	 {
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "DELETE FROM customer_cart WHERE cartId = '$cartid'";
			$result = $this->db->delete($query);
			if($result)
			{
				header('Location:cart.php');
			}
			else
			{
				$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
				return $msg;
			}
	}

		public function check_cart()
		{
			$sId  = session_id();
	 		$query = "SELECT * FROM customer_cart WHERE sId = '$sId'";
	 		$result = $this->db->select($query);
	 		return $result; 
		}
	public function del_all_data_cart()
	{
			$sId  = session_id();
	 		$query = "DELETE FROM customer_cart WHERE sId = '$sId'";
	 		$result = $this->db->delete($query);
	 		return $result; 		
	}

	public function insertOrder($customer_id)
		{
			$sId = session_id();
			//Lấy số lượng hàng tồn trong kho để trừ đi số lượng hàng được khách đặt 
			$query = "SELECT * FROM customer_cart C JOIN product P ON C.productId = P.productId 
				 	  WHERE sId = '$sId'";
			$qty_result = $this->db->select($query)->fetch_assoc();
			$quantity_in_stock = $qty_result['quantity'];

			//Lưu đơn hàng vào DB
			$query = "SELECT * FROM customer_cart WHERE sId = '$sId'";
			$get_product = $this->db->select($query);
			if($get_product)
			{
				while($result = $get_product->fetch_assoc())
				{
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO customer_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
					$insert_order = $this->db->insert($query_order);

					//Số lượng hàng tồn sau khi đặt = số lượng tồn hiện tại - số lượng vừa được đặt // 6 - 2 = 4
					$update_quantity_after_order = $qty_result['quantity'] - $quantity;
					$query_update_quantity_after_order = 
					"UPDATE product SET 
					quantity = '$update_quantity_after_order'
					WHERE productId = '$productid'";
					$result = $this->db->update($query_update_quantity_after_order);
				}


			}
		}

		public function getAmountPrice($customer_id)
		{
			$query = "SELECT price FROM customer_order WHERE customer_id = '$customer_id' ";
			$get_price = $this->db->select($query);
			return $get_price;
		}

		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT * FROM customer_order WHERE customer_id = '$customer_id' ";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		} 
 		public function check_order($customer_id)
 		{
 			$sId = session_id();
 			$query = "SELECT * FROM customer_order WHERE customer_id = '$customer_id'";
 			$result = $this->db->select($query);
 			return $result;
 		}

 	public function get_inbox_cart()
 	{
 			$query = "SELECT * FROM customer_order ORDER BY date_order";
 			$get_inbox_cart = $this->db->select($query);
 			return $get_inbox_cart;		
 	}

 	public function shifted($id,$time,$price)
 	{
		$id = mysqli_real_escape_string($this->db->link, $id); 	
	 	$time = mysqli_real_escape_string($this->db->link, $time); 
	 	$price = mysqli_real_escape_string($this->db->link, $price); 

	 	$query = "UPDATE customer_order SET 
		status = '1'
		WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
		$result = $this->db->update($query);
	 	if($result)
	 	{
	 		$msg = "<span style='color:green;font-size:18px'>Update Order Successfully</span>";
			return $msg;
	 	}
	 	else
	 	{
	 		$msg = "<span style='color:red;font-size:18px'>Update Order Not Success</span>";
			return $msg;
	 	}
 	}

 	public function del_shifted($id,$time,$price)
 	{
 		$id = mysqli_real_escape_string($this->db->link, $id); 	
	 	$time = mysqli_real_escape_string($this->db->link, $time); 
	 	$price = mysqli_real_escape_string($this->db->link, $price); 

	 	$query = "DELETE FROM customer_order
		WHERE id = '$id' AND date_order = '$time' AND price = '$price'";
		$result = $this->db->update($query);
	 	if($result)
	 	{
	 		$msg = "<span style='color:green;font-size:18px'>Delete Order Successfully</span>";
			return $msg;
	 	}
	 	else
	 	{
	 		$msg = "<span style='color:red;font-size:18px'>Delete Order Not Success</span>";
			return $msg;
	 	}
 	}

	public function createQR($id_order)
	{
		$pathqr= './admin/qrcode/';
		$rand=rand();
		$qrcode= $pathqr.$rand;
		QRcode::png("bkstore.io.vn/order_QR.php?key=$rand",$qrcode);
		$query = "UPDATE customer_order SET qrcode = '$rand' WHERE id = '$id_order'";
		$result = $this->db->update($query);
		return $result;
	}

 	public function confirm_shifted($cus_id,$id,$price)
 	{	
		$id = mysqli_real_escape_string($this->db->link, $id);
		$cus_id = mysqli_real_escape_string($this->db->link, $cus_id); 	
		$price = mysqli_real_escape_string($this->db->link, $price);

		$query = "UPDATE customer_order SET status = '2' WHERE id = '$id' and customer_id = '$cus_id' and price = '$price'";
		$result = $this->db->update($query);
		return $result;
 	}

 	public function del_compare($customer_id)
 	{
 			$sId = session_id();
			$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
			$result = $this->db->delete($query);
			return $result;
 	}

 }
?>
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
	class order
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function get_order($sql)
		{
			$query = $sql;
			$result = $this->db->select($query);
			$data=array();
			while($row = $result->fetch_object())
			{
				$id=$row->id;
                $productid=$row->productId;
				$name=$row->productName;
                $customerid=$row->customer_id;
                $quantity=$row->quantity;
				$price=$row->price;
				$image=$row->image;
                $status=$row->status;
                $date_order=$row->date_order;
				$qrcode=$row->qrcode;
				$data[]=array('id'=>$id,'productid'=>$productid,
				'name'=>$name,'customerid'=>$customerid,
				'quantity'=>$quantity,'price'=>$price,
				'image'=>$image,'status'=>$status,
				'date_order'=>$date_order,'qrcode'=>$qrcode);
			}
			header("content-type:application/json; charset=UTF8");
			echo json_encode($data);
		}
		public function get_order_nonapi($key,$cs_id)
		{
			$query = "Select * from customer_order where qrcode='$key' and customer_id='$cs_id'";
			$result = $this->db->select($query);
			return $result;
		}
    }
?>
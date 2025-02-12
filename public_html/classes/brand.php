<?php
$filepath = realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/database.php');
include_once  ($filepath.'/../helpers/format.php');
?>
<?php
 class brand
 {
 	 private $db;
 	 private $fm;

	 public function __construct()
	 {
		$this->db = new Database();
		$this->fm = new Format();  
	 }

	 public function insert_brand($brandName)
	 {
		$brandName = $this->fm->validation($brandName);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);  
		//Ket noi toi CSDL

		if(empty($brandName))
		{
			$alert = "<span class='error'>Brand must be not empty</span>";
			return $alert;
		}
		else
		{
			$query = "INSERT INTO product_brand(brandName) VALUES('$brandName')";
			$result = $this->db->insert($query);
			if($result)
			{
				$alert = "<span class='success'>Insert brand successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Insert brand not success </span>";
				return $alert;
			}
		}
	 }

	 public function select_brand()
	 {
	 	$query = "SELECT * FROM product_brand ORDER BY brandId desc";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function getbrandbyId($id)
	 {
	 	$query = "SELECT * FROM product_brand WHERE brandId = '$id'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function update_brand($brandName,$id)
	 {
	 	$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link, $brandName); 
		$id = mysqli_real_escape_string($this->db->link, $id); 
		if(empty($brandName))
		{
			$alert = "<span class='error'>Brand must be not empty</span>";
			return $alert;
		}
		else
		{
			$query = "UPDATE product_brand SET brandName = '$brandName' WHERE brandId = '$id'";
			$result = $this->db->update($query);
			if($result)
			{
				$alert = "<span class='success'> Brand updated successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Brand updated not success </span>";
				return $alert;
			}
		}
	 }
	 public function delete_brand($id)
	 {
			$query = "DELETE FROM product_brand WHERE brandId = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'> Brand deleted successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Brand deleted not success </span>";
				return $alert;
			}
			return $result;
	 }
 }
?>
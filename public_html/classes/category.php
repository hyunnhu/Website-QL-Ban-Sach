<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
 class category
 {
 	 private $db;
 	 private $fm;

	 public function __construct()
	 {
		$this->db = new Database();
		$this->fm = new Format();  
	 }

	 public function insert_category($catName)
	 {
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link, $catName);  
		//Ket noi toi CSDL

		if(empty($catName))
		{
			$alert = "<span class='error'>Category must be not empty</span>";
			return $alert;
		}
		else
		{
			$query = "INSERT INTO product_category(catName) VALUES('$catName')";
			$result = $this->db->insert($query);
			if($result)
			{
				$alert = "<span class='success'>Insert category successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Insert category not success </span>";
				return $alert;
			}
		}
	 }

	 public function select_category()
	 {
	 	$query = "SELECT * FROM product_category ORDER BY catId desc";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function getcatbyId($id)
	 {
	 	$query = "SELECT * FROM product_category WHERE catId = '$id'";
	 	$result = $this->db->select($query);
	 	return $result;
	 }

	 public function update_category($catName,$id)
	 {
	 	$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link, $catName); 
		$id = mysqli_real_escape_string($this->db->link, $id); 
		if(empty($catName))
		{
			$alert = "<span class='error'>Category must be not empty</span>";
			return $alert;
		}
		else
		{
			$query = "UPDATE product_category SET catName = '$catName' WHERE catId = '$id'";
			$result = $this->db->update($query);
			if($result)
			{
				$alert = "<span class='success'> Category updated successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Category updated not success </span>";
				return $alert;
			}
			header('http://localhost:8080/source/homedir/public_html/admin/catlist.php');
		}
	 }
	 public function delete_category($id)
	 {
			$query = "DELETE FROM product_category WHERE catId = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'> Category deleted successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'>Category deleted not success </span>";
				return $alert;
			}
			return $result;
	 }

	 public function select_category_frontend()
	 {
	 	$query = "SELECT * FROM product_category ORDER BY catId desc";
	 	$result = $this->db->select($query);
	 	return $result;				
	 }

	 public function get_product_by_cat($id)
	 {
	 	$query = "SELECT * FROM product WHERE catId = '$id' ORDER BY catId desc";
	 	$result = $this->db->select($query);
	 	return $result;
	 }
	 
	 public function get_name_by_cat($id)
	 {
	 	$query = "SELECT product.*, product_category.catName, product_category.catId FROM product, product_category 
	 	WHERE product.catId = product_category.catId AND product.catId = '$id' LIMIT 1";
	 	$result = $this->db->select($query);
	 	return $result;
	 }
 }
?>
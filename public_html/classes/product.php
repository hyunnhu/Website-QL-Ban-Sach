<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
	class product
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();  
		}

		public function get_product()
		{
			$query = "SELECT * FROM product";
			$result = $this->db->select($query);
			$data=array();
			while($row = $result->fetch_assoc())
			{
				$id=$row['productId'];
				$name=$row['productName'];
				$catId=$row['catId'];
				$brandId=$row['brandId'];
				$data[]=array('id'=>$id,'name'=>$name,'catId'=>$catId,'branId'=>$brandId);
			}
			header("content-type:application/json; charset=UTF-8");
			echo json_encode($data);
		}

		public function insert_product($data,$files)
		{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']); 
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']); 
			$category = mysqli_real_escape_string($this->db->link, $data['category']); 
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']); 
			$price = mysqli_real_escape_string($this->db->link, $data['price']);
			$quantity = mysqli_real_escape_string($this->db->link, $data['quantity']); 
			$type = mysqli_real_escape_string($this->db->link, $data['type']); 
			//Ket noi toi CSDL
			//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
				
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
				
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			
			if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $quantity == ""|| $type == "" || $file_name == "")
			{
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}
			else
			{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "INSERT INTO product(productName,brandId,catId,product_desc,price,quantity,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$quantity','$type','$unique_image')";
				$result = $this->db->insert($query);
				if($result)
				{
					$alert = "<span class='success'>Insert product successfully </span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'>Insert product not success </span>";
					return $alert;
				}
			}
		}

		public function select_product()
		{
			$query = "SELECT product.*, product_category.catName, product_brand.brandName
			FROM product 
			INNER JOIN product_category ON product.catId = product_category.catId
			INNER JOIN product_brand ON product.brandId = product_brand.brandId
			ORDER BY product.productId desc";
			//$query = "SELECT * FROM product ORDER BY productId desc";
			$result = $this->db->select($query);
			return $result;
		}
			
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM product WHERE productId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function update_product($data,$files,$id)
		{
			$productName = mysqli_real_escape_string($this->db->link, $data['productName']); 
			$brand = mysqli_real_escape_string($this->db->link, $data['brand']); 
			$category = mysqli_real_escape_string($this->db->link, $data['category']); 
			$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']); 
			$price = mysqli_real_escape_string($this->db->link, $data['price']); 
			$quantity = mysqli_real_escape_string($this->db->link, $data['quantity']); 
			$type = mysqli_real_escape_string($this->db->link, $data['type']); 
			//Ket noi toi CSDL
			//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
				
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
				
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($productName == "" || $brand == "" || $category == "" || $product_desc == "" || $price == "" || $quantity == "" || $type == "")
			{
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}
			else
			{
				if(!empty($file_name)) //Nếu người dùng chọn ảnh
				{
					if(in_array($file_ext, $permited) === false)
					{
						$alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE product SET
					productName = '$productName',
					brandId = '$brand',
					catId = '$category', 
					type = '$type', 
					price = '$price',
					quantity = '$quantity', 
					image = '$unique_image',
					product_desc = '$product_desc'
					WHERE productId = '$id'";
					$result = $this->db->update($query);
					if($result)
					{
						$alert = "<span class='success'> Product updated successfully </span>";
						return $alert;
					}
					else
					{
						$alert = "<span class='error'> Product updated not success </span>";
						return $alert;
					}
				}
				else // Nếu người dùng không chọn ảnh
				{
					$query = "UPDATE product SET 
					productName = '$productName',
					brandId = '$brand',
					catId = '$category',
					type = '$type',
					price = '$price',
					quantity = '$quantity', 
					product_desc = '$product_desc'
					WHERE productId = '$id'";
				}
				$result = $this->db->update($query);
				if($result)
				{
					$alert = "<span class='success'> Product updated successfully </span>";
					return $alert;
				}
				else
				{
					$alert = "<span class='error'> Product updated not success </span>";
					return $alert;
				}
			}
		}

		public function delete_product($id)
		{
			$query = "DELETE FROM product WHERE productId = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'> Product deleted successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'> Product deleted not success </span>";
				return $alert;
			}
			return $result;
		}

		//END BACK-END

		public function getproduct_featured()
		{
			$query = "SELECT * FROM product WHERE type = '1' LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getproduct_new()
		{
			$sp_tungtrang = 4;
			if(!isset($_GET['trang']))
			{
				$trang = 1;
			}
			else
			{
				$trang = $_GET['trang'];
			}
			$tungtrang = ($trang - 1) * $sp_tungtrang;
			$query = "SELECT * FROM product ORDER BY productId desc LIMIT $tungtrang,$sp_tungtrang";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_all_product()
		{
			$query = "SELECT * FROM product";
			$result = $this->db->select($query);
			return $result;
		}

		public function get_details($id)
		{
			$query = "SELECT product.*, product_category.catName, product_brand.brandName
			FROM product 
			INNER JOIN product_category ON product.catId = product_category.catId
			INNER JOIN product_brand ON product.brandId = product_brand.brandId WHERE product.productId = '$id'";
			//$query = "SELECT * FROM product ORDER BY productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getLastestHealth()
		{
			$query = "SELECT * FROM product WHERE catId = '26' ORDER BY productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getHealth()
		{
			$query = "SELECT * FROM product WHERE catId = '26' ORDER BY productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getLastestComic()
		{
			$query = "SELECT * FROM product WHERE catId = '25' ORDER BY productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getComic()
		{
			$query = "SELECT * FROM product WHERE catId = '25' ORDER BY productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}
		public function getLastestRomantic()
		{
			$query = "SELECT * FROM product WHERE catId = '12' ORDER BY productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getRomantic()
		{
			$query = "SELECT * FROM product WHERE catId = '12' ORDER BY productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getLastestNovel()
		{
			$query = "SELECT * FROM product WHERE catId = '19' ORDER BY productId desc LIMIT 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getNovel()
		{
			$query = "SELECT * FROM product WHERE catId = '19' ORDER BY productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function insertCompare($productid,$customer_id)
		{
			$productid = mysqli_real_escape_string($this->db->link, $productid); 
			$customer_id = mysqli_real_escape_string($this->db->link, $customer_id); 

			$check_compare = "SELECT * FROM tbl_compare WHERE productId = '$productid' AND customer_id='$customer_id'";
			$result_check_compare = $this->db->select($check_compare);
			if($result_check_compare)
			{
				$msg = "<span style='color:red; font-size:18px;'>Product Already Added to Wishlist</span>";
				return $msg;
			}
			else
			{
				$query = "SELECT * FROM product WHERE productId = '$productid'";
				$result = $this->db->select($query)->fetch_assoc();
				
				$image = $result['image'];
				$price = $result['price'];
				$productName = $result['productName'];

				$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) 
				VALUES('$productid','$price','$image','$customer_id','$productName')";
				$insert_compare = $this->db->insert($query_insert);
				if($insert_compare)
					{
						$alert = "<span class='success'> Added Wishlist Successfully </span>";
						return $alert;
					}
					else
					{
						$alert = "<span class='error'> Added Wishlist Not Success </span>";
						return $alert;
					}
			}
		}

		public function get_compare($customer_id)
		{
			$query = "SELECT * FROM tbl_compare WHERE customer_id = '$customer_id' ORDER BY id desc";
			$result = $this->db->select($query);
			return $result; 	
		}

		public function delete_wishlist($id)
		{
			$query = "DELETE FROM tbl_compare WHERE productId = '$id'";
			$result = $this->db->delete($query);
			return $result;
		}

		public function insert_slider($data,$files)
		{
			$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']); 
			$type = mysqli_real_escape_string($this->db->link, $data['type']); 
			//Ket noi toi CSDL
			//mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
				
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
				
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($sliderName == "" || $type == "")
			{
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}
			else
			{
				if(!empty($file_name)) //Nếu người dùng chọn ảnh
				{
					if ($file_size > 2048000) 
					{
						$alert = "<span class='success'>Image Size should be less than 2MB!</span>";
						return $alert;
					}
					else if(in_array($file_ext, $permited) === false)
					{
						$alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
						return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);			
					$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
					$result = $this->db->insert($query);
					if($result)
					{
						$alert = "<span class='success'>Slider Added Successfully </span>";
						return $alert;
					}
					else
					{
						$alert = "<span class='error'>Slider Added Not Success </span>";
						return $alert;
					}
				}
			}
		}

		public function select_slider()
		{
			$query = "SELECT * FROM tbl_slider WHERE type = '1' ORDER BY sliderId desc";
			$result=$this->db->select($query);
			return $result;
			}

			public function select_slider_admin()
			{
			$query = "SELECT * FROM tbl_slider";
			$result=$this->db->select($query);
			return $result;
			}

			public function update_type_slider($id,$type)
			{
			$type = mysqli_real_escape_string($this->db->link, $type); 
			$query = "UPDATE tbl_slider SET type = '$type' WHERE sliderId='$id' ";
			$result=$this->db->update($query);
			return $result;
		}

		public function del_slider($id)
		{
			$query = "DELETE FROM tbl_slider WHERE sliderId = '$id'";
			$result = $this->db->delete($query);
			if($result)
			{
				$alert = "<span class='success'> Slider deleted successfully </span>";
				return $alert;
			}
			else
			{
				$alert = "<span class='error'> Slider deleted not success </span>";
				return $alert;
			}
			return $result;
		}

		public function search_product($tukhoa)
		{
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT *FROM product WHERE productName LIKE '%$tukhoa%' ";
			$result=$this->db->select($query);
			return $result;
		}
	}
?>
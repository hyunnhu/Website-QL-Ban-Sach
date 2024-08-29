<?php
	include 'inc/header.php';
?>
<?php
if(isset($_GET['catid']) || $_GET['catid']!=NULL)
{
    $id = $_GET['catid'];
}

/*if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
{
    $updateProduct = $pd->update_product($_POST,$_FILES,$id);
}*/
?>
<div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php
	      		$name_cat = $cat->get_name_by_cat($id);
	      		if($name_cat)
	      		{
	      			while($result = $name_cat->fetch_assoc())
	      			{
	      	?>
    		<div class="heading">
    		<h3><a href="products.php" style="text-decoration:underline; color:#602d8d;">Thể Loại</a> / <?php echo $result['catName'] ?> </h3>
    		</div>
    		<?php
	      			}
	      		}
			?>
    		<div class="clear"></div>
    	</div>

	    <div class="" style="display: inline;">
	      	<?php
	      		$productbycat = $cat->get_product_by_cat($id);
	      		if($productbycat)
	      		{
	      			while($result = $productbycat->fetch_assoc())
	      			{
	      	?>
				<div class="grid_1_of_4 images_1_of_4" style="width: 220px; height: 420px; display: inline-block;">
					<a href="details.php?proid=<?php echo $result['productId'] ?>">
						<img height="200px" width="200px" src="admin/uploads/<?php echo $result['image'] ?>" alt="" />
					</a>
					<a href="details.php?proid=<?php echo $result['productId']?>" style="text-decoration:none;">
						<h2><?php echo $result['productName'] ?></h2>
					</a>
					<p><span class="price"><?php echo $fm->format_currency($result['price']) ?></span></p>
				    <div class="button">
						<span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Details</a></span>
					</div>
				</div>
			<?php
	      			}
	      		}
	      		else
	      		{
	      			echo '<span style="color:red; font-size:18px;">Category is not available</span>';
	      		}
			?>
		</div>
    </div>
	<div class="clear"></div>
</div>
<style>
	.button{
	align-content:center;
	position: absolute;
	bottom:1rem;
	right: 0.4rem;
	}
</style>

<?php
	include 'inc/footer.php';
?>
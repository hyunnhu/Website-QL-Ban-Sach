<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'?>
<?php include '../classes/brand.php'?>
<?php include '../classes/product.php'?>
<?php include_once '../helpers/format.php'?>
<?php
$pd = new product();
if(isset($_GET['productid']))
{
	$id = $_GET['productid'];
	$delpro = $pd->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">  
        	<?php
        		if(isset($delpro))
        		{
        			echo $delpro;
        		}
        	?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Product Price</th>
					<th>In Stock</th>
					<th>Product Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$pd = new product();
					$fm = new Format();
					$pdlist = $pd->select_product();
					if($pdlist)
					{
						$i = 0;
						while($result = $pdlist->fetch_assoc())
							{
								$i++;

					?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $fm->format_currency($result['price']) ?></td>
					<td><?php echo $result['quantity'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80px" height="80px"></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td>
					<?php 
						echo $fm->textShorten($result['product_desc'], 30); 
					?>
					</td>
					<td>
					<?php
						if($result['type'] == 1)
						{
							echo 'Featured';
						}
						elseif($result['type'] == 0)
						{
							echo 'Non-featured';
						}
					?>
					</td>
					<td><a href="productedit.php?productid=<?php echo $result['productId']?>">Edit</a> || 
						<a onclick="return confirm('Do you want to delete ?')" href="?productid=<?php echo $result['productId']?>">Delete</a></td>
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

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

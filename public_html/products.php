<?php
	include 'inc/header.php';
?>
<style type="text/css">
.page
{
	color:#602D8D; font-size:22px;font-family: "Monda", sans-serif;
}
.number
{
	margin:0 3px; background-color:#602D8D; color:white; font-size:25px; font-family: "Monda", sans-serif;
}
.sub_content_top *
{
	display: inline;
}
.sub_content *
{
	margin-left: 25px;
	font-size:25px;
}
.sub_content a{
    text-decoration:none;
    transition:0.2s all ease-in;
    padding:15px 0 15px 0;
}
.sub_content a:hover{
    color:white;
    background:#70389C;
    border-radius:10px;
}
.price{
	position: absolute;
	bottom:5rem;
	left:2.5rem;
	
}
.button{
	align-content:center;
	position: absolute;
	bottom:1rem;
	right: 0.4rem;
}
</style>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
    {
    
    	$quantity = 1;
        $insertCart = $ct->add_to_cart($quantity,$id);
    }
?>

<div class="main">
    <div class="content">
		<div class="sub_content_top content_top">
			<h4 style="font-weight:bold;font-size:22px;">Thể loại:</h4>
			<div class="sub_content" style="bdisplay: inline-block; margin-left: 5px">
				<a href="productbycat.php?catid=12">Romantic</a>
				<a href="productbycat.php?catid=25">Comics</a>
				<a href="productbycat.php?catid=19">Novel</a>
				<a href="productbycat.php?catid=26">Health</a>
				<a href="productbycat.php?catid=11">Action</a>
				<a href="productbycat.php?catid=27">Documentary</a>
				<a href="productbycat.php?catid=9">Sport</a>
			</div>
    	</div>

		<div class="section group" style="display: inline;">
			<?php
				$pr= $product->get_all_product();
				if($pr)
				{
					while($result = $pr->fetch_assoc())
					{
			?>
			<div class="grid_1_of_4 images_1_of_4" style="height:50vh; width:158px;">
				<a href="details.php?proid=<?php echo $result['productId']?>"><img height="200px" width="200px" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
				<a href="details.php?proid=<?php echo $result['productId']?>" style="text-decoration:none;"><h2><?php echo $result['productName'] ?></h2></a>
				<p><span class="price"><?php echo $fm->format_currency($result['price']) ?></span></p>
				<div class="button">
                    <span>
						<a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a>
					</span>
				</div>
				<div class="clear"></div>
			</div>
			<?php
    			}
    		}
			?>
			<div class="clear"></div>
		</div>
    </div>
</div>

<?php
	include 'inc/footer.php';
?>
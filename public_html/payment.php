<?php
	include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
		$login_check = Session::get('customer_login');
	  	if($login_check == false)
	  	{
	  		header('Location:login.php');
	  	}
?>
<?php
/*if(isset($_GET['proid']) || $_GET['proid']!=NULL)
{
    $id = $_GET['proid'];
}
else
{
    echo'<script>window.location=""</script>';
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
{
	$quantity = $_POST['quantity'];
    $AddtoCart = $ct->add_to_cart($quantity,$id);
}*/
?>
<style type="text/css">
  h3.payment
  {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
  }
  .wrapper_method
  {
    text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 30px;
    background: cornsilk;
    border-radius:5px;
  }
  .wrapper_method a
  {
    padding: 1rem;
    margin: 0.2rem;
    border-radius: 5px;
    color: #fff;
    background:red;
    transition:0.2s all ease-in;
  }
  .wrapper_method a:hover
  {
    background:gray;
    color:red;
    text-decoration:none;
  }
  .wrapper_method h3
  {
    margin-bottom: 20px;
  }
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    	<div class="content_top">
    		<div class="heading">
    		<h3>THANH TOÁN</h3></br>
    		</div>
    		<div class="clear"></div>	  
            <div class="wrapper_method">
                  <h3 class="payment">Vui lòng chọn loại thanh toán</h3>
                  <a href="offlinepayment.php">Trả sau</a>
                  <a href="#onlinepayment.php">ATM / Banking (Bảo trì)</a> 
                  <a href="vnpay_php/index.php">PayOS</a>
                  </br></br><br>
                  <a style="background:none; color:red;" href="cart.php"> << Quay lại</a>
            </div>
    		</div>
    	</div>
 		</div>
 	</div>
<?php
	include 'inc/footer.php';
?>
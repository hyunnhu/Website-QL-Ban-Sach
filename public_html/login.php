<?php
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 13-12-2020 04:46 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 
 
require_once 'config.php';

$permissions = ['email']; //optional

if (isset($accessToken))
{
	if (!isset($_SESSION['facebook_access_token'])) 
	{
		//get short-lived access token
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		
		//OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		
		//Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		
		//setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	} 
	else 
	{
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
	
	//redirect the user to the index page if it has $_GET['code']
	if (isset($_GET['code'])) 
	{
		header('Location:https://bkstore.io.vn/');
	}
	
	
	try {
		$fb_response = $fb->get('/me?fields=name,first_name,last_name,email');
		$fb_response_picture = $fb->get('/me/picture?redirect=false&height=200');
		
		$fb_user = $fb_response->getGraphUser();
		$picture = $fb_response_picture->getGraphUser();
		
		$_SESSION['fb_user_id'] = $fb_user->getProperty('id');
		$_SESSION['fb_user_name'] = $fb_user->getProperty('name');
		$_SESSION['fb_user_email'] = $fb_user->getProperty('email');
		$_SESSION['fb_user_pic'] = $picture['url'];
		
		
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Facebook API Error: ' . $e->getMessage();
		session_destroy();
		// redirecting user back to app login page
		header("Location: ./");
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK Error: ' . $e->getMessage();
		exit;
	}
} 
else 
{	
	// replace your website URL same as added in the developers.Facebook.com/apps e.g. if you used http instead of https and you used
	$fb_login_url = $fb_helper->getLoginUrl('https://bkstore.io.vn/login.php/', $permissions);
}
?>

<?php
	include 'inc/header.php';
?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/lib/database.php');
include_once ($filepath.'/helpers/format.php');
?>

<?php
$db = new Database();
$fm = new Format();  
?>

<?php
//Check login with normal account
$login_check = Session::get('customer_login');
if($login_check)
{
	header('Location:order.php');
}
?>

<?php
//Insert customer with normal account
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
{
    $insertCustomer = $cs->insert_customer($_POST);
}
?>

<?php
//Login with normal account
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']))
{
    $login_Customer = $cs->login_customer($_POST);
}
?>


 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php
		    	if(isset($login_Customer))
		    	{
		    		echo $login_Customer;
		    	}
		    ?>
        	<h3>Đã có tài khoản</h3>
        	<p>Đăng nhập vào form bên dưới.</p>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Enter Email...">
                    <input type="password" name="password" class="field" placeholder="Enter Password...">
                    <div class="buttons"><div><button type="submit" class="grey" name="login">Đăng Nhập</button></div></div>
                    <p></p>
                    <a href="<?php echo $fb_login_url;?>"><img src="images/login_fb.png" style="border-radius: 3px"></a>
                    <p></p>
                    <a href=""><img src="images/login_gg.png" style="border-radius: 3px"></a>
            </form>
        </div>

    	<div class="register_account">
    		<h3>Tạo tài khoản mới</h3>
    		<?php
		    	if(isset($insertCustomer))
		    	{
		    		echo $insertCustomer;
		    	}
		    ?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
								<input type="text" name="email" placeholder="Nhập E-Mail...">
							</div>
							<div>
								<input type="text" name="password" placeholder="Nhập mật khẩu...">
							</div>
							<div>
								<input type="text" name="name" placeholder="Họ tên..." >
							</div>	
				           <div>
				          		<input type="text" name="phone" placeholder="SĐT...">
				          </div>	
		    			 </td>
		    			<td>
							<div>
								<input type="text" name="zipcode" placeholder="Mã vùng...">
							</div>
							<div>
								<input type="text" name="address" placeholder="Địa chỉ...">
							</div>
							<div>
							   <input type="text" name="city" placeholder="Thành phố...">
							</div>
						<div>
							<input type="text" name="country" placeholder="Quốc gia...">
						</div>        
		    			</td>
		    </tr> 
		    </tbody></table> </br> 
		   <div class="search"><div><button type="submit" name="submit" class="grey">Tạo tài khoản</button> </div></div>
		    <p class="terms">Bằng cách nhấn 'Tạo tài khoản' bạn đã đồng ý với <a style="color:blue;" href="">Điều khoản &amp; Chính sách</a>.</p>
		    <div class="clear"></div>

		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
if(isset($_SESSION['fb_user_id'])) 
{
	$fb_user_name = $_SESSION['fb_user_name'];
	$fb_user_email = $_SESSION['fb_user_email'];

	$check_email ="SELECT * FROM tbl_customer WHERE name='$fb_user_name' AND status='0' LIMIT 1";
	$result_check = $db->select($check_email);
	if($result_check)
	{
		$value = $result_check->fetch_assoc();
		Session::set('customer_login',true);
		Session::set('customer_id',$value['id']);
		Session::set('customer_name',$fb_user_name);
		header('location:index.php');
	}

	else
	{
		$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password,status) 					VALUES('$fb_user_name',' ',' ','$fb_user_email',' ',' ',' ',' ','0')";
		$result = $db->insert($query);
		if($result)
			{
				$check_email ="SELECT * FROM tbl_customer WHERE name='$fb_user_name' AND status='0' LIMIT 1";
				$result_check = $db->select($check_email);
				if($result_check)
				{
					$value = $result_check->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$value['id']);
					Session::set('customer_name',$fb_user_name);
					header('location:index.php');
				}
			}
		else
			{
				$alert = "<span style='color:red; font-size:18px;'>Tạo tài khoản không thành công!</span>";
				return $alert;
			}
	}
 }

?>
<?php
	include 'inc/footer.php';
?>
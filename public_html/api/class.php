<?php
    class apiqr
	{
        private function urlapi($url)
		{
            $client=curl_init($url);
            curl_setopt($client,CURLOPT_RETURNTRANSFER,1);
            $response=curl_exec($client);
            $result=json_decode($response);
            return $result;
        }
        // public function getProduct($url)
        // {
        //     $results=$this->urlapi($url);
        //     $count=1;
        //     foreach($results as $data)
		// 	{
		// 		echo '<tr>
		// 				  <td align="center" valign="middle">'.$dem.'</td>
		// 				  <td align="center" valign="middle">'.$data->masv.'</td>
		// 				  <td align="center" valign="middle">'.$data->hodem.'</td>
		// 				  <td align="center" valign="middle">'.$data->ten.'</td>
		// 			 </tr>';
		// 		$count++;
        //     }
        // }

        public function getorder($url)
        {
            $result=$this->urlapi($url);
            echo 
            '<table class="tblone">
                <tr>
                    <th width="10%">STT</th>
                    <th width="20%">Tên SP</th>
                    <th width="10%">H.Ảnh</th>
                    <th width="15%">Giá</th>
                    <th width="5%">S.lượng</th>
                    <th width="20%">Ngày đặt</th>
                    <th colspan="1" width="10%">Tr.Thái</th>
                    <th width="10%"></th>
                </tr>
            ';
            $count=1;
            foreach($result as $data)
            {
                echo'
                    <tr>
                        <td>'.$count.'</td>
                        <td>'.$data->name.'</td>
                        <td><img src="admin/uploads/'.$data->image.'" alt=""/></td>
                        <td>'.$data->price.'</td>
                        <td>'.$data->quantity.'</td>
                        
                        <td>'.$data->date_order.'</td>
                        <td>
                            <?php
                                if('.$data->status.' == "0")
                                {
                                    echo "<p style="color: green;">Pending</p>";
                                }
                                else if('.$data->status.' == "1")
                                {
                                    echo "<span>Shipped</span>";
                                }
                                else if('.$data->status.' == "2")
                                {
                                    echo "Received";
                                }
                            ?>
                        </td>

                        <?php
                            if('.$data->status.'== "0")
                            {
                                echo "<td>N/A</td>";							
                            }
                            elseif('.$data->status.' == "1")
                            {
                                echo "<td><a href="?confirmid='.$data->customerid.'&price='.$data->price.'&id='.$data->id.'">Confirmed</a></td>";
                            }
                            else
                            {
                                echo "<td><a href="order_QR.php?key='.$data->qrcode.'">Kiểm tra QR</a></td>";
                            }
                        ?>
                    </tr>';
            }
            echo '
            </table>';
        }

        public function getOrderbyid($url)
        {
            $data=$this->urlapi($url);
                echo'
                <table border="borderless">
                    <tr>
                        <th colspan	="2">THÔNG TIN SẢN PHẨM</th>
                    </tr>
                    <tr>
                        <th colspan="2">Mã đơn hàng:'.$data->id.'</th>
                    </tr>
                    <tr>
                        <td rowspan="2"><img src="admin/uploads/0ee4d89ced.jpg" alt="" width="100%"></td>
                        <td>Tên sản phẩm:</td>
                    </tr>
                    <tr>
                        <td>Ngày mua:</td>
                    </tr>
                </table>
                ';
            curl_close($url);
        }
    }
?>
<?php
	echo "hi";
	// if(isset($_POST["login_button"]))
	// {
	// 	$uname = $_POST["username"];
	// 	$pass = $_POST["password"];

	// 	$con = mysqli_connect('localhost','root','');
	// 	$db = mysqli_select_db($con,'deluxfurniture');

	// 	$sql1=mysqli_query("select a_name from admin where a_name='".$uname."'");
	// 	$sql2=mysqli_query("select a_password from admin where a_password='".$pass."'");

	// 	if($uname==$sql1 && $pass==$pass)
	// 	{
	// 		echo "string is ok";
	// 		//header('location:example.php');
	// 	}
	// 	else
	// 	{
	// 		echo "username and password is incorrect....";
	// 	}
		// print_r($sql1);
		// $sql = "select * form admin where a_name = '$uname' and a_password = '$pass' ";
		// $sql="select count(id) as lid from admin where a_name='".$uname."' and a_password='".$pass."'";
		// $res = mysqli_query($con,$sql);
		// if(isset($res))
		// {
		// 	$row=mysqli_fetch_assoc($res);
			
		// 	if($row["lid"]==0)
		// 	{
		// 		echo "Wrong";
		// 	}
		// 	else
		// 	{
		// 		header('Location:example.php');
		// 	}
		// }
		// $row = mysqli_num_rows($res);
			// if($row == 1)
			// {
			// 	echo "login Suceesful";
			// 	header('location:example.php');
			// }
			// else
			// {
			// 	echo "Admin name & password is incorrect";
			// 	header('location:index.php');
			// }
	}

?>
<!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Furniture Name</h3>
                <ul class="nav side-menu">
                    <li><a href ="home.php"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="product.php"><i class="fa fa-table"></i> Product</a></li>
                    <li><a href="#"><i class="fa fa-users"></i> Customer's</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> Supplier</a></li>
                    <li><a href="#"><i class="fa fa-file-text"></i> Report</a></li>
                    
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->


        <!-- put in line number 91 in index.php -->
        <div class="col-md-4">
			    <div class="product">
				    <a href="product.php"><img alt="dres2" src="../admin/uploads/product/<?php $row['p_image']; ?>"></a>
				    <div class="name">
				    <a href="#"><?php echo $row['p_name']; ?></a>
				    </div>
				    <div class="price">
				    <p><?php echo $row['p_price']; ?></p>
				    </div>	

				</div>	
			
			</div>			
		    <div class="col-md-4">
			    <div class="product">
				    <a href="product.php"><img alt="dress3" src="products/dress6home.jpg"></a>
					<div class="name">
				    <a href="#"><?php echo $row['p_name']; ?></a>
				    </div>
				    <div class="price">
				    <p><?php echo $row['p_price']; ?></p>
				    </div>
				</div>	
			</div>





			<div class="x_contain">
                                       <div class="table-responsive"> 
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr.no</th>
                                                    <!-- <th>ID</th> -->
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Address</th>
                                                    <th>City</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                        include('config.php');
                                                        $sql="select * from customer";

                                                        $res=mysqli_query($con,$sql);
                                                        $srno=1;
                                                        while($test=mysqli_fetch_array($res))
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>".$srno."</td>";
                                                        
                                                            echo "<td>".$test['uname']."</td>";
                                                            echo "<td>".$test['email']."</td>";
                                                            echo "<td>".$test['contact']."</td>";
                                                            echo "<td>".$test['address']."</td>";
                                                            echo "<td>".$test['city']."</td>";
                                                            echo "<td>".$test['date']."</td>";
                                                            echo "</tr>";
                                                            $srno++;
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                       </div> 
                                </div>
<?php
include('config.php');

if(isset($_POST['deletebtn']))
{
		$key=$_POST['chkbox'];
		$sql="select * from product where p_id='".$key."' ";
		$res=mysqli_query($con,$sql);

		if(mysqli_num_rows($res)>0)
		{
			$sql="delete from product where p_id='".$key."'";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Record Deleted.');location.href='view_product.php';</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Delete');location.href='view_product.php';</script>";
		}
		return false;
}
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM product
	WHERE p_name LIKE '%".$search."%'
	OR p_price LIKE '%".$search."%' 
	OR p_colour LIKE '%".$search."%'  
	OR date LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM product ORDER BY p_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	// echo '<form name="product" method="POST">';
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Name</th>
							<th>Price</th>
	                        <th>Quantity</th>
			                <th>Description</th>
			                <th>Dimension</th>
		                    <th>Colour</th>
				            <th>Image</th>
					        <th>Date</th>
					        <th>Action</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				
				<td>'.$srno.'</td>
				<td>'.$row["p_name"].'</td>
				<td>'.$row["p_price"].'</td>
				<td>'.$row["p_quantity"].'</td>
				<td>'.$row["p_description"].'</td>
				<td>'.$row["p_dimension"].'</td>
				<td>'.$row["p_colour"].'</td>
				<td><img height=40px width=40px src="uploads/product/'.$row["p_image"].'"></td>
				<td>'.$row["date"].'</td>
				<td colspan="2" >
					<form method="GET" action="update_product.php"><input type="hidden" name="chkbox" value='.$row['p_id'].'>
						<input type="submit" name="deletebtn" class="btn btn-info" value="🖉" style="-webkit-appearance: button;
						cursor: pointer;
						background: transparent;
						color: black;
						font-size: 16px;
						font-weight: bold;">
					</form>
					<form method="POST" action="fetch_product.php"><input type="hidden" name="chkbox" value='.$row['p_id'].'>
						<input type="submit" name="deletebtn" class="btn btn-info" value="🗑" style="-webkit-appearance: button;
						cursor: pointer;
						background: transparent;
						color: black;
						font-size: 16px;
						font-weight: bold;
						padding-left: 16px;">
					</form>
				</td>
			
			</tr>
		';
		$srno++;
	}
	echo $output;
	// echo '</form>';

}
else
{
	echo 'Data Not Found';
}
?>
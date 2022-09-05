<?php
include('config.php');

if(isset($_POST['deletebtn']))
{
		$key=$_POST['chkbox'];
		$sql="select * from category where category_id='".$key."' ";
		$res=mysqli_query($con,$sql);
		//print_r($res);
		//var_dump($res);
		if(mysqli_num_rows($res)>0)
		{
			$sql="delete from category where category_id='".$key."'";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Record Deleted.');location.href='manage_category.php';</script>";

		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Delete');location.href='manage_category.php';</script>";
		}
}
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM category 
	WHERE category_name LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM category ORDER BY category_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	// echo '<form name="category" method="POST">';
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Name</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			
			<tr>
				
				<td>'.$srno.'</td>
				<td>'.$row["category_name"].'</td>
				<td colspan="2"><form method="POST" action="fetch_category.php"><input type="hidden" name="chkbox" value='.$row['category_id'].'>   
															<input type="submit" name="deletebtn" class="btn btn-info" value="Delete"></form></td>
			
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
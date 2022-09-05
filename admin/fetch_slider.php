<?php
include('config.php');

if(isset($_POST['deletebtn']))
{
		$key=$_POST['chkbox'];
		$sql="select * from slider where id='".$key."' ";
		$res=mysqli_query($con,$sql);

		if(mysqli_num_rows($res)>0)
		{
			$sql="delete from slider where id='".$key."'";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Record Deleted.');location.href='view_slider.php';</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Delete');location.href='view_slider.php';</script>";
		}
		return false;
}
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM slider
	WHERE slider_title LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM slider ORDER BY id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	// echo '<form name="product" method="POST">';
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Slider Title</th>
				            <th>Image</th>
					        <th>Delete</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				
				<td>'.$srno.'</td>
				<td>'.$row["slider_title"].'</td>
				<td><img height=50px width=90px src="uploads/product/'.$row["slider_image"].'"></td>
				<td colspan="2"><form method="POST" action="fetch_slider.php"><input type="hidden" name="chkbox" value='.$row['id'].'>   
															<input type="submit" name="deletebtn" class="btn btn-info" value="Delete"></ form></td>
			
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
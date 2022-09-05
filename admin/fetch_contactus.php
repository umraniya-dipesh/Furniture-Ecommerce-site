<?php
include('config.php');

if(isset($_POST['deletebtn']))
{
		$key=$_POST['chkbox'];
		$sql="select * from contact_us where contactus_id='".$key."' ";
		$res=mysqli_query($con,$sql);
		//print_r($res);
		//var_dump($res);
		if(mysqli_num_rows($res)>0)
		{
			$sql="delete from contact_us where  contactus_id='".$key."'";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Record Deleted.');</script>";

		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Delete');</script>";
		}
}
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM contact_us
	WHERE cnt_name LIKE '%".$search."%' 
	OR email LIKE '%".$search."%'  
	OR subject LIKE '%".$search."%'
	OR message LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM contact_us ORDER BY contactus_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	echo '<form name="contact_us" method="POST">';
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Delete</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				
				<td>'.$srno.'</td>
				<td>'.$row["cnt_name"].'</td>
				<td> <a href="mailto:">'.$row["email"].'</a></td>
				<td>'.$row["message"].'</td>
				<td colspan="2"><input type="hidden" name="chkbox" value='.$row['contactus_id'].'>   
															<input type="submit" name="deletebtn" class="btn btn-info" value="Delete"></td>
			
			</tr>
		';
		$srno++;
	}
	echo $output;
	echo '</form>';

}
else
{
	echo 'Data Not Found';
}
?>
<?php
include('config.php');

if(isset($_POST['deletebtn']))
{
		$key=$_POST['chkbox'];
		$sql="select * from supplier where supplier_id='".$key."' ";
		$res=mysqli_query($con,$sql);
		//print_r($res);
		//var_dump($res);
		if(mysqli_num_rows($res)>0)
		{
			$sql="delete from supplier where  supplier_id='".$key."'";
			$res=mysqli_query($con,$sql);
			echo "<script type='text/javascript'>alert('Record Deleted.');location.href='view_supplier.php';</script>";

		}
		else
		{
			echo "<script type='text/javascript'>alert('Not Delete');location.href='view_supplier.php';</script>";
		}
}
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM supplier
	WHERE supplier_id LIKE '%".$search."%'
	OR sup_name LIKE '%".$search."%' 
	OR sup_email LIKE '%".$search."%'  
	OR sup_contact LIKE '%".$search."%'
	OR sup_address LIKE '%".$search."%'
	OR sup_city LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM supplier ORDER BY supplier_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	// echo '<form name="supplier" method="POST">';
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Name</th>
							<th>Email</th>
							<th>contact</th>
							<th>address</th>
							<th>city</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				
				<td>'.$srno.'</td>
				<td>'.$row["sup_name"].'</td>
				<td>'.$row["sup_email"].'</td>
				<td>'.$row["sup_contact"].'</td>
				<td>'.$row["sup_address"].'</td>
				<td>'.$row["sup_city"].'</td>
				<td colspan="2"><form method="POST" action="fetch_supplier.php"><input type="hidden" name="chkbox" value='.$row['supplier_id'].'>   
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
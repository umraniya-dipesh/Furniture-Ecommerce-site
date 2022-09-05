<?php
include('config.php');
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM customer 
	WHERE cust_id LIKE '%".$search."%'
	OR uname LIKE '%".$search."%'
	OR email LIKE '%".$search."%' 
	OR contact LIKE '%".$search."%' 
	OR address LIKE '%".$search."%' 
	OR city LIKE '%".$search."%'
	OR date LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM customer ORDER BY cust_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Contact</th>
							<th>Address</th>
							<th>City</th>
							<th>Date</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$srno.'</td>
				<td>'.$row["cust_id"].'</td>
				<td>'.$row["uname"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["contact"].'</td>
				<td>'.$row["address"].'</td>
				<td>'.$row["city"].'</td>
				<td>'.$row["date"].'</td>
			</tr>
		';
		$srno++;
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
<?php
include('config.php');
//$connect = mysqli_connect("localhost", "root", "", "deluxfurniture");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = "
	SELECT * FROM transaction 
	WHERE cust_id LIKE '%".$search."%'
	OR txn_id LIKE '%".$search."%' 
	OR status LIKE '%".$search."%' 
	OR amount LIKE '%".$search."%' 
	OR date LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM transaction ORDER BY transaction_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th>Sr.No</th>
							<th>Customer ID</th>
							<th>Transaction ID</th>
							<th>Status</th>
							<th>Amount</th>
							<th>Date</th>
						</tr>';
						$srno=1;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$srno.'</td>
				<td>'.$row["cust_id"].'</td>
				<td>'.$row["txn_id"].'</td>
				<td>'.$row["status"].'</td>
				<td>'.$row["amount"].'</td>
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
<?php
	require_once 'connect.php';
	if(ISSET($_POST['add_form'])){
		$table_no = $_POST['table_no'];
		$query = $conn->query("SELECT * FROM `transaction` WHERE `table_no` = '$table_no' && `status` = 'Check In'") or die(mysqli_error());
		$row = $query->num_rows;
		$time = date("H:i:s", strtotime("+8 HOURS"));
		if($row > 0){
			echo "<script>alert('table not available')</script>";
		}else{
			$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$total = $fetch2['price'] * $days;
			$total3 = $total + $total2;
			$checkout = date("Y-m-d", strtotime($fetch['checkin']));
			$conn->query("UPDATE `transaction` SET `table_no` = '$table_no',`status` = 'Check In' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			header("location:checkin.php");
		}
	}
?>
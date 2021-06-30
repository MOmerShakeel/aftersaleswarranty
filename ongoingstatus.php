<?php 
include 'config.php';

function ongoingstatus(){
    
    $conn = mysqli_connect("localhost", "root", "", "after sales warranty");
    $select = "SELECT warrantyTrackingNumber FROM warranty";
    $run = mysqli_query($conn,$select);
	while($row_warranty = mysqli_fetch_array($run)){
		$warrantyTrackingNumber = $row_warranty['warrantyTrackingNumber'];
    }   
    echo $warrantyTrackingNumber;
}

ongoingstatus();

?>
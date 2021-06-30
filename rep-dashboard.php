<?php
 
include 'config.php';

$salesOrderNumber = $_GET['salesOrderNumber'];
if (empty($salesOrderNumber)) {
  $salesOrderNumber = "";
  $customerName = "";
  $customerID = "";
  $productID = "";
  $productName = "";
  $date = "";
  $warrantyExpiryDate = "";
} else {
  $select = "SELECT sale.*,product.productName,customer.customerName, product.productPrice FROM `sale` LEFT JOIN product ON sale.productID = product.productID 
                LEFT JOIN customer ON sale.customerID = customer.customerID WHERE sale.salesOrderNumber = '$salesOrderNumber' ";

  $run = mysqli_query($conn, $select);
  $row_sale = mysqli_fetch_array($run);
  $salesOrderNumber = $row_sale['salesOrderNumber'];
  $customerName = $row_sale['customerName'];
  $customerID = $row_sale['customerID'];
  $productName = $row_sale['productName'];
  $productID = $row_sale['productID'];
  $productPrice = $row_sale['productPrice'];
  $date = $row_sale['saleDate'];
  $warrantyExpiryDate = $row_sale['warrantyExpiryDate'];
}
  ?>

<?php

if (isset($_POST['submit-btn'])) {
  $customerID = $_POST['customerID'];
  $productID = $_POST['productID'];
  $salesOrderNumber = $_POST['salesOrderNumber'];
  $date = $_POST['date'];
  $departmentID = $_POST['departmentID'];
  $description = $_POST['description'];
  $warrantyExpiryDate = $_POST['warrantyExpiryDate'];

  $insert = "INSERT INTO warranty(customerID,productID,departmentID,salesOrderNumber, description,warrantyExpiryDate, date) 
	VALUES('$customerID','$productID', '$departmentID', '$salesOrderNumber','$description','$warrantyExpiryDate','$date')";

  $select = "SELECT warrantyTrackingNumber FROM warranty WHERE salesOrderNumber = $salesOrderNumber";
  $run_select = mysqli_query($conn, $select);
  if (mysqli_num_rows($run_select) > 0) {
  while($row = mysqli_fetch_assoc($run_select)) {
    echo "Warranty Tracking Number: " . $row["warrantyTrackingNumber"] . " ";
    }
  }

  $run_insert = mysqli_query($conn, $insert);
  if ($run_insert == true) {
   // echo $db_warrantyTrackingNumber;
  } else  {
    echo "Try Again";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="bootstrap/assets/css/custSupRep.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <div class="split left">
    <div class="container">
    <h4>Customer Support Representative Dashboard <h4>
    <a class = "btn btn-danger" type = "button" href="logout.php">Logout</a><br>
          <div class="centered" id="searchWrapper">
            <form action="" method="get">
              <input id="search" type="number" min="1" name="salesOrderNumber" class="searchBar" placeholder="Input Sales Order Number"><br>
              <br><input id="submit" type="submit" value="Search">
            </form>
            <br>
            <br>
            <h6>Department IDs:</h6>
            <h6>Finished Goods Department :1</h6>
            <h6>Manufacturing Department : 2</h6>
          </div>
    </div>


    <div class="split right">
      <div class="container">
        <div class="centered">
          <form action="" method="post" enctype="multipart/form-data">
          <div><label>Customer Name: <?php echo $customerName; ?></label></div>
          <div><label>Product Name: <?php echo $productName; ?></label></div><br>
            <div class="form-group">
              <label>Warranty Tracking Number</label>
              <input class="form-control searchBar" placeholder="Number is assigned automatically">
            </div>
            <div class="form-group">
              <label>Sales Order Number</label>
              <input value=<?php echo '"' . $salesOrderNumber . '"'; ?> type="int" class="form-control searchBar" placeholder="Enter Sales Order Number" name="salesOrderNumber">
            </div>
            <div class="form-group">
              <label>Date of Purchase</label>
              <input value=<?php echo '"' . $date . '"'; ?> type="timestamp" class="form-control searchBar" placeholder="Enter Date of Purchase" name="date">
            </div>
            <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control searchBar" placeholder="Describe the fault" name="description">
            </div>
            <div class="form-group">
              <label>Warranty Expiry Date</label>
              <input value=<?php echo '"' . $warrantyExpiryDate . '"'; ?> type="date" class="form-control searchBar" placeholder="Warranty Expiry Date" name="warrantyExpiryDate">
            </div>
            <br>
            <input value=<?php echo '"' . $customerID . '"'; ?> type="hidden" name="customerID">
            <input value=<?php echo '"' . $productID . '"'; ?> type="hidden" name="productID">
            <input type="submit" value="submit" name="submit-btn" class="btn btn-primary" />
            <br>
          </form>
        </div>
      </div>

</body>

</html>
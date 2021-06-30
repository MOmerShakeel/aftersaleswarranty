<?php

include 'config.php';

if(!empty($_GET['del'])){
        $del = $_GET['del'];
            $update = "UPDATE warranty SET status = 2 WHERE warrantyTrackingNumber = $del AND status = 1";
            $run = mysqli_query($conn,$update);
        }
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Customer Support Manager Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body style = "background-color : slategray;">
    <br></br>
    <div class="container">
    <h1 style = "color : ghostwhite;">Finished Goods Department Dashboard</h1>
    <a class = "btn btn-danger" href="logout.php">Logout</a>
    <br>
    <br><p style= "color : ghostwhite;">Filed Warranty Claims for Replacement Products:</p>               
    <table class="table table-info">
    <div class="table-responsive"> 
    <div max-width: 500px; margin: auto; >
    <div 
        <thead>
        <tr>
            <th>Warranty Tracking Number</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Sales Order Number</th>
            <th>Description</th>
            <th>Warranty Expiry Date</th>
            <th>Sale Date</th>
            <th>Completed?</th>
        </tr>
        </thead>
        <tbody>
        
        <?php
        $select = "SELECT warranty.*,product.productName,customer.customerName,department.departmentName,product.productPrice FROM `warranty` LEFT JOIN product ON warranty.productID = product.productID 
        LEFT JOIN customer ON warranty.customerID = customer.customerID LEFT JOIN department ON warranty.departmentID = department.departmentID WHERE warranty.status = 1 AND warranty.departmentID = 1"; 

        $run = mysqli_query($conn,$select);
        while($row_warranty = mysqli_fetch_array($run)){
            $warrantyTrackingNumber = $row_warranty['warrantyTrackingNumber'];
            $customerID = $row_warranty['customerID'];
            $customerName = $row_warranty['customerName'];
            $productID = $row_warranty['productID'];
            $productName = $row_warranty['productName'];
            $productPrice = $row_warranty['productPrice'];
            $departmentID = $row_warranty['departmentID'];
            $departmentName = $row_warranty['departmentName'];
            $salesOrderNumber = $row_warranty['salesOrderNumber'];
            $Description = $row_warranty['Description'];
            $warrantyExpiryDate = $row_warranty['warrantyExpiryDate'];
            $date = $row_warranty['date'];
            
        ?>
        <tr>
            <td><?php echo $warrantyTrackingNumber;?></td>
            <td><?php echo $customerID;?></td>
            <td><?php echo $customerName;?></td>
            <td><?php echo $productID;?></td>
            <td><?php echo $productName;?></td>
            <td><?php echo $productPrice;?></td>
            <td><?php echo $departmentID;?></td>
            <td><?php echo $departmentName;?></td>
            <td><?php echo $salesOrderNumber;?></td>
            <td><?php echo $Description;?></td>
            <td><?php echo $warrantyExpiryDate;?></td>
            <td><?php echo $date;?></td>
            <td align = "center"><a class="btn btn-success" href="finished-goods-dashboard.php?del=<?php echo $warrantyTrackingNumber;?>"><completed>
		    </a></td>
        </tr>
        </tr>
        <?php }?>
        </tbody>
    </table>
    </div>
    </body>
    </html>
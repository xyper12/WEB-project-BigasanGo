<?php
@include 'conn.php';

// Check if the user is an admin

$isAdmin = true; 

if (!$isAdmin) {
   // Redirect to login page or display an error message
   header("Location: login.php");
   exit;
}

// Retrieve buyer's data from the database
$query = "SELECT * FROM `order`";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Orders</title>

   <!-- Add your custom CSS file link here -->
   <link rel="stylesheet" href="sale.css">

</head>
<body>
<a href="Admin.php"> HOME </a>
   <h1> Orders List</h1>

   <table>
      <thead>
         <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Email</th>
            <th>Method</th>
            <th>Barangay</th>
            <th>City</th>
            <th>Province</th>
            <th>Zip Code</th>
            <th>Price</th>
            <!-- Add more columns as needed -->
         </tr>
      </thead>
      <tbody>
         <?php
         // Iterate through the result set and display the data
         while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['number'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['method'] . "</td>";
            echo "<td>" . $row['barangay'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['province'] . "</td>";
            echo "<td>" . $row['zip_code'] . "</td>";
            echo "<td>" . $row['total_price'] . "</td>";
           
            echo "</tr>";
         }
         ?>
      </tbody>
   </table>

</body>
</html>
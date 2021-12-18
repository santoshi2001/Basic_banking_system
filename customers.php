<?php

include 'header.php';

$server = "localhost";
$user = "root";
$password = "";
$db = "bank_app";

$conn = mysqli_connect($server, $user, $password, $db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>all Customers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br><br><br>
<div class="container">
  <center><h2>Customer List</h2></center>
          
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
      </tr>
    </thead>
    <tbody>

     <?php
                    $query = 'SELECT * FROM customer';
                    $result = mysqli_query($conn, $query);
                    $num_rows = mysqli_num_rows($result);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo '
            <tr><td>' . $rows['id'] . '</td>
            <td>' . $rows['name'] . '</td>
            <td>' . $rows['email_id'] . '</td>
            <td>Rs. ' . $rows['balance'] . '</td>
            </tr>
            ';
                    }
      ?>

     
    </tbody>
  </table>
</div>


</body>
</html>

<?php include 'header.php'; 
$success = false;
$failure = false;
$Abort = false;


$server = "localhost";
$user = "root";
$password = "";
$db = "bank_app";

$conn = mysqli_connect($server, $user, $password, $db);



if (isset($_POST['submit'])) {

    $userFrom = $_POST['userFrom'];
    $userTo = $_POST['userTo'];
    $tAmount = $_POST['tAmount'];

    $sql1 = "SELECT * FROM customer WHERE id=$userFrom";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sql2 = "SELECT * FROM customer WHERE id=$userTo";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

    if ($tAmount > $row1['balance']) {
        $failure = true;
    } else if ($tAmount <= 0) {
        $Abort = true;
    } else {
        $updatedAmount1 = $row1['balance'] - $tAmount;
        $updatedAmount2 = $row2['balance'] + $tAmount;
        $sql = "UPDATE customer SET balance=$updatedAmount1 WHERE id=$userFrom";
        $result = mysqli_query($conn, $sql);

        $sql = "UPDATE customer SET balance=$updatedAmount2 WHERE id=$userTo";
        $result = mysqli_query($conn, $sql);

        $sender = $row1['name'];
        $receiver = $row2['name'];
        $dateTime= date('Y-m-d H:i:s');
        $query = "INSERT INTO transaction(Sender,Receiver,balance,DateTime) VALUES('$sender', '$receiver', '$tAmount','$dateTime')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $success = true;
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=number], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    <title>Transfer Money</title>
</head>

<body>
    <br><br><br>
    <div class="container-fluid bg-overlay3">
        <div class="container mt-5">
            <h1 class="text-center mt-5">Transfer Money</h1>
            <h4 class="text-center text-success">
                <?php if ($success) echo 'Transaction Successful'; ?>
                <?php if ($failure) echo "Not enough Balance"; ?>
                <?php if ($Abort) echo "Amount should be greater than zero"; ?>
            </h4>
            <form method="POST">
                <div class="container">
                    <div class="my-3 col-md-6">
                        <label for="amount" class="my-2">Transfer From</label>
                        <select class="form-select" aria-label="Default select example" name="userFrom">
                            <option></option>
                            <?php
                            $query = 'SELECT * FROM customer';
                            $result = mysqli_query($conn, $query);
                            $num_rows = mysqli_num_rows($result);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $rows['id'] ?>">
                                <?php echo $rows['name'] ?> (Id -
                                <?php echo $rows['email_id'] ?>) (<?php echo $rows['balance'] ?>)</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="my-3 col-md-6">
                        <label for="amount" class="my-2">Transfer To</label>
                        <select class="form-select" aria-label="Default select example" name="userTo">
                            <option></option>
                            <?php
                            $query = 'SELECT * FROM customer';
                            $result = mysqli_query($conn, $query);
                            $num_rows = mysqli_num_rows($result);
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $rows['id'] ?>"><?php echo $rows['name'] ?> (Id -
                                <?php echo $rows['email_id'] ?>) (<?php echo $rows['balance'] ?>)</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                
                <div class="my-3 col-md-6">
                    <label for="amount" class="my-2">Amount To Transfer</label>
                    <input type="number"  class="form-control" name="tAmount" placeholder="Enter Amount to tranfer">
                </div>
                <div style="text-align: center;">
                <button type="submit" name="submit" class="btn btn-primary col-sm-12 mt-4">Transfer</button>
                </div>
                </div>
                
            </form>
        </div>
    </div>





</body>

</html>


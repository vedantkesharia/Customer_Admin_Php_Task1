<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "user";

session_start();

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("connection failed");
}

$sql1 = "SELECT SUM(Quantity) AS total_sum_quantity FROM customer1";
$result1 = mysqli_query($data, $sql1);
if ($result1) {
    $row = mysqli_fetch_assoc($result1);
    $totalSumquantity = $row['total_sum_quantity'];
} else {
    echo mysqli_error($data);
}

$sql2 = "SELECT SUM(Weight) AS total_sum_weight FROM customer1";
$result2 = mysqli_query($data, $sql2);
if ($result2) {
    $row2 = mysqli_fetch_assoc($result2);
    $totalSumweight = $row2['total_sum_weight'];
} else {
    echo mysqli_error($data);
}

$sql3 = "SELECT SUM(Box_count) AS total_sum_box FROM customer1";
$result3 = mysqli_query($data, $sql3);
if ($result3) {
    $row3 = mysqli_fetch_assoc($result3);
    $totalSumbox = $row3['total_sum_box'];
} else {
    echo mysqli_error($data);
}

$sql4 = "SELECT SUM(Quantity) AS total_sum_quantity2 FROM customer2";
$result4 = mysqli_query($data, $sql4);
if ($result4) {
    $row4 = mysqli_fetch_assoc($result4);
    $totalSumquantity2 = $row4['total_sum_quantity2'];
} else {
    echo mysqli_error($data);
}

$sql5 = "SELECT SUM(Weight) AS total_sum_weight2 FROM customer2";
$result5 = mysqli_query($data, $sql5);
if ($result5) {
    $row5 = mysqli_fetch_assoc($result5);
    $totalSumweight2 = $row5['total_sum_weight2'];
} else {
    echo mysqli_error($data);
}

$sql6 = "SELECT SUM(Box_count) AS total_sum_box2 FROM customer2";
$result6 = mysqli_query($data, $sql6);
if ($result6) {
    $row6 = mysqli_fetch_assoc($result6);
    $totalSumbox2 = $row6['total_sum_box2'];
} else {
    echo mysqli_error($data);
}

?>

<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>This is admin page</h1>
        <?php echo $_SESSION["username"] ?>
        <br><br>

        <table border='1'>
            <tr>
                <th>Item/Customer</th>
                <th>Customer1</th>
                <th>Customer2</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><?php echo $totalSumquantity; ?></td>
                <td><?php echo $totalSumquantity2; ?></td>
                <td><?php echo $totalSumquantity + $totalSumquantity2; ?></td>
            </tr>
            <tr>
                <td>Weight</td>
                <td><?php echo $totalSumweight; ?></td>
                <td><?php echo $totalSumweight2; ?></td>
                <td><?php echo $totalSumweight + $totalSumweight2; ?></td>
            </tr>
            <tr>
                <td>Box Count</td>
                <td><?php echo $totalSumbox; ?></td>
                <td><?php echo $totalSumbox2; ?></td>
                <td><?php echo $totalSumbox + $totalSumbox2; ?></td>
            </tr>
        </table>
        <br><br>
        <a href="logout.php">Logout</a>
    </center>
</body>

</html>

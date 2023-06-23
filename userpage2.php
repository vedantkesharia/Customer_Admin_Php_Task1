<?php
session_start();
if(!isset($_SESSION["username"])){
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
    <h1>This is user page for customer2</h1><?php echo $_SESSION["username"] ?>
    <br>
    <br>
    <form action="" method="POST">
    <label for="orderdate">Order Date</label>
    <input type="date" name="orderdate" required>
    <br>
    <label for="company">Company</label>
    <input type="text" name="company" required>
    <br>
    <label for="owner">owner</label>
    <input type="text" name="owner" required>
    <br>
    <label for="item">Item</label>
    <input type="text" name="item" required>
    <br>
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" required>
    <br> 
    <label for="weight">Weight</label>
    <input type="text" name="weight" required>
    <br>
    <label for="req">Request For Shipment</label>
    <input type="text" name="req" required>
    <br>
    <label for="track">Tracking ID</label>
    <input type="text" name="track" required>
    <br>
    <label for="shipsize">Shipment Size</label>
    <input type="text" name="shipsize" required>
    <br>
    <label for="boxcount">Box Count</label>
    <input type="number" name="boxcount" required>
    <br>
    <label for="specification">Specification</label>
    <input type="text" name="specification" required>
    <br>
    <label for="checklistquant">Checklist Quantity</label>
    <input type="text" name="checklistquant" required>
    <br>
    <input type="submit" name="submit" value="submit">
    </form>

<br>
<br>
    <a href="logout.php">Logout</a>
    </center>
</body>
</html>

<?php
$host = "localhost";
$user = "root";
$password="";
$db="user";

session_start();

$data = mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection failed");
}

if(isset($_POST['submit'])){
$orderdate = $_POST["orderdate"];
$company = $_POST["company"];
$owner = $_POST["owner"];
$item = $_POST["item"];
$quantity = $_POST["quantity"];
$weight = $_POST["weight"];
$req = $_POST["req"];
$track = $_POST["track"];
$shipsize = $_POST["shipsize"];
$boxcount = $_POST["boxcount"];
$specification = $_POST["specification"];
$checklistquant = $_POST["checklistquant"];

}
$sql = "INSERT INTO `customer2`(`Order_Date`, `Company`, `Owner`, `Item`, `Quantity`, `Weight`, `Request_for_shipment`, `Tracking_id`, `Shipment_size`, `Box_count`, `Specification`, `Checklist_quantity`) VALUES ('$orderdate','$company','$owner','$item','$quantity','$weight','$req','$track','$shipsize','$boxcount','$specification','$checklistquant')";

if(mysqli_query($data,$sql)){
    echo "<h3>Data inserted successfully</h3>" ;
}
else{
    echo "Error".mysqli_error($data);
}

?>
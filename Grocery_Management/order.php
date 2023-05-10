<?php
// Database configuration
$dbHost = 'localhost:3306';
$dbUsername = 'tejas';
$dbPassword = 'ILOVEKRISHNA';
$dbName = 'GROCERY';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
$conn2 = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
$conn3 = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$cost = $_POST["cost"];
$itemsc = $_POST["itemsc"];

echo "<h2> Thankyou for payment...</h2>";
$payment = true;

if ($payment) {
    echo '<div style="border: 2px solid #008CBA; background-color: #f2f2f2; padding: 10px; border-radius: 5px; text-align: center; font-family: Arial, sans-serif;"><h1>Payment is successful !!<br><br><br> <h3>We recieved your : '.$cost."/- </h1><br>Your Order will be delivered within 6hours, Thankyou...<br></h3><br>".'<a href="index.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Back to Home</a> <a href="order.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Continue shopping</a><br></div>';
    
$sql = "SELECT * FROM entries WHERE id=(SELECT max(id) FROM entries)";
$result = $conn->query($sql);
//$nameval = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$nme = $row["name"];
$sqlv = "select * from register where NAME='".$nme."'";
$resultv = $conn2->query($sqlv);
$rowv = mysqli_fetch_assoc($resultv);

$vn = $conn3->prepare("INSERT INTO transaction(name,email,items,paid) VALUES (?,?,?,?)");
$vn->bind_param("ssss",$nme,$rowv["EMAIL"],$itemsc,$cost);
$vn->execute();
$vn->close();

}
$conn->close();
$conn2->close();
$conn3->close();
?>

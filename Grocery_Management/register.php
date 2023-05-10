<?php
// Database configuration
$dbHost = 'localhost:3306';
$dbUsername = 'tejas';
$dbPassword = 'ILOVEKRISHNA';
$dbName = 'GROCERY';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$psw = $_POST["password"];
$cpsw = $_POST["confirm_password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$add = $_POST["address"];
$pin = $_POST["pincode"];

if ($psw != $cpsw){
 echo "<h1 style='color:tomato'> PASSWORD NOT MATCHED TRY AGAIN... </h1>";
}
else{
//$sql = "INSERT INTO register(NAME, EMAIL, PHONE, ADDRESS, PINCODE, PASSWORD) VALUES ($name,$email,$phone,$add,$pin,$psw)";

$vn = $conn->prepare("INSERT INTO register(NAME, EMAIL, PHONE, ADDRESS, PINCODE, PASSWORD) VALUES (?,?,?,?,?,?)");
 $vn->bind_param("ssssss",$name,$email,$phone,$add,$pin,$psw);
 $vn->execute();
  $vn->close();
 $conn->close();
/*
echo "<h2 style='color:tomato;'>Data inserted successfully... NOW YOU CAN LOGIN</h2>";
echo "<a style='font-size:2em;color:blue;' href='login.html'> LOGIN HERE </a>";
*/
    echo '<div style="border: 2px solid #008CBA; background-color: #f2f2f2; padding: 10px; border-radius: 5px; text-align: center; font-family: Arial, sans-serif;"><h2> Your Registration is successful !!<br><br><br>Now you can login...</h2><br><br>'.'<a href="login.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Login</a> <a href="index.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Back to Home</a><br></div>';
    
/*
if (mysqli_query($conn, $sql)) {
    echo "<h2 style='color:tomato;'>Data inserted successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
}
// Close the database connection
//mysqli_close($conn);
?>

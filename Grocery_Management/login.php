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

$name = $_POST["username"];
$psw = $_POST["password"];
date_default_timezone_set('Asia/Kolkata');
$dates = date("d-m-Y");
$times = date("h:i:s a");
//echo $dates.$times;
//echo "<script>alert(".$dates.");</script>";

//$sql = "INSERT INTO register(NAME, EMAIL, PHONE, ADDRESS, PINCODE, PASSWORD) VALUES ($name,$email,$phone,$add,$pin,$psw)";
        $sql = "select * from register where NAME = '$name' and PASSWORD = '$psw'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        	
        if($count == 1 && $name=='admin'){
        header('Location: admin.php');
        }
        elseif($count == 1){  
        echo "<br>";
        echo "<br>";
            $vn = $conn->prepare("INSERT INTO entries(name,password,date,time) VALUES (?,?,?,?)");
 $vn->bind_param("ssss",$name,$psw,$dates,$times);
 $vn->execute();
  $vn->close();
            echo "<h3 style='color:blue;'><center> Login successful </center></h3>";  
            echo "<hr/>";
            echo "<h1> Welcome ".$name."</h1>";
            header('Location: order.html');
        } 
        else{  
        echo "<br>";
            echo '<div style="border: 2px solid tomato; background-color: #f2f2f2; padding: 10px; border-radius: 5px; text-align: center; font-family: Arial, sans-serif;color:tomato;"><h2> !! Login Failed !!<br><br><br>Incorrect Username or Passowrd...</h2><br><br>'.'<a href="login.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Login again</a> <a href="index.html" style="background-color: #008CBA; color: white; padding: 10px; border-radius: 5px; text-decoration: none;">Back to Home</a><br></div>';
              
        }   
/*
$vn = $conn->prepare("INSERT INTO register(NAME, EMAIL, PHONE, ADDRESS, PINCODE, PASSWORD) VALUES (?,?,?,?,?,?)");
 $vn->bind_param("ssssss",$name,$email,$phone,$add,$pin,$psw);
 $vn->execute();
  $vn->close();
 $conn->close();

echo "<h2 style='color:tomato;'>Data inserted successfully... NOW YOU CAN LOGIN</h2>";
echo "<a style='font-size:2em;color:blue;' href='login.html'> LOGIN HERE </a>";


if (mysqli_query($conn, $sql)) {
    echo "<h2 style='color:tomato;'>WELCOME :".$name."</h2><br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
// Close the database connection
mysqli_close($conn);
?>

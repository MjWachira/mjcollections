<?php
$names = $_POST['names'];
$number = $_POST['number'];
$item = $_POST['item'];
$onum= $_POST['onum'];
$message = $_POST['message'];
$address = $_POST['address'];

//database connection
$conn = new mysqli('localhost','root','','mj');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
// On succesful connection
   $stmt = $conn->prepare("insert into mj_table(names, number, item, onum, message, address)VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sisiss",$names, $number, $item, $onum, $message, $address);
    $stmt->execute();
    echo 'order submitted successfully';
    $stmt->close();
    $conn->close();
}

?>
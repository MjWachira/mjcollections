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
  // $stmt = "insert into mjc(names,
   // number,item,aitem,onum,message,date,address)VALUES('$names','$number','$item','$aitem','$onum','$message','$date','$address')";


   $stmt = $conn->prepare("insert into mjc(names,
    number,item,onum,message,address)values(?,?,?,?)");
    $stmt->bind_param("sisiss",$names,$number,$item,$onum,$message,$address);
    $stmt->close();
    $conn->close();
}

?>
<?php
include('db.php');

$nama = $_POST['nama'];
$email = $_POST['email'];

$sourcePath = $_FILES['namaFile']['tmp_name'];
$fileName = $_FILES['namaFile']['name']; //nama file
$targetPath = "images/".$fileName;//letak mana
$move = move_uploaded_file($sourcePath,$targetPath);




$insert = "INSERT INTO users (nama,email,namaFile) VALUES ('$nama', '$email', '$fileName')";
$query = mysqli_query($conn,$insert);

if($query){
    echo "<script language=\"javascript\">alert(\"Succesfully Registered\");location.href='index.php';</script>";
}else{
    echo "<script language=\"javascript\">alert(\"Fail Registered\");location.href='index.php';</script>";
}

?>
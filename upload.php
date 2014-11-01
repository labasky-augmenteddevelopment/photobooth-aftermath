<?php


include('mysql-connect.php');

$photogroupId = md5(uniqid());
$email = $_REQUEST['email'];
$img1 = $_REQUEST['img1'];
$img2 = $_REQUEST['img2'];
$img3 = $_REQUEST['img3'];
$img4 = $_REQUEST['img4'];


$sql = "INSERT INTO `photogroups`(`id`,`email`) VALUES ('".$photogroupId."','".$email."')";
mysql_query($sql);


function saveImage($base64img, $number, $photogroupId){
    define('UPLOAD_DIR', 'uploads/');
    $base64img = str_replace('data:image/jpeg;base64,', '', $base64img);
    $data = base64_decode($base64img);

    $file = UPLOAD_DIR . $photogroupId.'-'.$number.'.jpg';
    file_put_contents($file, $data);
}



saveImage($img1, 1, $photogroupId);
saveImage($img2, 2, $photogroupId);
saveImage($img3, 3, $photogroupId);
saveImage($img4, 4, $photogroupId);




//todo somehow link the email with these bad boys


echo 'email: '.$email;

?>
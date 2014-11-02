<?php


include('mysql-connect.php');

function generateStrip ($id){
      $jpg_image = imagecreatefromjpeg('edited/white_box.jpg');
      $top_image = imagecreatefromjpeg('edited/white_box_w_top_img.jpg');
      $img1 = imagecreatefromjpeg('uploads/'.$id.'-1.jpg');
      $img2 = imagecreatefromjpeg('uploads/'.$id.'-2.jpg');
      $img3 = imagecreatefromjpeg('uploads/'.$id.'-3.jpg');
      $img4 = imagecreatefromjpeg('uploads/'.$id.'-4.jpg');
      
      
      
      imagecopy($jpg_image, $top_image, 10, 0, 0, 0, 320, 100);
      imagecopyresampled($jpg_image, $img1, 10, 110, 0, 0, 320, 240, 640, 480);
      imagecopyresampled($jpg_image, $img2, 10, 360, 0, 0, 320, 240, 640, 480);
      imagecopyresampled($jpg_image, $img3, 10, 610, 0, 0, 320, 240, 640, 480);
      imagecopyresampled($jpg_image, $img4, 10, 860, 0, 0, 320, 240, 640, 480);
      
      //save the new image!
      imagejpeg($jpg_image, 'edited/strips/'.$id.'-strip.jpeg');
      
      imagedestroy($jpg_image);
      imagedestroy($img1);
      imagedestroy($img2);
      imagedestroy($img3);
      imagedestroy($img4);

}

$sql = "SELECT * FROM photogroups";
$result = mysql_query($sql);
while($row = mysql_fetch_assoc($result)){
  generateStrip($row['id']);
}




?>
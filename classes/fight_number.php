<?php 
require_once('../config.php');
$stat = $conn->query("SELECT status,drawno FROM `draws` where active = 'Y' order by id desc limit 1 ");
if ($stat->num_rows >0){
      $row = $stat->fetch_assoc();

        echo $row['drawno'];
                            
}else{
    echo   '';
}
?>

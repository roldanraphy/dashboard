<?php 
require_once('../config.php');
$stat = $conn->query("SELECT status FROM `draws` where active = 'Y' order by id desc limit 1 ");
if ($stat->num_rows >0){
      $row = $stat->fetch_assoc();
            if ($row['status']=='1'){
                echo   '1';
            }elseif ($row['status']=='2'){
				echo  '1';
            }else{
				echo  '2';
            }                         
}else{
    echo   '3';
}
?>

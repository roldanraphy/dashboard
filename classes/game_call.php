<?php 
require_once('../config.php');
$stat = $conn->query("SELECT status,drawno FROM `draws` where active = 'Y' order by id desc limit 1 ");
if ($stat->num_rows >0){
      $row = $stat->fetch_assoc();
            if ($row['status']=='1'){
                echo  'BETTING IS NOW OPEN!';
            }elseif ($row['status']=='2'){
				echo   'LAST CALL - FIGHT# '. $row['drawno'];
            }else{
				echo   'FIGHT# '. $row['drawno']. ' PLAYING';
            }                      
}else{
    echo  'BETTING IS CLOSED.';
}
?>



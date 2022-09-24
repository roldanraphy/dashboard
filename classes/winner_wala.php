<?php 
require_once('../config.php');
	  $winner = $conn->query("SELECT winner, drawno FROM `draws` order by id desc limit 1 "); //pinaka last na draw
		if ($winner->num_rows >0){
      	$rows = $winner->fetch_assoc();
      			if($rows['winner'] ==2){
					echo   'WALA <small class="blinking">WINNER</small>';

                }elseif($rows['winner'] ==3){
                    echo   'WALA <small class="blinking">DRAW</small>';
                }elseif($rows['winner'] ==4){
                    echo   'WALA <small class="blinking">CANCELLED</small>';
				}else{
                    echo   'WALA';
                }
		}else{
            echo   'WALA';
        }
?>
<style>
    .blinking{
    animation:blinkingText 1.5s infinite;
}
@keyframes blinkingText{
    0%{     color: #FFF;    }
    49%{    color: #FFF; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #FFF;    }
}

</style>


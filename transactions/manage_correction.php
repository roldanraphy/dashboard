<?php
  require_once('../../config.php');
?>
<?php
$qry = $conn->query("SELECT max(id) from draws ");
    if($qry->num_rows > 0){
        $row = $qry->fetch_assoc();
        $lastrec = $conn->query("SELECT drawno from draws where id = '{$row['max(id)']}'");
            if($lastrec->num_rows > 0){
                $row1 = $lastrec->fetch_assoc();

                if(is_numeric($row1['drawno'])){
                    $empid = $row1['drawno']+1;
                }else{
                    $empid='';
                }
            }else{
                $empid='';
            }
    
    }else{
        $empid='';
    }
    //eventid
    $eventqry = $conn->query("SELECT id from events where active ='Y' order by id desc limit 1 ");
    if($eventqry->num_rows > 0){
        $erow = $eventqry->fetch_assoc();
        $eventid = $erow['id'];
    }else{
        $eventid=0;
    }

?>

<div class="container-fluid">
	<form action="" id="transaction-form"> 

	<input type="hidden" name ="user_id" value="<?php echo $_settings->userdata('id') ?>">
        <input type="hidden" name ="date_created" value="<?php echo date("Y-m-d H:i") ?>">
        <input type="hidden" name ="eventid" value="<?php echo $eventid ?>">
        <div class="form-group">
            <label">FIGHT NO.</label>   		    
	    <input name="drawno" id="drawno" type="text" class="form-control form  rounded-0" value="<?php  echo $empid?>" required>
        </div>
     
        <div class="form-group">
		<label">CORRECTION</label>   
                <select name="winner" id="winner" class="custom-select rounded-0" required>
                <option value="1" >MERON</option>
                <option value="2" >WALA</option>
                <option value="3" >DRAW</option>
                <option value="4" >CANCEL</option>
                </select>  		    
        </div>
	</form>
</div>
<script>
$(document).ready(function(){
    $('#transaction-form').submit(function(e){
	e.preventDefault();
             var _this = $(this)
             var _this = $(this)
	     $('.err-msg').remove();
	     start_loader();
	     $.ajax({
	     url:_base_url_+"classes/Master.php?f=finish_transaction",
	     data: new FormData($(this)[0]),
             cache: false,
             contentType: false,
             processData: false,
             method: 'POST',
             type: 'POST',
             dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						//location.reload();
                                                var dialog = $('.modal');
                                                if (typeof dialog.modal == 'function') {
                                                dialog.modal('hide');
                  	                        alert_toast("FIGHT FINISHED.",'success');
						end_loader();
                                        }
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: 0 }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})


</script>






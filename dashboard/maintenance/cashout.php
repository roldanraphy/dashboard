<?php if($_settings->userdata('type') == 2 or $_settings->userdata('type') == 1): ?>

<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<?php //for search

$agent_qry = $conn->query("SELECT usercode,username FROM users where parentid = '{$_settings->userdata('id')}' order by username");
$b_arr = array_column($agent_qry->fetch_all(MYSQLI_ASSOC),'username','usercode');

?>

<?php //for combobox

	$aa = $conn->query("SELECT id,username FROM users where parentid = '{$_settings->userdata('id')}' order by username");
	$a_arr = array_column($aa->fetch_all(MYSQLI_ASSOC),'username','id'); 
?>

<?php
$agent = isset($_GET['agent']) ? $_GET['agent'] : '*';
?>
<?php 
    $qrybal = $conn->query("SELECT * from users where id ='{$_settings->userdata('id')}' "); //$_settings->userdata('id')
    $curbal = $qrybal->fetch_assoc();
?>

<div class="card card-outline card-primary">
<div class="card-header bg-gray">
<h3 class="card-title">Cash-Out Transactions / Current Balance: <?php echo number_format($curbal['amount'],2)?></h3>
</div>
<div class="card-body">
<div class="container-fluid">
	<form action="" id="withdrawal-form">
		<input type="hidden" name ="id" value="">  
		<input type="hidden" name ="agent_id" value="<?php echo $_settings->userdata('id') ?>">  
        <input type="hidden" name ="date_created" value="<?php echo date("Y-m-d H:i") ?>">
            <div class="form-group">
                  <label for="user_id">Agent</label>
                     <select name="user_id" id="user_id" class="form-control select2bs4 select2 rounded-0" data-placeholder="Please Select" required>
					 
						<option value="" disabled <?php echo !isset($user_id) ? 'selected' : '' ?>></option>
                     	<?php foreach($a_arr as $k=>$v): ?>
                     	<option value="<?php echo $k ?>" <?php echo (isset($user_id) && $user_id == $k) ? 'selected' : '' ?>><?php echo $v ?></option>
                     	<?php endforeach; ?>
                     	</select>

            </div>
		<div class="form-group">
			<label for="amount" class="control-label">Amount</label>
                  <input name="amount" id="amount" type="number" inputmode="numeric" pattern="[0-9]*" step="0.01" class="form-control form  rounded-0" value= <?php echo isset($amount) ? $amount : '0.00'; ?> >
		</div>  
		<div class="form-group">
			<label for="description" class="control-label">Details</label>
			<textarea name="description" id="description" cols="30" rows="1" style="resize:none !important" class="form-control form no-resize rounded-0" required><?php echo isset($description) ? $description : ''; ?></textarea>
        </div>  
		<button class="btn btn-flat btn-primary" form="withdrawal-form">Approve</button>
	</form>
</div>
</div>
</div>




<div class="card card-outline card-primary">
	<div class="card-header bg-success">
		<h3 class="card-title">Transaction Logs</h3>
	</div>
	<div class="card-body">	
	<div class="row">

            <Table>
            <tr>
                <td>
         
                 <div class="form-group">
    
                    <select name="agent" id="agent" class="form-control select2bs4 select2 rounded-0" required>
                        <option value="*" <?php echo isset($agent) && $agent == '*' ? "selected" : '' ?>>All</option>
                        <?php foreach($b_arr as $k=>$v): ?>
                        <option value="<?php echo $k ?>"<?php echo isset($agent) && $agent == $k ? "selected" : '' ?>><?php echo $v ?></option>
                        <?php endforeach; ?>
                    </select>
          
            </div>
                </td>
                <td>
 
                <div class="w-100">
                    <div class="form-group d-flex justify-content-between align-middle">
                 	<button class="btn btn-flat btn-default bg-primary" type="button" id="filter"><i class="fa fa-filter"></i> Filter</button>
					</div>
                </div>
	
                </td>
            </tr>
            </Table>




    </div>
		<div class="container-fluid">
        <div class="container-fluid">
			<table id ="example" class="table table-hover table-stripped">
				<thead>
					<tr>
					    <th>#</th>
					    <th>Date</th>
					    <th>Type</th>
					    <th>Amount</th>
					    <th>Balance</th>		    
					    <th>Member</th>
					    <th>Details</th>
					    <th>Processedby</th>
					</tr>
				</thead>
				<tbody>


                                       <?php

                                        $i = 1;
                                        $bal = $curbal['amount'];
                                        $bal2 = 0;
                                        $agent_qry = $conn->query("SELECT id,username FROM users");
                                        $agent_arr = array_column($agent_qry->fetch_all(MYSQLI_ASSOC),'username','id'); 

                                        if ($agent=='*'){
                                                $qry = $conn->query("select id, date_created,1 as type, amount,user_id,description,agent_id from loading where active='N' and user_id IN (Select id from users where parentid = '{$_settings->userdata('id')}')
                                                UNION All
                                                select id, date_created,2 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id IN (Select id from users where parentid = '{$_settings->userdata('id')}')
                        			UNION All
                        			select id, date_created,4 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created, 3 as type, amount_converted as amount, user_id, 'Commission' as description, agent_id from coms_converted where user_id  = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created,5 as type, amount,user_id,description,agent_id from loading where active='N' and user_id  = '{$_settings->userdata('id')}'
                                                order by date_created desc" );
                                        }else{
                                                $qry = $conn->query("select id, date_created,1 as type, amount,user_id,description,agent_id from loading where active='N' and user_id IN (Select id from users where usercode = '{$agent}')
                                                UNION All
                                                select id, date_created,2 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id IN (Select id from users where usercode = '{$agent}')
                        			UNION All
                        			select id, date_created,4 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created, 3 as type, amount_converted as amount, user_id, 'Commission' as description, agent_id from coms_converted where user_id  = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created,5 as type, amount,user_id,description,agent_id from loading where active='N' and user_id  = '{$_settings->userdata('id')}'

                                                order by date_created desc" );
                                        }
                                        while($row2 = $qry->fetch_assoc()):
                                        ?>
                                                 <?php if($row2['type'] == 1): ?>                
                                    		 	<?php $bal2 = $bal2 - $row2['amount']?>
                                                  <?php elseif($row2['type'] == 2): ?>                 
                                    		  	<?php $bal2 = $bal2 + $row2['amount']?>
                                                  <?php elseif($row2['type'] == 3): ?>
                                                         <?php $bal2 = $bal2 + $row2['amount']?>
                                                  <?php elseif($row2['type'] == 4): ?>                 
                                    		  	<?php $bal2 = $bal2 - $row2['amount']?>
						  <?php elseif($row2['type'] == 5): ?>
							<?php $bal2 = $bal2 + $row2['amount']?>
                                                   <?php else: ?>
                                                        <?php $bal2 = $bal2 + $row2['amount']?>
                                                   <?php endif; ?>
                                        <?php endwhile; ?>
                                        
                                        <?php

                                        $bal = $bal - $bal2;

                                        if ($agent=='*'){
                                                $qry = $conn->query("select id, date_created2 date_created,1 as type, amount,user_id,description,agent_id from loading where active='N' and user_id IN (Select id from users where parentid = '{$_settings->userdata('id')}')
                                                UNION All
                                                select id, date_created,2 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id IN (Select id from users where parentid = '{$_settings->userdata('id')}')
                        			UNION All
                        			select id, date_created,4 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created, 3 as type, amount_converted as amount, user_id, 'Commission' as description, agent_id from coms_converted where user_id  = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created2 date_created,5 as type, amount,user_id,description,agent_id from loading where active='N' and user_id  = '{$_settings->userdata('id')}'

                                                order by date_created" );
                                        }else{
                                                $qry = $conn->query("select id, date_created2 date_created,1 as type, amount,user_id,description,agent_id from loading where active='N' and user_id IN (Select id from users where usercode = '{$agent}')
                                                UNION All
                                                select id, date_created,2 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id IN (Select id from users where usercode = '{$agent}')
                        			UNION All
                        			select id, date_created,4 as type, amount,user_id,description,agent_id from withdrawals where active='N' and user_id = '{$_settings->userdata('id')}'
                                                UNION All
                                                select id, date_created, 3 as type, amount_converted as amount, user_id, 'Commission' as description, agent_id from coms_converted where user_id  = '{$agent}'
                                                UNION All
                                                select id, date_created2 date_created,5 as type, amount,user_id,description,agent_id from loading where active='N' and user_id  = '{$_settings->userdata('id')}'

                                                order by date_created");
                                        }       


                                                while($row = $qry->fetch_assoc()):
                             ?>
                            <tr>
                                                        <td class="text-center"><?php echo $i++; ?></td>
                                                        <td><?php echo date("m-d-Y H:i:s", strtotime($row['date_created'])) ?></td>
                                                        <td>
                                                        <?php if($row['type'] == 1): ?>
                                                                        <span>Cash-In(Downline)</span>
                                                                        <?php $bal = $bal - $row['amount']?>
                                                	<?php elseif($row['type'] == 2): ?>
                                                                        <span>Cash-Out(Downline)</span>
                                                                        <?php $bal = $bal + $row['amount']?>
                                                        <?php elseif($row['type'] == 3): ?>
                                                                        <span>Commission</span>
                                    					<?php $bal = $bal + $row['amount']?>
                                                	<?php elseif($row['type'] == 4): ?>
                                                                        <span>Cash-Out</span>
                                                                        <?php $bal = $bal - $row['amount']?>
                                                        <?php elseif($row['type'] == 5): ?>
                                                                        <span">Cash-In></span>
                                    					<?php $bal = $bal + $row['amount']?>

                                                        <?php else: ?>
                                                                        <span>Winnings</span>
                                    			<?php $bal = $bal + $row['amount']?>
                                                                <?php endif; ?>
                                                        </td>
							<?php if($row['type'] ==1 || $row['type'] ==4): ?>
                                                                <td>-<?php echo number_format($row['amount'],2)?> </td>
                                                                <td><span class="badge badge-danger"><?php echo number_format($bal,2) ?></span> </td>
                                                        <?php else: ?>
                                                                 <td><?php echo number_format($row['amount'],2)?> </td>
                                                                <td><span class="badge badge-success"><?php echo number_format($bal,2) ?></span> </td>
                                                        <?php endif; ?>

                                                                                                                                        

                                                        <td><?php echo isset($agent_arr[$row['user_id']]) ? $agent_arr[$row['user_id']] : 'N/A' ?></td>
                                                        <td><?php echo $row['description'] ?></td>
                                                        <td><?php echo isset($agent_arr[$row['agent_id']]) ? $agent_arr[$row['agent_id']] : 'N/A' ?></td>
                                                        </tr>

                                                <?php endwhile; ?>
                                                <h6><strong>Total Transactions: <?php echo number_format($bal2,2) ?></strong></h6>




				</tbody>
			</table>
		</div>
		</div>
</div>
</div>


<script>
	$(document).ready(function(){

		$("select").select2();

		$('#filter').click(function(){
			location.replace("./?page=maintenance/cashout&agent="+($('#agent').val()) );
        })
        $('#example').DataTable( {
        stateSave: true
        } );
        

		$('#withdrawal-form').submit(function(e){
		//check if encoded value is numeric
		if (!$.isNumeric($('#amount').val())) {
		alert_toast("Invalid Amount",'error');
		end_loader();
		return false; 
		}
		e.preventDefault();
		var _this = $(this)
		var _this = $(this)
   		$('.err-msg').remove();               
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=save_withdrawals1",
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
					location.href = "./?page=maintenance/cashout"; 
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<?php endif;?>




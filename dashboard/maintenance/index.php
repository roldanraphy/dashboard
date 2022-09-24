<?php if ($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2) : ?>
  <h4 style="color:white">

    <?php if ($_settings->userdata('role') == 1) : ?>
      <?php echo 'Operator Dashboard' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 2) : ?>
      <?php echo 'Sub-Operator Dashboard' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 3) : ?>
      <?php echo 'Master Agent Dashboard' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 4) : ?>
      <?php echo 'Gold Agent Dashboard' ?>
    <?php endif; ?>
    <?php if ($_settings->userdata('role') == 5) : ?>
      <?php echo 'Player Dashboard' ?>
    <?php endif; ?>
  </h4>
  <hr class="bg-light">
  <div class="container">
    <style>
      .bg-success {
        background-color: #C0C0C0 !important;
        color: black !important;
      }
      .bg-refer {
        background-color: #a79cad !important;
        color: black !important;
      }


    </style>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:#a79cad !important;  height:90px">
    		<table>
        		<td valign="top"><img src="../img/dashboardlogo1.png"  height=65px; width=65px></img></td>
        		<td>&nbsp;&nbsp;&nbsp</td>
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              					<h5><?php
                  				$qry = $conn->query("SELECT * from users where id ='{$_settings->userdata('id')}' "); //$_settings->userdata('id')
                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['amount'], 2);
						?></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<h7>MAIN WALLET</h7>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:#a79cad !important; height:90px">
   
    		<table>
        		<td valign="top"><img src="../img/dashboardlogo2.png"  height=65px; width=65px></img></td>
        		<td>&nbsp;&nbsp;&nbsp</td>
        		<td valign="top">
				<table style="color:black">
				<tr>
					<td>
              				<h5><?php
                  			$qry = $conn->query("SELECT com_amount_bal from users where id ='{$_settings->userdata('id')}' "); //$_settings->userdata('id')
                  			$row = $qry->fetch_assoc();
                  			echo number_format($row['com_amount_bal'], 2);
                  			?></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<h7>MY COMMISSION (<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</h7>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
  
          </div>
        </div>
      </div>

      
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:#a79cad !important; height:90px">
    		<table style="color:black">
        		<td valign="top"><img src="../img/dashboardlogo3.png"  height=65px; width=65px></img></td>
        		<td>&nbsp;&nbsp;&nbsp</td>
        		<td valign="top">
				<table>
				<tr>
					<td>
              					<h5><?php
                  				$qry = $conn->query("SELECT sum(com_amount_bal) com_amount_bal from users where parentid ='{$_settings->userdata('id')}' and id <> {$_settings->userdata('id')}"); //$_settings->userdata('id')
                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['com_amount_bal'], 2);
                  				?></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<h7>DOWNLINES COMMISSION</h7>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
					</td>
				</tr>
				</table>
			</td>
    		</table>
              <!-- <p>(<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</p> -->

          </div>
        </div>
      </div>
      
      <div class="col-12 col-sm-6 col-md-6">
        <div class="card">
          <div class="card-body rounded" style="background-color:#a79cad !important; height:90px">
    		<table style="color:black">
        		<td valign="top"><img src="../img/dashboardlogo4.png"  height=65px; width=65px></img></td>
        		<td>&nbsp;&nbsp;&nbsp</td>
        		<td valign="top">
				<table>
				<tr>
					<td>
              					<h5><?php
                  				$qry = $conn->query("SELECT SUM(amount) as total from users where parentid={$_settings->userdata('id')} and id <> {$_settings->userdata('id')} "); //$_settings->userdata('id')
                  				$row = $qry->fetch_assoc();
                  				echo number_format($row['total'], 2);
                  				?></h5>
					</td>
				</tr>
				<tr>
					<td>
              				<h7>DOWNLINES WALLET</h7>
					</td>
				</tr>
				<tr>
					<td>
              				<p></p>
              				<!-- <p>(<?php echo number_format($_settings->userdata('rate'), 2) ?>% per bet)</p> -->
					</td>
				</tr>
				</table>
			</td>
    		</table>
          </div>
        </div>
      </div>
      <!-- /.col -->



    </div>



    <div class="row">


      <div class="col-sm-12 mt-3">
        <div class="card bg-white text-dark">
          <div class="card-header bg-refer">
            Referrals:
          </div>
          <div class="card-body">
            <div class="alert bg-success">
              Please take note of your referral link below. All players that will register under this link will be automatically registered under your account.
            </div>
            <span><b>Referral Link:</b> (Copy this link) </span>
            <div class="row">
              <div class="col-sm-6">
                <input type="text" class="form-control bg-dark text-dark" id="refer_link" value="<?php echo base_url . 'register.php?refcode=' . $_settings->userdata('refcode') ?>" readonly=""><br>
                <button id="copy" onclick="myFunction()" class="btn btn-sm btn-success">Copy Referral Link</button>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Tooltip

    $('#copy').tooltip({
      trigger: 'click',
      placement: 'bottom'
    });

    function setTooltip(message) {
      $('#copy').tooltip('hide')
        .attr('data-original-title', message)
        .tooltip('show');
    }

    function hideTooltip() {
      setTimeout(function() {
        $('#copy').tooltip('hide');
      }, 1000);
    }




    function copyToClipboard(text) {
      var sampleTextarea = document.createElement("textarea");
      document.body.appendChild(sampleTextarea);
      sampleTextarea.value = text; //save main text in it
      sampleTextarea.select(); //select textarea contenrs
      document.execCommand("copy");
      document.body.removeChild(sampleTextarea);
    }

    function myFunction() {
      var copyText = document.getElementById("refer_link");
      copyToClipboard(copyText.value);
      setTooltip('Link copied!');
      hideTooltip();
    }
  </script>
<?php endif; ?>
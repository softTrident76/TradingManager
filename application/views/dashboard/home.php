<?php
	if ( isset($nav) && $nav!= "") $this->load->view($nav);
?>

<style>
	#tblTransaction tbody tr:hover {
		background-color: #5E1084;
	}

	.highlight {
		background-color: #5E1084;
	}
</style>

<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="breadcrumb-range-picker">
				<span><i class="icon-calender"></i></span>
				<span class="ml-1"><?php echo get_langdata($this->session->userdata('lang'), 'dashboard'); ?></span>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row justify-content-between mb-4 mt-4">
			<div class="col-xl-4 text-left">
				<h2 class="page-heading"><?php echo get_langdata($this->session->userdata('lang'), 'totalamount'); ?></h2>				
				<div id="divCoins" class="currencies">
				<?php 
					$coins = website_coins();
					foreach($coins as $key=>$value)					
						echo '<span><i class="cc '.($key).'"></i></span>';					
				?>
				</div>
			</div>
			<div class="col-xl-8">
				<div class="crypto-ticker">
					<ul id="webticker-big">
							<li><i class="cc BTC"></i> <?php echo get_langdata($this->session->userdata('lang'), 'totalprofit'); ?>: <span id="flowTxtPrft" class="text-warning coin-status"> 0 </span></li>
							<li><i class="cc GAME"></i> <?php echo get_langdata($this->session->userdata('lang'), 'totalcommission'); ?>: <span id="flowTxtCmssn" class="text-danger coin-value"> <span class="text-danger coin-status"> 0 </span></li>
							<li><i class="cc LTC"></i> <?php echo get_langdata($this->session->userdata('lang'), 'totalusers'); ?>: <span id="flowTxtUsrs" class="text-success coin-status"> 0 </span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-xxl-12" style="text-align:center">
				<div class="row">				
					<?php
						$coins = website_coins();
						$keys = array_keys($coins);						

						for($idx = 0; $idx < count($keys); $idx++)
						{
							$key = $keys[$idx];
							$value = $coins[$key];							
							echo '<div style="width: 11.1111%;padding-left: 10px;padding-right: 10px;">
									<div class="card stat-widget-one bg-btc" >
										<div class="card-body" style="padding-left:10px; padding-right:10px">
											<div class="row justify-content-between">
												<div class="col-auto" style="text-align: left">
													<h4 class="mb-4" style="color: '.$value["color"].'">'.$key.'</h4>										
													<h5 class="mb-3"><span style="font-size: 13px;" id="txtTAmount-'.$idx.'" class="counter" style="">0</span></h5>
												</div>
												<div class="col-auto" style="padding-left: 0px;padding-right: 0px;margin-top: -35px;">
													<i class="cc '.coinNameFilter($key).'-alt" title="'.$key.'"></i>
												</div>
											</div>								
										</div>
									</div>
								</div>';
						}
					?>
				</div>

			</div>	
		</div>

		<div class="row">
			<div class="col-xl-12 col-xxl-12 col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><h4 class="card-title">latesttransactions</h4></h4>
						<!-- <h4 class="card-title">Latest Transactions</h4> -->
						<div class="recent-transaction table-responsive">
							<table id="tblTransaction" class="table mb-0 table-responsive-tiny">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Base Currency</th>
										<th scope="col">Quote Currency</th>
										<th scope="col">Profit</th>
										<th scope="col">DateTime</th>
										<th scope="col">Base Amount</th>
										<th scope="col">Quote Amount</th>
										<th scope="col">Commission</th> -->

										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'datetime'); ?></th>											
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'basecurrency'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'baseamount'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'quotecurrency'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'quoteamount'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'profit'); ?></th>																			
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'commission'); ?></th>
									</tr>
								</thead>
								<tbody>													
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-xxl-6 col-lg-6">
				<div id="pendingContainer" class="card" style="height: 300px; overflow-y:auto;" >
					<div class="card-body">
						<h4 class="card-title"><?php echo get_langdata($this->session->userdata('lang'), 'pendingtransaction'); ?></h4>
						<div class="recent-transaction table-responsive">
							<table id="tblPending" class="table mb-0 table-responsive-tiny">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Type</th>
										<th scope="col">Currency</th>
										<th scope="col">Amount</th>
										<th scope="col">Price</th>
										<th scope="col">Datetime</th>
										<th scope="col">Action</th> -->

										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'type'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'currency'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'amount'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'price'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'datetime'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'action'); ?></th>
									</tr>
								</thead>
								<tbody>								
								</tbody>
							</table>
						</div>
					</div>
				</div>
							
				<div id="originContainer" class="card" style="height: 300px; overflow-y:auto;" >
					<div class="card-body">
						<!-- <h4 class="card-title">Insufficient Margin Users</h4> -->
						<h4 class="card-title"><?php echo get_langdata($this->session->userdata('lang'), 'originalcoinuser'); ?></h4>
						<div class="table-responsive">
							<table id="tblOriginalCoin" class="table mb-0 table-responsive-tiny">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Phone</th>
										<th scope="col">Email</th>
										<th scope="col">Margin</th>	-->
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'initialcoin'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'initialamount'); ?></th>										
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'startdate'); ?></th>
									</tr>
								</thead>
								<tbody>	
								</tbody>
							</table>
						</div>
					</div>
				</div>	

				<div id="insufficientContainer" class="card" style="height: 300px; overflow-y:auto;">
					<div class="card-body">
						<!-- <h4 class="card-title">Insufficient Margin Users</h4> -->
						<h4 class="card-title"><?php echo get_langdata($this->session->userdata('lang'), 'insufficientuser'); ?></h4>
						<div class="table-responsive">
							<table id="tblInsufficient" class="table mb-0 table-responsive-tiny">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Phone</th>
										<th scope="col">Email</th>
										<th scope="col">Margin</th>	-->
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'phone'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'email'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'margin'); ?></th>		
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>	

				<div id="smilingContainer" class="card" style="height: 300px; overflow-y:auto;" >
					<div class="card-body">
						<!-- <h4 class="card-title">Insufficient Margin Users</h4> -->
						<h4 class="card-title"><?php echo get_langdata($this->session->userdata('lang'), 'smilingusers'); ?></h4>
						<div class="table-responsive">
							<table id="tblSmiling" class="table mb-0 table-responsive-tiny">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Phone</th>
										<th scope="col">Email</th>
										<th scope="col">Margin</th>	-->
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'basecoin'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'quotecoin'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'profitestimated'); ?></th>		
									</tr>
								</thead>
								<tbody>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-xxl-6 col-lg-6">
				<div id="divActionBlock" class="card" style="height: 1024px">
					<div class="card-body">
						<!-- <h4 class="card-title">Buy/Sell</h4> -->
						<h4 class="card-title"><?php echo get_langdata($this->session->userdata('lang'), 'buysell'); ?></h4>
						<div class="buy-token mt-4">
							<div class="basic-form">
								<form>																	
									<div class="form-row">
										<div class="form-group col-xl-12" style="display: grid; margin-bottom:40px">
											<!-- <input type="text" id="inptUId" name="inptUId" class="form-control" placeholder="ID/Phone/Email" style="margin-bottom: 5px;"> -->
											<!-- <button type="button" onclick="searchUser()" class="btn btn-primary qx_btn">Search</button> -->
											<input type="text" id="inptUId" name="inptUId" class="form-control" 
												placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'id')."/".get_langdata($this->session->userdata('lang'), 'phone')."/".get_langdata($this->session->userdata('lang'), 'email'); ?>" style="margin-bottom: 5px;">
											<button type="button" onclick="searchUser('button')" class="btn btn-primary qx_btn"><?php echo get_langdata($this->session->userdata('lang'), 'search'); ?></button>
										</div>

										<div class="table-responsive" style="margin-bottom: 20px;background-color: rgba(0, 0, 0, 0.4);">
											<div style="text-align: right;margin: 14px;margin-bottom: 0px;">
												<select class="custom-select" id="cmbProfitCurrency" onChange="searchUser('select')" style="width:120px">
													<?php 
														$coins = website_coins();
														$keys = array_keys($coins);						
								
														for($idx = 0; $idx < count($keys); $idx++)
														{
															$key = $keys[$idx];
															if($idx == 0)
																echo '<option selected value="'.$idx.'">'.$key.'</option>';
															else
																echo '<option value="'.$idx.'">'.$key.'</option>';
														}
													?>													
												</select>
											</div>
											
											<table class="table mb-0 table-responsive-tiny" id="tblActionUser">
												<thead>
													<tr>
														<!-- <th scope="col">Currency</th>
														<th scope="col">Balance</th>	
														<th scope="col">Base Balance</th>
														<th scope="col">Profit Estimated</th>		 -->
														
														<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'currency'); ?></th>
														<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'balance'); ?></th>	
														<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'basebalance'); ?></th>
														<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'profitestimated'); ?></th>	
													</tr>
												</thead>
												<tbody>													
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-row" id="frmBuySell">
										<div class="form-group col-xl-6">
											<input id="inptAmount" name="inptAmount" type="text" class="form-control" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'amount'); ?>" >
										</div>
										<div class="form-group col-xl-6" style="margin-bottom: 0px;">
											<select class="custom-select" id="cmbCurrency"  aria-label="">
												<?php 
													$coins = website_coins();
													$keys = array_keys($coins);						
							
													for($idx = 0; $idx < count($keys); $idx++)
													{
														$key = $keys[$idx];
														if($idx == 0)
															echo '<option selected value="'.$idx.'">'.$key.'</option>';
														else
															echo '<option value="'.$idx.'">'.$key.'</option>';
													}
												?>	
											</select>
										</div>
										<div class="form-group col-xl-12" style="margin-bottom: 0px;">
											<input id="inptPrice" name="inptPrice" type="text" class="form-control" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'price'); ?>" >
										</div>
										<div class="form-group col-xl-12" style="text-align: center; ">
											<button type="button" class="btn btn-danger qx_btn" style="margin:20px" onclick="doBSAction('BUY');"><?php echo get_langdata($this->session->userdata('lang'), 'buy'); ?></button>
											<button type="button" class="btn btn-info qx_btn" style="margin:20px" onclick="doBSAction('SELL');"><?php echo get_langdata($this->session->userdata('lang'), 'sell'); ?></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal -->
			<div class="modal fade" id="dlgConfirm">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" style="color: black;"><?php echo get_langdata($this->session->userdata('lang'), 'confirm'); ?></h5>
							<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p style="color: black;"></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo get_langdata($this->session->userdata('lang'), 'cancel'); ?></button>
							<button type="button" class="btn btn-primary" id="btnOk"><?php echo get_langdata($this->session->userdata('lang'), 'ok'); ?></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->


</div>

<script src="<?php echo WEBSITE_AVID_MAIN; ?>js/dashboard/dashboard-1.js"></script>
<script>

var str = '<?php echo json_encode(website_coins()); ?>';
var coins = JSON.parse(str);
console.log(coins);

var str = '<?php echo $board_data;?>';
var content = JSON.parse(str);
var actionUId = "";
var timerinterval = parseInt('<?php echo $timerinterval; ?>') * 1000;
var selrow = {blockid: -1, selrowidx: -1};

function displayTotalBlock(total_profit, total_comission, total_users, total_amount)
{
	// coins //
	spanCoins = $('#divCoins span');
	$.each(spanCoins, function(index, span)
	{
		var icon = $(span).find("i");
		var classList = $(icon).attr('class').split(/\s+/);
		$.each(classList, function(index, item) {
			if (item !== 'cc') {				
				icon.removeClass(item);
				icon.addClass(coinNameFilter(item));
			}
		});
	});

	$('#flowTxtPrft').text(decimalFormat(total_profit));
	$('#flowTxtCmssn').text(decimalFormat(total_comission));
	$('#flowTxtUsrs').text(decimalFormat(total_users));
	
	for(idx = 0; idx < total_amount.length; idx++ )
		$('#txtTAmount-' + idx).text(decimalFormat(total_amount[idx]));
}

function displayPendingBlock(pending_transaction)
{
	// pending transaction //
	var pending = pending_transaction;
	console.log(pending);
	$("#tblPending tbody").empty();

	if( pending_transaction.length <= 0)
	{
		$("#pendingContainer").hide();
	}
	else
	{
		$("#pendingContainer").show();
	}
	
	for(idx = 0; idx < pending.length; idx++)
	{
		if( selrow.blockid == 0 && selrow.selrowidx == idx )
			clsHighlight ="highlight";
		else
			clsHighlight = "";

		var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
						<td><strong>'+ pending[idx].uid +'</strong></td> \
						<td>'+ pending[idx].side +'</td> \
						<td><strong><i class="cc '+ coinNameFilter(pending[idx].currency) + '" style="padding-right: 5px"></i>'+ pending[idx].currency +'</strong></td> \
						<td>'+ decimalFormat(pending[idx].amount) +'</td> \
						<td>'+ decimalFormat(pending[idx].price) +'</td> \
						<td class="change"> \
							<span>'+ formatDate(pending[idx].datetime) +'</span> \
						</td> \
						<td> <a href="javascript:deletePending(\''+pending[idx].uid +'\')" style="margin-left: 5px; background-color:#5E1084;width: 35px;display: block;text-align: center;font-weight: bold;"><i class="mdi mdi-delete"></i></a>	 </td> \
					</tr>';
		$("#tblPending > tbody:last-child").append(sNode);
	}

	$("#tblPending tbody tr").click(function() {
		var selected = $(this).hasClass("highlight");
		
		$("#tblSmiling tr").removeClass("highlight");
		$("#tblInsufficient tr").removeClass("highlight");
		$("#tblOriginalCoin tr").removeClass("highlight");
		$("#tblPending tr").removeClass("highlight");
		$("#tblTransaction tr").removeClass("highlight");

		if(!selected)
			$(this).addClass("highlight");

		var selrowIdx = parseInt($(this).attr("data-info"));
		selrow.blockid = 0;
		selrow.selrowidx = selrowIdx;

		// run the search action // 
		uid = pending_transaction[selrowIdx].uid;		
		$("#inptUId").val(uid);
		searchUser('button');

		console.log("selidx = " + selrowIdx + ", uid = " + uid);
	});
}

function displayInsufficientBlock(insufficient_user) 
{
	// insufficient user //
	var insuff = insufficient_user;
	console.log(insuff);

	$("#tblInsufficient tbody").empty();
	if( insufficient_user.length <= 0)
	{
		$("#insufficientContainer").hide();
	}
	else
	{
		$("#insufficientContainer").show();
	}

	for(idx = 0; idx < insuff.length; idx++)
	{
		if( selrow.blockid == 1 && selrow.selrowidx == idx )
			clsHighlight ="highlight";
		else
			clsHighlight = "";

		var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
						<td><strong>'+ insuff[idx].uid +'</strong></td> \
						<td>'+ insuff[idx].phone +'</td> \
						<td>'+ insuff[idx].email +'</td> \
						<td>'+ decimalFormat(insuff[idx].margin) +'</td> \
					</tr>';
		$("#tblInsufficient > tbody:last-child").append(sNode);
	}

	$("#tblInsufficient tbody tr").click(function() {
		var selected = $(this).hasClass("highlight");
		
		$("#tblSmiling tr").removeClass("highlight");
		$("#tblInsufficient tr").removeClass("highlight");
		$("#tblOriginalCoin tr").removeClass("highlight");
		$("#tblPending tr").removeClass("highlight");
		$("#tblTransaction tr").removeClass("highlight");

		if(!selected)
			$(this).addClass("highlight");

		var selrowIdx = parseInt($(this).attr("data-info"));
		selrow.blockid = 1;
		selrow.selrowidx = selrowIdx;

		// run the search action // 
		uid = insufficient_user[selrowIdx].uid;		
		$("#inptUId").val(uid);
		searchUser('button');

		console.log("selidx = " + selrowIdx + ", uid = " + uid);
	});
}

function displayOriginalBlock(original_users)
{
	// original coin user //	
	console.log(original_users);

	$("#tblOriginalCoin tbody").empty();
	if( original_users.length <= 0)
	{
		$("#originContainer").hide();
	}
	else
	{
		$("#originContainer").show();
	}
	
	for(idx = 0; idx < original_users.length; idx++)
	{
		var coinid = parseInt(original_users[idx].initial_coin);
		if( selrow.blockid == 2 && selrow.selrowidx == idx )
			clsHighlight ="highlight";
		else
			clsHighlight = "";

		var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
						<td><strong>'+ original_users[idx].uid +'</strong></td> \
						<td><strong><i class="cc '+ coinNameFilter(original_users[idx].initial_coin) +'" style="padding-right: 5px"></i> '+ original_users[idx].initial_coin +'</strong></td> \
						<td>'+ decimalFormat(original_users[idx].initial_amount) +'</td> \
						<td>'+ original_users[idx].startdate +'</td> \
					</tr>';
		$("#tblOriginalCoin > tbody:last-child").append(sNode);
	}

	$("#tblOriginalCoin tbody tr").click(function() {
		var selected = $(this).hasClass("highlight");
		
		$("#tblSmiling tr").removeClass("highlight");
		$("#tblInsufficient tr").removeClass("highlight");
		$("#tblOriginalCoin tr").removeClass("highlight");
		$("#tblPending tr").removeClass("highlight");
		$("#tblTransaction tr").removeClass("highlight");

		if(!selected)
			$(this).addClass("highlight");

		var selrowIdx = parseInt($(this).attr("data-info"));
		selrow.blockid = 2;
		selrow.selrowidx = selrowIdx;

		// run the search action // 
		uid = original_users[selrowIdx].uid;		
		$("#inptUId").val(uid);
		searchUser('button');

		console.log("selidx = " + selrowIdx + ", uid = " + uid);
	});
}

function displaySmilingBlock(smiling_users)
{
	// original coin user //	
	console.log(smiling_users);

	$("#tblSmiling tbody").empty();
	if( smiling_users.length <= 0)
	{
		$("#smilingContainer").hide();
	}
	else
	{
		$("#smilingContainer").show();
	}

	for(idx = 0; idx < smiling_users.length; idx++)
	{
		if( selrow.blockid == 0 && selrow.selrowidx == idx )
			clsHighlight ="highlight";
		else
			clsHighlight = "";

		var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
						<td><strong>'+ smiling_users[idx].uid +'</strong></td> \
						<td><strong><i class="cc '+ coinNameFilter(smiling_users[idx].basecoin) +'" style="padding-right: 5px"></i> '+ smiling_users[idx].basecoin +'</strong></td> \
						<td><strong><i class="cc '+ coinNameFilter(smiling_users[idx].quotecoin) +'" style="padding-right: 5px"></i> '+ smiling_users[idx].quotecoin +'</strong></td> \
						<td>'+ decimalFormat(smiling_users[idx].profit_estimated) +'</td> \
					</tr>';
		$("#tblSmiling > tbody:last-child").append(sNode);
	}

	$("#tblSmiling tbody tr").click(function() {
		var selected = $(this).hasClass("highlight");
		
		$("#tblSmiling tr").removeClass("highlight");
		$("#tblInsufficient tr").removeClass("highlight");
		$("#tblOriginalCoin tr").removeClass("highlight");
		$("#tblPending tr").removeClass("highlight");
		$("#tblTransaction tr").removeClass("highlight");

		if(!selected)
			$(this).addClass("highlight");

		var selrowIdx = parseInt($(this).attr("data-info"));
		selrow.blockid = 3;
		selrow.selrowidx = selrowIdx;

		// run the search action // 
		uid = smiling_users[selrowIdx].uid;		
		$("#inptUId").val(uid);
		searchUser('button');

		console.log("selidx = " + selrowIdx + ", uid = " + uid);
	});

}

function displayTransactionBlock(transaction)
{
	// transaction history //	
	console.log(transaction);
	$("#tblTransaction tbody").empty();	

	for(idx = 0; idx < transaction.length; idx++)
	{
		if( selrow.blockid == 0 && selrow.selrowidx == idx )
			clsHighlight ="highlight";
		else
			clsHighlight = "";

		var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
						<td><strong>'+ transaction[idx].uid +'</strong></td> \
						<td class="text-info"> \
							<span>'+ transaction[idx].datetime +'</span> \
						</td> \
						<td><strong><i class="cc '+ coinNameFilter(transaction[idx].base_currency) +'" style="padding-right: 5px"></i> '+ transaction[idx].base_currency +'</strong></td> \
						<td>'+ decimalFormat(transaction[idx].base_amount) +'</td> \
						<td><strong><i class="cc '+ coinNameFilter(transaction[idx].quote_currency) +'" style="padding-right: 5px"></i> '+ transaction[idx].quote_currency +'</strong></td> \
						<td>'+ decimalFormat(transaction[idx].quote_amount) +'</td> \
						<td>'+ decimalFormat(transaction[idx].profit) +'</td> \
						<td class="text-success"> \
						'+ decimalFormat(transaction[idx].fee) +' \
						</td> \
					</tr>';
		$("#tblTransaction > tbody:last-child").append(sNode);
	}

	$("#tblTransaction tbody tr").click(function() {
		var selected = $(this).hasClass("highlight");
		
		$("#tblSmiling tr").removeClass("highlight");
		$("#tblInsufficient tr").removeClass("highlight");
		$("#tblOriginalCoin tr").removeClass("highlight");
		$("#tblPending tr").removeClass("highlight");
		$("#tblTransaction tr").removeClass("highlight");

		if(!selected)
			$(this).addClass("highlight");

		var selrowIdx = parseInt($(this).attr("data-info"));
		selrow.blockid = 0;
		selrow.selrowidx = selrowIdx;

		// run the search action // 
		uid = transaction[selrowIdx].uid;		
		$("#inptUId").val(uid);
		searchUser('button');

		console.log("selidx = " + selrowIdx + ", uid = " + uid);
	});
}

function displayActionBlock(action_user)
{
	console.log("displayActionBlock action_user = " + action_user);
	if( action_user == undefined || action_user == null )
		return;

	// buy, sell //	
	console.log(action_user);
	$("#tblActionUser tbody").empty();

	// if action_user is valid
	if( action_user.estimated_list != undefined)
	{
		$("#frmBuySell").show();
		$("#inptUId").val(action_user.uid);
		$("#cmbProfitCurrency").val(action_user.estimated_id);
		idx = 0;
		$.each(coins, function(key, val){
			var sNode = '<tr>\
							<td><strong><i class="cc ' + coinNameFilter(key) + '" style="padding-right: 5px"></i> ' + key + '</strong></td>\
							<td>' + decimalFormat(action_user.balance[idx]) + '</td>\
							<td>' + decimalFormat(action_user.base_balance[idx]) + '</td>\
							<td>' + decimalFormat(action_user.estimated_list[idx]) + '</td>\
						</tr>';
			$("#tblActionUser > tbody:last-child").append(sNode);
			idx++;
		});
		var sNode = '<tr>\
						<td><strong><i class="cc USDT" style="padding-right: 5px"></i>USDT</strong></td>\
						<td colspan="3">' + decimalFormat(action_user.usdt) + '</td>\
					</tr>';
		$("#tblActionUser > tbody:last-child").append(sNode);		
		actionUId = action_user.uid;
	}
	else
	{
		$("#frmBuySell").hide();
		$("#inptUId").val(action_user.uid);
		$("#cmbProfitCurrency").val(action_user.estimated_id);
		$.each(coins, function(key, val){
			var sNode = '<tr>\
							<td><strong><i class="cc ' + coinNameFilter(key) + '" style="padding-right: 5px"></i> ' + key + '</strong></td>\
							<td>' + '0.0' + '</td>\
							<td>' + '0.0' + '</td>\
							<td>' + '0.0' + '</td>\
						</tr>';
			$("#tblActionUser > tbody:last-child").append(sNode);
			idx++;
		});
		var sNode = '<tr>\
						<td><strong><i class="cc USDT" style="padding-right: 5px"></i>USDT</strong></td>\
						<td colspan="3">0</td>\
					</tr>';
		$("#tblActionUser > tbody:last-child").append(sNode);	
	}
}

function displayArrangeBlock() 
{	
	var actionblock_height = $("#divActionBlock").height();
	var block_margin = parseInt($("#divActionBlock").css('marginBottom'));
	var displayed_block_num = 0;
	
	content.pending_transaction.length > 0 ? displayed_block_num++ : true;
	content.original_coinusers.length > 0 ? displayed_block_num++ : true;
	content.insufficient_user.length > 0 ? displayed_block_num++ : true;
	content.smiling_users.length > 0 ? displayed_block_num++ : true;
		
	if( displayed_block_num == 0 )
	{	
		displayed_block_num = 1;
		blockheight = (actionblock_height - (displayed_block_num - 1) * block_margin ) / displayed_block_num;
		$("#pendingContainer").show();
		$("#pendingContainer").height(blockheight + 'px');
		console.log("displayArrangeBlock: displayed_block_num = " + displayed_block_num + ", blockheight = "  + blockheight);
	}
	else 
	{
		blockheight = (actionblock_height - (displayed_block_num - 1) * block_margin ) / displayed_block_num;

		content.pending_transaction.length > 0 ? $("#pendingContainer").height(blockheight + 'px') : true;
		content.original_coinusers.length > 0 ? $("#originContainer").height(blockheight + 'px') : true;
		content.insufficient_user.length > 0 ? $("#insufficientContainer").height(blockheight + 'px') : true;
		content.smiling_users.length > 0 ? $("#smilingContainer").height(blockheight + 'px') : true;
		
		console.log("displayArrangeBlock: displayed_block_num = " + displayed_block_num + ", blockheight = "  + blockheight);
	}

}

(function($){	
	displayTotalBlock(content.total_profit, content.total_comission, content.total_users, content.total_amount);
	displayPendingBlock(content.pending_transaction);
	displayOriginalBlock(content.original_coinusers);
	displayInsufficientBlock(content.insufficient_user);
	displaySmilingBlock(content.smiling_users);
	displayTransactionBlock(content.transaction);
	displayActionBlock(content.action_user);
	displayArrangeBlock();

	setInterval(updateDashboard, timerinterval);
})(jQuery);

var idx = 0;
function updateDashboard()
{
	console.log('updateDashboard');
	var value = {
		uid: $("#inptUId").val(),
		estimated_id: -1
	    // estimated_id: $("#cmbProfitCurrency").val()
	}

	$.ajax({
	    url: '/index.php/home/ajaxUpdateBoard',
	    type: 'post',
	    dataType: 'json',
	    success: function (retParam) {		
			console.log(retParam.result);
			content = retParam.data;
			displayTotalBlock(content.total_profit, content.total_comission, content.total_users, content.total_amount);
			displayPendingBlock(content.pending_transaction);
			displayOriginalBlock(content.original_coinusers);
			displayInsufficientBlock(content.insufficient_user);
			displaySmilingBlock(content.smiling_users);
			displayTransactionBlock(content.transaction);
			displayActionBlock(content.action_user);
			displayArrangeBlock();
	    },
	    data: {param: JSON.stringify(value)}
	});
}

function searchUser(stype) {
	console.log('searchUser');

	if(stype == 'button')
		estimated_id = -1;
	else
		estimated_id = $("#cmbProfitCurrency").val();

	var value = {
	    uid: $("#inptUId").val(),
	    estimated_id: estimated_id
	}

	$.ajax({
	    url: '/index.php/home/ajaxChangeProfit',
	    type: 'post',
	    dataType: 'json',
	    success: function (retParam) {
			console.log(retParam);
			content.action_user = retParam.data;
			displayActionBlock(content.action_user);
	    },
	    data: {param: JSON.stringify(value)}
	});
}

function deletePending(uid)
{
	// alert('bujh');
	$('#dlgConfirm .modal-body > p').text('<?php echo get_langdata($this->session->userdata('lang'), 'confirmmessage'); ?>');
	$('#dlgConfirm').modal('show'); 
	$('#dlgConfirm .modal-footer > button#btnOk').click(function() {
		$('#dlgConfirm').modal('hide');
		console.log("deletePending: " + uid);

		var value = {
			uid: uid
		}

		$.ajax({
			url: '/index.php/home/ajaxDeletePending',
			type: 'post',
			dataType: 'json',	    
			success: function (retParam) {
				console.log(retParam);
				content.pending_transaction = retParam.data;
				displayPendingBlock(content.pending_transaction);
			},
			data: {param: JSON.stringify(value)}
		});

	});
}

function doBSAction(actionType)
{	
	coinid = parseInt($("#cmbCurrency").val());
	
	uid = actionUId;
	currency = Object.keys(coins)[coinid];
	amount = $("#inptAmount").val();
	price = $("#inptPrice").val();
	side = actionType;

	var value = {
		uid: uid,
		amount: amount,
		currency: currency,
		price: price,
		side: side
	}
	
	console.log(value);

	$.ajax({
		url: '/index.php/home/ajaxBSAction',
		type: 'post',
		dataType: 'json',	    
		success: function (retParam) {
			alert(retParam.data[0]);
		},
		data: {param: JSON.stringify(value)}
	});
}
	
</script>

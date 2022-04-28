<?php
	if ( isset($nav) && $nav!= "") $this->load->view($nav);

	$total = $pagination['total'];
	$rowcount = $pagination['rowcount'];
	$pageidx = $pagination['pageidx'];
	$filter = $pagination['filter'];
	$from = $pagination['from'];
	$to = $pagination['to'];
	$blockcount = $pagination['blockcount'];

	$total_pages = (int)($total / $rowcount) + ($total % $rowcount == 0 ? 0 : 1);
	$total_blocks = (int)($total_pages / $blockcount) + ($total_pages % $blockcount == 0 ? 0 : 1);

	$fromPage = 0;
	$toPage = ($fromPage + 1 ) * $blockcount;
	$toPage = $toPage >= $total_pages ? $total_pages: $toPage;
?>

<style>
	#tbltransaction tbody tr:hover {
		background-color: #5E1084;
	}

	.highlight {
		background-color: #5E1084;
	}
	.head_highlight {
		background-color: #5e10847d;		
		color: #fff !important;
	}

	.head_highlight_desc::before {
		border-width: 6px 6px 0;
		border-color: #009a67 transparent transparent;
		content: " ";
		display: block;
		float: right;
		width: 0;
		height: 0;
		border-style: solid;
	}

	.head_highlight_asc::before {
		border-width:  0 6px 6px;
		border-color: transparent transparent #009a67;
		content: " ";
		display: block;
		float: right;
		width: 0;
		height: 0;
		border-style: solid;
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
				<span class="ml-1"><?php echo get_langdata($this->session->userdata('lang'), 'usrmanagement'); ?></span>
			</div>
		</div>
	</div>
			
	<div class="container">
		<div class="row">			
			<div class="col-md-8">
				<div class="card comments_section">
					<form class="form-valide" action="#" method="post">
						<div class="card-body" style="padding-top:40px">			
							<div class="form-group row">	
								<div class="col-lg-3">
									<button type="button" class="btn btn-info qx_btn" style="min-height: 50px; min-width: 80px;margin-left: 5px;margin-right: 5px;" onclick="showAddDlg(0)"> <?php echo get_langdata($this->session->userdata('lang'), 'add'); ?> </button>
									<button type="button" class="btn btn-info qx_btn" style="min-height: 50px; min-width: 80px;margin-left: 5px;margin-right: 5px;" onclick="showAddDlg(1)"> <?php echo get_langdata($this->session->userdata('lang'), 'edit'); ?> </button>
								</div>

								<div class="col-lg-3" style="margin-left: -15px;">
									<select class="form-control" id="cmbRowCount" name="cmbRowCount" onChange="searchPage()">							
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="50">50</option>										
									</select>
								</div>

								<div class="col-lg-2">
								</div>

								<div class="col-lg-4">
									<div class="input-group">										
										<input type="text" class="form-control" id="inptFilter" name="inptFilter" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'searchitem'); ?>">
										<div class="input-group-append show-pass">
											<button id="btnSearch" type="button" onclick="searchPage()" class="input-group-text"> <?php echo get_langdata($this->session->userdata('lang'), 'search'); ?> </button>
										</div>
									</div>				
								</div>
							</div>
						</div>
				
						<div class="table-responsive">
							<table class="table market-cap table-responsive-tiny" id="tbltransaction">
								<thead>
									<tr>
										<!-- <th scope="col">ID</th>
										<th scope="col">Phone</th>	
										<th scope="col">Email</th>
										<th scope="col">Api Key</th>
										<th scope="col">Api Secret</th>
										<th scope="col">PassPhrase</th>
										<th scope="col">Margin</th>	-->
																		
										<th data-info="uid" scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?><img></img></th>
										<th data-info="phone" scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'phone'); ?></th>	
										<th data-info="startdate" scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'startdate'); ?></th>
										<th data-info="lastdate" scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'lastdate'); ?></th>
										<th data-info="initial_amount" scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'usd'); ?></th>										

										<?php
											/* 
											<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'apikey'); ?></th>
											<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'apisecret'); ?></th>
											<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'passphrase'); ?></th>
											*/
										?>
																				
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'margin'); ?></th>
										<th scope="col"><?php echo get_langdata($this->session->userdata('lang'), 'status'); ?></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>

						<nav class="pb-5" style="margin-top:50px">
							<ul class="pagination justify-content-md-end" id="ulPagination" >								
							</ul>
						</nav>
					</form>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<div class="card-body" >
						<div class="media align-items-center mb-4">							
							<div class="media-body">								
								<h4>About Me</h4>						
								<ul class="card-profile__info" style="margin-top:20px">
									<li class="mb-1"><strong class="text-dark mr-4" style="width:100px;display: inline-block;"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></strong> <span id="spnId"></span></li>
									<li class="mb-1"><strong class="text-dark mr-4" style="width:100px;display: inline-block;"><?php echo get_langdata($this->session->userdata('lang'), 'mobile'); ?></strong> <span id="spnPhone"></span></li>
									<li class="mb-1"><strong class="text-dark mr-4" style="width:100px;display: inline-block;"><?php echo get_langdata($this->session->userdata('lang'), 'initialcoin'); ?></strong> <span id="spnInitialCoin"></span></li>
									<li class="mb-1"><strong class="text-dark mr-4" style="width:100px;display: inline-block;"><?php echo get_langdata($this->session->userdata('lang'), 'tippingrate'); ?></strong> <span id="spnTippingRate"></span></li>

									<!-- <li><strong class="text-dark mr-4" style="width:50px;display: inline-block;"><?php echo get_langdata($this->session->userdata('lang'), 'email'); ?></strong> <span id="spnEmail"></span></li> -->
								</ul>						
							</div>
						</div>						
						<div id="market-cap" class="table-responsive" style="margin-bottom: 20px;background-color: rgba(0, 0, 0, 0.4);">
							<div style="text-align: right;margin: 14px;margin-bottom: 0px;">
								<select class="custom-select" id="cmbProfitCurrency" onChange="selectCurrency()" style="width:120px">
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

							<table class="table mb-1 table-responsive-tiny" id="tblActionUser">
								<thead>
									<tr>
										<!-- <th scope="col">Currency</th>
										<th scope="col">Balance</th>	
										<th scope="col">Base Balance</th>
										<th scope="col">Profit Estimated</th> -->
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

					<div class="col-12 text-center" style="margin-bottom:10px">
						<button class="btn btn-secondary px-5" style="width: 200px" onclick="doResetBase()"><?php echo get_langdata($this->session->userdata('lang'), 'resetbase'); ?></button>
					</div>

					<div class="col-12 text-center" style="margin-bottom:10px">
						<button id="btnStatus" class="btn btn-secondary px-5" style="width: 200px" onclick="doChangeStatus()" ><?php echo get_langdata($this->session->userdata('lang'), 'start'); ?></button>
					</div>

					<div class="col-12 text-center" style="margin-bottom:10px">
						<button class="btn btn-secondary px-5" style="width: 200px" onclick="showDepositDlg()" ><?php echo get_langdata($this->session->userdata('lang'), 'deposit'); ?></button>
					</div>

					<div class="col-12 text-center" style="margin-bottom:10px">
						<button class="btn btn-secondary px-5" style="width: 200px" onclick="showConfirm('Do you really want to delete ? Please make sure again.')"><?php echo get_langdata($this->session->userdata('lang'), 'delete'); ?></button>
					</div>

					<div class="clearfix" style="padding-bottom:20px">						
					</div>

				</div>
			</div>
		</div>

		<!-- Add Modal -->
		<div class="modal fade" id="dlgAddUser">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" style="color: black;"><span id="dlgTitle"></span></h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptUid" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'id'); ?>" autofocus>								
							</div>
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'phone'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptPhone" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'phone'); ?>">
								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'email'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptEmail" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'email'); ?>">
								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'apikey'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptApikey" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'apikey'); ?>">
								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'apisecret'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptApisecret" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'apisecret'); ?>" style="width: 150p">
								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'passphrase'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptPass" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'passphrase'); ?>">
								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'margin'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptMargin" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'margin'); ?>">								
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'initialcoin'); ?></span>
								</div>									
								<select class="form-control " id="cmbInitialCoin" style="width:120px">
									<?php 
										$coins = website_coins();
										$keys = array_keys($coins);						
				
										for($idx = 0; $idx < count($keys); $idx++)
										{
											$key = $keys[$idx];
											if($idx == 0)
												echo '<option selected value="'.$key.'">'.$key.'</option>';
											else
												echo '<option value="'.$key.'">'.$key.'</option>';
										}
									?>													
								</select>
							</div>							
						</div>

						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'usd'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptInitialAmount" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'usd'); ?>">								
							</div>							
						</div>

						<div class="basic-form" id="dvTippingRate">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'tippingrate'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptTippingRate" value="<?php echo $tipping_rate; ?>" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'tippingrate'); ?>">								
							</div>							
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo get_langdata($this->session->userdata('lang'), 'cancel'); ?></button>
						<button type="button" class="btn btn-primary" id="btnAddUser" onclick="doSaveUser()"><?php echo get_langdata($this->session->userdata('lang'), 'save'); ?></button>
					</div>
					<input type="hidden" id="inptDlgType" value=""/>
				</div>
			</div>
		</div> <!-- Add Modal -->

		<!-- Deposit Modal -->
		<div class="modal fade" id="dlgDeposit">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" style="color: black;"><?php echo get_langdata($this->session->userdata('lang'), 'depositnow'); ?></h5>
						<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="basic-form">							
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" style="width: 100px"><?php echo get_langdata($this->session->userdata('lang'), 'amount'); ?></span>
								</div>
								<input type="text" class="form-control" id="inptAmount" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'amount'); ?>" autofocus>								
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo get_langdata($this->session->userdata('lang'), 'cancel'); ?></button>
						<button type="button" class="btn btn-primary" id="btnDeposit" onclick="doSaveDeposit()"><?php echo get_langdata($this->session->userdata('lang'), 'save'); ?></button>
					</div>					
				</div>
			</div>
		</div> <!-- Deposit Modal -->

		<!-- Confirm Modal -->
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
		</div> <!-- Modal -->
	</div>
</div>
<!--**********************************
	Content body end
***********************************-->

<script>
	var rowcount = <?php echo $rowcount; ?>;
	var filter = '<?php echo $filter; ?>';
	var pageidx = <?php echo $pageidx; ?>;

	var total = <?php echo $total; ?>;
	var from = <?php echo $from; ?>;
	var to = <?php echo $to; ?>;

	var blockcount = <?php echo $blockcount; ?>;
	var fromPage = <?php echo $fromPage; ?>;
	var toPage = <?php echo $toPage; ?>;

	var total_pages = <?php echo $total_pages; ?>;
	var total_blocks = <?php echo $total_blocks; ?>;

	var blockidx = 0;
	
	var str = '<?php echo json_encode($records);?>';
	var content = JSON.parse(str);
	var estimated_id = 0;
	var tipping_rate = <?php echo $tipping_rate; ?>;

	var str = '<?php echo json_encode(website_coins()); ?>';
	var coins = JSON.parse(str);
	var selrowIdx = 0;

	var timerinterval = parseInt('<?php echo $timerinterval; ?>') * 1000;
	var sort = {id: "", val: ""};

	console.log('fromPage: ' + fromPage + ', toPage: ' + toPage);
	(function($){		
		// set rowcount combo //
		$('#cmbRowCount').val(rowcount);

		// set search filter //
		$('#inptFilter').val(filter);

		// set pagination //
		displayTable(content);

		// set pagination //
		refreshPagination();		

		// set property window //
		displayProperty(content, 0, -1);	

		$('#inptFilter').keypress(function(event){	
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				event.preventDefault();
				searchPage();		
				event.stopPropagation();		
			}
		});

		$("#tbltransaction thead th").click(function() {

			data_info = $(this).attr("data-info");
			console.log($(this).hasClass("head_highlight_desc"));
			// var selected = $(this).hasClass("highlight");

			if( $(this).hasClass("head_highlight_desc") )
			{
				console.log($(this).hasClass("head_highlight_desc"));				
				$(this).removeClass("head_highlight_desc");
				$(this).addClass("head_highlight_asc");

				sort = {id: data_info,  val: "ASC"};
				updateDashboard();
			}
			else if( $(this).hasClass("head_highlight_asc") )
			{
				console.log($(this).hasClass("head_highlight_asc"));
				$(this).removeClass("head_highlight_asc");
				$(this).addClass("head_highlight_desc");

				sort = {id: data_info,  val: "DESC"};
				updateDashboard();
			}
			else 
			{
				$("#tbltransaction thead th").removeClass("head_highlight head_highlight_asc head_highlight_desc");
				$(this).addClass("head_highlight head_highlight_desc");

				sort = {id: data_info, val: "DESC"};						
			}
			
			searchPage();
			
		});

		setInterval(updateDashboard, timerinterval);
	})(jQuery);

	var idx = 0;
	function updateDashboard()
	{
		console.log('updateDashboard');
		estimate_id = parseInt($("#cmbProfitCurrency").val());
		var value = {
			uid: content[selrowIdx].uid,
			selidx: selrowIdx
		};
		console.log(value);

		$.ajax({
			url: '/index.php/user/ajaxUpdateBoard',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				console.log(retParam.data);
				content[retParam.data.selidx] = retParam.data.record;
		
				tipping_rate = retParam.data.tipping_rate;

				// set property window //
				displayProperty(content, selrowIdx, -1);

			},
			data: {param: JSON.stringify(value)}
		});
	}
	
	function showConfirm(msg)
	{
		$('#dlgConfirm .modal-body > p').text(msg);
		$('#dlgConfirm').modal('show'); 
		$('#dlgConfirm .modal-footer > button#btnOk').click(function() {
			$('#dlgConfirm').modal('hide');
			s_uid = content[selrowIdx].uid;
			console.log("doDelete: " + s_uid);
			var value = {
				uid: s_uid, 
			}

			$.ajax({
				url: '/index.php/user/ajaxDeleteUser',
				type: 'post',
				dataType: 'json',
				success: function (retParam) {		
					console.log(retParam.result);
					if(retParam.result == "success")
						location.href = "/index.php/user";
				},
				data: {param: JSON.stringify(value)}
			});
		});
	}

	function doChangeStatus()
	{
		s_uid = content[selrowIdx].uid;
		s_status = content[selrowIdx].status == 0 ? 1:0;
		console.log("doChangeStatus: " + s_uid + ", " + s_status);
		var value = {
			uid: s_uid, 
			status: s_status
		}

		$.ajax({
			url: '/index.php/user/ajaxChangeStatus',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				console.log(retParam.result);
				if(retParam.result == "success")
				{
					content[selrowIdx].status = s_status;
					if( s_status == 0 ) 
						$('#btnStatus').text("<?php echo get_langdata($this->session->userdata('lang'), 'start'); ?>"); 
					else 
						$('#btnStatus').text("<?php echo get_langdata($this->session->userdata('lang'), 'stop'); ?>");
					displayTable(content);
				}
				else
				{
					alert(retParam.data[0]);
				}
			},
			data: {param: JSON.stringify(value)}
		});
	}

	function doResetBase()
	{
		s_uid = content[selrowIdx].uid;
		console.log("doResetBase: " + s_uid);
		var value = {
			uid: s_uid
		}

		$.ajax({
			url: '/index.php/user/ajaxResetBase',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				console.log(retParam.result);
				alert(retParam.data[0]);
			},
			data: {param: JSON.stringify(value)}
		});
	}

	function displayTable(records)
	{		
		// set table //
		$('#tbltransaction tbody').empty();


		for(idx = 0; idx < records.length; idx++)
		{
			if( selrowIdx == idx )
				clsHighlight ="highlight";
			else
				clsHighlight = "";

			var status = records[idx].status == 0 ? '<?php echo get_langdata($this->session->userdata('lang'), 'stopped'); ?>' : '<?php echo get_langdata($this->session->userdata('lang'), 'running'); ?>';
			var sNode =	'<tr class="' + clsHighlight + '" data-info="'+ idx +'"> \
							<td>' + records[idx].uid +'</td>\
							<td>' + records[idx].phone +'</td> \
							<td>' + records[idx].startdate +'</td> \
							<td>' + records[idx].lastdate +'</td> \
							<td>' + decimalFormat(records[idx].initial_amount) +'</td>\
							<td>' + decimalFormat(records[idx].margin) +'</td>\
							<td>' + status +'</td>\
						</tr>';

			// <td>' + records[idx].api_secret +'</td> \
			// <td><span class="text-success">' + records[idx].pass_phrase +'</span></td>\
			$("#tbltransaction > tbody:last-child").append(sNode);
		}

		$("#tbltransaction tbody tr").click(function() {
			var selected = $(this).hasClass("highlight");
			$("#tbltransaction tr").removeClass("highlight");
			if(!selected)
				$(this).addClass("highlight");

			selrowIdx = parseInt($(this).attr("data-info"));			
			console.log(selrowIdx);

			displayProperty(content, selrowIdx, -1);
		});		
	}

	function refreshPagination()
	{
		pagenationinfo = "<?php echo get_langdata($this->session->userdata('lang'), 'paginationinfo'); ?>";
		pagenationinfo = pagenationinfo.replace("[0]", (from + 1)).replace("[1]", to).replace("[2]", total).replace("[3]", total_pages);

		// set pagination //
		$('#ulPagination').empty();
		
		var sNode = '<li class="page-string" style="margin: 10px;"> <span>'+ pagenationinfo +'</span> </li> \
						<li class="page-item"><a class="page-link" href="javascript:goPrevBlock()"><i class="fa fa-angle-double-left"></i></a> </li>';
		
		for (idx = fromPage; idx < toPage; idx++)
		{			
			if(idx == pageidx )
				sNode += ('<li id="paginator_' + idx + '" datavalue="' + idx + '" class="page-item active"><a class="page-link" href="javascript:selectPage(' + idx + ')">' + (idx + 1) + '</a>');
			else
				sNode += ('<li id="paginator_' + idx + '" datavalue="' + idx + '" class="page-item"><a class="page-link" href="javascript:selectPage(' + idx + ')">' + (idx + 1) + '</a>');
		}
		sNode += '<li class="page-item"><a class="page-link" href="javascript:goNextBlock()"><i class="fa fa-angle-double-right"></i></a></li> ';
		$('#ulPagination').append(sNode);
	}

	function actionFilter(filter) 
	{
		$.ajax({
			url: '/index.php/user/ajaxChangePage',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				console.log(retParam.result);

				// content = retParam.data;
				content = retParam.data;
				displayTable(content);

				// pagination
				pagination = retParam.pagination;
				pageidx = pagination.pageidx;
				from = pagination.from;				
				to = pagination.to;
				total = pagination.total;
				rowcount = pagination.rowcount;
				blockcount = pagination.blockcount;
				
				total_pages = parseInt(total / rowcount) + (total % rowcount == 0 ? 0 : 1);

				fromPage = blockidx * blockcount;
				toPage = (blockidx + 1 ) * blockcount;
				toPage = toPage > total_pages ? total_pages : toPage;
				// fromPage = 0;
				// toPage = (fromPage + 1) * blockcount;
				// toPage = toPage >= total_pages ? total_pages: toPage;

				$("#ulPagination").find("li.active").removeClass('active');
				$('#paginator_'+pageidx).addClass('active');
				refreshPagination();
			},
			data: {param: JSON.stringify(filter)}
		});
	}

	function searchPage()
	{
		console.log('searchPage');	
		// selidx = $("#ulPagination").find("li.active").attr("datavalue");
		// if(selidx == undefined || selidx == null)
		// 	selidx = 0;
		var value = {
			rowcount: $("#cmbRowCount").val(),
			filter: $("#inptFilter").val(),
			pageidx: 0,
			sort: sort
		}
		actionFilter(value);		
	}

	function selectPage(selidx) 
	{
		console.log('goPrevBlock selectPage = ' + selidx);	
		var value = {
			rowcount: $("#cmbRowCount").val(),
			filter: $("#inptFilter").val(),
			pageidx: selidx,
			sort: sort
		}		
		actionFilter(value);
	}

	function goPrevBlock() 
	{
		console.log('goPrevBlock blockidx = ' + blockidx);
		blockidx--;
		if( blockidx < 0 )
			blockidx = 0;
		
		fromPage = blockidx * blockcount;
		toPage = (blockidx + 1 ) * blockcount;
		toPage = toPage > total_pages ? total_pages : toPage;
		refreshPagination();
	}

	function goNextBlock()
	{
		console.log('goNextBlock blockidx = ' + blockidx);
		blockidx++;
		if( blockidx >= total_blocks )
			blockidx = total_blocks - 1;

		fromPage = blockidx * blockcount;
		toPage = (blockidx + 1 ) * blockcount;
		toPage = toPage > total_pages ? total_pages : toPage;

		refreshPagination();
	}

	function selectCurrency()
	{
		estmt_idx = parseInt($("#cmbProfitCurrency").val());
		displayProperty(content, selrowIdx, estmt_idx);
	}

	function displayProperty(records, selidx, estmt_idx)
	{
		row = records[selidx];
		if( row == null || row == undefined )
			return;
		
		$('#spnId').text(row.uid);
		$('#spnPhone').text(row.phone);
		$('#spnEmail').text(row.email);
		$('#spnInitialCoin').text(row.initial_coin);
		$('#spnTippingRate').text(row.tipping_rate);

		if( row.status == 0 ) $('#btnStatus').text("<?php echo get_langdata($this->session->userdata('lang'), 'start'); ?>"); else $('#btnStatus').text("<?php echo get_langdata($this->session->userdata('lang'), 'stop'); ?>");

		balances = row.balance.split(",");
		base_balances = row.base_balance.split(",");

		// all_list = row.profit_estimated.split(",");
		if( estmt_idx < 0 )
		{
			for( idx = 0; idx < balances.length; idx++ )
			{
				if( parseFloat(balances[idx]) != 0 )
				{
					// estmt_idx = parseInt(idx / Object.keys(coins).length);
					estmt_idx = idx;
					break;
				}
			}
		}

		estimated_list = row.profit_estimated.split(",").slice(estmt_idx * Object.keys(coins).length, (estmt_idx+1) * Object.keys(coins).length); 
				
		$("#tblActionUser tbody").empty();
		if( estimated_list != undefined)
		{
			$("#cmbProfitCurrency").val(estmt_idx);
			idx = 0;
			$.each(coins, function(key, val){
				var sNode = '<tr>\
								<td><strong><i class="cc ' + coinNameFilter(key) + '" style="padding-right: 5px"></i> ' + key + '</strong></td>\
								<td>' + decimalFormat(balances[idx]) + '</td>\
								<td>' + decimalFormat(base_balances[idx]) + '</td>\
								<td>' + decimalFormat(estimated_list[idx]) + '</td>\
							</tr>';
				$("#tblActionUser > tbody:last-child").append(sNode);
				idx++;
			});

			var sNode = '<tr>\
							<td><strong><i class="cc USDT" style="padding-right: 5px"></i>USDT</strong></td>\
							<td colspan="3">' + decimalFormat(row.usdt) + '</td>\
						</tr>';
			$("#tblActionUser > tbody:last-child").append(sNode);	
		}
		else
		{
			$("#cmbProfitCurrency").val(estmt_idx);
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

	function showDepositDlg()
	{
		$('#dlgDeposit').modal('show');
	}

	function doSaveDeposit()
	{
		console.log("doSaveDeposit");
		
		s_uid = content[selrowIdx].uid;
		s_amount = $("#inptAmount").val();
		if( s_amount == "" ) { $("#inptAmount").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msgamount'); ?>"); return ; }
		s_datetime = new Date().toDateString("yyyy-MM-dd hh:mm:ss");

		var d = new Date,
		s_datetime = [	d.getFullYear(),
						(d.getMonth()+1).padLeft(),
						d.getDate().padLeft()						
					].join('-') 
						+ ' ' +
					[	d.getHours().padLeft(),
						d.getMinutes().padLeft(),
						d.getSeconds().padLeft()
					].join(':');

		$('#dlgDeposit').modal('hide');
		var value = {
			uid: s_uid, 
			datetime: s_datetime,
			amount: s_amount
		}

		$.ajax({
			url: '/index.php/user/ajaxDeposit',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				alert(retParam.data[0]);
			},
			data: {param: JSON.stringify(value)}
		});
	}

	function showAddDlg(dlgtype)
	{
		$("#inptDlgType").val(dlgtype);
		if(dlgtype == 0) // save
		{

			$("#dlgTitle").text('<?php echo get_langdata($this->session->userdata('lang'), 'adduser'); ?>');

			$("#inptUid").val("");
			$("#inptPhone").val("");
			$("#inptEmail").val("");
			$("#inptApikey").val("");
			$("#inptApisecret").val("");
			$("#inptPass").val("");
			$("#inptMargin").val("");
			$("#cmbInitialCoin").val("BTC");

			$("#inptUid").removeAttr('readonly');
			$("#inptPhone").removeAttr('readonly');
			$("#inptEmail").removeAttr('readonly');
			$("#inptApikey").removeAttr('readonly');
			$("#inptApisecret").removeAttr('readonly');
			$("#inptPass").removeAttr('readonly');
			$("#inptMargin").removeAttr('readonly');
			// $("#cmbInitialCoin").attr("disabled", false); 

			$("#inptInitialAmount").val("");
			$("#inptTippingRate").val(tipping_rate);

		}
		else			// edit
		{

			$("#dlgTitle").text('<?php echo get_langdata($this->session->userdata('lang'), 'edituser'); ?>');

			$("#inptUid").val(content[selrowIdx].uid);
			$("#inptPhone").val(content[selrowIdx].phone);
			$("#inptEmail").val(content[selrowIdx].email);
			$("#inptApikey").val(content[selrowIdx].api_key);
			$("#inptApisecret").val(content[selrowIdx].api_secret);
			$("#inptPass").val(content[selrowIdx].pass_phrase);
			$("#inptMargin").val(content[selrowIdx].margin);
			$("#cmbInitialCoin").val(content[selrowIdx].initial_coin);

			$("#inptUid").attr('readonly', 'readonly');
			$("#inptPhone").attr('readonly', 'readonly');
			$("#inptEmail").attr('readonly', 'readonly');
			$("#inptApikey").attr('readonly', 'readonly');
			$("#inptApisecret").attr('readonly', 'readonly');
			$("#inptPass").attr('readonly', 'readonly');
			$("#inptMargin").attr('readonly', 'readonly');
			// $("#cmbInitialCoin").attr("disabled", true); 

			$("#inptInitialAmount").val(content[selrowIdx].initial_amount);
			$("#inptTippingRate").val(content[selrowIdx].tipping_rate);
		}
		$('#dlgAddUser').modal('show');
	}

	function doSaveUser()
	{
		s_uid = $("#inptUid").val();
		s_phone = $("#inptPhone").val();
		s_email = $("#inptEmail").val();
		s_apikey = $("#inptApikey").val();
		s_apisecret = $("#inptApisecret").val();
		s_passphrase = $("#inptPass").val();
		s_margin = $("#inptMargin").val();
		s_tippingrate = $("#inptTippingRate").val();
		s_initialcoin = $("#cmbInitialCoin").val();
		s_initialamount = $("#inptInitialAmount").val();

		if( s_uid == "" ) { $("#inptUid").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msguid'); ?>"); return ; }
		if( s_phone == "" ) { $("#inptPhone").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msgphone'); ?>"); return ; }
		if( s_apikey == "" ) { $("#inptApikey").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msgapikey'); ?>"); return ; }
		if( s_apisecret == "" ) { $("#inptApisecret").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msgapisecret'); ?>"); return; }
		if( s_passphrase == "" ) { $("#inptPass").focus(); alert("s<?php echo get_langdata($this->session->userdata('lang'), 'msgpassphrase'); ?>"); return; }
		
		if( s_initialcoin == "" ) { $("#inptPass").focus(); alert("s<?php echo get_langdata($this->session->userdata('lang'), 'msgpassphrase'); ?>"); return; }
		if( s_initialamount == "" ) { $("#inptPass").focus(); alert("s<?php echo get_langdata($this->session->userdata('lang'), 'msgpassphrase'); ?>"); return; }

		if( s_tippingrate == "" || !$.isNumeric(s_tippingrate) ) { $("#inptMargin").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msgtippingrate'); ?>"); return; }
		if( s_initialamount == "" || !$.isNumeric(s_initialamount) ) { $("#inptMargin").focus(); alert("<?php echo get_langdata($this->session->userdata('lang'), 'msginitialamount'); ?>"); return; }

		var value = {
			uid: s_uid,
			phone: s_phone,
			email: s_email,
			api_key: s_apikey,
			api_secret: s_apisecret,
			pass_phrase: s_passphrase,
			margin: s_margin,
			tipping_rate: s_tippingrate,
			initial_coin: s_initialcoin,
			initial_amount: s_initialamount
		}

		dlgtype = parseInt($("#inptDlgType").val());
		if(dlgtype == 0 ) // add user
		{
			$.ajax({
			url: '/index.php/user/ajaxAddUser',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
					console.log(retParam.result);
					if(retParam.result == "success") {
						$('#dlgAddUser').modal('hide');
						location.href = "/index.php/user";
					}
					else
					{
						alert(retParam.data[0]);
					}
						
				},
				data: {param: JSON.stringify(value)}
			});
		}
		else		// edit user 
		{
			$.ajax({
			url: '/index.php/user/ajaxEditUser',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
					console.log(retParam.result);
					if(retParam.result == "success") {
						$('#dlgAddUser').modal('hide');
						location.href = "/index.php/user";
					}
					else
					{
						alert(retParam.data[0]);
					}
						
				},
				data: {param: JSON.stringify(value)}
			});
		}
		
	}
</script>

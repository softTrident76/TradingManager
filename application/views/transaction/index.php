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
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="row page-titles mx-0">
		<div class="col-sm-6 p-md-0">
			<div class="breadcrumb-range-picker">
				<span><i class="icon-calender"></i></span>
				<span class="ml-1"><?php echo get_langdata($this->session->userdata('lang'), 'trsctnhistory'); ?></span>
				<!-- <span class="ml-1">Transaction History</span> -->
			</div>
		</div>
	</div>
			
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<form class="form-valide" action="#" method="post">
						<div class="card-body" style="padding-top:40px">			
							<div class="form-group row">			
								<div class="col-lg-2">
									<select class="form-control" id="cmbRowCount" name="cmbRowCount" onChange="searchPage()">									
										<option value="5">5</option>
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="50">50</option>							
										<!-- <option value="all">All</option>						 -->
									</select>
								</div>

								<div class="col-lg-6">
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
							<table class="table market-cap table-responsive-sm" id="tbltransaction">
								<thead>
									<tr>
										<!-- <th>Id</th>
										<th>DateTime</th>
										<th>Base Currency</th>
										<th>Base Amount</th>
										<th>Quote Currency</th>
										<th>Quote Amount</th>
										<th>Profit</th>
										<th>Commission</th>
										-->

										<th><?php echo get_langdata($this->session->userdata('lang'), 'id'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'datetime'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'basecurrency'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'baseamount'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'baseprice'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'quotecurrency'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'quoteamount'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'quoteprice'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'profit'); ?></th>
										<th><?php echo get_langdata($this->session->userdata('lang'), 'commission'); ?></th>									
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
		</div>
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
	var summupProfit = parseInt('<?php echo $sumupProfit; ?>'); 
	var sumupFee = parseInt('<?php echo $sumupFee; ?>'); 

	console.log('fromPage: ' + fromPage + ', toPage: ' + toPage);
	(function($){		
		// set rowcount combo //
		$('#cmbRowCount').val(rowcount);

		// set search filter //
		$('#inptFilter').val(filter);

		// set pagination //
		displayTable(content, summupProfit, sumupFee);

		// set pagination //
		refreshPagination();

		$('#inptFilter').keypress(function(event){	
			var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				event.preventDefault();
				searchPage();
				event.stopPropagation();			
			}
		});

	})(jQuery);

	function displayTable(records, sumprft, sumupfee)
	{		
		// set table //
		$('#tbltransaction tbody').empty();
		for(idx = 0; idx < records.length; idx++)
		{	
			var sNode = '<tr>\
							<td>'+ records[idx].uid +'</td>\
							<td>'+ formatDatetimeTime(records[idx].datetime) +'</td>\
							<td><i class="cc ' + coinNameFilter(records[idx].base_currency) + '"></i>' + records[idx].base_currency + '</td>\
							<td class="text-info">' + records[idx].base_amount + '</td>\
							<td class="text-info">' + records[idx].base_price + '</td>\
							<td><i class="cc ' + coinNameFilter(records[idx].quote_currency) + '"></i>' + records[idx].quote_currency + '</td>\
							<td><span class="text-success">' + records[idx].quote_amount + '</span>\
							<td><span class="text-success">' + records[idx].quote_price + '</span>\
							<td>' + records[idx].profit + '</td>\
							<td>' + records[idx].fee + '</td>\
						</tr>';
			$("#tbltransaction > tbody:last-child").append(sNode);		
		}
		var sNode = '<tr>\
							<td colspan="8" class="text-warning" style="text-align:right; font-weight:bold "><?php echo get_langdata($this->session->userdata('lang'), 'totalprofit'); ?></td> \
							<td colspan="1">'+ decimalFormat(sumprft) + '</td>' + '<td colspan="1">' + decimalFormat(sumupfee) + '</td \
						</tr>';
		$("#tbltransaction > tbody:last-child").append(sNode);
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
		console.log(filter);
		$.ajax({
			url: '/index.php/transaction/ajaxChangePage',
			type: 'post',
			dataType: 'json',
			success: function (retParam) {		
				console.log(retParam);

				// content = retParam.data;
				content = retParam.data;
				summupProfit = retParam.sumupProfit;
				sumupFee = retParam.sumupFee;
				displayTable(content, summupProfit, sumupFee);

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
			pageidx: 0
		}
		actionFilter(value);		
	}

	function selectPage(selidx) 
	{
		console.log('goPrevBlock selectPage = ' + selidx);	
		var value = {
			rowcount: $("#cmbRowCount").val(),
			filter: $("#inptFilter").val(),
			pageidx: selidx
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

</script>

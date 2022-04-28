<?php
	if ( isset($nav) && $nav!= "") $this->load->view($nav);
?>
<style>
.hidden {
    display: none!important;
    visibility: hidden!important;
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
				<span class="ml-1"><?php echo get_langdata($this->session->userdata('lang'), 'sysconfiguration'); ?></span>
			</div>
		</div>
	</div>
			
	<div class="container">
		<div class="row">                   
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">						
						<div class="form-validation">
							<form class="form-valide" action="#" method="post">
								<div class="row">
									<div class="col-xl-12" style="padding-left:100px">
										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-username"><?php echo get_langdata($this->session->userdata('lang'), 'tippingrate'); ?></label>
											<div class="col-lg-6">												
												<div class="input-group">										
													<input type="text" class="form-control" id="inptTpngRate" name="inptTpngRate" value="<?php echo $info->tipping_rate; ?>" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'tippingrate'); ?>">
													<div class="input-group-append show-pass">
														<span class="input-group-text"> % </span>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-profit"><?php echo get_langdata($this->session->userdata('lang'), 'profitreturnrate'); ?></label>
											<div class="col-lg-6">												
												<div class="input-group">										
													<input type="text" class="form-control" id="inptRtnRate" name="inptRtnRate" value="<?php echo $info->return_rate; ?>" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'profitreturnrate'); ?>">
													<div class="input-group-append show-pass">
														<span class="input-group-text"> % </span>
													</div>
												</div>
											</div>
										</div>									

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-profit"><?php echo get_langdata($this->session->userdata('lang'), 'tradingcoins'); ?></label>
											<div class="col-lg-6">												
												<div class="input-group">	
													<?php 
														$coins = website_coins();
														$keys = array_keys($coins);						
														$scheck = $info->trading_coins;
														for($idx = 0; $idx < count($keys); $idx++)
														{
															$key = $keys[$idx];
															$value = $coins[$key];
															if( substr($scheck, $idx, 1) == '1')
																$state = 'checked';
															else
																$state = '';

															echo '<div class="form-check" style="margin:5px">													
																	<span class="button-checkbox" >
																		<button type="button" class="btn btn-light" style="width: 90px; background-color: '.$value["color"].'" >
																			&nbsp;<strong>'.$key.'</strong>																
																		</button>
																		<input type="checkbox" id="chkTrading_'.$idx.'" value="'.$idx.'" class="hidden" style="background-color: '.$value["color"].'" ' . $state . ' />
																	</span>														
																</div>';
														}
													?>												
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-profit"><?php echo get_langdata($this->session->userdata('lang'), 'mapt'); ?></label>
											<div class="col-lg-6">
												<?php
													$vals = explode(",", $info->mapt);
													for($idx = 0; $idx < count($keys); $idx++)
													{
														$key = $keys[$idx];
														$value = $coins[$key];
														echo '<div class="input-group" style="padding-bottom: 5px">
																<input type="text" class="form-control" id="inptMaxAmount'.$idx.'" name="inptMaxAmount'.$idx.'" value="' . $vals[$idx] . '" placeholder="'.$key.'">
																<div class="input-group-append show-pass" style="width: 50px">
																	<span class="input-group-text"> <i class="cc '.coinNameFilter($key).'-alt"></i> </span>
																</div>
															</div>';
													}
												?>										
											</div>
										</div>		

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-profit"><?php echo get_langdata($this->session->userdata('lang'), 'mma'); ?></label>
											<div class="col-lg-6">												
												<div class="input-group">										
													<input type="text" class="form-control" id="inptMma" name="inptMma" value="<?php echo $info->mma; ?>" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'mma'); ?>">
													<div class="input-group-append show-pass">
														<span class="input-group-text"> <i class="cc USDT-alt"></i> </span>
													</div>
												</div>
											</div>
										</div>	

										<div class="form-group row">
											<label class="col-lg-4 col-form-label" for="val-profit"><?php echo get_langdata($this->session->userdata('lang'), 'refreshrate'); ?></label>
											<div class="col-lg-6">												
												<div class="input-group">										
													<input type="text" class="form-control" id="inptRfsRate" name="inptRfsRate" value="<?php echo $info->refresh_rate; ?>" placeholder="<?php echo get_langdata($this->session->userdata('lang'), 'refreshrate'); ?>">
													<div class="input-group-append show-pass">
														<span class="input-group-text"> <?php echo get_langdata($this->session->userdata('lang'), 'second'); ?> </span>
													</div>
												</div>
											</div>
										</div>	

										<div class="form-group row">
											<div class="col-lg-8 ml-auto">
												<button type="button" onclick="onSave()" class="btn btn-primary" ><?php echo get_langdata($this->session->userdata('lang'), 'save'); ?></button>
											</div>
										</div>
									</div>				
								</div>
							</form>
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

<script>
var str = '<?php echo json_encode(website_coins()); ?>';
var coins = JSON.parse(str);
console.log(coins);

function onSave()
{
	console.log('onSave');
	var tradingCoins = '';
	var maxAmount = '';
	var idx = 0;
	$.each(coins, function(key, value)
	{
		if( $('#chkTrading_' + idx).is(':checked') )
			tradingCoins += '1';
		else
			tradingCoins += '0';
		maxAmount += ( $('#inptMaxAmount' + idx).val() + ",");
		idx++;
	});

	maxAmount = maxAmount.replace(/,+$/, '');
	$.trim(maxAmount);
	console.log(tradingCoins);
	console.log(maxAmount);

	var value = {
		tipping_rate: $("#inptTpngRate").val(),		
		return_rate: $("#inptRtnRate").val(),
		trading_coins: tradingCoins,
		mapt:	maxAmount,
		mma:	$("#inptMma").val(),
		refresh_rate: $("#inptRfsRate").val()
	}

	$.ajax({
	    url: '/index.php/system/ajaxSaveConfig',
	    type: 'post',
	    dataType: 'json',
	    success: function (retParam) {
			alert(retParam.data[0]);
	    },
	    data: {param: JSON.stringify(value)}
	});
}

$(function () {	
	$('.button-checkbox').each(function () {
		// Settings
		var $widget = $(this),
		$button = $widget.find('button'),
		$checkbox = $widget.find('input:checkbox'),		
		$icon = $widget.find('i');		
		color = $checkbox.css("background-color");

		// Event Handlers
		$button.on('click', function () {
			color = $checkbox.css("background-color");
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});

		$checkbox.on('change', function () {
			updateDisplay();
		});

		// Actions
		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Update the button's color
			if (isChecked) {
					$button.css('background-color', color);
					$icon.removeClass('fa-minus-square-o');
					$icon.addClass('fa-check-square');
					$icon.css('color', '#fff');
			}
			else {				
					$button.css('background-color', '');
					$icon.addClass('fa-minus-square-o');
					$icon.removeClass('fa-check-square');
					$icon.css('color', '#000');
			}
		}

		// Initialization
		function init() {
			updateDisplay();
		}
		init();
	});
});
</script>

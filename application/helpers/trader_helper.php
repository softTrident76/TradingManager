<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('coinNameFilter'))
{
    function coinNameFilter($var)
    {
		if( $var == 'TRX')
			return 'TX';
	
		if( $var == 'BSV')
			return 'BSD';

		return $var;
    }   
}

if( !function_exists('website_coins'))
{
	function website_coins()
	{
		$coins = array(
			'BTC'	=> array('id' => 0, 'color' => '#F7931A' ),
			'ETH'	=> array('id' => 1, 'color' => '#469155' ),			
			'LTC'	=> array('id' => 2, 'color' => '#18a899' ),
			'ETC'	=> array('id' => 3, 'color' => '#669073' ),
			'EOS'	=> array('id' => 4, 'color' => '#B92222' ),
			'BCH'	=> array('id' => 5, 'color' => '#F7931A' ),
			'BSV'	=> array('id' => 6, 'color' => '#1186E7' ),			
			'XRP'	=> array('id' => 7, 'color' => '#346AA9' ),
			'TRX'	=> array('id' => 8, 'color' => '#1F8BCC' )			
		);
		return $coins;
	}
}

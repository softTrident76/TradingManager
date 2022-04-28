<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    var $data;
    function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('html', 'url', 'form'));
		$this->load->model('UserModel', '', true);
		$this->load->model('PendingModel', '', true);
		$this->load->model('TransactionModel', '', true);
		$this->load->model('OrdrRequestModel', '', true);
		$this->load->model('SystemModel', '', true);
		$this->load->helper('trader');	

        if( $this->session->userdata('name') == "" )
			redirect('signin');
			
        $this->data['header'] = "include/header";
		$this->data['footer'] = "include/footer";
		$this->data['top'] = "include/top";
		$this->data['nav'] = "include/nav";	
		$this->data['navi'] = 1;
		
    }

    public function index()
    {
		$this->data['contents'] = "dashboard/home";		

		$lang = $this->input->post("lang");		
		$current_lang = $this->session->userdata("lang");
		$lang = (isset($lang)) ? $lang : $current_lang;
		$this->session->set_userdata('lang', $lang);
		$this->data['lang'] = $lang;

		$this->data['timerinterval'] = $this->SystemModel->getConfig()[0]->refresh_rate;

		$content = array();
		// total amount //
		$content['total_amount'] = $this->UserModel->getTotalAmountList();

		// total profit //
		$content['total_profit'] = $this->TransactionModel->getTotalProfit();

		// total users //
		$content['total_users'] = $this->UserModel->getTotalUsers();

		// totol commission //
		$content['total_comission'] = $this->TransactionModel->getTotalCommission();

		// pending transactions //
		$content['pending_transaction'] = $this->PendingModel->getList();

		// original coin users //
		$content['original_coinusers'] = $this->UserModel->getOriginalCoinUsers();

		// insuficient margin users //
		$content['insufficient_user'] = $this->UserModel->getInsufficients();

		// smiling users //
		$content['smiling_users'] = $this->UserModel->getSmilingUsers();

		// buy/sell infos //
		$uid = '';					// posted data
		$estimated = '';			// posted data
		$content['action_user'] = $this->UserModel->getInfos($uid);

		// latest transaction //
		$content['transaction'] = $this->TransactionModel->getList(5);

		$this->data['board_data'] = json_encode($content);
		$this->load->view('index', $this->data);
	}

	public function ajaxChangeProfit() 
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param))
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}
		
		$coins = website_coins();
		$keys = array_keys($coins);

		$uid = $param->uid;
		$estimate_id = (int)$param->estimated_id;
		if($estimate_id < 0)
			$estimated = '';
		else
			$estimated = $keys[(int)$param->estimated_id];		
		$info = $this->UserModel->getInfos($uid, $estimated);

		echo json_encode(array("result" => "success", "data" => $info ));
	}

	public function ajaxDeletePending()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}
		$uid = $param->uid;
		$this->PendingModel->deletePending($uid);
		$info = $this->PendingModel->getList();
		echo json_encode(array("result" => "success", "data" => $info ));
	}

	public function ajaxUpdateBoard()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$coins = website_coins();
		$keys = array_keys($coins);

		$content = array();
		// total amount //
		$content['total_amount'] = $this->UserModel->getTotalAmountList();

		// total profit //
		$content['total_profit'] = $this->TransactionModel->getTotalProfit();

		// total users //
		$content['total_users'] = $this->UserModel->getTotalUsers();

		// totol commission //
		$content['total_comission'] = $this->TransactionModel->getTotalCommission();

		// pending transactions //
		$content['pending_transaction'] = $this->PendingModel->getList();

		// original coin users //
		$content['original_coinusers'] = $this->UserModel->getOriginalCoinUsers();

		// insuficient margin users //
		$content['insufficient_user'] = $this->UserModel->getInsufficients();

		// smiling users //
		$content['smiling_users'] = $this->UserModel->getSmilingUsers();
		
		// buy/sell infos //
		$uid = $param->uid;										// posted data
		$estimate_id = (int)$param->estimated_id;
		if($estimate_id < 0 )
			$estimated = '';
		else 
			$estimated = $keys[$estimate_id];			// posted data
		$content['action_user'] = $this->UserModel->getInfos($uid, $estimated);

		// latest transaction //
		$content['transaction'] = $this->TransactionModel->getList(5);

		echo json_encode(array("result" => "success", "data" => $content));
	}

	public function ajaxBSAction()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$this->OrdrRequestModel->save($param);
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesssave') ));
	}
}

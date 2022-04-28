<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $data;
    function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('html', 'url', 'form'));
		$this->load->model('UserModel', '', true);
		$this->load->model('PendingModel', '', true);
		$this->load->model('TransactionModel', '', true);
		$this->load->model('SystemModel', '', true);
		$this->load->model('RevisionModel', '', true);
		$this->load->model('DepositModel', '', true);
		$this->load->helper('trader');

        if( $this->session->userdata('name') == "" )
			redirect('signin');
			
        $this->data['header'] = "include/header";
		$this->data['footer'] = "include/footer";
		$this->data['top'] = "include/top";
		$this->data['nav'] = "include/nav";	
		$this->data['navi'] = 4;
		$this->pagination_count = 5;
    }

    public function index()
    {
		$lang = $this->input->post("lang");		
		$current_lang = $this->session->userdata("lang");
		$lang = (isset($lang)) ? $lang : $current_lang;
		$this->session->set_userdata('lang', $lang);

		$this->data['lang'] = $lang;

		$this->data['timerinterval'] = $this->SystemModel->getConfig()[0]->refresh_rate;

		$filter = '';
		$total = $this->UserModel->getTotalCount($filter);		
		$rowcount = 20;
		$pageidx = 0;
		
		$from = $pageidx * $rowcount;
		$to = ($pageidx + 1) * $rowcount;
		$to = $to >= $total ? $total : $to;

		$pagination = array('total' => $total, 'rowcount' => $rowcount, 'filter' => $filter, 'pageidx' => $pageidx, 'from' => $from, 'to' => $to, 'blockcount' => $this->pagination_count);		
		$this->data['pagination'] = $pagination;
		$this->data['records'] = $this->UserModel->getRangeList($filter, $from, $to);
		$this->data['tipping_rate'] = $this->SystemModel->getConfig()[0]->tipping_rate;
		$this->data['contents'] = "user/index";
		$this->load->view('index', $this->data);	
	}

	public function ajaxUpdateBoard()
    {
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$uid = $param->uid;
		$selidx = $param->selidx;
		$tipping_rate = $this->SystemModel->getConfig()[0]->tipping_rate;
		$ret = array( 'tipping_rate' => $tipping_rate,  'selidx' => $selidx, 'record' => $this->UserModel->getUser($uid) );
		echo json_encode(array("result" => "success", "data" => $ret));
	}
	
	public function ajaxChangePage()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$rowcount = $param->rowcount;
		$filter = $param->filter;
		$pageidx = $param->pageidx;
		$sort = $param->sort;

		$total = $this->UserModel->getTotalCount($filter);
		
		$from = $pageidx * $rowcount;
		$to = ($pageidx + 1) * $rowcount;
		$to = $to >= $total ? $total : $to;
		
		$pagination = array('total' => $total, 'rowcount' => $rowcount, 'filter' => $filter, 'pageidx' => $pageidx, 'from' => $from, 'to' => $to, 'blockcount' => $this->pagination_count);
		$records = $this->UserModel->getRangeList($filter, $from, $to, $sort);
		echo json_encode(array("result" => "success", "pagination" => $pagination, "data" => $records));
	}

	public function ajaxAddUser()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		if(!$this->UserModel->save($param))
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'duplicateduser') ));
			return;
		}

		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesssave') ));
	}

	public function ajaxEditUser()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$this->RevisionModel->updateUserStatus($param);
		if(!$this->UserModel->update($param))
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'duplicateduser') ));
			return;
		}		

		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesssave') ));
	}

	public function ajaxDeleteUser()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$this->UserModel->delete($param);	
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccessdelete') ));
	}

	public function ajaxChangeStatus()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$revision = $this->RevisionModel->getInfo();
		if($revision->user_revision != "")
		{
			echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgrevisonerror') ));
			return;
		}

		$this->RevisionModel->updateUserStatus($param);
		$this->UserModel->updateStatus($param);
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesschange') ));
	}

	public function ajaxResetBase()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$revision = $this->RevisionModel->getInfo();
		if($revision->reset_base != "")
		{
			echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgresetbaseerror') ));
			return;
		}

		$this->RevisionModel->updateResetStatus($param);		
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccessresetbase') ));
	}

	public function ajaxDeposit()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}

		$this->DepositModel->save($param);
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesssave') ));
	}
}

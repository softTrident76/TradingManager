<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    var $data;
    function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('html', 'url', 'form'));
		$this->load->model('UserModel', '', true);
		$this->load->model('PendingModel', '', true);
		$this->load->model('TransactionModel', '', true);
		$this->load->model('SystemModel', '', true);
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

		$filter = '';
		$total = $this->TransactionModel->getTotalCount($filter);
		$sumupProfit = $this->TransactionModel->getSumupProfit($filter);
		$sumupFee = $this->TransactionModel->getSumupFee($filter);
		$rowcount = 10;
		$pageidx = 0;
		
		$from = $pageidx * $rowcount;
		$to = ($pageidx + 1) * $rowcount;
		$to = $to >= $total ? $total : $to;

		$pagination = array('total' => $total, 'rowcount' => $rowcount, 'filter' => $filter, 'pageidx' => $pageidx, 'from' => $from, 'to' => $to, 'blockcount' => $this->pagination_count);		
		$this->data['pagination'] = $pagination;
		$this->data['records'] = $this->TransactionModel->getRangeList($filter, $from, $to);
		$this->data['sumupProfit'] = $sumupProfit;
		$this->data['sumupFee'] = $sumupFee;

		$this->data['contents'] = "transaction/index";
		$this->load->view('index', $this->data);
	}
	
	public function ajaxChangePage()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => "invalid param" ));
			return;
		}

		$rowcount = $param->rowcount;
		$filter = $param->filter;
		$pageidx = $param->pageidx;

		$total = $this->TransactionModel->getTotalCount($filter);
		$sumupProfit = $this->TransactionModel->getSumupProfit($filter);
		$sumupFee = $this->TransactionModel->getSumupFee($filter);
		
		$from = $pageidx * $rowcount;
		$to = ($pageidx + 1) * $rowcount;
		$to = $to >= $total ? $total : $to;
		
		$pagination = array('total' => $total, 'rowcount' => $rowcount, 'filter' => $filter, 'pageidx' => $pageidx, 'from' => $from, 'to' => $to, 'blockcount' => $this->pagination_count);
		$records = $this->TransactionModel->getRangeList($filter, $from, $to);
		echo json_encode(array("result" => "success", "pagination" => $pagination, "data" => $records, "sumupProfit" => $sumupProfit, "sumupFee" => $sumupFee));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends CI_Controller {

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
		$this->load->helper('trader');

        if( $this->session->userdata('name') == "" )
			redirect('signin');
			
        $this->data['header'] = "include/header";
		$this->data['footer'] = "include/footer";
		$this->data['top'] = "include/top";
		$this->data['nav'] = "include/nav";	
        $this->data['navi'] = 3;
    }

    public function index()
    {
		$lang = $this->input->post("lang");		
		$current_lang = $this->session->userdata("lang");
		$lang = (isset($lang)) ? $lang : $current_lang;
		$this->session->set_userdata('lang', $lang);

		$this->data['lang'] = $lang;
		
		$this->data['info'] = $this->SystemModel->getConfig()[0];
		$this->data['contents'] = "system/index";
		$this->load->view('index', $this->data);
	}
	
	public function ajaxSaveConfig()
	{
		$param = json_decode($this->input->post("param"));
		if(!isset($param)) 
		{
			echo json_encode(array("result" => "fail", "data" => get_langdata($this->session->userdata('lang'), 'invalidmessage') ));
			return;
		}
		
		$this->RevisionModel->updateConfigStatus();
		$this->SystemModel->updateConfig($param);
		echo json_encode(array("result" => "success", "data" => get_langdata($this->session->userdata('lang'), 'msgsuccesssave') ));
	}
}

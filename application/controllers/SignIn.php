<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn extends CI_Controller {

    var $data;
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('html', 'url', 'form'));
    }

    public function index()
    {
        $this->data['contents'] = "signin";
		$lang = $this->input->post("lang");

        $this->data['lang'] = (isset($lang)) ? $lang : 2;
        $this->load->view('index', $this->data);
    }

    public function submit() {
        $this->load->model('SignInModel', '', true);
        $this->data['result'] = $this->SignInModel->checkSignIn();
        if( $this->data['result'] == 'success' ) {
            echo $this->data['result'];
        }
        else {
            $lang = $this->input->post("lang");
			$this->data['lang'] = (isset($lang)) ? $lang : 2;			
            echo get_langdata($lang, 'invalidnamepwd');
        }
    }

    public function signout() {
        $this->load->model('SignInModel', '', true);
        $this->data['result'] = $this->SignInModel->signOut($this->session->userdata("id"));
        $this->session->unset_userdata('name');
        redirect('signin');
	}
	

}

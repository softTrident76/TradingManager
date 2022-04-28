<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller {

    var $data;
    function __construct() {
        parent::__construct();
        $this->load->helper(array('html', 'url', 'form'));
    }

    public function index()
    {
        $this->data['contents'] = "signup";
		$lang = $this->input->post("lang");
		$this->data['lang'] = 3;
        // $this->data['lang'] = (isset($lang)) ? $lang : 0;
        $this->load->view('index', $this->data);
    }

    public function sendCode() {
        $phone = $this->input->post("phone");
        $code = "123456";
        $to = "kkc1985612@gmail.com";
        $from = "xiaolong9012@gmail.com";
        $uid = md5(uniqid(time()));
        $eol = PHP_EOL;
        $message = "Your verify code is ".$code;
        $headers = "From: xiaolong<".$from.">" . $eol;
        $headers .= "reply-to: ".$from . $eol;
        $headers .= "MIME-Version: 1.0\r\n";
        $nmessage = "--".$uid.$eol;
        $nmessage .= "Content-Type: text/html; charset=ISO-8859-1".$eol;
        $nmessage .= $message.$eol;
        $nmessage .= "--".$uid.$eol;
        $result = mail($to, 'title', $nmessage, $headers);
        echo $result;
//        $authKey = "";
//        $senderId = "";
//        $route = 1;
//        $postData = array(
//            'authkey' => $authKey,
//            'mobiles' => $phone,
//            'message' => $code,
//            'sender' => $senderId,
//            'route' => $route
//        );
//        $url = "http://api.";
//        $ch = curl_init();
//        curl_setopt_array($ch, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => TRUE,
//            CURLOPT_POST => TRUE,
//            CURLOPT_POSTFIELDS => $postData
//        ));
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $output = curl_exec($ch);
//        if( curl_errno($ch) ) {
//            echo 'error' . curl($ch);
//        }
//        curl_close($ch);
    }

    public function submit() {
        $params["username"] = $this->input->post("username");
        $params["password"] = $this->input->post("password");
        $params["fullname"] = $this->input->post("fullname");
        $params["email"] = $this->input->post("email");
        $params["phone"] = $this->input->post("phone");
        $params["membership"] = $this->input->post("membership");
        $url = 'upload/photo';
        if( $_FILES["upload"]["name"] != '' ) {
            $hash_var = microtime(true);
            $file_ext = substr($_FILES["upload"]["name"], strrpos($_FILES["upload"]["name"], '.') + 1);
            $filename = $hash_var.'.'.$file_ext;
            if (!is_dir($url)) $res = mkdir($url, 0765);
                move_uploaded_file($_FILES["upload"]["tmp_name"], $url . '/' . $filename ) or die('Failed to upload file.');
        } else {
            $filename = '';
        }
        $params['filename'] = $_FILES["upload"]["name"];
        $params['filepath'] = ($filename!='') ? $url . '/' . $filename : '';
        $this->load->model('SignUpModel', '', true);
        $result = $this->SignUpModel->signUp($params);
        redirect('signin');
    }
}

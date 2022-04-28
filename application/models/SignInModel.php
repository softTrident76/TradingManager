<?php

define('USER_UNKNOWN', 'invalid');
define('LOGIN_SUCCESS', 'success');
class SignInModel extends CI_Model {

    function _construct() {
        parent::__construct();
    }

    function checkSignIn() {
        $name = $this->input->post('username');
        $password = $this->input->post('password');
        $lang = $this->input->post('lang');
		$this->load->helper("url");
				
        $MyFile = file_get_contents(WEBSITE_ROOT."composer.json");
        $data = json_decode($MyFile);
        $query = "SELECT MD5('".$name."') AS name, MD5('".$password."') AS password";
		$result = $this->db->query($query)->result();
	
        if( $result[0]->name == $data->username && $result[0]->password == $data->password ) {
            $this->load->library('session');
            $session_data = array(
                'id' => 0,
                'idt' => 'Admin',
                'name' => 'Admin',
                'password' => $password,
                'lang' => $lang,
                'membership' => 2,
                'photopath' => '',
                'deposit' => 0,
                'session' => session_id(),
                'groupid' => '',
                'logined' => TRUE
            );
			$this->session->set_userdata($session_data);
            return LOGIN_SUCCESS;
        } else {
            $query = "SELECT COUNT(*) AS cn, id, uid AS idt, level AS membership  
						FROM tbl_users WHERE (uid = '".$name."' OR email = '".$name."') AND password = MD5('".$password."')";

			$result = $this->db->query($query);
            $rows = $result->result();
            if( $rows[0]->cn > 0 ) {
                $this->load->library('session');
                $session_data = array(
                    'id' => $rows[0]->id,
                    'idt' => $rows[0]->idt,
                    'name' => $rows[0]->idt,
                    'password' => $password,
                    'lang' => $lang,
                    'membership' => $rows[0]->membership,                
                    'session' => session_id(),                
                    'logined' => TRUE
                );
                $this->session->set_userdata($session_data);
                $query = "UPDATE tbl_users SET session_id = '".session_id()."', user_logined = 1 WHERE uid = '".$name."' AND password = MD5('".$password."')";
                $result = $this->db->query($query);              
                return LOGIN_SUCCESS;
            }
        }
        return USER_UNKNOWN;
    }

    function signOut($id) {
        $query = "UPDATE tbl_users SET session_id = '', user_logined = 0 WHERE id = ".$id;
        $result = $this->db->query($query);
        return $result;
    }
}
?>

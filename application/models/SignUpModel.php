<?php

class SignUpModel extends CI_Model {

    function _construct() {
        parent::__construct();
    }

    public function signUp($params) {
        $query = "INSERT INTO tb_user(user_idt, user_password, user_name, user_email, user_level, user_phone, user_filename, user_filepath, user_regdate) ".
                 "VALUES('".$params['username']."', MD5('".$params['password']."'), '".$params['fullname']."', '".$params['email']."', '".$params['membership']."', '".$params['phone']."', '".$params['filename']."', '".$params['filepath']."', NOW())";
        return $this->db->query($query);
    } //
}
?>
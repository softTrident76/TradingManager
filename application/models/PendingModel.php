<?php
class PendingModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

    function getList() {
        $query = "SELECT * FROM tbl_pending_transactions";
        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}
	
	function deletePending($uid) {
        $query = "DELETE FROM tbl_pending_transactions WHERE uid = '". $uid . "'";
        $result = $this->db->query($query);
    }
}

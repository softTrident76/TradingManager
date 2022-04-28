<?php

class RevisionModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

    function getInfo() {
        $query = "SELECT * FROM tbl_revisions";
        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0];
    }    

	function updateUserStatus($param)
	{		
		$query = "UPDATE tbl_revisions SET user_revision = '" . $param->uid . "'";		
        $result = $this->db->query($query);
	}
	
	function updateConfigStatus()
	{		
		$query = "UPDATE tbl_revisions SET config_revision = config_revision + 1";		
        $result = $this->db->query($query);
	}

	function updateResetStatus($param)
	{		
		$query = "UPDATE tbl_revisions SET reset_base = '" . $param->uid . "'";		
        $result = $this->db->query($query);
	}
}

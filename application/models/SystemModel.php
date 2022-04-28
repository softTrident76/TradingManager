<?php
class SystemModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

    function getConfig() {
        $query = "SELECT * FROM tbl_config";
        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}
	
	function updateConfig($param) 
	{
		$set = '';
		foreach($param as $key => $value)
		{
			$set .= ($key . '="' . $value . '",');
		}
		$set = rtrim($set, ',');

		$sql = 'UPDATE tbl_config SET ' . $set;
		$result = $this->db->query($sql);        
    }
}

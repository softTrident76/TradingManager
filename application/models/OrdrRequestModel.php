<?php
class OrdrRequestModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

	function save($param)
	{
		$query = "INSERT INTO tbl_order_request";

		$fields = "(";
		$values = "(";
		foreach($param as $key => $val) 
		{
			$fields .= ($key . ",");
			$values .= ("'" . $val . "',");
		}

		$fields = rtrim($fields, ",") . ")";
		$values = rtrim($values, ",") . ")";
		$query = $query . $fields . " VALUES " .$values;

        $result = $this->db->query($query);        
	}	
}

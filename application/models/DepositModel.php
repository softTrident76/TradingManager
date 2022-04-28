<?php
class DepositModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

	function getTotalCount($filter)
	{
		$query = "SELECT * FROM tbl_deposit_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%'";
		$result = $this->db->query($query);
        $rows = $result->result();
        return count($rows);
	}

	function getSumupProfit($filter)
	{
		$query = "SELECT SUM(amount) as sumupProfit FROM tbl_deposit_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%'";
		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0]->sumupProfit;
	}

    function getList($limit = 0) {
		if($limit > 0)
			$query = "SELECT * FROM tbl_deposit_history Order By datetime DESC LIMIT " . $limit;
		else
			$query = "SELECT * FROM tbl_deposit_history Order By datetime DESC";

        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}
	
	function getRangeList($filter, $from, $to, $sort = NULL)
	{
		$count = $to - $from;
		$query = "SELECT * FROM tbl_deposit_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%' 
					Order By datetime DESC 
					LIMIT " . $from . ",  " . $count;

		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}

	function save($param)
	{
		$query = "INSERT INTO tbl_deposit_history ";

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

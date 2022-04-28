<?php
class DepositeModel extends CI_Model
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
}

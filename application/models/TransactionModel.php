<?php
class TransactionModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }

    function getList($limit = 0) {
		if($limit > 0)
			$query = "SELECT * FROM tbl_transaction_history Order By datetime DESC LIMIT " . $limit;
		else
			$query = "SELECT * FROM tbl_transaction_history Order By datetime DESC";

        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}
	
	function getTotalProfit() {
		$query = "SELECT SUM(profit) as total FROM tbl_transaction_history ";
        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0]->total;
	}

	function getTotalCommission() {
		$query = "SELECT SUM(fee) as total FROM tbl_transaction_history ";
        $result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0]->total;
	}

	function getTotalCount($filter)
	{
		$query = "SELECT * FROM tbl_transaction_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%' OR base_currency like '%".$filter."%' OR quote_currency like '%".$filter."%'";
		$result = $this->db->query($query);
        $rows = $result->result();
        return count($rows);
	}

	function getSumupProfit($filter)
	{
		$query = "SELECT SUM(profit) as sumupProfit FROM tbl_transaction_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%' OR base_currency like '%".$filter."%' OR quote_currency like '%".$filter."%'";
		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0]->sumupProfit;
	}

	function getSumupFee($filter)
	{
		$query = "SELECT SUM(fee) as sumupFee FROM tbl_transaction_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%' OR base_currency like '%".$filter."%' OR quote_currency like '%".$filter."%'";
		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows[0]->sumupFee;
	}

	function getRangeList($filter, $from, $to, $sort = NULL)
	{
		$count = $to - $from;
		$query = "SELECT * FROM tbl_transaction_history  
					WHERE datetime like '%".$filter."%' OR uid like '%".$filter."%' OR base_currency like '%".$filter."%' OR quote_currency like '%".$filter."%' 
					Order By datetime DESC 
					LIMIT " . $from . ",  " . $count;

		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}
}

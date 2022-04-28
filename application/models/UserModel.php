<?php

class UserModel extends CI_Model
{
    function _construct()
    {
        parent::__construct();
    }
	
	function getTotalAmountList() {
		$query = "SELECT * FROM tbl_users WHERE level > 0";
        $result = $this->db->query($query);
		$rows = $result->result();

		$total_amounts = array();
		$coins = website_coins();
		foreach($coins as $key=>$value)		
			array_push($total_amounts, 0);

		foreach($rows as $row)
		{
			$balance = $row->balance;
			$arr = explode(",", $balance);			
			for($idx = 0; $idx < count($total_amounts); $idx++)
			{
				$total_amounts[$idx] += (float)$arr[$idx];
			}
		}			
		return $total_amounts;
	}

	function getTotalUsers() 
	{
		$query = "SELECT * FROM tbl_users WHERE level > 0";
        $result = $this->db->query($query);
		$rows = $result->result();

		return count($rows);
	}

	function getInsufficients()
	{
		$query = "SELECT a.id, a.uid, a.margin, a.phone, a.email 
					 FROM tbl_users a, tbl_config b 
					 WHERE level > 0 AND cast(a.margin as signed) < cast(b.MMA as signed)";
        $result = $this->db->query($query);
		$rows = $result->result();
		return $rows;
	}

	function getOriginalCoinUsers()
	{
		$ret = array();
		$coins = website_coins();
		$keys = array_keys($coins);

		$query = "SELECT * FROM tbl_users WHERE level > 0";
        $result = $this->db->query($query);
		$rows = $result->result();
		foreach($rows as $row)
		{			
			$initial_coin = $row->initial_coin;
			$id = (int)$coins[$initial_coin]['id'];
			$balances = explode(",", $row->balance);
			if((float)$balances[$id] > 0.0)
			{
				array_push($ret, $row);
			}
		}
		return $ret;
	}

	function getSmilingUsers()
	{
		// get the total users //
		// get the each blook of profit estimated //
		$ret = array();
		$coins = website_coins();
		$keys = array_keys($coins);

		$coin_count = count($coins);

		$query = "SELECT * FROM tbl_users WHERE level > 0";
        $result = $this->db->query($query);
		$rows = $result->result();
		foreach($rows as $row)
		{			
			$pieces = explode(",", $row->profit_estimated);
			$balances = explode(",", $row->balance);
			for($i = 0; $i < $coin_count; $i++)
			{
				for($j = 0; $j < $coin_count; $j++)
				{
					$idx = ($i * $coin_count) + $j;
					if((float)($pieces[$idx]) > 0.0 && (float)($balances[$i]) > 0.0 )
					{
						array_push(
									$ret, 
									array("uid" =>$row->uid, "basecoin" => $keys[$i], "quotecoin" => $keys[$j], "profit_estimated" => $pieces[$idx])
								);
					}
				}
			}
		}
		return $ret;
	}

	function getUser($uid)
	{
		$query = "SELECT * FROM tbl_users WHERE level > 0 AND uid = '" . $uid . "'";
        $result = $this->db->query($query);
		$rows = $result->result();
		if(count($rows) > 0 )
			return $rows[0];
		else
			return NULL;		
	}

	function getInfos($uid, $estimated = '')
	{
		$ret = array();
		if($uid == '')
		{
			$ret["uid"] = '';
			$ret["estimated_id"] = 0;
			return $ret;
		}	

		$query = "SELECT * FROM tbl_users WHERE level > 0 AND (uid = '".$uid."' OR phone = '".$uid."' OR email = '".$uid."')";
        $result = $this->db->query($query);
		$rows = $result->result();			
		
		$coin = website_coins();
		$coin_count = count($coin);
		$balance = explode(",", $rows[0]->balance);
		$base_balance = explode(",", $rows[0]->base_balance);		
		
		if( $estimated != '' )
		{			
			$estimated_id = (int)$coin[$estimated]["id"];
		}
		else
		{			
			$estimated_id = 0;
			for($idx = 0; $idx < count($balance); $idx++ )
			{
				if( floatval($balance[$idx]) != 0 )
				{
					$estimated_id = $idx;
					break;
				}
			}
		}
		
		$estimated_list = array_slice(explode(",", $rows[0]->profit_estimated), $estimated_id * $coin_count, $coin_count);

		$ret["uid"] = $uid;
		$ret["estimated_id"] = $estimated_id;
		$ret["balance"] = $balance;
		$ret["base_balance"] = $base_balance;
		$ret["estimated_list"] = $estimated_list;
		$ret["usdt"] = $rows[0]->usdt;
		
		return $ret;
	}

	function getTotalCount($filter)
	{
		$query = "SELECT * FROM tbl_users  
					WHERE level > 0 AND (uid like '%".$filter."%' OR phone like '%".$filter."%' OR email like '%".$filter."%' OR api_key like '%".$filter."%' OR api_secret like '%".$filter."%' OR pass_phrase like '%".$filter."%')";
		$result = $this->db->query($query);
        $rows = $result->result();
        return count($rows);
	}

	function getRangeList($filter, $from, $to, $sort = NULL)
	{
		$count = $to - $from;		
		if($sort != NULL )
		{
			$query = "SELECT * FROM tbl_users  
						WHERE level > 0 AND (uid like '%".$filter."%' OR phone like '%".$filter."%' OR email like '%".$filter."%' OR api_key like '%".$filter."%' OR api_secret like '%".$filter."%' OR pass_phrase like '%".$filter."%') 
						ORDER BY " . $sort->id . " " . $sort->val . "
						LIMIT " . $from . ",  " . $count;
		}
		else
		{
			$query = "SELECT * FROM tbl_users  
						WHERE level > 0 AND (uid like '%".$filter."%' OR phone like '%".$filter."%' OR email like '%".$filter."%' OR api_key like '%".$filter."%' OR api_secret like '%".$filter."%' OR pass_phrase like '%".$filter."%') 
						LIMIT " . $from . ",  " . $count;
		}
		

		$result = $this->db->query($query);
        $rows = $result->result();
        return $rows;
	}

	function save($param)
	{
		// check if duplicated user //
		$query = "SELECT * FROM tbl_users WHERE level > 0 AND uid ='" . $param->uid . "'";
        $result = $this->db->query($query);
		$rows = $result->result();
		if(count($rows) > 0)
			return false;

		// save //
		$query = "INSERT INTO tbl_users ";

		$fields = "(";
		$values = "(";
		foreach($param as $key => $val) 
		{
			$fields .= ($key . ",");
			$values .= ("'" . $val . "',");
		}

		$fields .= ("startdate" . ",");
		$values .= ("'" . date("Y-m-d") . "',");

		$fields = rtrim($fields, ",") . ")";
		$values = rtrim($values, ",") . ")";
		$query = $query . $fields . " VALUES " .$values;

		$result = $this->db->query($query);
		return true;  
	}	

	function update($param)
	{
		// update //
		// $query = "UPDATE tbl_users SET lastname='Doe' WHERE uid='" . $param->uid . "'";
		$query = "UPDATE tbl_users SET ";
		$values = "";
		foreach($param as $key => $val) 
		{
			if( $key != "uid")
				$values .= ($key . " = '" . $val . "',");			
		}
		
		$values = rtrim($values, ",");
		$query = $query . $values . " WHERE uid='" . $param->uid . "'";

		$result = $this->db->query($query);
		return true;  
	}

	function delete($param)
	{
		$query = "DELETE FROM tbl_users WHERE uid = '" . $param->uid . "'";		
        $result = $this->db->query($query);
	}

	function updateStatus($param)
	{		
		$query = "UPDATE tbl_users SET status = " . $param->status . " WHERE uid = '" . $param->uid . "'";		
        $result = $this->db->query($query);
	}
}

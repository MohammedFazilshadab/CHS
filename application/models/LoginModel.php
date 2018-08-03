<?php

class LoginModel extends CI_Model
{
	public function validate_login( $username , $password){
		$passwordmd5 = md5($password);
        $query = $this->db->select('tbl_user.user_id,tbl_user.first_name,tbl_user.last_name,tbl_user.email,tbl_user.society_id,tbl_user.account_no,tbl_user.role_id,role.name as role_name,role.priority')
				->from('tbl_user')
				->join('role', 'tbl_user.role_id = role.id')
				->where('tbl_user.email',$username)
				->where('tbl_user.password',$passwordmd5)
				->where('tbl_user.status','active')
				->get();
        if ($query->num_rows() > 0) 
		{
			$row = $query->result_array();
			$result = $row[0];
				
			return $result;
			
        }else{
			return false;				
        }
    }
	
	public function getSocietyDetails($userAccountNo){
		if(empty($userAccountNo)){
			return false;
		}
		$query = $this->db->select('b.socity_id,a.society_name,a.acc_id')
				->from('socity_lists a')
				->join('socity_unit b', 'a.id = b.socity_id')
				->where('b.unit_id',$userAccountNo)
				->get();
		if ($query->num_rows()) 
		{
			return $query->row();			
        }else{
			return false;				
        }
	}
}
?>
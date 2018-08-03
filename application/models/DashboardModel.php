<?php
define("SUPERADMIN",1);
class DashboardModel extends CI_Model
{
	const ACCOUNTID 		= 801001;
	const SETTINGVALUE 		= 'No';
	const PRIMARYGROUP 		= 'PRIMARY GROUP';
	const OPENINGBALANCE 	= 'Opening Balance.';
	
	public function createSociety()
	{
		try 
		{
			$query = $this->db->select('max(CAST(SUBSTRING(acc_id FROM 2) AS UNSIGNED)) as AccountCount')
						->from('socity_lists')
						->get();
			foreach ($query->result_array() as $row) 
			{
				$account[] = $row['AccountCount'];
				$acc_id = $account[0];
				if($acc_id > 0){
					$ACCOUNTID = $acc_id + 1;
				}	
				//return $ACCOUNTID;
			}  
			//Insert query
			
			
			//DEAFULT ACCOUNT SETTING PORTION	
			$query = $this->db->select('max(ID) as ID')
							->from('socity_lists')
							->get();
			
			foreach ($query->result_array() as $row) 
			{
				$account[] = $row['ID'];
				$society_id = $account[0];
			}
			$this->session->set_userdata(array('socityidACC'=> $society_id));
			
			//DEAFULT ACCOUNT SETUP VALUES
			$query = $this->db->select('ID')
							->from('AccountSetup')
							->where('ParentId >', 0)
							->get();
			foreach ($query->result_array() as $row) 
			{
				$settingId[] = $row;
			}
			/*for($i = 0; $i < count($settingId); $i++)
			{
				// Insert query
				$data = array(
					'SettingID' 	=> $settingId[$i],
					'SocietyID' 	=> $this->session->userdata['socityidACC'],
					'SettingValue' 	=> $SETTINGVALUE				
				);
				if($this->db->insert('acc_primary_groups', $data)){
					return true;
				}else{
					return false;
				}
			}*/
			
			//--- MANAGING DEFAULT SUB GROUP TO ORGINAL POSTING ---//
			$query = $this->db->select('MAIN_GROUP,PRIMARY_GROUP_NAME,SUB_GROUP_NAME')
							->from('temp_acc_sub_groups')							
							->get();
							
			foreach ($query->result_array() as $row) 
			{
				$result[]   = $row;
				$res 		= $result[0];
				
				$mainGroup			= $res['MAIN_GROUP'];
				$primaryGroupName	= $res['PRIMARY_GROUP_NAME'];
				$subGroupName	 	= $res['SUB_GROUP_NAME'];
				
				$getPrimaryID = $this->getPrimaryId($mainGroup, $primaryGroupName, $subGroupName);
				
				if($subGroupName != "" OR $subGroupName != "" OR $subGroupName != NULL OR $subGroupName != NULL){
							   
					$this->subGroupPostings($getPrimaryID, $subGroupName);					 
				}
				
			}

		
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			return;
		}
		
	}
	
	public function addToMainAccoutsPrimary($mainGroup, $groupName)
	{
		try 
		{
			$data = array(
				'GROUP_TYPE' => $PRIMARYGROUP,
				'MAIN_GROUP' => $mainGroup,
				'GROUP_NAME' => $groupName,
				'USR' 		 => $this->session->userdata['socityidACC']
			);
			if($this->db->insert('acc_primary_groups', $data)){
				return true;
			}else{
				return false;
			}
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			return;
		}
	}
	
	public function subGroupPostings($primaryID, $subGroupName)
	{
		try 
			{
				$data = array(
					'PRIMARY_GROUP_ID' => $primaryID,
					'SUB_GROUP_NAME'   => $subGroupName,
					'USR' 		       => $this->session->userdata['socityidACC']
				);
				if($this->db->insert('acc_sub_groups', $data)){
					return true;
				}else{
					return false;
				}
			} catch (Exception $e) {
				log_message('error',$e->getMessage());
				return;
			}
	}
	
	public function addLedgers($locks, $subId, $ledger, $primaryID, $mainGroup, $ledgerLock, $ledgerSlug)
	{
		try 
		{
			$accLedgerdata = array(
				'LOCK_COL' 			=> $locks,
				'SUB_GROUP_ID'   	=> $subId,
				'LEDGER_NAME' 		=> $ledger,
				'LEDGER_SLUG'		=> $ledgerSlug,
				'LEDGER_LOCK'		=> $ledgerLock,
				'PRIMARY_GROUP'		=> $primaryID,
				'USR'				=> $this->session->userdata['socityidACC']
			);
			
			if($this->db->insert('acc_ledgers', $accLedgerdata)){
				return true;
			}else{
				return false;
			}
			
			$query = $this->db->select('max(ID)')
					->from('acc_ledgers')
					->get();
			
			foreach ($query->result_array() as $row) 
			{
				$result[]   = $row;
				$ledger_id  = $result[0];
			}	

			$currentDateTime = date("Y-m-d h:i:s ", time());
			$currentDate	 = date("Y-m-d");
			$AccLedgerOpeningBalanceData = array(
				'SUB_GROUP' 	=> $subId,
				'LEDGERS'   	=> $ledger,
				'MAIN_GROUP' 	=> $primaryID,
				'SOCITY_ID'		=> $this->session->userdata['socityidACC'],
				'DEBIT'			=> 0,
				'CREDIT'		=> 0,
				'INTEREST'		=> 0,
				'CREATE_DATE'	=> $currentDateTime,
				'CREATED_BY'	=> '',
				'descrip'		=> $OPENINGBALANCE
			);
			if($this->db->insert('acc_ledger_opening_balance', $AccLedgerOpeningBalanceData)){
				return true;
			}else{
				return false;
			}
				
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			return;
		}
	}
	
	public function getPrimaryId($mainGroup, $primaryGroup)
	{
		try 
		{
			$query = $this->db->select('ID')
						->from('acc_sub_groups')
						->where('upper(USR)','upper('.$_SESSION['socityidACC'].')')
						->where('upper(MAIN_GROUP)','upper('.$mainGroup.')')
						->where('upper(GROUP_NAME)','upper('.$primaryGroup.')')
						->get();
			foreach ($query->result_array() as $row) 
			{
				$result[]   = $row;
				$ID  		= $result[0];
			}
			
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			return;
		}
		return $ID;
	}
	
	public function getSubgroupID($primaryID, $subGroup)
	{
		try 
		{
			$query = $this->db->select('ID')
							->from('acc_sub_groups')
							->where('upper(USR)','upper('.$_SESSION['socityidACC'].')')
							->where('upper(SUB_GROUP_NAME)','upper('.$subGroup.')')
							->where('upper(PRIMARY_GROUP_ID)','upper('.$primaryID.')')
							->get();
			foreach ($query->result_array() as $row) 
			{
				$result[]   = $row;
				$ID  		= $result[0];
			}
			
		} catch (Exception $e) {
			log_message('error',$e->getMessage());
			return;
		}
		return $ID;
	}
	
	
	public function getSocietyRecordModel()
	{
		$data = array();
		$user_id 	= $this->session->userdata['user_id'];
		$acc_id 	= $this->session->userdata['acc_id'];
		$role 		= $this->session->userdata['role'];
		$role_priority = $this->session->userdata['role_priority'];
		if($this->zacl->check_acl($role, null, 'society-list.read') && $role_priority == SUPERADMIN){
			$query = $this->db->select('id,society_name,create_date,last_access,page_name,owner,plan,pay_gateway,society_aliase')
					->from('socity_lists')
					->get(); 
//echo "1";
		}else if($this->zacl->check_acl($role, null, 'society-list.create') && $this->zacl->check_acl($role, null, 'society-list.created-read')){
			$query = $this->db->select('socity_lists.id,socity_lists.society_name,socity_lists.create_date,socity_lists.last_access,socity_lists.page_name,socity_lists.owner,socity_lists.plan,socity_lists.pay_gateway,socity_lists.society_aliase')
					->from('socity_lists')
					->join('user_society us','socity_lists.id = us.society_id','left')
					->where('socity_lists.owner',$user_id)
					->get();
//echo "2";					
		}else if($this->zacl->check_acl($role, null, 'society-list.created-read')){
			$query = $this->db->select('socity_lists.id,socity_lists.society_name,socity_lists.create_date,socity_lists.last_access,socity_lists.page_name,socity_lists.owner,socity_lists.plan,socity_lists.pay_gateway,socity_lists.society_aliase')
					->from('socity_lists')
					->join('user_society us','socity_lists.id = us.society_id','left')
					->where('socity_lists.acc_id',$acc_id)
					->where('us.user_id',$user_id)
					->get();
//echo "3";
		}else{
			$query = $this->db->select('socity_lists.id,socity_lists.society_name,socity_lists.create_date,socity_lists.last_access,socity_lists.page_name,socity_lists.owner,socity_lists.plan,socity_lists.pay_gateway,socity_lists.society_aliase')
					->from('socity_lists')
					->join('user_society us','socity_lists.id = us.society_id','left')
					->where('socity_lists.owner',$user_id)
					->or_where('us.user_id',$user_id)
					->get();
//echo "4";					
		}
//echo $this->db->last_query();

		if ($query->num_rows() > 0) 
		{
			foreach ($query->result() as $row) 
			{
				$data[] = $row;
			}                
			return $data;
		}else{
			return $data;
		}
	}
	
	public function getCreateSocietyBtn(){
		$user_id 			= $this->session->userdata['user_id'];
		$role 				= $this->session->userdata['role'];
		$account_no 		= $this->session->userdata['account_no'];
		$querySocityLists 	= $this->db->select('*')
							 ->from('socity_lists')
							 ->get();
		$querySocityListsCount = $querySocityLists->num_rows();
		
		$queryUser 			= $this->db->select('plan')
							 ->from('tbl_user')
							 ->where('user_id',$user_id)
							 ->get();
		$queryUserResult 	= $queryUser->result_array();		
		$UserPlan 			= $queryUserResult[0];
			if($querySocityListsCount == 0 AND $UserPlan['plan'] == 1 OR $UserPlan['plan'] == 2 OR $role == 1 OR $querySocityListsCount > 1){
				
				if($role == 2){
					$queryWebAdmpayment = $this->db->select('validit_date')
							 ->from('web_admpayment')
							 ->order_by("id", "desc")
							 ->limit(1)
							 ->where('acc_no',$account_no)
							 ->get();
							 
					if ($queryWebAdmpayment->num_rows() > 0){
						$resultWebAdmpayment 	= $queryWebAdmpayment->result_array();
						$WebAdmpaymentValidDate	= $resultWebAdmpayment[0];
						$currentDate 			= date('Y-m-d');
						if($currentDate > $WebAdmpaymentValidDate['validit_date']){
							$data  = '<button type="button" class="btn btn-primary create_new" onclick="expiredaccount()">Create New Society</button>';
						}else{
							$data  = '<button type="button" class="btn btn-primary create_new" data-toggle="modal" data-target="#myModalCreateSociety">Create New Society</button>';
						}
					}else{
						$data  = '<button type="button" class="btn btn-primary create_new" data-toggle="modal" data-target="#myModalCreateSociety">Create New Society</button>';
					} 				 
				}else{
					$data  = '<button type="button" class="btn btn-primary create_new" data-toggle="modal" data-target="#myModalCreateSociety">Create New Society</button>';
				}
			}else{
				$data  = '<button type="button" class="btn btn-primary create_new" onclick="CreateAlert()">Create New Society</button>';
			}			
			return $data;
		}  			
		
		function getSocietyDetails($SocietyID){
			if(empty($SocietyID)){
				return false;
			}
			$result = array();
			$query = $this->db->select('society_name,society_aliase,types,page_name')
                              ->from( 'socity_lists' )
                              ->where('id',$SocietyID)
                              ->get();
			if ($query->num_rows() > 0) 
			{
				$row = $query->result();
				$result = $row[0];				              
				return $result;
			}else{
				return $result;
			}
		}
		
		public function SocietyDropDown(){
			$return = array();
			$query = $this->db->select('distinct(type)')
				->from( 'society_types' )
				->get();
			if( is_array( $query->result_array() ) && count( $query->result_array() ) > 0 )
			{
				$return[''] = 'Please Select Type';
				foreach($query->result_array() as $row)
				{
					$return[$row['type']] = $row['type'];
				}
			}
			return $return;
	
		}
	
		function getddlSocietyType(){
			$return = array();
			$query = $this->db->select('distinct(type)')
				->from( 'society_types' )
				->get();
			if( is_array( $query->result_array() ) && count( $query->result_array() ) > 0 )
			{														
				foreach($query->result_array() as $row)
				{					
					$return[] = '<option value="'.$row['type'].'">'.$row['type'].'</option>';					
				}			
			}
			return $return;
		}

		function getddlFinancialYear($SocietyID){
			$return = array();
			$query = $this->db->select('distinct(YEAR_ID)')
				->from( 'socity_fiscals' )
				->where('SOCITY_ID',$SocietyID)
				->get();
			if( is_array( $query->result_array() ) && count( $query->result_array() ) > 0 )
			{
											
				//$return[''] = 'Please Select User';
				
				foreach($query->result_array() as $row)
				{
					$years = $row['YEAR_ID'];
					if($years != "" OR $years != null){
						$return[] = '<option value="'.$row['YEAR_ID'].'">'.$row['YEAR_ID'].'</option>';
					}					
				}			
			}
			return $return;
		}
		
		function updateSocietyDetails($InputData)
		{
			if(empty($InputData)){
				return false;
			}
			extract($InputData);
    	    $result = array();
			$this->db->where('id', $Society_id);
			$updated_user = $this->db->update('socity_lists', array('society_name'=>$txtEditSocietyName,'society_aliase' => $txtEditShortName,'types'=>$ddlEditSocietyType));
			if($updated_user){
				$query = $this->db->select('id,society_name,society_aliase,types,page_name')
                              ->from( 'socity_lists' )
                              ->where('id',$Society_id)
                              ->get();				
				$row = $query->result();
				$result = $row[0];				              
				return $result;
			}else{
				return $result;
			}
		}
		
		

	
}
?>
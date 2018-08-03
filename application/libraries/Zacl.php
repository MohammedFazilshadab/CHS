<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Zacl
{
	// Set the instance variable
	var $CI;
	function __construct()
	{
		// Get the instance
		$this->CI =& get_instance();

		// Set the include path and require the needed files
		set_include_path(get_include_path() . PATH_SEPARATOR . BASEPATH . "application/libraries");
		require_once(APPPATH . '/libraries/Zend/Acl.php');
		require_once(APPPATH . '/libraries/Zend/Acl/Role.php');
		require_once(APPPATH . '/libraries/Zend/Acl/Resource.php');
		
		$this->acl = new Zend_Acl();
		
		// Set the default ACL
		//$this->acl->addRole(new Zend_Acl_Role('default'));
		$this->CI->db->select('id,name');
		$this->CI->db->where('parent', 0);
		$query = $this->CI->db->get('permissions');	
		foreach($query->result() AS $row){
		
			$this->CI->db->select('id,name');
			$this->CI->db->where('parent', $row->id);
			$query2 = $this->CI->db->get('permissions');
			foreach($query2->result() AS $row2){					 
				$this->acl->add(new Zend_Acl_Resource($row->name.".".$row2->name));
			}					
					/*if($row->default_value == 'true'){
						$this->acl->allow('default', $row->resource);
					}*/
		}
		
		$resources = array();
		$this->CI->db->select('permissions.parent,permissions.name as permission,role.id as role');
		$this->CI->db->from('permissions');
		$this->CI->db->join('acl', 'permissions.id = acl.permissions_id');
		$this->CI->db->join('role', 'role.id = acl.role_id');
		$query = $this->CI->db->get();
		//$this->CI->db->last_query();
		//exit();
		if($query->num_rows()){
			foreach($query->result() AS $row){
			
				$this->CI->db->select('name');
				$this->CI->db->from('permissions');
				$this->CI->db->where('id', $row->parent);
				$sqlQuery = $this->CI->db->get();
				$permission_name = '';
				if($sqlQuery->num_rows()>0){
					$sqlQueryResult  = $sqlQuery->result_array();	
					/*echo "<pre>";
					print_r($sqlQueryResult);
					echo "</pre>";	*/				
					$permission_name = $sqlQueryResult[0]['name'];
					
				}
				
				$resources[$row->role][$permission_name][] = $row->permission;
			}
		
		}
		if(count($resources)){
			foreach($resources AS $key1=>$value1){
				$this->acl->addRole(new Zend_Acl_Role($key1));
				if( count($value1) )
				foreach($value1 as $key2=>$value2)
				{
					if( count($value2) ){
						for($i=0;$i<count($value2);$i++)
						{
							//$acl->addRole(new Zend_Acl_Role($key1));
							$this->acl->allow($key1, null, $key2.".".$value2[$i]);
						}
					}
				}
			}
		}
		$this->acl->addRole(new Zend_Acl_Role('1'));
		// Administrator inherits nothing, but is allowed all privileges
		$this->acl->allow('1');
		
		
		
		// Get the ACL for the roles
		/*$this->CI->db->order_by("priority", "ASC");
		$query = $this->CI->db->get('role');
		foreach($query->result() AS $row){
			$role = (string)$row->name;
			$this->acl->addRole(new Zend_Acl_Role($role));
			$this->CI->db->from('acl');
			$this->CI->db->join('role', 'acl.role_id = role.id');
			$this->CI->db->where('role.name', $row->name);
			$this->CI->db->where('acl.role_id', $row->id);
			$subquery = $this->CI->db->get();
			foreach($subquery->result() AS $subrow){
				if($subrow->access == "allow"){
					$this->acl->allow($role, $subrow->name);
				} else {
					$this->acl->deny($role, $subrow->name);
				}
			}
			// Get the ACL for the users
			$this->CI->db->from('tbl_user');
			$this->CI->db->where('role_id', $row->id);
			$userquery = $this->CI->db->get();
			foreach($userquery->result() AS $userrow){
				$this->acl->addRole(new Zend_Acl_Role($userrow->user_id), $role);
				$this->CI->db->from('acl');
				$this->CI->db->join('role', 'acl.role_id = role.id');
				$this->CI->db->where('role.name', $userrow->name);
				$this->CI->db->where('acl.user_id', $userrow->user_id);
				$usersubquery = $this->CI->db->get();
				
				foreach($usersubquery->result() AS $usersubrow){
					if($usersubrow->access == "allow"){
						$this->acl->allow($userrow->user_id, $usersubrow->name);
					} else {
						$this->acl->deny($userrow->user_id, $usersubrow->name);
					}
				}
			}
		}*/
	}

	// Function to check if the current or a preset role has access to a resource
	function check_acl($role = '', $resource, $permission)
	{
		if (!$this->acl->has($resource))
		{
			return 1;
		}
		if (empty($role)) {
			if (isset($this->CI->session->userdata['role'])) {
				$role = $this->CI->session->userdata['role'];
			}
		}
		if (empty($role)) {
			return false;
		}
		return $this->acl->isAllowed($role, $resource, $permission);
	}
}
?>
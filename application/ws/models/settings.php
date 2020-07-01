<?php
Class Settings extends CI_Model
{
	//Function for getting all Settings
	function get_all_setting($sortby = 'id',$orderby = 'ASC')
 	{
		//Ordering Data
		$this->db->order_by($sortby,$orderby);
		
		//Executing Query
		$query = $this->db->get('settings');
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
 	}
	
	//Getting setting field name By id ---------used
	function get_setting_fieldname($intid)
 	{
		$query = $this->db->get_where('setting', array('settingid' => $intid));
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			return ($result[0]['settingfieldvalue']);
		}
		else
		{
			return false;
		}
 	}
	
	//Getting setting value for editing By id
	function get_setting_value($intid)
 	{
		$query = $this->db->get_where('setting', array('settingid' => $intid));
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			//print_r($result);die();
			
			return nl2br(($result[0]['settingfieldvalue']));
		}
		else
		{
			return false;
		}
 	}
        function get_all_menuurl()
 	{
                $this->db->select('menuurl');
		$query = $this->db->get('adminmenu');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result_array();
			//print_r($result);die();
			
			return $result;
		}
		else
		{
			return false;
		}
 	}
	
	//Getting setting value for editing By id
	function get_setting_byid($intid)
 	{
		$query = $this->db->get_where('settings', array('id' => $intid));
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
 	}
	
	//Updating Record
	function update($intid,$value)
 	{
		$data = array( 'value' => $value );
		
		$this->db->where('id', $intid);
		if( $this->db->update('settings', $data) )
		{
			return true;
		}
		else
		{
			return false;
		}
 	}
	
	//table records count
	function get_count_of_table($table)
 	{
		$query = $this->db->count_all($table);
		return $query;
	}
	

	
	
	
	
// get permission group	
	function get_permission_detail($temp)
	{
		$this->db->select('assignpermission');
		$this->db->from('adminuser');
		$this->db->where('adminuserid',$temp);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
	}
	// get url value
	function get_url_byid($urlid)
	{
		$this->db->select('menuurl');
		$query = $this->db->get_where('adminmenu', array('uniqueid' => $urlid));
		
		if ($query->num_rows() > 0)
		{
			 // echo "<pre>"; print_r($this->data['urlval']);die();  
                    return $query->result_array();
		}
		else
		{
			return array();
		}
	}
	function get_uniqueid_byurl($url)
	{
		$this->db->select('uniqueid');
		$query = $this->db->get_where('adminmenu', array('menuurl' => $url));
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
	}
	
	function get_email_byemail($email)
	{
		$this->db->select('*');
		$query = $this->db->get_where('adminuser', array('adminuseremail' => $email));
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
	}
	//Get user Email Format by id
	function get_mail_byid($id)
 	{
	  
		 $this->db->select('*');
		 $this->db->from('mail_templates');
		 $this->db->where( array('id' => $id));
		 $query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		else
		{
			return array();
		}
 	}
	
	function get_group_detail($temp)
	{
		
            $query = $this->db->get_where('group', array('groupid' => $temp,'status' =>'Enable'));
		
		if ($query->num_rows() > 0)
		{
                    return $query->result_array();
		}
		else
		{
			return array();
		}
	}
}
?>

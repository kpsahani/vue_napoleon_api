<?php

Class Pages extends CI_Model {
 //get all category
    function getAllMails($sortby = 'pageid', $orderby = 'DESC')  {
        
     
        switch($sortby)
        {   
            case 'pageid' 	: $sortby = 'pageid';break;
            default: $sortby = 'pageid';break;
        }
        $this->db->order_by($sortby,$orderby);
		
 

        //Executing Query
        $this->db->from('page');
        $query =  $this->db->get();
       
        if ($query->num_rows() > 0)
        {
                return $query->result_array();
        }
        else
        {
                return array();
        }
    }
    //Getting Page value for editing
    function get_emailformat_byid($intid) {
        
        
            $this->db->select('id,title,variables,subject,mailformat');
            
            $this->db->from('mail_templates');
            
            $this->db->where('id', $intid);
            $query = $this->db->get();
           
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    //Updating Record
	function update($intid,$vartitle,$varsubject,$varmailformat)
 	{
//            echo $intid.'/'.$vartitle.'/'.$varsubject.'/'.$varmailformat; die();
		$data = array(
                            'title' 		=> $vartitle,
                            'subject' 	=> $varsubject,
                            'mailformat ' => $varmailformat,
                    );
		
		$this->db->where('id', $intid);
		if( $this->db->update('mail_templates', $data) )
		{
			return true;
		}
		else
		{
			return false;
		}
 	}

}
?>
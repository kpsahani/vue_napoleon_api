<?php
Class Common extends CI_Model
{
    // insert database
    function insert_data($data,$tablename)
    {
        if($this->db->insert($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // insert database
    function insert_data_getid($data,$tablename)
    {
        if($this->db->insert($tablename,$data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }
    // update database
    function update_data($data,$tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->update($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function update_data1($data,$tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->update($tablename,$data))
        {
        //    return true;
             return $this->select_database_id('admin','adminemail',$columnid,$data='*');
        }
        else
        {
            return false;
        }
    }
    
    function selectRecords($table, $fields = array(), $condition = array(),  $resulttype = 'result_array') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($condition);
       
       
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            switch ($resulttype) {
                case 'row':
                    $result = $query->row();
                    break;
                case 'row_array':
                    $result = $query->row_array();
                    break;
                case 'result':
                    $result = $query->result();
                    break;
                case 'result_array':
                    $result = $query->result_array();
                    break;
//                default:
//                   echo "i is not equal to 0, 1 or 2";
            }
            return $result;
        } else {
            return array();
        }
    }
    // select data using colum id
    function select_database_id($tablename,$columnname,$columnid,$data='*')
    {
        $this->db->select($data);
        $this->db->where($columnname,"$columnid");
        $query = $this->db->get($tablename);
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
   
    // delete data
    function delete_data($tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->delete($tablename))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // change status
    function change_status($data,$tablename,$columnname,$columnid)
    {
        $this->db->where($columnname,$columnid);
        if($this->db->update($tablename,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    // check unique avaliblity
    function check_unique_avalibility($tablename,$columname1,$columnid1_value)
    {   echo"hiii";die;
        
        if($columnid2_value != '')
        {
            $this->db->where($columname2,$columnid2_value);
        }
        $this->db->where($columname1,$columnid1_value);
        $query = $this->db->get($tablename);
        if($query->num_rows()>0)
        {
           return $query->result_array();
        }
        else
        {
             return array();
        }
    }
    function get_userdata($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        //$this->db->join('friend f', 'f.userid_from = u.userid','left');
        //$this->db->join('user ut', 'ut.userid = f.userid_to','left');
        $this->db->like('u.name',$username);
        $this->db->or_like('u.username',$username);
        $this->db->or_like('u.email',$username);
        $query = $this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
        
        
    }
    // check unique avaliblity
    function check_unique_avalibility_where($tablename,$columname1,$columnid1_value)
    {
        $this->db->where($columname1,$columnid1_value);

        // if($columnid2_value != '')
        // {
        //     $this->db->or_where($columname2,$columnid2_value);
        // }
       
        $query = $this->db->get($tablename);
        // echo $this->db->last_query();die();
        if($query->num_rows()>0)
        {
           return $query->result_array();
        }
        else
        {
             return array();
        }
    }
  
    //get all record 
     function get_all_category($tablename,$data='*',$sortby='',$orderby='')
    {
        $this->db->select($data);
        $this->db->from($tablename);
        $this->db->where('status','Enable');
        $this->db->where('isdeleted','No');
        
        if($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby,$orderby);
        }
        $query = $this->db->get();
        if($query ->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    //get all record 
     function get_all_record($tablename,$data='*',$columname1,$columnid1_value,$sortby='',$orderby='')
    {
        $this->db->select($data);
        $this->db->from($tablename);
        $this->db->where('status','Enable');
        $this->db->where($columname1,$columnid1_value);
        if($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby,$orderby);
        }
        $query = $this->db->get();
        if($query ->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    //table records count
    function get_count_of_table($table)
    {
        $query = $this->db->count_all($table);
        return $query;
    }
    // get recent record
    function get_recent_record($tablename,$limit,$data='*',$sortby='',$orderby='')
    {
        $this->db->select($data);
        $this->db->limit($limit);
        if($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby,$orderby);
        }
        if($tablename == "category")
        {
            $this->db->where('isdeleted','No');
        }
        $query = $this->db->get($tablename);
        if($query ->num_rows()>0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    
    // select data using colum id
    function select_database_by_muliple_where($tablename, $condition, $data = '*')
    {
        $this->db->select($data);
        $this->db->where($condition);
        $query = $this->db->get($tablename);
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }
    
    function delete_multiple_id($tablename,$condition_array)
    {
        $this->db->where($condition_array);
        $result = $this->db->delete($tablename);
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    
     //-----------------sending mail when status has been changed ---------------------//
    function mailForChangeStatus($mailformatid="",$status="",$data=array())
    {
        //data[0] for senders mail id
        //data[1] sender name
         // Mail For Spa Admin
        
        $mail = $this->get_email_byid($mailformatid);
        $subject = $mail[0]['varsubject'];
        $mailformat = $mail[0]['varmailformat'];

        $sitename = $this->common->get_setting_value(1);
        $siteurl = $this->common->get_setting_value(2);
        $site_email = $this->common->get_setting_value(5);
        $this->load->library('email');

        $this->email->from($site_email, $sitename);
        $this->email->to($data[0]);
        $this->email->subject($subject);
        $mail_body = str_replace("%firstname%", ucfirst($data[1]),
                     str_replace("%status%", $status, 
                     str_replace("%sitename%", $sitename, 
                     str_replace("%siteurl%", $siteurl,  
                     stripslashes($mailformat)))));
        $this->email->message($mail_body);  
//        echo "<pre>";
//        echo $data[0];
//        print_r($mail_body);
//        die();
       // if($this->email->send());
    }
    


    //Function for getting all Settings
    function get_all_setting($sortby = 'settingid',$orderby = 'ASC')
    {
            //Ordering Data
            $this->db->order_by($sortby,$orderby);

            //Executing Query
            $query = $this->db->get('setting');

            if ($query->num_rows() > 0)
            {
                    return $query->result_array();
            }
            else
            {
                    return array();
            }
    }
	
    //Getting setting value for editing By id
    function get_setting_byid($intid)
    {
            $query = $this->db->get_where('setting', array('settingid' => $intid));

            if ($query->num_rows() > 0)
            {
                    return $query->result_array();
            }
            else
            {
                    return array();
            }
    }
    
    function get_data_all($tablename)
    {
        $this->db->from($tablename);
        $result = $this->db->get();
        return $result->result_array();
    }

    //Getting setting value By id
    function get_setting_value($id)
    {
            $query = $this->db->get_where('setting', array('settingid' => $id,));
            if ($query->num_rows() > 0)
            {
                    $result = $query->result_array();
                    return nl2br(($result[0]['settingvalue']));
            }
            else
            {
                    return false;
            }
    }
    //Getting setting field name By id
    function get_setting_fieldname($intid)
    {
            $query = $this->db->get_where('setting', array('settingid' => $intid));

            if ($query->num_rows() > 0)
            {
                    $result = $query->result_array();
                    return ($result[0]['settingfieldname']);
            }
            else
            {
                    return false;
            }
    }
    //Getting Email value
    function get_email_byid($id)
    {
            $query = $this->db->get_where('mail_templates', array('id' => $id));

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
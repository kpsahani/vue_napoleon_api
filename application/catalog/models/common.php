<?php

Class Common extends CI_Model {

    // insert database
    function insert_data($data, $tablename)
    {
        if ($this->db->insert($tablename, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // insert database
    function insert_data_getid($data, $tablename)
    {
        if ($this->db->insert($tablename, $data))
        {
            return $this->db->insert_id();
        }
        else
        {
            return false;
        }
    }

    // update database
    function update_data($data, $tablename, $columnname, $columnid)
    {
        $this->db->where($columnname, $columnid);
        if ($this->db->update($tablename, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // select data using colum id
    function select_database_id($tablename, $columnname, $columnid, $data = '*')
    {
        $this->db->select($data);
        $this->db->where($columnname, $columnid);
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

    function get_data_all($tablename)
    {
        $this->db->from($tablename);
        $result = $this->db->get();
        return $result->result_array();
    }

    // delete data
    function delete_data($tablename, $columnname, $columnid)
    {
        $this->db->where($columnname, $columnid);
        if ($this->db->delete($tablename))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // change status
    function change_status($data, $tablename, $columnname, $columnid)
    {
        $this->db->where($columnname, $columnid);
        if ($this->db->update($tablename, $data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // check unique avaliblity
    function check_unique_avalibility($tablename, $columname1, $columnid1_value, $columname2 = '', $columnid2_value = '', $condition_array = array())
    {

        if ($columnid2_value != '')
        {
            $this->db->where($columname2 . " !=", $columnid2_value);
        }
        $this->db->where($columname1, $columnid1_value);

        if (!empty($condition_array))
        {
            foreach ($condition_array as $field_name => $field_value)
            {
                $this->db->where($field_name, $field_value);
            }
        }

        $query = $this->db->get($tablename);

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            echo FALSE;
        }
    }

    //get all record 
    function get_all_category($tablename, $data = '*', $sortby = '', $orderby = '')
    {
        $this->db->select($data);
        $this->db->from($tablename);
        $this->db->where('status', 'Enable');
        $this->db->where('isdeleted', 'No');

        if ($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby, $orderby);
        }
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

    //get all record 
    function get_all_record($tablename, $data = '*', $sortby = '', $orderby = '')
    {
        $this->db->select($data);
        $this->db->from($tablename);

        if ($sortby != '' && $orderby != "")
        {
            $this->db->order_by($sortby, $orderby);
        }
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

    //get record 
    function get_record($tablename, $fieldname, $value)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where($fieldname, $value);

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

    //table records count
    function get_count_of_table($table)
    {

        $query = $this->db->get($table)->num_rows();


        return $query;
    }

    //table records count by id
    function get_count_of_table_by_id($table, $fieldname, $id)
    {
        $this->db->where($fieldname, $id);
        $query = $this->db->get($table)->num_rows();


        return $query;
    }

    //table records count by type
    function get_count_of_table_by_type($table, $type)
    {

        $this->db->where('usertype', $type);


        $query = $this->db->get($table)->num_rows();


        return $query;
    }

    //get deleted record
    function get_count_delete_record($tablename)
    {
        if ($tablename == "category")
        {
            $this->db->where('isdeleted', 'No');
        }
        if ($tablename == "language")
        {
            $this->db->where('is_delete', '0');
        }

        $query = $this->db->get($tablename);
        return $query->num_rows();
    }

    //get deleted record
    function get_count_subcategory()
    {
        //Executing Query
        $this->db->select('sc.*,c.category_name');
        $this->db->from('subcategory sc');
        $this->db->join('category c', 'c.categoryid=sc.categoryid', 'left');
        $this->db->where('c.isdeleted', 'No');

        $query = $this->db->get();
        return $query->num_rows();
    }

    //-----------------sending mail when status has been changed ---------------------//
    function mailForChangeStatus($mailformatid = "", $status = "", $data = array())
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
        $mail_body = str_replace("%firstname%", ucfirst($data[1]), str_replace("%status%", $status, str_replace("%sitename%", $sitename, str_replace("%siteurl%", $siteurl, stripslashes($mailformat)))));
        $this->email->message($mail_body);
//        echo "<pre>";
//        echo $data[0];
//        print_r($mail_body);
//        die();
        // if($this->email->send());
    }

    //Function for getting all Settings
    function get_all_setting($sortby = 'settingid', $orderby = 'ASC')
    {
        //Ordering Data
        $this->db->order_by($sortby, $orderby);

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

    //Getting setting value By id
    function get_setting_value($id)
    {
        $query = $this->db->get_where('setting', array('settingid' => $id));
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
            return ($result[0]['title']);
        }
        else
        {
            return false;
        }
    }

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

    public function get_admin_detail($fields, $admin_id)
    {
        $this->db->select($fields);
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    public function get_admin_data($fields, $admin_id)
    {
        $this->db->select($fields);
        $this->db->where('admin_id', $admin_id);
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0)
        {
            $res = $query->result_array();
            return $res[0][$fields];
        }
        else
        {
            return array();
        }
    }

    function get_group_detail($temp)
    {

        $query = $this->db->get_where('admin_groups', array('id' => $temp, 'status' => 'Enable'));

        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    function get_all_menuurl()
    {
        $this->db->select('url');
        $query = $this->db->get('admin_menu');

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

    // get url value
    function get_url_byid($urlid)
    {
        $this->db->select('url');
        $query = $this->db->get_where('admin_menu', array('uniqueid' => $urlid));

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

    function get_mail_byid($emailid)
    {
        $mail = $this->db->get_where('email_format', array('emailid' => $emailid));
        if ($mail->num_rows() > 0)
        {
            return $mail->result_array();
        }
        else
        {
            return array();
        }
    }

    public function get_user_data()
    {
        $this->db->select('u.user_id,u.name,u.user_email,u.user_contact_number,u.user_active,j.jeweler_name');
        $this->db->from('user u');
        $this->db->join('jeweler j', 'j.jeweler_id = u.jeweler_id', 'left');
        $this->db->where('u.user_active !=', 'Deleted');
        $this->db->order_by('u.user_id', 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_user_data_by_userid($userid)
    {
        $this->db->select('u.*');
        $this->db->from('user u');
        $this->db->where('u.user_active !=', 'Deleted');
        $this->db->where('u.user_id', $userid);
        $result = $this->db->get();
        return $result->result_array();
    }

    function select_data_by_condition($tablename, $contition_array = array(), $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array())
    {
        $this->db->select($data);
        //if join_str array is not empty then implement the join query
        if (!empty($join_str))
        {
            foreach ($join_str as $join)
            {
                if ($join['join_type'] == '')
                {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                }
                else
                {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }

        //condition array pass to where condition
        $this->db->where($contition_array);

        //Setting Limit for Paging
        if ($limit != '' && $offset == 0)
        {
            $this->db->limit($limit);
        }
        else if ($limit != '' && $offset != 0)
        {
            $this->db->limit($limit, $offset);
        }
        //order by query
        if ($sortby != '' && $orderby != '')
        {
            $this->db->order_by($sortby, $orderby);
        }

        $query = $this->db->get($tablename);
        //if limit is empty then returns total count
        if ($limit == '')
        {
            $query->num_rows();
        }
        //if limit is not empty then return result array
        return $query->result_array();
    }

    public function multipleEvent($id, $status_columnname, $value, $columname, $tablename)
    {
        if ($value == "Enable")
        {
            $data = array($status_columnname => 'Enable');
            $this->db->where_in($columname, $id);
            if ($this->db->update($tablename, $data))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        if ($value == "Disable")
        {
            $data = array($status_columnname => 'Disable');
            $this->db->where_in($columname, $id);
            if ($this->db->update($tablename, $data))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        if ($value == "Delete")
        {
            $data = array($status_columnname => 'Delete');
            $this->db->where_in($columname, $id);
            if ($this->db->update($tablename, $data))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function multipleDeleteEvent($id, $value, $columname, $tablename)
    {
        if ($value == "Delete")
        {
            $this->db->where_in($columname, $id);
            if ($this->db->delete($tablename))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

}

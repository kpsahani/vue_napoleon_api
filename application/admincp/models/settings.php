<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Settings extends CI_Model {

    function get_all_setting($limit = '', $offset = '', $sortby = 'settingid', $orderby = 'ASC') {
        switch ($sortby) {
            case 'settingid' : $sortby = 'settingid';
                break;
            case 'settingvalue' : $sortby = 'settingvalue';
                break;
            default : $sortby = 'settingid';
                break;
        }

        //Ordering Data
        $this->db->order_by($sortby, $orderby);

        //Setting Limit for Paging
        if ($limit != '' && $offset == 0) {
            $this->db->limit($limit);
        } else if ($limit != '' && $offset != 0) {
            $this->db->limit($limit, $offset);
        }

        //Executing Query
        $query = $this->db->get('setting');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    //get data count
    function get_datacount($type) {
        $this->db->from('tour');

        if ($type == 'all') {
            $this->db->where('languageid', 1);
        } else if ($type == 'enable' || $type == 'disable') {
            $this->db->where('languageid', 1);
            $this->db->where('status', $type);
        }
        $query = $this->db->count_all_results();
        return $query;
    }

    //get booking data count
    function get_booking_datacount($type) {
        $this->db->from('booking');

        if ($type == 'all') {
            
        } else if ($type == 'open' || $type == 'close') {
            $this->db->where('status', $type);
        } else if ($type == 'today') {
            $this->db->where('Date(booking_datetime)', date('Y-m-d'));
        }
        $query = $this->db->count_all_results();
        return $query;
    }

    function get_all_pages($limit = '', $offset = '', $sortby = 'title', $orderby = 'ASC') {
        switch ($sortby) {
            case 'title' : $sortby = 'title';
                break;
            case 'value' : $sortby = 'varvalue';
                break;
            default : $sortby = 'settingid';
                break;
        }

        //Ordering Data
        $this->db->order_by($sortby, $orderby);

        //Setting Limit for Paging
        if ($limit != '' && $offset == 0) {
            $this->db->limit($limit);
        } else if ($limit != '' && $offset != 0) {
            $this->db->limit($limit, $offset);
        }

        //Executing Query
        $query = $this->db->get('pages');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    function chkfield($field, $value) {
        $option = array('varemailid' => $value, 'enumstatus' => 'Enable');

        /* echo "<pre>";
          print_r($option);
          die(); */

        $query = $this->db->get_where('user', $option);
        if ($query->num_rows() > 0) {

            return 'old';
        } else {
            return 'new';
        }
    }

    function chkfieldusername($field, $value) {
        $option = array('varusername' => $value, 'enumstatus' => 'Enable');

        /* echo "<pre>";
          print_r($option);
          die();
         */
        $query = $this->db->get_where('user', $option);
        /* echo "<pre>";
          print_r($this->db);
          die(); */
        if ($query->num_rows() > 0) {

            return 'old';
        } else {
            return 'new';
        }
    }

    function get_all_seosetting($limit = '', $offset = '', $sortby = 'title', $orderby = 'ASC') {
        switch ($sortby) {
            case 'title' : $sortby = 'title';
                break;
            case 'value' : $sortby = 'varvalue';
                break;
            default : $sortby = 'settingid';
                break;
        }

        //Ordering Data
        $this->db->order_by($sortby, $orderby);

        //Setting Limit for Paging
        if ($limit != '' && $offset == 0) {
            $this->db->limit($limit);
        } else if ($limit != '' && $offset != 0) {
            $this->db->limit($limit, $offset);
        }

        //Executing Query
        $query = $this->db->get('seo');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    //Getting setting field name By id
    function get_setting_title($settingid) {
        $query = $this->db->get_where('setting', array('settingid' => $settingid));

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return stripslashes($result[0]['title']);
        } else {
            return false;
        }
    }

    function get_seosetting_title($settingid) {
        $query = $this->db->get_where('seo', array('seoid' => $settingid));

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return stripslashes($result[0]['seoname']);
        } else {
            return false;
        }
    }

    //Getting setting value for editing By id
    function get_setting_value($settingid) {
        $query = $this->db->get_where('setting', array('settingid' => $settingid));

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            return nl2br(stripslashes($result[0]['settingvalue']));
        } else {
            return false;
        }
    }

    //Getting setting value for editing By id
    function get_setting_byid($settingid) {
        $query = $this->db->get_where('setting', array('settingid' => $settingid));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    function get_seo_byid($settingid) {
        $query = $this->db->get_where('seo', array('settingid' => $settingid));

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }

    //Updating Record
    function update($settingid, $value) {
        $data = array('value' => $value);
        $this->db->where('settingid', $settingid);

        if ($this->db->update('setting', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function update_data($data, $tablename, $fieldname, $fieldvalue) {
        $this->db->where($fieldname, $fieldvalue);
        if ($this->db->update($tablename, $data)) {
            return true;
        } else {
            return false;
        }
    }

    function update_data_array($data, $tablename, $field_array) {
        $this->db->where($field_array);
        if ($this->db->update($tablename, $data)) {
            return true;
        } else {
            return false;
        }
    }

    //deleting record
    function delete_data($tablename, $fieldname, $fieldvalue) {
        $this->db->where($fieldname, $fieldvalue);
        if ($this->db->delete($tablename)) {
            return true;
        } else {
            return false;
        }
    }

    //inserting record
    function insert_data($data, $tablename) {
        if ($this->db->insert($tablename, $data)) {
            return true;
        } else {
            return false;
        }
    }

}

?>

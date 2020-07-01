<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function userGetAllMember()
    {
        return $this->db->count_all('user');
    }

    public function userCountByPeriod($condition = NULL)
    {

        $this->db->select('count(user_id) as status');
        $this->db->from('user');

        if ($condition == 'lastmonth')
        {
            $this->db->where('signupdate > (NOW() - INTERVAL 1 MONTH) ;');
        }
        elseif ($condition == 'today')
        {
            $this->db->where('YEAR(signupdate) = YEAR(NOW()) AND MONTH(signupdate) = MONTH(NOW()) AND DAY(signupdate) = DAY(NOW());');
        }
        elseif ($condition == 'thisyear')
        {
            $this->db->where('YEAR(signupdate) = YEAR(CURDATE());');
        }
        else
        {
            return FALSE;
        }

        return $this->db->get()->row();
    }

    public function userCountByType($type = NULL)
    {

        $this->db->select('count(user_id) as type');
        $this->db->from('user');

        if ($type == 'user')
        {
            $this->db->where(array('type' => 'user'));
        }
        elseif ($type == 'driver')
        {
            $this->db->where(array('type' => 'driver'));
        }
        elseif ($type == 'toursguide')
        {
            $this->db->where(array('type' => 'tours guide'));
        }
        else
        {
            return FALSE;
        }
        return $this->db->get()->row();
    }

    public function userGetUserByStatus($status)
    {
        $this->db->select('count(user_id) as status');
        $this->db->from('user');
        $this->db->where(array('user_active' => $status));
        return $this->db->get()->row();
    }

    public function get_jeweler_of_limit($limit)
    {
        $this->db->select('jeweler_id,jeweler_name,jeweler_logo,createddate');
        $this->db->from('jeweler');
        $this->db->where('jeweler_active !=', 'Delete');
        $this->db->limit($limit);
        $this->db->order_by('jeweler_id', 'DESC');
        $user = $this->db->get();
        return $user->result_array();
    }

    function get_jeweler_minimum_date()
    {
        $this->db->select('min(createddate) as mindate');
        $query = $this->db->get('jeweler');
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return array();
        }
    }

    // get monthly data
    function get_user($type)
    {

        if ($type == "week")
        {
            $today = date('Y-m-d');
            $week = date("W", strtotime($today));
            $year = date("Y", strtotime($today));
            $weekdates = $this->getWeek($week, $year);
            $startdate = $weekdates['start'];
            $enddate = $weekdates['end'];
            $this->db->select('count(user_id) as user,Date(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('user_active !=', "Delete");
            $this->db->group_by('Date(createddate)');
        }
        elseif ($type == "month")
        {
            $startdate = date('Y-m-01', strtotime('this month'));
            $enddate = date('Y-m-t', strtotime('this month'));
            $this->db->select('count(user_id) as user,DAYOFMONTH(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('user_active !=', "Delete");
            $this->db->group_by('Date(createddate)');
        }
        elseif ($type == "year")
        {
            $startdate = date('Y-01-01', strtotime('this month'));
            $enddate = date('Y-12-31', strtotime('this month'));
            $this->db->select('count(user_id) as user,MONTH(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('user_active !=', "Delete");
            $this->db->group_by('MONTH(createddate)');
        }
//        echo $startdate.'/'.$enddate;die;
        //Executing Query
        $query = $this->db->get('user');
        //echo $this->db->last_query();
        return $query->result_array();
    }
    function get_jeweler($type)
    {

        if ($type == "week")
        {
            $today = date('Y-m-d');
            $week = date("W", strtotime($today));
            $year = date("Y", strtotime($today));
            $weekdates = $this->getWeek($week, $year);
            $startdate = $weekdates['start'];
            $enddate = $weekdates['end'];
            $this->db->select('count(jeweler_id) as jeweler,Date(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('jeweler_active !=', "Delete");
            $this->db->group_by('Date(createddate)');
        }
        elseif ($type == "month")
        {
            $startdate = date('Y-m-01', strtotime('this month'));
            $enddate = date('Y-m-t', strtotime('this month'));
            $this->db->select('count(jeweler_id) as jeweler,DAYOFMONTH(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('jeweler_active !=', "Delete");
            $this->db->group_by('Date(createddate)');
        }
        elseif ($type == "year")
        {
            $startdate = date('Y-01-01', strtotime('this month'));
            $enddate = date('Y-12-31', strtotime('this month'));
            $this->db->select('count(jeweler_id) as jeweler,MONTH(createddate) as createddate');
            $this->db->where('Date(createdDate) >=', $startdate);
            $this->db->where('Date(createdDate) <=', $enddate);
            $this->db->where('jeweler_active !=', "Delete");
            $this->db->group_by('MONTH(createddate)');
        }
//        echo $startdate.'/'.$enddate;die;
        //Executing Query
        $query = $this->db->get('jeweler');
        //echo $this->db->last_query();
        return $query->result_array();
    }

    function getWeek($week, $year)
    {
        $dto = new DateTime();
        $result['start'] = $dto->setISODate($year, $week, 0)->format('Y-m-d');
        $result['end'] = $dto->setISODate($year, $week, 6)->format('Y-m-d');
        return $result;
    }

    //get module details
    function get_jeweler_details($s_date)
    {
        $this->db->where('Date(createdDate) >=', $s_date);
        $this->db->where('Date(createdDate) <=', $s_date);
        //Executing Query
        $query = $this->db->get('jeweler');
        //echo $this->db->last_query();
        return $query->num_rows();
    }

}

?>

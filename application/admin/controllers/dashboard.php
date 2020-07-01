<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/dashboard
     * 	- or -  
     * 		http://example.com/index.php/dashboard/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/dashboard/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public $data;

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        if (!$this->session->userdata('napoleon_admin')) {
            //If no session, redirect to login page
            redirect('adminlogin', 'refresh');
        } 
        include('include.php');
        //Setting Page Title and Comman Variable
        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Dashboard';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);
        $this->load->model('common');
        $this->load->model('dashboardmodel');

        //Load leftsidemenu and save in variable

        $this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        $this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
        //Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);
    }

    function getWeek($week, $year) {
        $dto = new DateTime();
        $result['start'] = $dto->setISODate($year, $week, 0)->format('Y-m-d');
        $result['end'] = $dto->setISODate($year, $week, 6)->format('Y-m-d');
        return $result;
    }

    public function index() {

        if (isset($this->session->userdata['napoleon_admin'])) {
            $this->load->view('dashboard', $this->data);
        }
        else {
            redirect('adminlogin', 'refresh');
        }
    }

    function time_elapsed_string($ptime) {

        $etime = strtotime(date('Y-m-d H:i:s')) - strtotime($ptime);

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

    function logout() {
        if (isset($this->session->userdata['napoleon_admin'])) {
            $this->session->unset_userdata('napoleon_admin');
            $this->session->sess_destroy();
            redirect('adminlogin', 'refresh');
        }
        else {
            $this->session->unset_userdata('napoleon_admin');
            $this->session->sess_destroy();
            redirect('adminlogin', 'refresh');
        }
    }

    function updateImage() {
        $mapping = $this->common->get_data_all('mapping');

        for ($i = 0; $i < count($mapping); $i++) {
            $name = '';
            $map_id = $mapping[$i]['map_id'];
            $main_folder = "";

            if ($mapping[$i]['character_id'] == 1) { // get main folder name
                $name .= 'napoleon/';
                $name .= $this->getFolderNameNapoleon($mapping[$i]['place_id']);
            }
            else {
                $name .= 'josephine/';
                $name .= $this->getFolderNameJosephine($mapping[$i]['place_id']);
            }


            $name .= $this->getName($mapping[$i]['place_id']); //  get place 
            if ($mapping[$i]['character_id'] = 1) { // get character
                $name .= 'n';
            }
            else {
                $name .= 'j';
            }

            $name .= $this->getName($mapping[$i]['dress_id']); //  get dress 
            $name .= $this->getName($mapping[$i]['crown_id']); //  get crown
            $name .= $this->getName($mapping[$i]['stage_id']); //  get stage
            $name .= $this->getName($mapping[$i]['props_id']); //  get props
            $name .= '.png';
            //echo $name;
            $data = array(
                'image_path'=>$name
            );
            $this->common->update_data($data, $tablename='mapping', $columnname='map_id', $map_id);
           // die;
        }


//        echo "<pre>";print_r($mapping);die;
    }

    function getFolderNameJosephine($char) {
        switch ($char)
        {
            case "1":
                return 'Josephine Throne/';
                break;
            case "2":
                return 'Josephine Garden/';
                break;
            case "3":
                return 'Josephine Hall/';
                break;
            case "4":
                return 'Josephine Bed/';
                break;
            default:
                return '';
        }
    }

    function getFolderNameNapoleon($char) {
        switch ($char)
        {
            case "1":
                return 'Napoleon Throne/';
                break;
            case "2":
                return 'Napoleon Garden/';
                break;
            case "3":
                return 'Napoleon Hall/';
                break;
            case "4":
                return 'Napoleon Bed/';
                break;
            default:
                return '';
        }
    }

    function getName($char) {
        switch ($char)
        {
            case "1":
                return 't';
                break;
            case "2":
                return 'o';
                break;
            case "3":
                return 'l';
                break;
            case "4":
                return 'b';
                break;
            case "5":
                return 'r';
                break;
            case "6":
                return 'g';
                break;
            case "7":
                return 'm';
                break;
            case "8":
                return 'r';
                break;
            case "9":
                return 'g';
                break;
            case "10":
                return 's';
                break;
            case "11":
                return 'b';
                break;
            case "12":
                return 'm';
                break;
            case "13":
                return 'c';
                break;
            case "14":
                return 't';
                break;
            case "15":
                return 'f';
                break;
            case "16":
                return 'n';
                break;
            case "17":
                return 'c';
                break;
            case "18":
                return 'd';
                break;
            case "19":
                return 'r';
                break;
            case "20":
                return 'h';
                break;
            case "21":
                return 's';
                break;
            case "22":
                return 'b';
                break;
            default:
                return '';
        }
    }

}

/* End of file dashboard.php */
    /* Location: ./application/controllers/dashboard.php */
    

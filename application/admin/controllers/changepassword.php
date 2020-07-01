<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Changepassword extends CI_Controller {

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

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('napoleon_admin'))
        {   
            echo 'constructor run';die;
            redirect('adminlogin', 'refresh');
        }
        include('include.php');

        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Change Password';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);


        $this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        $this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);

        $this->load->model('common');
    }
    
    // public function index()
    // {
    //     // echo'hi';
    //     $admindata = $this->session->userdata('napoleon_admin');
    //     $adminid = $admindata['adminid'];
    //     $this->data['admin'] = $this->common->select_database_id('admin', 'adminid', $adminid);
    //     //$this->db->last_query();
    //     echo"<prev>";
    //     print_r($this->data['admin']);die;
    // }



    public function index()
    {
        $admindata = $this->session->userdata('napoleon_admin');
        $adminid = $admindata['adminid'];
        $this->data['admin'] = $this->common->select_database_id('admin', 'adminid', $adminid);
        $this->load->view('changepassword', $this->data);
    }

    public function change()
    {
//        echo '<pre>';print_r($this->input->post(NULL, TRUE));die();
        $log = Logger::getLogger(__CLASS__);
        $oldpassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');
        $confirmpass = $this->input->post('confirmpass');
        $adminemail = $this->input->post('adminemail');
        $adminname = $this->input->post('adminname');

        if ($newpassword != $confirmpass)
        {
            $this->session->set_flashdata('message', 'New password and Confirm password must be same.');
            redirect('changepassword', 'refresh');
        }

        if ($this->common->check_unique_avalibility_where('admin', 'adminpassword', md5($oldpassword)))
        {
            if ($newpassword != '')
            {
                $data = array(
                    'adminpassword' => md5($newpassword),
                    'adminemail' => $adminemail,
                    'adminname' => $adminname,
                );
            }
            else
            {
                $data = array(
                    'adminemail' => $adminemail,
                    'adminname' => $adminname
                );
            }

            if ($this->common->update_data($data, 'admin', 'adminid', 1))
            {

                $sess_array = array(
                    'id' => 0,
                    'adminid' => 1,
                    'adminname' => $adminname,
                    'username' => $adminemail,
                    'type' => 'admin',
                );
                $this->session->set_userdata('napoleon_admin', $sess_array);

                $this->session->set_flashdata('success', 'Profile details updated successfully.');
                redirect('dashboard', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again');
                redirect('changepassword', 'refresh');
            }
        }
        else
        {
            $log->warn("Error while updating record.");
            $this->session->set_flashdata('message', 'Old password is not match. Try Again.');
            redirect('changepassword', 'refresh');
        }
    }



}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */

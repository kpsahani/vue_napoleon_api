<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller {

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
// Your own constructor code
        if (!$this->session->userdata('napoleon_admin'))
        {
//If no session, redirect to login page
            redirect('adminlogin', 'refresh');
        }
        include('include.php');

//Setting Page Title and Comman Variable
        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Setting';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);

//Load leftsidemenu and save in variable

        $this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        $this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
//Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);
        $this->load->model('common');
    }

    public function index()
    {
        $this->data['settings'] = $this->common->get_all_record('setting');
        $this->data['total'] = $this->common->get_count_of_table('setting');
//Loading View File
        $this->load->view('setting/index', $this->data);
    }

    public function view($settingid = NULL)
    {

        if ($settingid == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('setting', 'refresh');
        }
        else
        {
            $this->data['settings'] = $this->common->select_database_id('setting', 'settingid', (int) $settingid, '*');
            //Loading View File
            $this->load->view('setting/view', $this->data);
        }
    }

    public function edit($settingid)
    {
        if (!$settingid)
        {
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('setting', 'refresh');
        }

        $this->data['settings'] = $this->common->get_setting_byid($settingid);
        if (count($this->data['settings']) > 0)
        {
            $this->load->view('setting/edit', $this->data);
        }
        else
        {
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('setting', 'refresh');
        }
        // echo "<pre>";print_r($this->data['settings']); die(); 
//Loading View File
    }

//Updating the record
    public function update()
    {
        if ($this->input->post('settingid'))
        {

            $settingid = base64_decode($this->input->post('settingid'));
            $settingname = $this->input->post('settingname');
            $home_image = '';
            $data = array();
            
            $data = array(
                'settingvalue' => $this->input->post('settingvalue')
            );
            
//            echo "<pre>";print_r($data);die();
            if ($this->common->update_data($data, 'setting', 'settingid', (int) $settingid))
            {
                $this->session->set_flashdata('success', $settingname . ' updated successfully.');
                redirect('setting', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', $settingname . ' not updated successfully.');
                redirect('setting', 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('setting', 'refresh');
        }
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */

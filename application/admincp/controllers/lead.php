<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Lead extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
	
		if (!$this->session->userdata('napoleon_admin'))
        {
			//If no session, redirect to login user
            redirect('adminlogin', 'refresh');
        }
        include('include.php');
		//Setting Page Title and Comman Variable
        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Lead';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);

		//Load leftsidemenu and save in variable

        $this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        $this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
		//Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);

        // $this->data['abc'] = $this->load->view('footer', $this->data, true);

        $this->load->library('upload');
        $this->load->model('common');
	}
	function index()
	{  
		$this->data['lead'] = $this->common->get_data_all('lead');
        $this->data['total'] = count($this->data['lead']);
        $this->load->view('lead/index', $this->data);
	}

	
	
	function deletedata($id = NULL)
	{
       
		$log = Logger::getLogger(__CLASS__);
        if ($id == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('lead', 'refresh');
        }
        else
        {
            if ($this->common->delete_data('lead', 'id', $id))
            {
                $this->session->set_flashdata('success', 'Lead deleted successfully.');
                redirect('lead', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                redirect('lead', 'refresh');
            }
        }
	}

	
    public function viewmodal($mode, $type_user_active, $id)
    {
        $data['type_status'] = $type_user_active;
        $data['mode'] = $mode;
        $data['id'] = $id;

        echo $this->load->view('lead/modal', $data, true);
    }

    public function multipleEvent()
    {
        $log = Logger::getLogger(__CLASS__);
        if ($this->input->post('event') == 'Enable')
        {
            $enableId = $this->input->post('check');
            if ($enableId != '' && $enableId != 0)
            {
                for ($i = 0; $i < count($enableId); $i++)
                {
                    $allId[] = $enableId[$i];
                }
                if ($this->common->multipleEvent($allId, $value = "Enable", 'user_id', 'user'))
                {
                    $this->session->set_flashdata('success', 'User user_active changed to enabled.');
                    if ($_SERVER['HTTP_REFERER'])
                    {
                        redirect($_SERVER['HTTP_REFERER'], 'refresh');
                    }
                    else
                    {
                        redirect('user', 'refresh');
                    }
                }
                else
                {
                    $log->warn("Error while updating record.");
                    $this->session->set_flashdata('error', 'There is error in updating user status. Try later');
                    redirect('user', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Select any item to Enable. Try later!');
                redirect('user', 'refresh');
            }
        }
        if ($this->input->post('event') == 'Disable')
        {
//check permission
// disable multiple item
            $disableId = $this->input->post('check');
            if ($disableId != '' && $disableId != 0)
            {
                for ($i = 0; $i < count($disableId); $i++)
                {
                    $allId[] = $disableId[$i];
                }

                if ($this->common->multipleEvent($allId, $value = "Disable", 'user_id', 'user'))
                {
                    $this->session->set_flashdata('success', 'User user_active changed to disabled.');
                    if ($_SERVER['HTTP_REFERER'])
                    {
                        redirect($_SERVER['HTTP_REFERER'], 'refresh');
                    }
                    else
                    {
                        redirect('user', 'refresh');
                    }
                }
                else
                {
                    $log->warn("Error while updating record.");
                    $this->session->set_flashdata('error', 'There is error in updating user status. Try later');
                    redirect('user', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Select any item to Disable. Try later!');
                redirect('user', 'refresh');
            }
        }
        if ($this->input->post('event') == 'Delete')
        {

            $deleteId = $this->input->post('check');
            if ($deleteId != '' && $deleteId != 0)
            {
                for ($i = 0; $i < count($deleteId); $i++)
                {
                    $allId[] = $deleteId[$i];
                }
                if ($this->common->multipleEvent($allId, $value = "Delete", 'user_id', 'user'))
                {
                    $this->session->set_flashdata('success', 'User deleted successfully.');
                    if ($_SERVER['HTTP_REFERER'])
                    {
                        redirect($_SERVER['HTTP_REFERER'], 'refresh');
                    }
                    else
                    {
                        redirect('user', 'refresh');
                    }
                }
                else
                {
                    $log->warn("Error while updating record.");
                    $this->session->set_flashdata('error', 'There is error in deleting user. Try later');
                    redirect('user', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'Select any item to Delete. Try later!');
                redirect('user', 'refresh');
            }
        }
    }

}
?>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stage extends CI_Controller {

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
    public
            $data;

    public
            function __construct()
    {
        parent::__construct();
// Your own constructor code
        if (!$this->session->userdata('napoleon_admin'))
        {
//If no session, redirect to login user
            redirect('adminlogin', 'refresh');
        }
        include('include.php');
//Setting Page Title and Comman Variable
        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Stage';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);

//Load leftsidemenu and save in variable

        $this->data['topmenu'] = $this->load->view('topmenu', $this->data, true);
        $this->data['leftmenu'] = $this->load->view('leftmenu', $this->data, true);
//Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);

        $this->load->library('upload');
        $this->load->model('common');
    }

    public
            function index()
    {
        $this->data['stages'] = $this->common->get_data_all('stage');
//        print_r($this->data['stages'] );die;
        $this->data['total'] = count($this->data['stages']);
        $this->load->view('stage/index',$this->data);
    }

    public
            function add()
    {
        $this->load->view('stage/add', $this->data);
    }

    public
            function addstage()
    {
        
        $log = Logger::getLogger(__CLASS__);
        $logoimg = '';

        if (isset($_FILES['stage_image']['name']) && $_FILES['stage_image']['name'] != null)
        {
            $config['upload_path'] = $this->config->item('stage_image');
            $config['allowed_types'] = 'jpeg|png|jpg';
            $config['file_name'] = str_replace(' ', '_') . '_PRO_' . time();
            $this->upload->initialize($config);

            if ($this->upload->do_upload('stage_image'))
            {

                $upload_data = $this->upload->data();
                $logoimg = $upload_data['file_name'];
            }
            else
            {
                $log->warn("Error while uploading image.");
                $this->session->set_flashdata('message', 'Error while uploading image.');
                $this->add();
            }
        }
        // $dob = date('Y-m-d', strtotime($this->input->post('dob')));
        $stage_title = $this->input->post('stage_title');
        $stage_id = $this->input->post('stage_id');
        $stage_desc = $this->input->post('stage_desc');
        $character_id = $this->input->post('character_id');

        $data = array(
            'stage_title' => $stage_title,
            'stage_id' => $stage_id,
            'stage_desc' => $stage_desc,
            'character_id' => $character_id,
            'stage_image' => $logoimg,
            'createddate' => date('Y-m-d h:i:s'),
        );


        if ($this->common->insert_data($data, 'stage'))
        {
           
            $this->session->set_flashdata('success', 'Stage inserted successfully.');
            redirect('stage', 'refresh');
        }
        else
        {
            $log->warn("Error while inserting record.");
            $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
            redirect('stage', 'refresh');
        }
    }

    public function edit($stageid = NULL)
    {
        $log = Logger::getLogger(__CLASS__);
        if ($stageid == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('stage', 'refresh');
        }
        else
        {
            $stageid = base64_decode($stageid);
            $this->data['stages'] = $this->common->select_database_id('stage', 'id', (int) $stageid, '*');
//            echo "<pre>";print_r($this->data['stages']);die;
            $this->load->view('stage/edit', $this->data);
        }
    }

//Updating the record
    public function update()
    {
        $log = Logger::getLogger(__CLASS__);
        if ($this->input->post('id'))
        {
            $stageid = base64_decode($this->input->post('id'));
            $logoimg = $this->input->post('old_stage_image');
            if (isset($_FILES['stage_image']['name']) && $_FILES['stage_image']['name'] != null)
            {
                $config['upload_path'] = $this->config->item('stage_image');
                $config['allowed_types'] = 'jpeg|png|jpg';
                $config['file_name'] = str_replace(' ', '_', $this->input->post('stage_title')) . '_PRO_' . time();
                $this->upload->initialize($config);

                if ($this->upload->do_upload('stage_image'))
                {

                    $upload_data = $this->upload->data();
                    $logoimg = $upload_data['file_name'];
                }
                else
                {
                    $log->warn("Error while uploading image.");
                    $this->session->set_flashdata('message', 'Error while uploading image.');
                    $this->edit($stageid);
                }
            }

            $stage_title = $this->input->post('stage_title');
            $stage_id = $this->input->post('stage_id');
            $stage_desc = $this->input->post('stage_desc');
            $character_id = $this->input->post('character_id');

            $data = array(
                'stage_title' => $stage_title,
                'stage_id' => $stage_id,
                'stage_desc' => $stage_desc,
                'character_id' => $character_id,
                'stage_image' => $logoimg,
                'modifieddate' => date('Y-m-d h:i:s'),
            );

            if ($this->common->update_data($data, 'stage', 'id', (int) $stageid))
            {
                $this->session->set_flashdata('success', 'Stage updated successfully.');
                redirect('stage', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                redirect('stage', 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('stage', 'refresh');
        }
    }

  

    public
            function viewmodal($mode, $type_stage_active, $id)
    {
        $data['type_status'] = $type_stage_active;
        $data['mode'] = $mode;
        $data['id'] = $id;
        
        echo $this->load->view('stage/modal', $data, true);
    }
    
     public function delete($stageid = NULL)
    {
       
        $log = Logger::getLogger(__CLASS__);
        if ($stageid == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('stage', 'refresh');
        }
        else
        {
            if ($this->common->delete_data('stage', 'id', $stageid))
            {
                $this->session->set_flashdata('success', 'Stage deleted successfully.');
                redirect('stage', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                redirect('stage', 'refresh');
            }
        }
    }

    public
            function changestatus()
    {

        $user_id = $this->input->post('user_id');
        $user_active = $this->input->post('user_active');
        $user_active_msg = $this->input->post('status_msg');

        // print_r($this->input->post(NULL,TRUE));die();
        if (isset($this->session->userdata['napoleon_admin']))
        {
            if (!$user_id)
            {
                $log->error("Try to use invalid id.");
                $this->session->set_flashdata('message', 'Specified id not found.');
                redirect('user', 'refresh');
            }
            if ($this->common->update_data(array('user_active' => $user_active), 'user', 'user_id', (int) $user_id))
            {

//                $userdata = $this->common->select_database_id('user', 'user_id', (int) $user_id, '*');
                //$app_name_setting = $this->common->select_database_id('setting','AppSettingID',1);
//                    $app_name = $this->common->get_setting_value(1);
//                    $app_mail = $this->common->get_setting_value(6);
//                    $this->load->library('email');
//                    //Loading E-mail config file
//                    $this->config->load('email', TRUE);
//                    $this->cnfemail = $this->config->item('email');
//                    $this->email->initialize($this->cnfemail);
//                    $this->email->from($app_mail, $app_name);
//                    $this->email->to($userdata[0]['email']);
//                    if($user_active =="Disable"){
//                    $this->email->subject('rest : User Disable');
//                    }
//                    else
//                    {
//                        $this->email->subject('rest : User Enable');
//                    }
//                    $mail_body = "<p>Hello&nbsp; " . $userdata[0]['name'] . ",</p>
//                                       
//                                        <table>
//                                        <tbody>
//                                        <tr>
//                                        <td> Email</td>
//                                        <td>&nbsp;:&nbsp;</td>
//                                        <td>" . $userdata[0]['email'] . "</td>
//                                        </tr>
//                                        
//                                        <tr>
//                                        <td> Message</td>
//                                        <td>&nbsp;:&nbsp;</td>
//                                        <td>" . $user_active_msg . ".</td>
//                                        </tr>
//                                        
//                                        </tbody>
//                                        </table>
//                                        <p>
//                                        <span>If you have any question or trouble, please contact an app administrator.</span></p>
//                                        <p>&nbsp;</p>
//                                        <p>Regards,<br/>
//                                        " . $app_name . " Team.</p>";
//
////echo $mail_body;die();
//                    $this->email->message($mail_body);
//                    
//                    $this->email->send();


                $this->session->set_flashdata('success', 'User status changed to ' . $user_active . '.');
                redirect('user', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'There is error in updating user status.Try later!');
                redirect('user', 'refresh');
            }
        }
    }

    public
            function email_exist($user_id = NULL)
    {
//        print_r($this->input->post(NULL,TRUE));die();

        $usermail = $this->input->post('useremail');

        if ($usermail != '')
        {

            if ($user_id == NULL)
            {
                if ($this->common->check_unique_avalibility('user', 'user_email', $usermail, 'user_active', 'Deleted'))
                {
                    $response = array('valid' => false, 'message' => 'Email already exist.');
                    echo json_encode($response);
                    die();
                }
                else
                {
                    $response = array('valid' => true);
                    echo json_encode($response);
                    die();
                }
            }
            else
            {
                if ($this->common->check_unique_avalibility('user', 'email', $usermail, 'user_id', (int) base64_decode($user_id), array('user_active !=' => 'Deleted')))
                {
                    $response = array('valid' => false, 'message' => 'Email already exist.');
                    echo json_encode($response);
                    die();
                }
                else
                {
                    $response = array('valid' => true);
                    echo json_encode($response);
                    die();
                }
            }
        }
        else
        {
            $response = array('valid' => false, 'message' => 'Enter valid email.');
            echo json_encode($response);
            die();
        }

        // 
        if (isset($this->session->userdata['napoleon_admin']))
        {
            if (!$user_id)
            {
                redirect('user', 'refresh');
            }
            if ($this->common->update_data(array('user_active' => $user_active), 'users', 'user_id', (int) $user_id))
            {
                $this->session->set_flashdata('success', 'User user_active changed to ' . $user_active . '.');
                redirect('user', 'refresh');
            }
            else
            {
                $this->session->set_flashdata('message', 'There is error in updating user user_active.Try later!');
                redirect('user', 'refresh');
            }
        }
    }

    public
            function multipleEvent()
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

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */

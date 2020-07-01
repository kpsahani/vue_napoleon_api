<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();

class Emailformat extends CI_Controller {

    public $paging;
    public $data;

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('napoleon_admin'))
        {
            //If no session, redirect to login page
            redirect('adminlogin', 'refresh');
        }
        include('include.php');
        $this->load->model('emailformats');

        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Email Template';
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

    //load category listing view
    public function index()
    {
        $this->data['emailformat'] = $this->emailformats->getAllMails();
        $this->data['total'] = count($this->data['emailformat']);
        $this->load->view('emailformat/index', $this->data);
    }

    //load edit email format view
    public function edit($emailformatid = '')
    {
        $log = Logger::getLogger(__CLASS__);
        if ($emailformatid != '' && $emailformatid != 0)
        {

            $this->data['emailformat'] = $this->emailformats->get_emailformat_byid($emailformatid);
//            echo '<pre>'; print_r($this->data['emailformat']); die();
            if (count($this->data['emailformat']) > 0)
            {
                $this->load->helper('ckeditor');
                $this->data['ckeditor'] = array(
                    //ID of the textarea that will be replaced
                    'id' => 'mailformat',
                    'path' => '../ckeditor',
                    //Optionnal values
                    'config' => array(
                        'toolbar' => "Full", //Using the Full toolbar
                        'width' => "auto", //a custom width
                        'height' => "300px", //a custom height
                    ),
                );

                //Loading View File
                $this->load->view('emailformat/edit', $this->data);
            }
            else
            {
                $log->error("Try to use invalid id.");
                $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
                redirect('emailformat', 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
            redirect('emailformat', 'refresh');
        }
    }

    //Updating the Record
    public function update()
    {
        $log = Logger::getLogger(__CLASS__);
        //If Old Record Update
        if ($this->input->post('emailid'))
        {
            //Getting emailformatid
            $emailformatid = base64_decode($this->input->post('emailid'));

            //Getting value
            $title = ($this->input->post('title'));
            $subject = ($this->input->post('subject'));
            $mailformat = $this->input->post('mailformat');
//            echo $emailformatid.'/'.$title.'/'.$subject.'/'.$mailformat; die();
            if ($mailformat != '')
            {
                //Updating Record
                if ($this->emailformats->update($emailformatid, $title, $subject, $mailformat))
                {
                    $this->session->set_flashdata('success', 'Email Template updated successfully.');
                    redirect('emailformat', 'refresh');
                }
                else
                {
                    $log->warn("Error while updating record.");
                    $this->session->set_flashdata('message', 'There is error in updating Email Template. Try later!');
                    redirect('emailformat', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('message', 'Email Template must not be empty.');
                redirect('emailformat/edit/' . $emailformatid, 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
            redirect('emailformat', 'refresh');
        }
    }

}

?>
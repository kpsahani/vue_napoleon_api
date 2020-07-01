<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
ob_start();

class Page extends CI_Controller {

    public $paging;
    public $data;

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('napoleon_admin'))
        {
            //If no session, redirect to login 
            redirect('adminlogin', 'refresh');
        }
        include('include.php');
        $this->load->model('pages');
        $this->data['title'] = 'Administrator Dashboard';
        $this->data['section_title'] = 'Page';
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
        $this->data['page'] = $this->pages->getAllMails();
        $this->data['total'] = count($this->data['page']);
        $this->load->view('page/index', $this->data);
    }

    //load edit email format view
    public function edit($pageid = '')
    {
        $log = Logger::getLogger(__CLASS__);
        if ($pageid != '' && $pageid != 0)
        {
            $this->data['page'] = $this->pages->get_page_byid($pageid);
            if (count($this->data['page']) > 0)
            {
                $this->load->helper('ckeditor');
                $this->data['ckeditor'] = array(
                    //ID of the textarea that will be replaced
                    'id' => 'page',
                    'path' => '../ckeditor',
                    //Optionnal values
                    'config' => array(
                        'toolbar' => "Full", //Using the Full toolbar
                        'width' => "auto", //a custom width
                        'height' => "300px", //a custom height
                    ),
                );

                //Loading View File
                $this->load->view('page/edit', $this->data);
            }
            else
            {
                $log->error("Try to use invalid id.");
                $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
                redirect('page', 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
            redirect('page', 'refresh');
        }
    }

    //Updating the Record
    public function update()
    {
        $log = Logger::getLogger(__CLASS__);
        //If Old Record Update
        if ($this->input->post('pageid'))
        {
            //Getting pageid
            $pageid = base64_decode($this->input->post('pageid'));

            //Getting value
            $title = ($this->input->post('title'));

            $content = $this->input->post('content');
//            echo $pageid.'/'.$title.'/'.$subject.'/'.$content; die();
            if ($content != '')
            {
                //Updating Record
                if ($this->pages->update($pageid, $title, $content))
                {
                    $this->session->set_flashdata('success', 'Page updated successfully.');
                    redirect('page', 'refresh');
                }
                else
                {
                    $log->warn("Error while updating record.");
                    $this->session->set_flashdata('message', 'There is error in updating Page. Try later!');
                    redirect('page', 'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('message', 'Page must not be empty.');
                redirect('page/edit/' . $pageid, 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Record not found with specified id. Try later!');
            redirect('page', 'refresh');
        }
    }

}

?>
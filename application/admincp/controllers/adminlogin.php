<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public $data;

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        if ($this->session->userdata('napoleon_admin')) {

            //If no session, redirect to login page
            //echo site_url();die();
            redirect('dashboard', 'refresh');
        }
        //Setting Page Title and Comman Variable
        $this->data['title'] = 'Administrator Log-in';
        $this->data['section_title'] = 'Administrator Log-in';
        $this->data['site_name'] = $this->settings->get_setting_value(1);
        $this->data['site_url'] = $this->settings->get_setting_value(2);

        //Load leftsidemenu and save in variable
        $this->data['topmenu'] = '';

        //Load header and save in variable
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);
    }
    

    public function index() {
        // LOAD LIBRARIES
        $this->load->library(array('encrypt', 'form_validation', 'session'));
        // LOAD HELPERS
        $this->load->helper('form');//1

        // SET VALIDATION RULES-2
        $this->form_validation->set_rules('user_name', 'username', 'required');
        $this->form_validation->set_rules('user_pass', 'password', 'required');
        $this->form_validation->set_error_delimiters('<em>', '</em>');
        // has the form been submitted and with valid form info (not empty values)

        if ($this->form_validation->run()) {
            $user_name = $this->input->post('user_name');
            $user_pass = $this->input->post('user_pass');

            //Loads Adminlogin Model file
            $this->load->model('login');
            //query the database
            $result = $this->login->logincheck($user_name, $user_pass);
            
            if ($result) {
                //$sess_array = array(); 
                foreach ($result as $key => $val) {
                    $sess_array[$key] = $val;
                }
                // echo '<pre>';
                // print_r($sess_array);die();
                $this->session->set_userdata('napoleon_admin', $sess_array);

                // user has been logged in
                redirect('dashboard', 'refresh');
            } else {
                $this->session->set_flashdata('message', 'Invalid username or password');
                redirect('adminlogin', 'refresh');
            }
        } else {
            //echo "view";die();
           $this->load->view('adminlogin', $this->data);
        }


        //Loads the Admin Login view
        
    }
    
     public function forgotpassword(){ 
        $this->load->model('common');
       $admin_email=$this->common->select_database_id('admin','adminid','1','adminemail,adminpassword');
// echo '<pre>'; print_r($admin_email); die;
        $app_name = $this->common->get_setting_value(1);
        $site_url = $this->common->get_setting_value(2);
        $app_mail = $this->common->get_setting_value(6);
//echo $app_mail;die;
        //new password
        $new_password=rand(1000,999999);

        //update password in database
        $pass_data=array('adminpassword'=> md5($new_password));
        $admin_n = $admin_email[0]['adminemail'];
        $pass_result=$this->common->update_data($pass_data,'admin','adminemail',$admin_n);
        // echo'<pre>';
        // print_r($pass_result);die;
        if(!$pass_result){

            $this->session->set_flashdata('error','Error Occurred. Try Again.');
            redirect(site_url().'adminlogin','refresh');
        }

//                    echo $new_password;die();
        $subject = ("rest : Recovery Password");


        $mail_body = "Username is : ".$admin_n."<br> Password is :".$new_password;
        //Sending mail to admin
//        $this->email->send();
        // echo '<pre>';
        // print_r($admin_n);die;
        $this->sendEmail($app_name,  $admin_n, $subject, $mail_body);
        

        $this->session->set_flashdata('success', 'A new password has been emailed to you!.');
        redirect('adminlogin', 'refresh'); 
    }
    
    
    function sendEmail($app_name='',$to_email='',$subject='',$mail_body='')
    {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => "admin@gmail.com", 
            'smtp_pass' => "Aspl@123", // change it to yours
            'mailtype'  => 'html', 
            'charset'   => 'utf8'
        );

        $this->load->library('email',$config);

        $this->email->set_newline("\r\n");
        $this->email->set_crlf( "\r\n" );

       // Sender email address
        $this->email->from('kpsahani8@gmail.com', 'kp sahani');
        // Receiver email address
        $this->email->to($to_email);
        // Subject of email
        $this->email->subject($subject);
        // Message in email
        $this->email->message($mail_body);


       

        if (!$this->email->send()) {
            show_error($this->email->print_debugger()); }
          else {
            echo 'Your e-mail has been sent!';
          }
        die;
        //return;
    }

    function sendEmail_old($app_name='',$app_email='',$to_email='',$subject='',$mail_body='')
    {
        $this->config->load('email', TRUE);
        $this->cnfemail = $this->config->item('email');

        //Loading E-mail Class
        $this->load->library('email');
        $this->email->initialize($this->cnfemail);
        
        $this->email->from('kundan.sahani@ashapurasoftech.com','kpsahani');
        
        $this->email->to($to_email);
        
        $this->email->subject($subject);
        
        

                    
        $this->email->message("<table border='0' cellpadding='0' cellspacing='0'><tr><td></td></tr><tr><td>" . $mail_body . "</td></tr></table>");
        $this->email->send();
        return;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
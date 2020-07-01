<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

header('Content-Type:application/json');

class Webservice extends CI_Controller {

    private $data;

    //constructor
    public function __construct() {
        parent::__construct();

        $this->load->library('upload');
        $this->load->model('webservice_model');
        $this->load->model('settings');
        $this->load->model('common');
    }

    //defult redirection   
    public function index() {
        $this->data['status'] = FALSE;
        $this->data['msg'] = 'Something went wrong. Please try again.';
        echo json_encode($this->data);
        die();
    }

    public function stage() {
        $stage_data = $this->webservice_model->getStages();

        if (count($stage_data) > 0) {
            $this->data['data'] = $stage_data;
            $this->data["status"] = TRUE;
            $this->data["msg"] = "Success";
        }
        else {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        echo json_encode($this->data);
        die();
    }

    public function combination($stage_id = '') {
        $combination_data = $this->webservice_model->getAllCombinations($stage_id);
//        echo "<pre>";print_r($combination_data );die;

        if (count($combination_data) > 0) {
            $this->data['data'] = $combination_data;
            $this->data["status"] = TRUE;
            $this->data["msg"] = "Success";
        }
        else {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        echo json_encode($this->data);
        die();
    }

    public function pages($page_id = '') {
        if ($page_id != '') {
            $mail = $this->common->get_email_byid($page_id);
            if (count($mail) > 0) {
                $mailformat = $mail[0]['mailformat'];
                $this->data['data'] = $mailformat;
                $this->data["status"] = TRUE;
                $this->data["msg"] = "Success";
            }
            else {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'No data availabe';
            }
        }
        else {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }

        echo json_encode($this->data);
        die();
    }

    public function savePortrait() {
        $email = $this->input->post('email');
        $startDateTime = $this->input->post('start_datetime');
        $endDateTime = $this->input->post('end_datetime');
        $map_id = $this->input->post('map_id');
        $portraitimg = '';
        if ((isset($_FILES['portrait_image']['name'])) && ($_FILES['portrait_image']['name'] != null)) {
            $config['upload_path'] = $this->config->item('portrait_image');
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['file_name'] = 'Portrait_PRO_' . time();
            $this->upload->initialize($config);

            if ($this->upload->do_upload('portrait_image')) {
                $upload_data = $this->upload->data();
                //print_r($upload_data);die();
                $portraitimg = $upload_data['file_name'];
            }
            else {
                $this->data['error'] = array('error' => $this->upload->display_errors());
            }
        }
        $date = Date('Y-m-d H:i:s');
        $portrait_data = array(
            'email_id' => $email,
            'image_path' => $portraitimg,
            'map_id' => $map_id,
            'start_datetime' => $startDateTime,
            'end_datetime' => $endDateTime,
            'createddate' => $date
        );

        $result = $this->common->insert_data($portrait_data, 'portrait');
        if ($result == 1) {
            $admin_email = $this->common->select_database_id('admin', 'adminid', '1', 'adminemail,adminpassword');
            $app_name = $this->common->get_setting_value(1);
            $site_url = $this->common->get_setting_value(2);
            $app_mail = $this->common->get_setting_value(6);

            $mail = $this->common->get_email_byid(1);
            $mailformat = $mail[0]['mailformat'];
            $subject = $mail[0]['subject'];
            $mail_body = str_replace("%email%", $email, str_replace("%appname%", $app_name, ($mailformat)));

            $file_name = base_url() . $this->config->item('portrait_image') . $portraitimg;
            $this->sendEmail($app_name = '', $app_mail = '', $email = '', $subject = '', $mail_body = '', $file_name);
            $this->data["status"] = TRUE;
            $this->data["msg"] = "Success";
        }
        else {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'Something went wrong.Please try again';
        }
        echo json_encode($this->data);
        die();
    }

    function sendEmail($app_name = '', $app_email = '', $to_email = '', $subject = '', $mail_body = '', $file_name = '') {
        $this->config->load('email', TRUE);
        $this->cnfemail = $this->config->item('email');

        //Loading E-mail Class
        $this->load->library('email');
        $this->email->initialize($this->cnfemail);

        $this->email->from($app_email, $app_name);

        $this->email->to($to_email);

        $this->email->subject($subject);
        if ($file_name != '') {
            $this->email->attach("$file_name");
        }
        $this->email->message("<table border='0' cellpadding='0' cellspacing='0'><tr><td></td></tr><tr><td>" . $mail_body . "</td></tr></table>");
        $this->email->send();
        return;
    }


    // Testing API


    function user_view()
    {       
         
        //$ids = $this->input->post('id');
       //token put in postman api in header section 
         $headers = apache_request_headers();
       
        if(isset($headers['token'])){
            
            $token=$headers['token'];

            $database=$this->common->select_database_id('user','token',$token);
            //echo $this->db->last_query();die;
            //print_r($database);die;
            if(count($database) > 0){

                // $result=$this->common->get_data_all('user');
                $result=$this->common->get_data_all('user');

                if(count($result) > 0){
                    $this->data['data'] = $result;
                    $this->data["status"] = TRUE;
                    $this->data["msg"] = "Success";
                }
                else{
                    $this->data['status'] = FALSE;
                    $this->data['msg'] = 'No data availabe';
                }
                echo json_encode($this->data); die;
            }
            else{

                $this->data['status'] = FALSE;
                $this->data['msg'] = 'failed authentication';
            }
            echo json_encode($this->data); die;    
        }
        else
        {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'failed token';
        }
        echo json_encode($this->data); die;
    }

    function user_insert(){
        

          $useremail=$this->input->post('useremail');
        
        //  print_r($_POST);die;
        //$adminemail="kpsahani8@gmail.com";
        // print_r($adminemail);die;
        $email=$this->common->check_unique_avalibility_where('user','v_email',$useremail); 
        // echo $this->db->last_query();die;
        // print_r($email);die;
        if(count($email) > 0){

            $this->data['status'] = FALSE;
            $this->data['msg'] = 'email already exists';
        }
        
        else{
                    $v_firstname = $this->input->post('v_firstname');
                    $v_lastname = $this->input->post('v_lastname');
                    $v_email = $this->input->post('v_email');
                    $i_mobile = $this->input->post('i_mobile');
                    $e_gender = $this->input->post('e_gender');
                    $v_class = $this->input->post('v_class');
                    $v_hobby = $this->input->post('v_hobby');
                    $adminemail=$this->input->post('useremail');
                    $adminpassword=$this->input->post('adminpassword');
                    $user_image='';

                    if (isset($_FILES['user_image']['name']) && $_FILES['user_image']['name'] != null)
                    {
                        $config['upload_path'] = $this->config->item('user_image');
                        $config['allowed_types'] = 'jpeg|png|jpg';
                        $config['file_name'] = str_replace(' ', '_', $this->input->post('user_title')) . '_PRO_' . time();
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('user_image'))
                        {

                            $upload_data = $this->upload->data();
                            $user_image = $upload_data['file_name'];
                        }
                        else
                        {
                            $this->data['error'] = array('error' => $this->upload->display_errors());
                        }
                    }

                    $testing_data = array(
                        'v_firstname' =>$v_firstname ,
                        'v_lastname'=>$v_lastname,
                        'v_email'=>$v_email,
                        'i_mobile'=>$i_mobile,
                        'e_gender'=>$e_gender,
                        'v_class'=>$v_class,
                        'v_hobby'=>$v_hobby,
                        'user_image'=>$user_image,
                        'adminemail'=>$adminemail,
                        'adminpassword'=>md5($adminpassword),

                    );

                    // print_r($testing_data);die();
                    $insert=$this->common->insert_data($testing_data, 'user');
                    
                    if($insert == 1){
                        $this->data['data'] = $insert;
                        $this->data["status"] = TRUE;
                        $this->data["msg"] = "Success";

                    }
                    else{
                        
                        $this->data['status'] = FALSE;
                        $this->data['msg'] = 'No data availabe';
                    }
                    echo json_encode($this->data); die;
                }
               
        
        echo json_encode($this->data); die;
    }

    function user_delete(){

        $headers = apache_request_headers();

        if(isset($headers['token'])){
            
            $token=$headers['token'];

            $database=$this->common->select_database_id('user','token',$token);
            
            if(count($database) > 0){

                $id = $this->input->post('id');
                $result=$this->common->delete_data('user', 'id', $id);
                
                if($result == 1){

                    $this->data['data'] = $result;
                    $this->data["status"] = TRUE;
                    $this->data["msg"] = "Success";
                }
                else{

                    $this->data['status'] = FALSE;
                    $this->data['msg'] = 'No data availabe';
                }
                echo json_encode($this->data); die;
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'failed authentication';
            }
            echo json_encode($this->data); die;
        }
        else
        {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        echo json_encode($this->data); die;
    }

    function user_update(){

        
            $ids = $this->input->post('id');
        if(isset($ids)){
            $database=$this->common->select_database_id('user','id',$ids);
            
            if(count($database) > 0){

                $v_firstname = $this->input->post('v_firstname');
                $v_lastname = $this->input->post('v_lastname');
                $v_email = $this->input->post('v_email');
                $i_mobile = $this->input->post('i_mobile');
                $e_gender = $this->input->post('e_gender');
                $v_class = $this->input->post('v_class');
                $v_hobby = $this->input->post('v_hobby');
                $user_image='';

                if ($this->input->post('id'))
                {
                    $id = $this->input->post('id');
                    $logoimg = $this->input->post('old_user_image');

                    if (isset($_FILES['user_image']['name']) && $_FILES['user_image']['name'] != null)
                    {
                        $config['upload_path'] = $this->config->item('user_image');
                        $config['allowed_types'] = 'jpeg|png|jpg';
                        $config['file_name'] = str_replace(' ', '_', $this->input->post('user_title')) . '_PRO_' . time();
                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('user_image'))
                        {

                            $upload_data = $this->upload->data();
                            $user_image = $upload_data['file_name'];
                        }
                        else
                        {

                            $this->data['error'] = array('error' => $this->upload->display_errors());
                        
                        }
                    }
                
                    $testing_data = array(
                        'v_firstname' =>$v_firstname ,
                        'v_lastname'=>$v_lastname,
                        'v_email'=>$v_email,
                        'i_mobile'=>$i_mobile,
                        'e_gender'=>$e_gender,
                        'v_class'=>$v_class,
                        'v_hobby'=>$v_hobby,
                        'user_image'=>$user_image
                    );
                    
                    $update=$this->common->update_data($testing_data, 'user', 'id', (int) $id);
                    
                    if($update == 1)
                    {
                        $this->data['data'] = $update;
                        $this->data["status"] = TRUE;
                        $this->data["msg"] = "Success";
                    }
                    else
                    {
                        $this->data['status'] = FALSE;
                        $this->data['msg'] = 'No data availabe';
                    }
                    echo json_encode($this->data); die;
                }
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'failed authentication';
            }
            echo json_encode($this->data); die;
        }
        else
        {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        echo json_encode($this->data); die;
    }

    function login(){

        $user =$this->input->post('user');
        echo'<pre>';
        print_r($user); die;
        
        $this->load->library(array('encrypt', 'form_validation', 'session'));
        // LOAD HELPERS
        $this->load->helper('form');
        //SET VALIDATION RULES
        $this->form_validation->set_rules('user_name', 'username', 'required');
        $this->form_validation->set_rules('user_pass', 'password', 'required');
        $this->form_validation->set_error_delimiters('<em>', '</em>');
        //has the form been submitted and with valid form info (not empty values)
        if ($this->form_validation->run()){
        $user_name = $this->input->post('user_name');
        $user_pass = $this->input->post('user_pass');
            // print_r($user_name);die;

            
        if($user_name == '' || $user_pass == ''){
            
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        else
        {     
            $this->load->model('login');
            //query the database
            $result = $this->login->logincheck($user_name, $user_pass);
            // print_r($result);
            // die;
            if($result)
            {         
                $token = md5(uniqid(mt_rand(), true));
                    
                $token_data =array(
                    'token' =>$token,
                );

                $this->common->update_data($token_data,'user','adminemail',$user_name,'adminpassword',$user_pass);
                    
                $this->data["status"] = TRUE;
                $this->data["msg"] = "Success";
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'No data availabe';
            } 
        }
        echo json_encode($this->data); die;
    }
    }


    function logout(){
        
        $this->load->library(array('encrypt', 'form_validation', 'session'));
        $this->load->helper('form');
        $this->load->model('login');

        $token = $this->input->post('token');
   
        $data= array('token' =>'' );

        $update=$this->common->update_data($data,'user','token',$token);
        
        if($update == 1){
            
            $this->data['data'] = $update;
            $this->data["status"] = TRUE;
            $this->data["msg"] = "Success";

        }
        else{
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'No data availabe';
        }
        echo json_encode($this->data); die;
    }

    }
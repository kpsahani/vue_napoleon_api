<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
// header('Access-Control-Allow-Headers: Authorization');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

// header('Content-Type:multipart/form-data');
// header('Content-Type:application/json');
// header('Content-Type:application/x-www-form-urlencoded');



class Newapi extends CI_Controller {

    private $data;

    //constructor
    public function __construct() {
        parent::__construct();

        $this->load->library('upload');    
         $this->load->helper('form');
        // $this->load->model('webservice_model');
        // $this->load->model('settings');
        $this->load->model('common');
        header("Access-Control-Allow-Origin: *");      
        
    }

    //defult redirection   
    public function index() {
        $this->data['status'] = FALSE;
        $this->data['msg'] = 'Something went wrong. Please try again.';
        echo json_encode($this->data);
        die();
    }
    //user login
    function login(){
        // $params = file_get_contents("php://input");
    
        // print_r($params);
        $this->load->library(array('encrypt', 'form_validation', 'session'));
        // // LOAD HELPERS
        //  $this->load->helper('form');
        // //SET VALIDATION RULES
        $this->form_validation->set_rules('user_name', 'username', 'required');
        $this->form_validation->set_rules('user_pass', 'password', 'required');
        $this->form_validation->set_error_delimiters('<em>', '</em>');
        // //has the form been submitted and with valid form info (not empty values)
        if ($this->form_validation->run()){
        $user_name = $this->input->post('user_name');
        $user_pass = $this->input->post('user_pass');
            // echo $user_name;

            
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
            {       // $this->data["result"] = $result; 
                $token = md5(uniqid(mt_rand(), true));
                    
                $token_data =array(
                    'token' =>$token,
                );
                //  $id=1;
                $this->data["Data"] =$this->common->update_data1($token_data,'admin','adminemail',$user_name);
                    
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
    //echo 'Hii';
}

    //All user data display
    function user_view()
    {    
        //using raw data 
        // $params = file_get_contents("php://input");
        // $obj = json_decode($params,true);
        // print_r($obj);die;
        // $ids = $obj['id'];

        //get id using Post method form-data
        $ids = $this->input->post('id');
       

      
        if($ids != '')
       {

            if(isset($ids))
            {
                $result=$this->common->select_database_id('user','id',$ids);
                //echo $this->db->last_query();die;
                //print_r($database);die;
              
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
        }
        else
        {
        
            $all_UserData=$this->common->get_data_all('user');

                if(count($all_UserData) > 0){
                    $this->data['data'] = $all_UserData;
                    $this->data["status"] = TRUE;
                    $this->data["msg"] = "Success";
                }
                else{
                    $this->data['status'] = FALSE;
                    $this->data['msg'] = 'No data availabe';
                }
                echo json_encode($this->data); die;
        }
        // echo json_encode($this->data); die;
             
    }

   
    //user insert in database
    function user_insert(){
        // echo "kp"; echo "<pre>"; print_r($_REQUEST);die;
        $useremail=$this->input->post('adminemail');
        // $useremail=$this->input->post('useremail');
        // echo"hiii";
        // echo "<pre>"; print_r($useremail); die;
      //for cheak user already avilable or not in database
        $email=$this->common->check_unique_avalibility_where('user','v_email',$useremail); 
        // echo $this->db->last_query();die;
        // print_r($email);die;

        
      if(count($email) > 0)
      {

          $this->data['status'] = FALSE;
          $this->data['msg'] = 'email already exists';
      }
      else
      {
                  $v_firstname = $this->input->post('v_firstname');
                  $v_lastname = $this->input->post('v_lastname');
                  $v_email = $this->input->post('v_email');
                  $i_mobile = $this->input->post('i_mobile');
                  $e_gender = $this->input->post('e_gender');
                  $v_class = $this->input->post('v_class');
                  $v_hobby = $this->input->post('v_hobby');
                  $adminemail=$this->input->post('adminemail');
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

    //user data upadte using id
    function user_update()
    {
        $ids = $this->input->post('id');
        if(isset($ids))
        {
            $database=$this->common->select_database_id('user','id',$ids);
        
            if(count($database) > 0)
            {

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
                        $this->data['msg'] = 'Data is not updated ';
                    }
                    echo json_encode($this->data); die;
                }
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'Data is not available';
            }
            echo json_encode($this->data); die;
        }
        else
        {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'Id is Required for upadte';
        }
        echo json_encode($this->data); die;
    }

    //user data delet by using Id
    function user_delete()
    {
        $id = $this->input->POST('id');
        echo "<pre>";print_r($id);
        if(isset($id))
        {
            $database=$this->common->select_database_id('user','id',$id);
            if(count($database) > 0)
            {

                $id = $this->input->post('id');
                $result=$this->common->delete_data('user', 'id', $id);
                
                if($result == 1)
                {

                    $this->data['data'] = $result;
                    $this->data["status"] = TRUE;
                    $this->data["msg"] = "Success";
                    redirect('index', 'refresh');
                }
                else{

                    $this->data['status'] = FALSE;
                    $this->data['msg'] = 'data is  not deleted';
                }
                echo json_encode($this->data); die;
            }
            else
            {
                $this->data['status'] = FALSE;
                $this->data['msg'] = 'Data is not availabe';
            }
            echo json_encode($this->data); die;
        }
        else
        {
            $this->data['status'] = FALSE;
            $this->data['msg'] = 'Id Is required for Delete';
        }
        echo json_encode($this->data); die;

        
        
    }

    function rowData()
    {

        // $testing_data = array(
        //         'fname' => 'kp',
        //         'Lname' => 'sahani',
        //         'address' => 'jetpur'
        //     );
        //     echo json_encode($testing_data); die;
        // $data = $this->input->post('name');
        // $this->data['status'] = true;
        // $this->data['msg'] = 'Id Is required for Delete';
        
        // echo json_encode($this->data); die;
            
        // $params = file_get_contents('php://input');
        
        

        $params = file_get_contents("php://input");
        $obj = json_decode($params,true);
        print_r($obj);die;

        
    }

    
        
}


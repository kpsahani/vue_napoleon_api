<!-- http://programmerblog.net/create-restful-web-services-in-codeigniter/ -->
<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class user extends CI_Controller { 

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
        $this->data['section_title'] = 'User';
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
		$this->data['user'] = $this->common->get_data_all('user');
        $this->data['total'] = count($this->data['user']);
        $this->load->view('user/index', $this->data);
	}

	function add()
	{
		$this->load->view('user/add',$this->data);
	}

	function insertdata()
	{
		$log = Logger::getLogger(__CLASS__);
		 $logoimg = '';

        if (isset($_FILES['user_image']['name']) && $_FILES['user_image']['name'] != null)
        {

           
            $config['upload_path'] = $this->config->item('user_image');
            // echo'<pre>';
            // print_r(  $config['upload_path']);die;
         
            $config['allowed_types'] = 'jpeg|png|jpg';
            
            $config['file_name'] = str_replace(' ', '_', $this->input->post('user_title')) . '_PRO_' . time();
           
            $this->upload->initialize($config);
         
           

            if ($this->upload->do_upload('user_image'))
            {

                $upload_data = $this->upload->data();
                
                $logoimg = $upload_data['file_name'];
                // echo'<pre>';
                // print_r( $logoimg);die;
            }
            else
            {
                $log->warn("Error while uploading image.");
                $this->session->set_flashdata('message', 'Error while uploading image.');
                $this->add();
            }
        }

		$data = array(
                'v_firstname' =>$_POST['v_firstname'] ,
				'v_lastname'=>$_POST['v_lastname'],
				'v_email'=>$_POST['v_email'],
				'i_mobile'=>$_POST['i_mobile'],
				'e_gender'=>$_POST['e_gender'],
				'v_class'=>$_POST['v_class'],
				'v_hobby'=>implode(',',$_POST['v_hobby']),
				'user_image'=>$logoimg
			);

		if ($this->common->insert_data($data, 'user'))
        {
           
            $this->session->set_flashdata('success', 'User inserted successfully.');
            redirect('user', 'refresh');
       	}
        else
        {
            $log->warn("Error while inserting record.");
            $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
            redirect('user', 'refresh');
        }
	}

	function deletedata($id = NULL)
	{       
		$log = Logger::getLogger(__CLASS__);
        if ($id == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('user', 'refresh');
        }
        else
        {
            if ($this->common->delete_data('user', 'id', $id))
            {
                $this->session->set_flashdata('success', 'User deleted successfully.');
                redirect('user', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                redirect('user', 'refresh');
            }
        }
	}

	function editform($id = NULL)
	{
		$log = Logger::getLogger(__CLASS__);

        if ($id == NULL)
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('user', 'refresh');
        }

        else
        {
           	$id = $id;
            $this->data['user'] = $this->common->select_database_id('user', 'id', (int) $id, '*');
            $this->load->view('user/edit', $this->data);
        }
	}

	function update()
	{
		$log = Logger::getLogger(__CLASS__);
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
                    $logoimg = $upload_data['file_name'];
                }
                else
                {
                    $log->warn("Error while uploading image.");
                    $this->session->set_flashdata('message', 'Error while uploading image.');
                    $this->edit($id);
                }
            }
		
			$data = array('v_firstname' =>$_POST['v_firstname'] ,
					'v_lastname'=>$_POST['v_lastname'],
					'v_email'=>$_POST['v_email'],
	   				'i_mobile'=>$_POST['i_mobile'],
					'e_gender'=>$_POST['e_gender'],
					'v_class'=>$_POST['v_class'],
					'v_hobby'=>implode(',',$_POST['v_hobby']),
					'user_image'=>$logoimg
				);
			// print_r($data);exit;
			if ($this->common->update_data($data, 'user', 'id', (int) $id))
            {
                $this->session->set_flashdata('success', 'User updated successfully.');
                redirect('user', 'refresh');
            }
            else
            {
                $log->warn("Error while updating record.");
                $this->session->set_flashdata('message', 'Something went wrong. Please try again.');
                redirect('user', 'refresh');
            }
        }
        else
        {
            $log->error("Try to use invalid id.");
            $this->session->set_flashdata('message', 'Specified id not found.');
            redirect('user', 'refresh');
        }
	}

    public function viewmodal($mode, $type_user_active, $id)
    {
        $data['type_status'] = $type_user_active;
        $data['mode'] = $mode;
        $data['id'] = $id;

        echo $this->load->view('user/modal', $data, true);
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
                if ($this->common->multipleEvent($allId, $value = "Enable", 'id', 'user'))
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

                if ($this->common->multipleEvent($allId, $value = "Disable", 'id', 'user'))
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
                if ($this->common->multipleEvent($allId, $value = "Delete", 'id', 'user'))
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
    public function deleteAll()
    {
        $id = $this->input->post('id');
 
        $this->db->where_in('id', explode(",", $id));
        $this->db->delete('user');
        redirect('user', 'refresh');
        echo json_encode(['success'=>"Item Deleted successfully."]);
    }
}

?>
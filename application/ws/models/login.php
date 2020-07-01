<?php

Class Login extends CI_Model {

    function logincheck($username, $password) {

        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where('adminemail',$username,'adminpassword',$password);
        $authentication = $this->db->get();
        $result = $authentication->result_array();
    //     for ($i=0; $i < count($result); $i++) { 

       if ($result[0]['adminemail'] == $username && $result[0]['adminpassword'] == md5($password)) 
       {
          
           $result = array(
                // 'id'=>$result[0]['id'],
                'username' => $username,
                'password'=>md5($password),
               

                
            );
           
            return $result;
        } else {
            return false;
        }
    }
    // function logout($username, $password){
    //     $this->db->select("*");
    //     $this->db->from("user");
    //     $this->db->where('adminemail',$username,'adminpassword',$password);
    //     $authentication = $this->db->get();
    //     $result = $authentication->result_array();

    //    if ($result[0]['adminemail'] == $username && $result[0]['adminpassword'] == md5($password)) 
    //    {
          
    //        $result = array(
    //             // 'id'=>$result[0]['id'],
    //             // 'username' => $username,
    //             'v_firstname'=>$result[0]['v_firstname'],
    //             'token'=>$result[0]['token'],

                
    //         );
         
    //         return $result;
    //     } else {
    //         return false;
    //     }
    // }

}

?>

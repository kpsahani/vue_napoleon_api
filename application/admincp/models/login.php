<?php

Class Login extends CI_Model {

    function logincheck($username, $password) {
        // echo $password;die;
        $this->db->select("*");
        $this->db->from("admin");
        $authentication = $this->db->get();
        $result = $authentication->result_array();
        // echo "fgdg";exit;
        //  echo md5($password);die;
        //  echo "<pre>";
        //  print_r($result);die;
        if (strtolower($result[0]['adminemail']) == strtolower($username) && $result[0]['adminpassword'] == md5($password)) {
           
            $result = array(
                'id' => 0,
                'adminid' => $result[0]['adminid'],
                'adminname' => $result[0]['adminname'],
                'username' => $username,
                'type' => 'admin'
            );

            return $result;
        } else {
            return false;
        }
    }

}

?>

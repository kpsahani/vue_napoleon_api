<?php

Class combinations extends CI_Model {

    //get all category
    //Getting Page value for editing
    function get_mapping() {


        $query = $this->db->query('SELECT
  A.map_id
  ,C1.stage_title AS place_name
  ,C2.stage_title AS dress_name
  ,C3.stage_title AS crown_name
  ,C4.stage_title AS stage_name
  ,C5.stage_title AS props_name
  ,B.character_name AS char_name 
  ,A.image_path 
FROM mapping AS A
INNER JOIN stage AS C1
  ON A.place_id = C1.id
INNER JOIN stage AS C2
  ON A.dress_id = C2.id

  INNER JOIN stage AS C3
  ON A.crown_id = C3.id

  INNER JOIN stage AS C4
  ON A.stage_id = C4.id
  
  INNER JOIN stage AS C5
  ON A.props_id = C5.id

INNER JOIN napoleon_characters AS B ON A.character_id = B.character_id');

//            $this->db->where('id', $intid);
//            $query = $this->db->get();
//        echo "<pre>";
//        print_r($query->result_array());
//        die;
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return array();
        }
    }

}

?>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Webservice_model extends CI_Model {

    function getStages() {

        $this->db->select("s.id,ss.stage_name,s.stage_title,s.stage_desc,CONCAT('" . base_url() . $this->config->item('stage_image') . "',s.stage_image ) as stage_image");
//        $this->db->select("s.id,ss.stage_name,s.stage_title,s.stage_desc,s.stage_image,nc.character_name");
        $this->db->from('stage s');
        $this->db->join('stages ss', 'ss.stages_id = s.stage_id', 'left');
        $this->db->join('napoleon_characters nc', 'nc.character_id = s.character_id', 'left');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAllCombinations() {

        $this->db->select("m.map_id,m.place_id,m.dress_id,m.crown_id,m.stage_id,m.props_id,m.character_id,CONCAT('" . base_url() . $this->config->item('mapping_image') . "',m.image_path ) as image_path");
//        $this->db->select("m.map_id,m.place_id,m.dress_id,m.crown_id,m.stage_id,m.props_id,nc.character_name,CONCAT('" . base_url() . $this->config->item('mapping_image') . "',m.image_path ) as image_path");
        $this->db->from('mapping m');
        $this->db->join('napoleon_characters nc', 'nc.character_id = m.character_id', 'left');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getAllCombination($stage_id) {
        $query = $this->db->query("SELECT
  A.map_id
  ,C1.stage_title AS place_name
  ,C2.stage_title AS dress_name
  ,C3.stage_title AS crown_name
  ,C4.stage_title AS stage_name
  ,C5.stage_title AS props_name
  ,B.character_name AS char_name 
  ,CONCAT('" . base_url() . $this->config->item('mapping_image ') . "',A.image_path  ) as image_path  
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

INNER JOIN napoleon_characters AS B ON A.character_id = B.character_id");
        $result = $query->result_array();
        return $result;
    }

}

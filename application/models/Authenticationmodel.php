<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authenticationmodel extends CI_Model {
    
    public function validateLogin($str_user_name,$str_password) {
        $this->db->select("u.user_id,u.first_name,u.last_name,r.role_id,r.role_name");
        $this->db->from("user u");
        $this->db->join("role r","u.role_id=r.role_id","inner");
        $this->db->where("u.user_name",$str_user_name);
        $this->db->where("u.password", md5($str_password));
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->row(); 
        }else{
             return array();
        }
        
    }

}

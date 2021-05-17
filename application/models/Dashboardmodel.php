<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {
    
    public function simpleInsert($table_name,$arr_data) {
        $query = $this->db->insert($table_name,$arr_data);
        if($query == 1){
            return $this->db->insert_id();
        }else{
            return 0;
        }
        
    }
    
    public function simpleUpdate($table_name,$arr_data,$arr_where) {
        $this->db->where($arr_where);
        $query = $this->db->update($table_name,$arr_data);
        if($query == 1){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    public function simpleDelete($table_name,$arr_where) {
        $this->db->where($arr_where);
        $query = $this->db->delete($table_name);
        if($query == 1){
            return 1;
        }else{
            return 0;
        }
        
    }
    
    public function getUsers() {
        $this->db->select("u.user_id,u.first_name,u.last_name,r.role_id,r.role_name,u.user_name,u.last_login_time");
        $this->db->from("user u");
        $this->db->join("role r","u.role_id=r.role_id","inner");
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->result(); 
        }else{
             return array();
        }
        
    }
    
    public function getProcessors($processor_id =0) {
        $this->db->select("processor_id,processor_name,status");
        $this->db->from("processor");
        if($processor_id > 0){
            $this->db->where("processor_id",$processor_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->result(); 
        }else{
             return array();
        }
        
    }
    
    public function getModels($model_id =0) {
        $this->db->select("model_id ,model_name,status");
        $this->db->from("model");
        if($model_id > 0){
            $this->db->where("model_id",$model_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->result(); 
        }else{
             return array();
        }
        
    }
    
    public function getMakes($make_id = 0) {
        $this->db->select("m.make_id,m.make_name,mo.model_id,mo.model_name,p.processor_id,p.processor_name,m.status");
        $this->db->from("make m");
        $this->db->join("model mo","mo.model_id=m.model_id","inner");
        $this->db->join("processor p","p.processor_id=m.processor_id","inner");
        if($make_id > 0){
            $this->db->where("make_id",$make_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->result(); 
        }else{
             return array();
        }
        
    }
    
    public function getCartList($user_id = 0,$cart_id =0) {
        $this->db->select("c.cart_id,u.user_id,u.first_name,u.last_name,r.role_id,r.role_name,u.user_name,u.last_login_time,m.make_id,m.make_name,mo.model_id,mo.model_name,p.processor_id,p.processor_name,c.status");
        $this->db->from("cart c");
        $this->db->join("user u","u.user_id=c.user_id","inner");
        $this->db->join("role r","u.role_id=r.role_id","inner");
        $this->db->join("make m","m.make_id=c.make_id","inner");
        $this->db->join("model mo","mo.model_id=m.model_id","inner");
        $this->db->join("processor p","p.processor_id=m.processor_id","inner");
        if($user_id > 0){
            $this->db->where("c.user_id",$user_id);
        }
        if($cart_id > 0){
            $this->db->where("c.cart_id",$cart_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->result(); 
        }else{
             return array();
        }
        
    }

    public function getAjaxCallDetails($make_id = 0) {
        $this->db->select("m.make_id,m.make_name,mo.model_id,mo.model_name,p.processor_id,p.processor_name,m.status");
        $this->db->from("make m");
        $this->db->join("model mo","mo.model_id=m.model_id","inner");
        $this->db->join("processor p","p.processor_id=m.processor_id","inner");
        if($make_id > 0){
            $this->db->where("make_id",$make_id);
        }
        $query = $this->db->get();
        if($query && $query->num_rows() > 0){
           return $query->row(); 
        }else{
             return array();
        }
        
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('login');
    }
    
    public function login() {
        $this->load->model('Authenticationmodel');
        $str_user_name = ($this->input->post('user_name')) ? $this->input->post('user_name') : '';
        $str_password = ($this->input->post('password')) ? $this->input->post('password') : '';
        if($str_user_name != '' && $str_password != ''){
            $arr_user_details = $this->Authenticationmodel->validateLogin($str_user_name,$str_password);
            if(count((array)$arr_user_details) > 0){
                $_SESSION['user_data'] = $arr_user_details;
               redirect('Dashboard');
            }else{
                redirect('Authentication');
            }
        }else{
            redirect('Authentication');
        }
    }

}

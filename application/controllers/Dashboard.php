<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION)) {
            redirect('Authentication');
        }
    }

    public function index() {
        $this->load->view('includes/header');
        $this->load->view('dashboard');
        $this->load->view('includes/footer');
    }
    
    public function cartList() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        $data['user_list'] = $this->Dashboardmodel->getUsers();
        $this->load->view('includes/header');
        $this->load->view('users',$data);
        $this->load->view('includes/footer');
    }
    
    public function users() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        $data['user_list'] = $this->Dashboardmodel->getUsers();
        $this->load->view('includes/header');
        $this->load->view('users',$data);
        $this->load->view('includes/footer');
    }
    
    public function processors() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        $data['processor_list'] = $this->Dashboardmodel->getProcessors();
        $this->load->view('includes/header');
        $this->load->view('processors',$data);
        $this->load->view('includes/footer');
    }
    
    public function addProcessor() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_processor_name = ($this->input->post('processor_name')) ? $this->input->post('processor_name') : '';
            $int_status = $this->input->post('status');
            if($str_processor_name != ''){
                $arr_processor = array(
                    'processor_name' => $str_processor_name,
                    'status' => $int_status,
                    'created_by' => $_SESSION['user_data']->user_id
                );
                $ok = $this->Dashboardmodel->simpleInsert('processor',$arr_processor);
                if($ok > 0){
                    redirect('Dashboard/processors');
                }
            }
        }
        $this->load->view('includes/header');
        $this->load->view('add_processor');
        $this->load->view('includes/footer');
    }
    
    public function editProcessor($processor_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_processor_name = ($this->input->post('processor_name')) ? $this->input->post('processor_name') : '';
            $int_status = $this->input->post('status');
            if($str_processor_name != ''){
                $arr_processor = array(
                    'processor_name' => $str_processor_name,
                    'status' => $int_status,
                    'modified_by' => $_SESSION['user_data']->user_id,
                    'modified_on' => date('Y-m-d H:m:i')
                );
                $arr_where = array(
                    'processor_id ' => $processor_id
                );
                $ok = $this->Dashboardmodel->simpleUpdate('processor',$arr_processor,$arr_where);
                if($ok > 0){
                    redirect('Dashboard/processors');
                }
            }
        }
        $data['processor_data'] = $this->Dashboardmodel->getProcessors($processor_id);
        $this->load->view('includes/header');
        $this->load->view('add_processor',$data);
        $this->load->view('includes/footer');
    }
    
    public function deleteProcessor($processor_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($processor_id > 0){
                $arr_where = array(
                    'processor_id ' => $processor_id
                );
                $ok = $this->Dashboardmodel->simpleDelete('processor',$arr_where);
                if($ok > 0){
                    redirect('Dashboard/processors');
                }
        }
    }
    
    public function models() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        $data['model_list'] = $this->Dashboardmodel->getModels();
        $this->load->view('includes/header');
        $this->load->view('models',$data);
        $this->load->view('includes/footer');
    }
    
    public function addModel() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_model_name = ($this->input->post('model_name')) ? $this->input->post('model_name') : '';
            $int_status = $this->input->post('status');
            if($str_model_name != ''){
                $arr_model = array(
                    'model_name' => $str_model_name,
                    'status' => $int_status,
                    'created_by' => $_SESSION['user_data']->user_id
                );
                $ok = $this->Dashboardmodel->simpleInsert('model',$arr_model);
                if($ok > 0){
                    redirect('Dashboard/models');
                }
            }
        }
        $this->load->view('includes/header');
        $this->load->view('add_model');
        $this->load->view('includes/footer');
    }
    
    public function editModel($model_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_model_name = ($this->input->post('model_name')) ? $this->input->post('model_name') : '';
            $int_status = $this->input->post('status');
            if($str_model_name != ''){
                $arr_model = array(
                    'model_name' => $str_model_name,
                    'status' => $int_status,
                    'modified_by' => $_SESSION['user_data']->user_id,
                    'modified_on' => date('Y-m-d H:m:i')
                );
                $arr_where = array(
                    'model_id' => $model_id
                );
                $ok = $this->Dashboardmodel->simpleUpdate('model',$arr_model,$arr_where);
                if($ok > 0){
                    redirect('Dashboard/models');
                }
            }
        }
        $data['model_data'] = $this->Dashboardmodel->getModels($model_id);
        $this->load->view('includes/header');
        $this->load->view('add_model',$data);
        $this->load->view('includes/footer');
    }
    
    public function deleteModel($model_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($model_id > 0){
                $arr_where = array(
                    'model_id ' => $model_id
                );
                $ok = $this->Dashboardmodel->simpleDelete('model',$arr_where);
                if($ok > 0){
                    redirect('Dashboard/models');
                }
        }
    }
    
    public function makes() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        $data['make_list'] = $this->Dashboardmodel->getMakes();
        $this->load->view('includes/header');
        $this->load->view('makes',$data);
        $this->load->view('includes/footer');
    }
    
    public function addMake() {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_make_name = ($this->input->post('make_name')) ? $this->input->post('make_name') : '';
            $int_model_id =  $this->input->post('model_id');
            $int_processor_id = $this->input->post('processor_id');
            $int_status = $this->input->post('status');
            if($str_make_name != '' && $int_model_id != '' && $int_processor_id != ''){
                $arr_make = array(
                    'make_name' => $str_make_name,
                    'model_id' => $int_model_id,
                    'processor_id' => $int_processor_id,
                    'status' => $int_status,
                    'created_by' => $_SESSION['user_data']->user_id
                );
                $ok = $this->Dashboardmodel->simpleInsert('make',$arr_make);
                if($ok > 0){
                    redirect('Dashboard/makes');
                }
            }
        }
        $data['model_list'] = $this->Dashboardmodel->getModels();
        $data['processor_list'] = $this->Dashboardmodel->getProcessors();
        $this->load->view('includes/header');
        $this->load->view('add_make',$data);
        $this->load->view('includes/footer');
    }
    
    public function editMake($make_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($this->input->post('submit')){
            $str_make_name = ($this->input->post('make_name')) ? $this->input->post('make_name') : '';
            $int_model_id =  $this->input->post('model_id');
            $int_processor_id = $this->input->post('processor_id');
            $int_status = $this->input->post('status');
            if($str_make_name != '' && $int_model_id != '' && $int_processor_id != ''){
                 $arr_make = array(
                    'make_name' => $str_make_name,
                    'model_id' => $int_model_id,
                    'processor_id' => $int_processor_id,
                    'status' => $int_status,
                    'modified_by' => $_SESSION['user_data']->user_id,
                    'modified_on' => date('Y-m-d H:m:i')
                );
                $arr_where = array(
                    'make_id' => $make_id
                );
                $ok = $this->Dashboardmodel->simpleUpdate('make',$arr_make,$arr_where);
                if($ok > 0){
                    redirect('Dashboard/makes');
                }
            }
        }
        $data['make_data'] = $this->Dashboardmodel->getMakes($make_id);
        $data['model_list'] = $this->Dashboardmodel->getModels();
        $data['processor_list'] = $this->Dashboardmodel->getProcessors();
        $this->load->view('includes/header');
        $this->load->view('add_make',$data);
        $this->load->view('includes/footer');
    }
    
    public function deleteMake($make_id) {
        $role_id = $_SESSION['user_data']->role_id;
        if($role_id != 1){
            redirect('Authentication');
        }
        $this->load->model('Dashboardmodel');
        if($make_id > 0){
                $arr_where = array(
                    'make_id ' => $make_id
                );
                $ok = $this->Dashboardmodel->simpleDelete('make',$arr_where);
                if($ok > 0){
                    redirect('Dashboard/makes');
                }
        }
    }

}

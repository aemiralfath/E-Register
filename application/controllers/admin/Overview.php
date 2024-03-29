<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Overview extends CI_Controller{
        public function __construct(){
            parent::__construct();
            
            $this->load->model("event_model");
            $this->load->library("form_validation");
        }
        public function index(){
            //load view admin/overview.php
            $data["events"] = $this->event_model->getAll();
            $this->load->view("admin/overview",$data);
        }
        
    }
?>
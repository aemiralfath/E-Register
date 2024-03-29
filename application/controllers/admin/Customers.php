<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    class Customers extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("customers_model");
            $this->load->library("form_validation");
            $this->load->library('Ci_phpmailer/Ci_phpmailer');
        }

        public function index(){
            $data["customers"] = $this->customers_model->getAll();
            $this->load->view("admin/customer/list",$data);
        }
        public function add(){
            $customer = $this->customers_model;
            $validation = $this->form_validation;
            $validation->set_rules($customer->rules());
            if($validation->run()){
                $customer->save();
                $this->session->set_flashdata('success', 'Berhasil disimpan');
            }
            $this->load->view("admin/customer/new_form");
        }
        public function edit($id = null){
            if(!isset($id)) redirect('admin/Customers'); //redirect jika tidak ada $id

            $customer = $this->customers_model;
            $validation = $this->form_validation;
            $validation->set_rules($customer->rules());

            if($validation->run()){ //melakukan validasi
                $customer->update(); //menyimpan data
                $this->session->set_flashdata('success','Berhasil disimpan');
            }
            $data["customer"] = $customer->getById($id); //mengambil data untuk ditampilkan pada form
            if(!$data["customer"]) show_404();// jika tidak ada data, tampilkan error
            $this->load->view("admin/customer/edit_form",$data); //menampilkan form edit
        }
        public function delete($id=null){
            if(!isset($id)) show_404();
            if($this->customers_model->delete($id)){
                redirect(site_url('admin/customers'));
            }
        }
    }
?>
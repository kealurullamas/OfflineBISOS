<?php
    Class Blotters extends CI_Controller
    {
        public function index()
        {
            $data = [
                'blotters' => $this->blotter_model->get_blotter(),
                'title' => "Blotter System"
            ];
            $this->load->view('templates/header');
            $this->load->view('blotter/index',$data);
            $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->form_validation->set_rules('reason','blotter-reason','required');
        }
    }
?>
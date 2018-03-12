<?php
    class Announcements extends CI_controller
    {
        public function view()
        {
            $data['title']='announcement title';
            //load announcement view
        }
        public function create()
        {
            
            $data['title']='Create Announcements';

            $this->form_validation->set_rules('title','Title','required');
            $this->form_validation->set_rules('body','Body','required');

            if($this->form_validation->run()===FALSE)
            {
                $this->load->view('templates/header');
                $this->load->view('Announcements/create',$data);
                $this->load->view('templates/footer');
            }
            else{
                $this->announcements_model->create_announcement();
                redirect('pages/view//home');
            }
        }
    }
?>
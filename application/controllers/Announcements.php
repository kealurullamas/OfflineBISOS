<?php
    class Announcements extends CI_controller
    {
        public function viewAll()
        {   
            $data=[
                'title'=>'Announcements',
                'announcements'=>$this->announcements_model->getAllAnnouncements()
            ];
            $this->load->view('templates/header');
            $this->load->view('Announcements/index',$data);
            $this->load->view('templates/footer');
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
        public function view($slug=null)
        {
            $data=[
                'announcement'=>$this->announcements_model->get_announcement($slug)
            ];
            
            if(empty($data['announcement']))
            {
                show404();
            }
            
            $this->load->view('templates/header');
            $this->load->view('Announcements/view');
            $this->load->view('templates/footer');
        }
    }
?>
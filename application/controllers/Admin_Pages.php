<?php 

    class Admin_Pages extends CI_Controller{
        public function index($page = 'admin_login'){
            if(!file_exists(APPPATH.'views/admin_pages/'.$page.'.php')){
                show_404();
            }

            if($this->session->userdata('username'))
            {
                redirect('Admin_Pages/view');
            }
           
            $this->load->view('admin_pages/'.$page);
        }

        public function view(){
            
            if(empty($this->session->userdata('username'))){
                redirect('admin');
            }
            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_home');
            $this->load->view('templates/admin_footer');
        }
        
        public function news(){
            if(empty($this->session->userdata('username'))){
                redirect('admin');
            }

            $data = [
                'allnews' => $this->news_model->get_news(),
                'title' => 'News'
            ];
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_news', $data);
            $this->load->view('templates/admin_footer');
            // $this->form_validation->set_rules('title','Title','required');
            // $this->form_validation->set_rules('body','Body','required');
            // if($this->form_validation->run()===FALSE)
            // {
            //     $this->load->view('templates/header');
            //     $this->load->view('News/create',$data);
            //     $this->load->view('templates/footer');
            // }
            // else {
            // $this->news_model->create_news();
            // redirect('news');
            //}
            
        }
        
        public function editnews(){
            if(empty($this->session->userdata('username'))){
                redirect('admin');
            }
            // pass data from table row
            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_editnews');
            $this->load->view('templates/admin_footer');
        }
        public function addnews(){
            if(empty($this->session->userdata('username'))){
                redirect('admin');
            }

            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_addnews');
            $this->load->view('templates/admin_footer');
        }
        
        
    }


?>
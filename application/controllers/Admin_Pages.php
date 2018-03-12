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

        public function view($page = 'admin_home'){
            if(!file_exists(APPPATH.'views/admin_pages/'.$page.'.php')){
                show_404();
            }

            if(empty($this->session->userdata('username'))){
                redirect('admin');
            }
            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/'.$page);
            $this->load->view('templates/admin_footer');
        }
        
        public function asd()
        {
            $this->load->view('asd');
        }
        







    }


?>
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
                redirect('admin', 'refresh');
            }
            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_home');
            $this->load->view('templates/admin_footer');
        }
        
        public function news(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            $data = [
                'allnews' => $this->news_model->get_news(),
                'title' => 'News'
            ];
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_news', $data);
            $this->load->view('templates/admin_footer');
            
        }
        
        public function editnews($id){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            $data['row'] = $this->news_model->get_rownews($id);
            // pass data from table row
            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_editnews', $data);
            $this->load->view('templates/admin_footer');
        }
        public function addnews(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_addnews');
            $this->load->view('templates/admin_footer');
        }
        
        public function announcements(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }
            //get announcement
            $data = [
                'announcements' => $this->announcements_model->getAllAnnouncements()
            ];
            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_announcement', $data);
            $this->load->view('templates/admin_footer');
        }

        public function addannouncement(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_addannouncement');
            $this->load->view('templates/admin_footer');
        }

        public function editannouncement($id){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            $data['row'] = $this->announcements_model->get_rowannouncement($id);

            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_editannouncement',$data);
            $this->load->view('templates/admin_footer');
        }

        public function editcitizen($id){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }
                $data['row'] = $this->citizen_model->get_citizen($id);
                $data['citizens'] = $this->citizen_model->get_citizens();
                $this->load->view('templates/admin_header');
                $this->load->view('admin_pages/admin_editcitizen',$data);
                $this->load->view('templates/admin_footer');
        }

        public function addcitizen(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }
            // $data['citizens'] = $this->citizen_model->get_citizens();

            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_addcitizen');
            $this->load->view('templates/admin_footer');
        }

        public function citizens(){
            if(empty($this->session->userdata('username'))){
                redirect('admin', 'refresh');
            }

            $data['citizens'] = $this->citizen_model->get_citizens();

            $this->load->view('templates/admin_header');
            $this->load->view('admin_pages/admin_citizens', $data);
            $this->load->view('templates/admin_footer');

        }
        
    }


?>
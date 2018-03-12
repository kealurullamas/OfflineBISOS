<?php

class News extends CI_controller
{
    public function index()
    {
        $data['title']="News Flash";
        $data['News']=$this->news_model->get_news();
        $this->load->view('templates/header');
        $this->load->view('News/index',$data);
        $this->load->view('templates/footer');
    }
    public function view($slug=null)
    {
        $data['news']=$this->news_model->get_news($slug);
        if(empty($data['news']))
        {
            show_404();
        }
        $data['title']=$data['news']['title'];
        $this->load->view('templates/header');
        $this->load->view('News/view',$data);
        $this->load->view('templates/footer');
    }
    public function create()
    {
        $data['title']='Create Post';
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('body','Body','required');
        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('News/create',$data);
            $this->load->view('templates/footer');
        }
        else {
           $this->news_model->create_news();
           redirect('news');
        }
        
    }
}
?>
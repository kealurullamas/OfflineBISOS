<?php

	class Pages extends CI_Controller{
		public function view($page = 'home'){

			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			// $data['News']=$this->news_model->get_news();

			$data=[
				'News'=>$this->news_model->get_news(),
				'Announcements'=>$this->announcements_model->get_announcement(),
			];
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer');
		}
	}
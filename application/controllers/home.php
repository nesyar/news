<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//property
	public $data = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');

	}

	public function index()
	{
		//load view
		$this->data['main_view'] = 'home_view';

		//get all show
		$this->data['news'] = $this->news_model->get_all_news();
		
		
		$this->load->view('template_view', $this->data);

	}
	public function detail($id=NULL){

	if($id!= NULL){

			//getdetailshow
			$this->data['detail'] = $this->news_model->get_news_detail($id);

			
			$this->data['main_view'] = 'detail_view';
			$this->load->view('template_view', $this->data);
		} else {
			redirect('home');
		}
}


}

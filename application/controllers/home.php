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

}

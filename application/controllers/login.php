<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		if($this->session->userdata('login') == TRUE){
			$this->data['main_view'] = 'home_view';
			$this->load->view('template_view', $this->data);

		} else {
			$this->data['main_view'] = 'login_view';
			$this->load->view('template_view', $this->data);
		}
			
	}

	public function do_login()
	{
if($this->session->userdata('login') == FALSE){
			if($this->input->post('submit')){

					if($this->user_model->user_check() == TRUE){

						redirect('home');

					} else {
						$this->session->set_flashdata('notif_login', '<p class="alert alert-danger">Username or password incorrect!</p>');

						$this->data['main_view'] = 'login_view';
						$this->load->view('template_view', $this->data);
					}
				
			} else {
				redirect('register');
			}
		} else {
			redirect('home');
		}
		}
		
	public function do_register()
	{
		if($this->session->userdata('login') == FALSE){
			if($this->input->post('submit_reg')){

					if($this->user_model->register() == TRUE){

						$this->session->set_flashdata('notif_reg', '<p class="alert alert-success"><strong>Registration success.</strong> Please login now!</p>');
						$this->session->set_flashdata('notif_login', '<p class="alert alert-warning"><strong>Login Here.</strong> Please enter your username and password!</p>');
						$this->data['main_view'] = 'login_view';
						$this->load->view('template_view', $this->data);

					} else {
						$this->session->set_flashdata('notif_reg', '<p class="alert alert-danger"><strong>Registration Failed!.</strong></p>');
					
						$this->data['main_view'] = 'login_view';
						$this->load->view('template_view', $this->data);
					}	
				} else {
					redirect('login');
				}

				
			

		} else {
			redirect('home');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('home'));
	}

}

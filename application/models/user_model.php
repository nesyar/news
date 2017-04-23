<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public $db_table ="login";

	public function user_check()
	{
		$username = $this->input->post('username_login');
		$password = $this->input->post('password_login');

		$query = $this->db->where('username',$username)
				 		  ->where('password',$password)
				 		  ->limit(1)
				 		  ->get($this->db_table);
			$row = $query->row();

		if($query->num_rows() == 1){
			$array_login = array(
				'login' 	=> TRUE,
				'id_user' =>$row->id_user,
				'username'	=> $username,
				'tipe_login' => $row->tipe_login
			);
			
			$this->session->set_userdata($array_login);
			if($this->session->userdata('tipe_login') == "2"){
			redirect('home');
			} else {
			redirect('berita');
			}
		} else {
			echo "data tidak ada";
		}
		
	}

	public function register()
	{
		$register_data = array(
				'nama' => $this->input->post('name_reg'),
				'username' 	=> $this->input->post('username_reg'),
				'password' 	=> $this->input->post('password_reg'),
				'tipe_login'=> 2);
		$query = $this->db->insert($this->db_table, $register_data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	

}

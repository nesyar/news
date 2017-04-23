<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news extends CI_Model{

	public function getdata($key)
	{
		$this->db->where('id', $key);
		$hasil = $this->db->get('news');
		return $hasil;
	}
	public function getinsert($data)
	{
		$this->db->insert('news', $data);
	}
	public function getupdate($key,$data)
	{
		$this->db->where('id', $key);
		$this->db->update('news', $data);
	}
	
	function getdelete($key)
	{
	
	$this->db->where('id', $key);
	$this->db->delete('news'); 
	}
}
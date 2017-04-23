<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class News_model extends CI_Model
{
	public $db_table ='news';
	public function __construct()
	{
		parent::__construct();
	}
	public function get_all_news()
	{
		return $this->db->get('news')
		->result();
	}
	public function get_news_detail($id)
	{
		return $this->db->where('news.id',$id)
		->limit(1)
		->get($this->db_table)
		->row();
	}
}
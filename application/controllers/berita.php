<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_news');
		//Do your magic here
	}

public function index()
	{
		if ($this->session->userdata('tipe') == "1") {
			//load view
		$this->data['main_view'] = 'home_view';

		//get all show
		$this->data['news'] = $this->news_model->get_all_news();
		
		$this->load->view('template_view', $this->data);
	
		}else{
				$isi['content'] 	= 'admin/all_view';
		$isi['data']  		= $this->db->get('news');
		$this->load->view('admin/tampilan_home', $isi);
		}
		

	}
	public function tambah()
	{
		        $isi['content'] 	    = 'admin/tambah_news';
		        $isi['kode']			='';
				$isi['judul']			='';
				$isi['berita']			='';
				$isi['kategori']	    ='';
				$isi['gambar']			= '';

				
		$this->load->view('admin/tampilan_home', $isi);	
	}
public function simpan()
	{
	
		$key                = $this->input->post('kode');
		$data['id']	        = $this->input->post('kode');	
		$data['title']		= $this->input->post('judul');
		$data['content']	= $this->input->post('berita');
		$data['categori']	= $this->input->post('kategori');
		$data['categori']	= $this->input->post('gambar');
		
		
	
		$query = $this->model_news->getdata($key);
		if($query->num_rows()>0)
		{
			$this->model_news->getupdate($key, $data);
		}
		else
		{
			$this->model_news->getinsert($data);
		}
		redirect('berita');
	}
	
	public function edit()
	{
		
		$isi['content'] 	= 'admin/tambah_news';
	
		$key = $this->uri->segment(3);
		$this->db->where('id',$key);
		$query = $this->db->get('news');
		if($query->num_rows()>0)
		{
			foreach ($query -> result() as $row) 
			{
				$isi['kode']			=$row->id;
				$isi['judul']			=$row->title;
				$isi['berita']			=$row->content;
				$isi['kategori']		=$row->categori;
				$isi['gambar']			=$row->image;
			}
		}
		else
		{
			     $isi['kode']			='';
				$isi['judul']			='';
				$isi['berita']			='';
				$isi['kategori']		='';
					

		}
		
		$this->load->view('admin/tampilan_home', $isi);	
	}
	public function delete($key)
	{
	$this->load->database();
	//$this->load->model('model_news');
	$this->model_news->getdelete($key);

	redirect('berita');
	}
	 function do_upload(){
    	$type = explode('.', $_FILES["pic"]["name"]);
    	$type = $type[count($type)-1];
    	$url = uniqid(rand()).'.'.$type;
    	if(in_array($type, array("jpg","jpeg","gif","png","PNG")))
    		if(is_uploaded_file($_FILES["pic"]["tmp_name"]))
    			if(move_uploaded_file($_FILES["pic"]["tmp_name"],"./uploads/".$url))
    				return $url;
    	return "";
    }
	
}

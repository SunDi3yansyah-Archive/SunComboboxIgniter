<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('database','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('model_makul');
	}
	
	function index()
	{
		$data['semester'] = $this->model_makul->getSemester();
		$this->load->view('matakuliah', $data);
	}

	function makul()
	{
		$id_semester = $this->input->post('id_semester');
		$makul = $this->model_makul->getMakul($id_semester);
		$data .= "<option value=''>-- Pilih Mata Kuliah --</option>";
		foreach ($makul as $mk)
		{
			$data .= "<option value='$mk[id_matakuliah]'>$mk[nama_matakuliah]</option>\n"; 
		}
		echo $data;
	}

	// Contoh jika ingin input data
	function input()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_semester','Kelas','required|xss_clean');
		$this->form_validation->set_rules('id_matakuliah','Matapelajaran','required|xss_clean');
		if($this->form_validation->run() == TRUE)
		{
			// code
		}
		else
		{
			$this->index();
		}
	}
}
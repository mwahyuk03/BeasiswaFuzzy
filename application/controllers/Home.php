<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('beasiswa_model');
	}

	

	public function index()
	{
		$data['mhs'] = $this->beasiswa_model->get_mhs();
		$data['gaji'] = $this->beasiswa_model->get_gaji();
		$data['ipk'] = $this->beasiswa_model->get_ipk();
		$data['rules'] = $this->beasiswa_model->get_rules();
		$data['title'] = "Test tampil Database";
		$this->load->view('templates/header', $data);
		$this->load->view('tampildata', $data);
		$this->load->view('templates/footer');
	}



	public function formtambah()
	{
		$data['title'] = "Tambah Data | Test tampil Database";

		$this->load->view('templates/header', $data);
		$this->load->view('formtambah');
		$this->load->view('templates/footer');
	}

	public function tambahmhs()
	{
	
		$this->validasi();

		if($this->form_validation->run() == FALSE)
		{
			$this->formtambah();
		}
		else
		{
			$this->beasiswa_model->tambah_mhs();
			$this->session->set_flashdata('input_sukses','Data mobil berhasil di input');
			 redirect(base_url());
		}
	}

	public function hapusdata($id)
	{
		$this->beasiswa_model->hapus_mhs($id);
		$this->session->set_flashdata('hapus_sukses','Data berhasil di hapus');
		 redirect(base_url());
	}

	// public function formedit($id)
	// {
	// 	$data['title'] = 'Edit Data | Test tampil Database';

	// 	$data['db'] = $this->mobil_model->edit_mobil($id);

	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('formedit', $data);
	// 	$this->load->view('templates/footer');
	// }

	// public function updatemobil($id)
	// {
	// 	$this->validasi();

	// 	if($this->form_validation->run() === FALSE)
	// 	{
	// 		$this->formedit($id);
	// 	}
	// 	else
	// 	{
	// 		$this->mobil_model->update_mobil();
	// 		$this->session->set_flashdata('update_sukses', 'Data mobil berhasil diperbaharui');
	// 		redirect('/home/lihatdata');
	// 	}
	// }

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [[
					'field' => 'nama',
					'label' => 'Nama',
					'rules' => 'required'
				],
				[
					'field' => 'ipk',
					'label' => 'IPK',
					'rules' => 'required'
				],
				[
					'field' => 'gaji',
					'label' => 'Gaji',
					'rules' => 'required'
				]];

		$this->form_validation->set_rules($config);
	}
}
?>
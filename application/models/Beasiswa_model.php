<?php

class Beasiswa_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_mhs()
	{
		$query = $this->db->get('mhs');
		return $query->result();
	}

		public function get_gaji()
	{
		$query = $this->db->get('p_gaji');
		return $query->result();
	}
	public function get_ipk()
	{
		$query = $this->db->get('p_ipk');
		return $query->result();
	}
	public function get_rules()
	{
		$query = $this->db->get('kelayakan');
		return $query->result();
	}


	public function tambah_mhs()
	{
		$data = [
					// 'kdmobil' => $this->input->post('kdmobil'),
					'nama' => $this->input->post('nama'),
					'ipk' => $this->input->post('ipk'),
					'gaji' => $this->input->post('gaji')
				];

		$this->db->insert('mhs', $data);
	}

	// public function edit_mobil($id)
	// {
	// 	$query = $this->db->get_where('mobil', ['kdmobil' => $id]);
	// 	return $query->row();
	// }

	// public function update_mobil()
	// {
	// 	$kondisi = ['kdmobil' => $this->input->post('kdmobil')];
		
	// 	$data = [
	// 				'jenis' => $this->input->post('jenis'),
	// 				'tahun' => $this->input->post('tahun'),
	// 				'harga' => $this->input->post('harga'),
	// 				'nopol' => $this->input->post('nopol'),
	// 			];

	// 	$this->db->update('mobil', $data, $kondisi);
	// }

	public function hapus_mhs($id)
	{
		$this->db->delete('mhs', ['id' => $id]);
	}
}

?>
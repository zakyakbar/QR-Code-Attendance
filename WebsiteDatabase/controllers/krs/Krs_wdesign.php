<?php 

class Krs_wdesign extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('krs/m_krs_wdesign');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('krs/krs_wdesign/form_krs');
		}

	function tambah_aksi(){
		$id_krs = $this->input->post('id_krs');
		$id_mk = $this->input->post('id_mk');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$nim = $this->input->post('nim');
	

		$data = array(
            'id_krs' => $id_krs,
			'id_mk' => $id_mk,
			'nama_mahasiswa' => $nama_mahasiswa,
			'nim' => $nim,
			
			
			);
		$this->m_krs_wdesign->input_data($data,'krs_wdesign');
		redirect('krs/krs_wdesign/index');
	}

	function index(){
			$data['krs_wdesign'] = $this->m_krs_wdesign->tampil_data();
			$this->load->view('krs/krs_wdesign/list_krs',$data);
		}

	function edit($id_krs){
		$where = array('id_krs' => $id_krs);
		$data['krs_wdesign'] = $this->m_krs_wdesign->edit_data($where,'krs_wdesign')->result();

		$this->load->view('krs/krs_wdesign/edit_krs',$data);
	}

	function update(){
		$id_krs = $this->input->post('id_krs');
		$id_mk = $this->input->post('id_mk');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$nim = $this->input->post('nim');

		$data = array(
			'id_krs' => $id_krs,
			'id_mk' => $id_mk,
			'nama_mahasiswa' => $nama_mahasiswa,
			'nim' => $nim,

			);

		$where = array(
			'id_krs' => $id_krs
		);

		$this->m_krs_wdesign->update_data($where,$data,'krs_wdesign');
		redirect('krs/krs_wdesign/index');
	}
	
	function hapus($id_krs){
		$where = array('id_krs' => $id_krs);
		$this->m_krs_wdesign->hapus_data($where,'krs_wdesign');
		redirect('krs/krs_wdesign/index');
    }
}

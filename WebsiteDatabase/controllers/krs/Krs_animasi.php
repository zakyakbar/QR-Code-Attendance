<?php 

class krs_animasi extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('krs/m_krs_animasi');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('krs/krs_animasi/form_krs');
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
		$this->m_krs_animasi->input_data($data,'krs_animasi');
		redirect('krs/krs_animasi/index');
	}

	function index(){
			$data['krs_animasi'] = $this->m_krs_animasi->tampil_data();
			$this->load->view('krs/krs_animasi/list_krs',$data);
		}

	function edit($id_krs){
		$where = array('id_krs' => $id_krs);
		$data['krs_animasi'] = $this->m_krs_animasi->edit_data($where,'krs_animasi')->result();

		$this->load->view('krs/krs_animasi/edit_krs',$data);
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

		$this->m_krs_animasi->update_data($where,$data,'krs_animasi');
		redirect('krs/krs_animasi/index');
	}
	
	function hapus($id_krs){
		$where = array('id_krs' => $id_krs);
		$this->m_krs_animasi->hapus_data($where,'krs_animasi');
		redirect('krs/krs_animasi/index');
    }
}

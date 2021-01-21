<?php 

class Krs_rlistrik extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('krs/m_krs_rlistrik');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('krs/krs_rlistrik/form_krs');
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
		$this->m_krs_rlistrik->input_data($data,'krs_rlistrik');
		redirect('krs/krs_rlistrik/index');
	}

	function index(){
			$data['krs_rlistrik'] = $this->m_krs_rlistrik->tampil_data();
			$this->load->view('krs/krs_rlistrik/list_krs',$data);
		}

	function edit($id_krs){
		$where = array('id_krs' => $id_krs);
		$data['krs_rlistrik'] = $this->m_krs_rlistrik->edit_data($where,'krs_rlistrik')->result();

		$this->load->view('krs/krs_rlistrik/edit_krs',$data);
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

		$this->m_krs_rlistrik->update_data($where,$data,'krs_rlistrik');
		redirect('krs/krs_rlistrik/index');
	}
	
	function hapus($id_krs){
		$where = array('id_krs' => $id_krs);
		$this->m_krs_rlistrik->hapus_data($where,'krs_rlistrik');
		redirect('krs/krs_rlistrik/index');
    }
}

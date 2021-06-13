<?php 

class Matakuliah extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_matakuliah');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('matakuliah/form_matkul');
		}

	function tambah_aksi(){
		$id_mk = $this->input->post('id_mk');
		$nama_matkul = $this->input->post('nama_matkul');
		$semester = $this->input->post('semester');
		$id = $this->input->post('id');

		$data = array(
			'id_mk' => $id_mk,
			'nama_matkul' => $nama_matkul,
			'semester' => $semester,
			'id' => $id,

			);
		$this->m_matakuliah->input_data($data,'tb_matkul');
		redirect('matakuliah/index');
	}

	function index(){
			$data['matakuliah'] = $this->m_matakuliah->tampil_data();
			$this->load->view('matakuliah/list_matkul',$data);
		}

	function edit($id_mk){
		$where = array('id_mk' => $id_mk);
		$data['matakuliah'] = $this->m_matakuliah->edit_data($where,'tb_matkul')->result();

		$this->load->view('matakuliah/edit_matkul',$data);
	}

	function update(){
		$id_mk = $this->input->post('nim');
		$nama_matkul = $this->input->post('nama_matkul');
		$semester = $this->input->post('semester');
		$id = $this->input->post('id');

		$data = array(
			'id_mk' => $id_mk,
			'nama_matkul' => $nama_matkul,
			'semester' => $semester,
			'id' => $id,
			
			);

		$where = array(
			'id_mk' => $id_mk
		);

		$this->m_matakuliah->update_data($where,$data,'tb_matkul');
		redirect('matakuliah/index');
	}
	
	function hapus($id_mk){
		$where = array('id_mk' => $id_mk);
		$this->m_matakuliah->hapus_data($where,'tb_matkul');
		redirect('matakuliah/index');
    }
}

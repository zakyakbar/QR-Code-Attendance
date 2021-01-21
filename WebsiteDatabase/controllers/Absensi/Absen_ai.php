<?php 

class Absen_ai extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('absensi/m_absen_ai');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('absensi/absen_ai/form_absen');
		}

	function tambah_aksi(){
		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$name = $this->input->post('name');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('waktu');

		$data = array(
			'id' => $id,
			'tanggal' => $tanggal,
			'name' => $name,
			'nim' => $nim,
			'waktu' => $waktu
			);
		$this->m_absen_ai->input_data($data,'absen_ai');
		redirect('absensi/absen_ai/index');
	}

	function index(){
			$data['absen_ai'] = $this->m_absen_ai->tampil_data();
			$this->load->view('absensi/absen_ai/list_absen',$data);
		}

	function hapus($id){
		$where = array('id' => $id);
		$this->m_absen_ai->hapus_data($where,'absen_ai');
		redirect('absensi/absen_ai/index');
    }
}

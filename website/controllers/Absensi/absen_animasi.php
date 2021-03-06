<?php 

class Absen_animasi extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('absensi/m_absen_animasi');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('absensi/absen_animasi/form_absen');
		}

	function tambah_aksi(){
		$name = $this->input->post('name');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('waktu');

		$data = array(
			'name' => $name,
			'nim' => $nim,
			'waktu' => $waktu
			);
		$this->m_absen_animasi->input_data($data,'absen_animasi');
		redirect('absensi/absen_animasi/index');
	}

	function index(){
			$data['absen_animasi'] = $this->m_absen_animasi->tampil_data();
			$this->load->view('absensi/absen_animasi/list_absen',$data);
		}
		
	function edit($id){
		$where = array('id' => $id);
		$data['absen_animasi'] = $this->m_absen_animasi->edit_data($where,'absen_animasi')->result();
		$this->load->view('absensi/absen_animasi/edit_absen',$data);
	}

	function update(){
        $tanggal = $this->input->post('tanggal');
        $name = $this->input->post('name');
        $nim = $this->input->post('nim');
		$waktu = $this->input->post('waktu');
		

        $data = array(
            'tanggal' => $tanggal,
            'name' => $name,
            'nim' => $nim,
			'waktu' => $waktu,
			
			
			
			);
			
		$where = array(
			'name' => $name
		);

		$this->m_absen_animasi->update_data($where,$data,'absen_animasi');
		redirect('absensi/absen_animasi/index');
	}

	function hapus($name){
		$where = array('name' => $name);
		$this->m_absen_animasi->hapus_data($where,'absen_animasi');
		redirect('absensi/absen_animasi/index');
    }
}

<?php 

class Absen_rlistrik extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('absensi/m_absen_rlistrik');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('absensi/absen_rlistrik/form_absen');
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
		$this->m_absen_rlistrik->input_data($data,'absen_rlistrik');
		redirect('absensi/absen_rlistrik/index');
	}

	function index(){
			$data['absen_rlistrik'] = $this->m_absen_rlistrik->tampil_data();
			$this->load->view('absensi/absen_rlistrik/list_absen',$data);
		}
		
	function edit($name){
		$where = array('name' => $name);
		$data['absen_rlistrik'] = $this->m_absen_rlistrik->edit_data($where,'absen_rlistrik')->result();
		$this->load->view('absensi/absen_rlistrik/edit_absen',$data);
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

		$this->m_absen_rlistrik->update_data($where,$data,'absen_rlistrik');
		redirect('absensi/absen_rlistrik/index');
	}

	function hapus($name){
		$where = array('name' => $name);
		$this->m_absen_rlistrik->hapus_data($where,'absen_rlistrik');
		redirect('absensi/absen_rlistrik/index');
    }
}

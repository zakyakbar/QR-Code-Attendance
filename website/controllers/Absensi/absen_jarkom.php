<?php 

class absen_jarkom extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('absensi/m_absen_jarkom');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('absensi/absen_jarkom/form_absen');
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
		$this->m_absen_jarkom->input_data($data,'absen_jarkom');
		redirect('absensi/absen_jarkom/index');
	}

	function index(){
			$data['absen_jarkom'] = $this->m_absen_jarkom->tampil_data();
			$this->load->view('absensi/absen_jarkom/list_absen',$data);
		}
		
	function edit($name){
		$where = array('name' => $name);
		$data['absen_jarkom'] = $this->m_absen_jarkom->edit_data($where,'absen_jarkom')->result();
		$this->load->view('absensi/absen_jarkom/edit_absen',$data);
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

		$this->m_absen_jarkom->update_data($where,$data,'absen_jarkom');
		redirect('absensi/absen_jarkom/index');
	}

	function hapus($name){
		$where = array('name' => $name);
		$this->m_absen_jarkom->hapus_data($where,'absen_jarkom');
		redirect('absensi/absen_jarkom/index');
    }
}

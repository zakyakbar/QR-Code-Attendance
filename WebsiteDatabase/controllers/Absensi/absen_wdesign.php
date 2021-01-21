<?php 

class Absen_wdesign extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('absensi/m_absen_wdesign');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('absensi/absen_wdesign/form_absen');
		}
 
	function tambah_aksi(){
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('waktu');
 
		$data = array(
            'id' => $id,
			'name' => $name,
			'nim' => $nim,
			'waktu' => $waktu
			);
		$this->m_absen_wdesign->input_data($data,'absen_wdesign');
		redirect('absensi/absen_wdesign/index');
	}

	function index(){
			$data['absen_wdesign'] = $this->m_absen_wdesign->tampil_data();
			$this->load->view('absensi/absen_wdesign/list_absen',$data);
		}
		
	function edit($id){
		$where = array('id' => $id);
		$data['absen_wdesign'] = $this->m_absen_wdesign->edit_data($where,'absen_wdesign')->result();
		$this->load->view('absensi/absen_wdesign/edit_absen',$data);
	}

	function update(){
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
			'waktu' => $waktu,
			
			
			
			);
			
		$where = array(
			'id' => $id
		);

		$this->m_absen_wdesign->update_data($where,$data,'absen_wdesign');
		redirect('absensi/absen_wdesign/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->m_absen_wdesign->hapus_data($where,'absen_wdesign');
		redirect('absensi/absen_wdesign/index');
    }
}

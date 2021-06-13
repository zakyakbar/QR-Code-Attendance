<?php 

class Krs_jarkom extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('krs/m_krs_jarkom');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('krs/krs_jarkom/form_krs');
		}

	function tambah_aksi(){
		$id_krs = $this->input->post('id_krs');
		$id_mk = $this->input->post('id_mk');
		$nim = $this->input->post('nim');
	

		$data = array(
            'id_krs' => $id_krs,
			'id_mk' => $id_mk,
			'nim' => $nim,
			
			
			);
		$this->m_krs_jarkom->input_data($data,'krs_jarkom');
		redirect('krs/krs_jarkom/index');
	}

	function index(){
			$data['krs_jarkom'] = $this->m_krs_jarkom->tampil_data();
			$this->load->view('krs/krs_jarkom/list_krs',$data);
		}

	function edit($id_krs){
		$where = array('id_krs' => $id_krs);
		$data['krs_jarkom'] = $this->m_krs_jarkom->edit_data($where,'krs_jarkom')->result();

		$this->load->view('krs/krs_jarkom/edit_krs',$data);
	}

	function update(){
		$id_krs = $this->input->post('id_krs');
		$id_mk = $this->input->post('id_mk');
		$nim = $this->input->post('nim');

		$data = array(
			'id_krs' => $id_krs,
			'id_mk' => $id_mk,
			'nim' => $nim,

			);

		$where = array(
			'id_krs' => $id_krs
		);

		$this->m_krs_jarkom->update_data($where,$data,'krs_jarkom');
		redirect('krs/krs_jarkom/index');
	}
	
	function hapus($id_krs){
		$where = array('id_krs' => $id_krs);
		$this->m_krs_jarkom->hapus_data($where,'krs_jarkom');
		redirect('krs/krs_jarkom/index');
    }
}

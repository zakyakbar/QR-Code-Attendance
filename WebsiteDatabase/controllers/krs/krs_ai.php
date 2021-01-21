<?php 

class Krs_ai extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('krs/m_krs_ai');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('krs/krs_ai/form_krs');
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
		$this->m_krs_ai->input_data($data,'krs_ai');
		redirect('krs/krs_ai/index');
	}

	function index(){
			$data['krs_ai'] = $this->m_krs_ai->tampil_data();
			$this->load->view('krs/krs_ai/list_krs',$data);
		}

	function edit($id_krs){
		$where = array('id_krs' => $id_krs);
		$data['krs_ai'] = $this->m_krs_ai->edit_data($where,'krs_ai')->result();

		$this->load->view('krs/krs_ai/edit_krs',$data);
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

		$this->m_krs_ai->update_data($where,$data,'krs_ai');
		redirect('krs/krs_ai/index');
	}
	
	function hapus($id_krs){
		$where = array('id_krs' => $id_krs);
		$this->m_krs_ai->hapus_data($where,'krs_ai');
		redirect('krs/krs_ai/index');
    }
}

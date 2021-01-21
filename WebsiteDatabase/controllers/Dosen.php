<?php 
 
class Dosen extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_dosen');
                $this->load->helper(array('url'));
	}

          /** Fungsi CREATE */
  
	function tambah(){
			$this->load->view('dosen/form_dosen');
		}
 
	function tambah_aksi(){
		$id = $this->input->post('id');
		$nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		$email = $this->input->post('email');
		$kontak_dosen = $this->input->post('kontak_dosen');
		$alamat = $this->input->post('alamat');
		$qrcode = $this->input->post('qrcode');
		$password = md5($this->input->post('password'));
 
		$data = array(
            'id' => $id,
			'nama_dosen' => $nama_dosen,
			'email' => $email,
			'kontak_dosen' => $kontak_dosen,
			'alamat' => $alamat,
			'qrcode' => $qrcode,
			'password' => $password,
			
			);
		$this->m_dosen->input_data($data,'tb_dosen');
		redirect('dosen/index');
	}

	function index(){
			$data['dosen'] = $this->m_dosen->tampil_data();
			$this->load->view('dosen/list_dosen',$data);
		}
		
	function edit($id){
		$where = array('id' => $id);
		$data['dosen'] = $this->m_dosen->edit_data($where,'tb_dosen')->result();
		$this->load->view('dosen/edit_dosen',$data);
	}

	function update(){
		$id = $this->input->post('id');
        $nip = $this->input->post('nip');
		$nama_dosen = $this->input->post('nama_dosen');
		$email = $this->input->post('email');
		$kontak_dosen = $this->input->post('kontak_dosen');
		$alamat = $this->input->post('alamat');
		$qrcode = $this->input->post('qrcode');
		$password = $this->input->post('password');

        $data = array(
			'id' => $id,
            'nip' => $nip,
			'nama_dosen' => $nama_dosen,
			'email' => $email,
			'kontak_dosen' => $kontak_dosen,
			'alamat' => $alamat,
			'qrcode' => $qrcode,
			'password' => $password,
			
			
			);
			
		$where = array(
			'id' => $id
		);

		$this->m_dosen->update_data($where,$data,'tb_dosen');
		redirect('dosen/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->m_dosen->hapus_data($where,'tb_dosen');
		redirect('dosen/index');
    }
}

<?php 

class Mahasiswa extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_mahasiswa');
                $this->load->helper(array('url'));
	}

	function tambah(){
			$this->load->view('mahasiswa/form_mahasiswa');
		}

	function tambah_aksi(){
		$nim = $this->input->post('nim');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$email = $this->input->post('email');
		$kontak_mahasiswa = $this->input->post('kontak_mahasiswa');
		$alamat = $this->input->post('alamat');
		$id_krs = $this->input->post('id_krs');
		$password = md5($this->input->post('password'));

		$data = array(
			'nama_mahasiswa' => $nama_mahasiswa,
			'email' => $email,
			'kontak_mahasiswa' => $kontak_mahasiswa,
			'alamat' => $alamat,
			'id_krs' => $id_krs,
			'password' => $password,
			
			);
		$this->m_mahasiswa->input_data($data,'tb_mahasiswa');
		redirect('mahasiswa/index');
	}

	function index(){
			$data['mahasiswa'] = $this->m_mahasiswa->tampil_data();
			$this->load->view('mahasiswa/list_mahasiswa',$data);
		}

	function edit($nim){
		$where = array('nim' => $nim);
		$data['mahasiswa'] = $this->m_mahasiswa->edit_data($where,'tb_mahasiswa')->result();

		$this->load->view('mahasiswa/edit_mahasiswa',$data);
	}

	function update(){
		$nim = $this->input->post('nim');
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$email = $this->input->post('email');
		$kontak_mahasiswa = $this->input->post('kontak_mahasiswa');
		$alamat = $this->input->post('alamat');
		$id_krs = $this->input->post('id_krs');
		$password = md5($this->input->post('password'));

		$data = array(
			
			'nama_mahasiswa' => $nama_mahasiswa,
			'email' => $email,
			'kontak_mahasiswa' => $kontak_mahasiswa,
			'alamat' => $alamat,
			'id_krs' => $id_krs,
			'password' => $password
			
			);

		$where = array(
			'nim' => $nim
		);

		$this->m_mahasiswa->update_data($where,$data,'tb_mahasiswa');
		redirect('mahasiswa/index');
	}
	
	function hapus($nim){
		$where = array('nim' => $nim);
		$this->m_mahasiswa->hapus_data($where,'tb_mahasiswa');
		redirect('mahasiswa/index');
    }
}

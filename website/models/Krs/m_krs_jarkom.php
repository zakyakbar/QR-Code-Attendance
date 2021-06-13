<?php

class m_krs_jarkom extends CI_Model{

        function input_data($data,$table){
		$this->db->insert($table,$data);
	}

        function tampil_data(){
                //$this->db->select('*');  
                $this->db->select('krs_jarkom.*, tb_mahasiswa.nama_mahasiswa ');          /**untuk memilih tabel user dan kolom jenis pada tabel gender */
                $this->db->from('krs_jarkom');                                   /**untuk memilih tabel user untuk dihubungkan ke tabel gender */
                $this->db->join('tb_mahasiswa', 'tb_mahasiswa.nim = krs_jarkom.nim');      /**untuk menggabungkan 2 tabel tadi */
                $query = $this->db->get();
        return $query->result();
	}

        function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

        function hapus_data($where,$table){
                $this->db->where($where);
                $this->db->delete($table);
        }

}
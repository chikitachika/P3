<?php 

class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
//membuat function input_data
	function input_data($data,$table){
		$this->db->insert($table,$data);
    }
//variabel array $where berisi data id
    function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
    }
//berfungsi untuk mengambil data menurut id 
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
//untuk update data
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}
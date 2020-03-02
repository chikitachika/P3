<?php 

class Crud extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
                $this->load->helper('url');
	}
//menampilkan data dengan function tampil_data yang dibuat adalam m_data untuk mengambil data dari database
	function index(){
        $data['user'] = $this->m_data->tampil_data()->result();
        //untuk memparsing ke view v_tampil
		$this->load->view('v_tampil',$data);
    }
//fungsi untuk menambah data
    function tambah(){
		$this->load->view('v_input');
    }
    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
 //mengambil dari tabel yang ada di database
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		$this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    //untuk menghapus data
    function hapus($id){
    //$id guna untuk menangkap data id yang dikirim melalui url dari link hapus
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
//untuk mengubah atau update data
    function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
        $this->load->view('v_edit',$data);
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
    //untuk mengubah data yang telah ditampilkan
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
    //sebagai penentu data yang akan diupdate
        $where = array(
            'id' => $id
        );
    //untuk menghandle update data pada database
        $this->m_data->update_data($where,$data,'user');
        redirect('crud/index');
    }
    
}
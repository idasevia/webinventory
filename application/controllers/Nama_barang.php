<?php

class Nama_barang extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_inventori');
    }

    public function index()
    {
        $data1['title'] = 'Master Nama Barang'; 
        $this->load->model('m_inventori');
        $data['nama'] = $this->m_inventori->tampil_nama()->result();
        $this->load->view('templates/header', $data1);
        $this->load->view('templates/sidebar');
        $this->load->view('nama_barang', $data);
        $this->load->view('templates/footer');
    }

    //Untuk tampilan tambah nama
    public function tambah_nama()
    {  
        $data['title'] = 'Tambah Nama Barang'; 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('tambah_nama');
        $this->load->view('templates/footer');
    }

    //Untuk melakukan tambah nama
    public function aksi_nama()
    {        
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_nama();
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
            );

            $this->m_inventori->input_nama ($data, 'nama_barang');
            $this->session->set_flashdata('pesan_tambah', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Nama Barang Berhasil Di Tambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('nama_barang');
        }
    }

    //Untuk validasi tambahh data harus diisi
    public function _rules()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required|is_unique[nama_barang.nama_barang]', array(
            'required' => '%s harus diisi !!!',
            'is_unique' => 'Nama barang sudah terdaftar'
        ));
    }

    //Edit nama barang
    public function edit_nama($nama_barang)
    {
        $nama_barang = urldecode($nama_barang);
        $data1['title'] = 'Edit Nama Barang'; 
        $data['nama'] = $this->m_inventori->get_nama_by_name($nama_barang);

        if (!$data['nama']) {
            show_404();
        }

        $this->load->view('templates/header', $data1);
        $this->load->view('templates/sidebar');
        $this->load->view('edit_nama', $data);
        $this->load->view('templates/footer');
    }

    // Proses update nama barang
    public function update_nama()
    {
        $nama_barang_lama = $this->input->post('nama_barang_lama');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit_nama($nama_barang_lama);
        } else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
            );
            $this->m_inventori->update_nama($nama_barang_lama, $data);
            $this->session->set_flashdata('pesan_edit', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Nama Barang Berhasil Di Edit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('nama_barang');
        }
    }

    //Hapus nama barang
    public function hapus_nama($js)
    {
        // $where = array('nama_barang' => $js);
        $where = array('nama_barang' => urldecode($js));

        $this->m_inventori->hapus_nama($where, 'nama_barang');
            $this->session->set_flashdata('pesan_hapus', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Nama Barang Berhasil Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('nama_barang');
    }

}
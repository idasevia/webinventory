<?php

class Laporan_barang_masuk extends CI_Controller
{

    public function index()
    {
        $data1['title'] = 'Laporan Barang Masuk';
        $this->load->model('m_inventori');
        $data['laporan'] = $this->m_inventori->mengambil_data_barang_masuk();
        // $data['barang'] = $this->m_inventori->get_data()->result();
        $this->load->view('templates/header', $data1);
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function filter()
    {
        $data1['title'] = 'Laporan Barang Masuk';
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Validasi dan format tanggal jika diperlukan

        $this->load->model('m_inventori');
        $data['laporan'] = $this->m_inventori->fiter_tanggal_barang_masuk($start_date, $end_date);

        // Load view dengan data yang telah difilter
        $this->load->view('templates/header', $data1);
        $this->load->view('templates/sidebar');
        $this->load->view('laporan_barang_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function cetak()
    {
        // Ambil tanggal dari tanggal tertentu, jika ada
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Gunakan model dengan filter tanggal jika ada
        $this->load->model('m_inventori');
        if ($start_date && $end_date) {
            $data['laporan'] = $this->m_inventori->fiter_tanggal_barang_masuk($start_date, $end_date);
        } else {
            $data['laporan'] = $this->m_inventori->mengambil_data_barang_masuk();
        }

        // Load view untuk cetak
        $this->load->view('cetak_barang_masuk', $data);
    }
}

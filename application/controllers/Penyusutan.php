<?php

class Penyusutan extends CI_Controller {
    public function __construct (){
        parent::__construct();
        $this->load->model('m_inventori');
    }

	public function index(){
        $data1['title'] = 'Penyusutan';
        $data['penyusutan'] = $this->m_inventori->tampil_penyusutan();
        $this->load->view('templates/header', $data1);
        $this->load->view('templates/sidebar');
        $this->load->view('penyusutan', $data);
        $this->load->view('templates/footer');
	}
}
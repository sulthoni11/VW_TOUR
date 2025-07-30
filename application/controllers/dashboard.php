<?php
class dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_dashboard');
    }
    public function index(){
        $data['kendaraan'] = $this->m_dashboard->tampil_data();
        $this->load->view('head');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
        }


    function cari_kendaraan()
    {
        // Ambil input dari form
        $merk = $this->input->post('merk');
        $min_harga = $this->input->post('min_harga');
        $max_harga = $this->input->post('max_harga');

        // Kirim input ke model untuk filter
        $data['kendaraan'] = $this->m_dashboard->filter_mobil($merk, $min_harga, $max_harga);

        // Load view dengan hasil filter
        $this->load->view('head');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }

    function urutkan() {
        $urut = $this->input->post('urutkan');
        $data['kendaraan'] = $this->m_dashboard->urutkan($urut);
        $this->load->view('head');
        $this->load->view('dashboard', $data);
        $this->load->view('footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('dashboard');
    }

}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penyewaan_model');
        $this->load->model('Customer_model');
        $this->load->model('Mobil_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['penyewaan'] = $this->Penyewaan_model->get_all_penyewaan();
        $data['customers'] = $this->Customer_model->get_all_customers();
        $data['mobils'] = $this->Mobil_model->get_all_mobils();
        $this->load->view('head');
        $this->load->view('penyewaan_view', $data);
        $this->load->view('footer');
    }

    public function tambah_form() {
        $data['customers'] = $this->Customer_model->get_all_customers();
        $data['mobils'] = $this->Mobil_model->get_all_mobils();
        $this->load->view('head');
        $this->load->view('tambah_penyewaan_view', $data);
        $this->load->view('footer');
    }
 
    public function tambah_penyewaan() {
        $this->form_validation->set_rules('id_cus', 'Customer', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat Mobil', 'required');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('penyewaan/tambah_form');
        } else {
            $data = [
                'id_cus' => $this->input->post('id_cus'),
                'no_plat' => $this->input->post('no_plat'),
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali' => $this->input->post('tanggal_kembali'),
            ];

            $this->Penyewaan_model->insert_penyewaan($data);
            $this->session->set_flashdata('success', 'Penyewaan berhasil ditambahkan.');
            redirect('penyewaan');
        }
    }

    public function hapus($id_pinjam) {
        // Hapus data terkait di tabel pembayaran
        $this->Penyewaan_model->delete_pembayaran($id_pinjam);
    
        // Hapus data dari tabel penyewaan
        $this->Penyewaan_model->delete_penyewaan($id_pinjam);
    
        $this->session->set_flashdata('success', 'Penyewaan berhasil dihapus.');
        redirect('penyewaan');
    }
 
    public function edit($id_pinjam) {
        $data['penyewaan'] = $this->Penyewaan_model->get_penyewaan_by_id($id_pinjam);
        $data['customers'] = $this->Customer_model->get_all_customers();
        $data['mobils'] = $this->Mobil_model->get_all_mobils();
        $this->load->view('edit_penyewaan_view', $data);
    }

    public function update() {
        $id_pinjam = $this->input->post('id_pinjam');
        $data = [
            'id_cus' => $this->input->post('id_cus'),
            'no_plat' => $this->input->post('no_plat'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali'),
        ];

        $this->Penyewaan_model->update_penyewaan($id_pinjam, $data);
        $this->session->set_flashdata('success', 'Penyewaan berhasil diperbarui.');
        redirect('penyewaan');
    }
}

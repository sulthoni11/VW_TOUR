<?php
class pembayaran extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_pembayaran');
    }
    public function index(){
        $data['pembayaran'] = $this->m_pembayaran->get_pembayaran();
        $this->load->view('head');
        $this->load->view('pembayaran', $data);
        $this->load->view('footer');
        }

        public function update($ID_pembayaran) {
            $result = $this->m_pembayaran->update_status($ID_pembayaran); 
        
            if ($result) {
                $this->session->set_flashdata('success', 'Status pembayaran berhasil diperbarui.');
                redirect('pembayaran');  
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate status pembayaran.');
                redirect('pembayaran');
            }
        }

    // public function update($ID_pinjam){
    //     $data['pembayaran'] = $this->m_pembayaran->update_status();
    //     $this->m_pembayaran->update_status($ID_pinjam);
    //     $this->load->view('head');
    //     $this->load->view('pembayaran', $data);
    //     $this->load->view('footer');

    // }
}
?>
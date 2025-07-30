<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pembayaran extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database diload di konstruktor
    }
    public function get_pembayaran() {
        $this->db->select('c.nama, m.No_Plat, p.total, p.STATUS, p.ID_pembayaran');
        $this->db->from('customer c');
        $this->db->join('penyewaan', 'c.ID_cus = penyewaan.ID_cus', 'inner');
        $this->db->join('mobil m', 'm.No_Plat = penyewaan.No_Plat', 'inner');
        $this->db->join('pembayaran p', 'p.ID_pinjam = penyewaan.ID_pinjam', 'inner');
        return $this->db->get()->result_array();
    }

    public function update_status($ID_pembayaran) {
        $this->db->set('status', 'Lunas');  
        $this->db->where('ID_pembayaran', $ID_pembayaran);  
        return $this->db->update('pembayaran');  
    }
    
    // public function update_status($ID_pinjam) {
    //     $query = $this->db->prepare("UPDATE pembayaran SET status = 'Lunas' WHERE ID_pinjam = :ID_pinjam");
    //     $query->bindParam(':ID_pinjam', $ID_pinjam);

    //     if ($query->execute()) {
    //         return true; // Berhasil diupdate
    //     } else {
    //         return false; // Gagal diupdate
    //     }
    // }
}
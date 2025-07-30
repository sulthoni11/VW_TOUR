<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewaan_model extends CI_Model {

    public function get_all_penyewaan() {
        $this->db->select('p.id_pinjam, p.tanggal_pinjam, p.tanggal_kembali, c.nama as nama_customer, c.alamat, c.no_telp, m.no_plat');
        $this->db->from('penyewaan p');
        $this->db->join('customer c', 'p.id_cus = c.id_cus', 'left');
        $this->db->join('mobil m', 'p.no_plat = m.no_plat', 'left');
        return $this->db->get()->result_array();
    }
    

    public function insert_penyewaan($data) {
        $this->db->insert('penyewaan', $data);
    }

    public function delete_pembayaran($id_pinjam) {
        $this->db->where('ID_pinjam', $id_pinjam);
        return $this->db->delete('pembayaran');
    }
    public function delete_penyewaan($id_pinjam) {
        $this->db->where('ID_pinjam', $id_pinjam);
        return $this->db->delete('penyewaan');
    }
    public function get_penyewaan_by_id($id_pinjam) {
        $this->db->select('p.*, c.nama as nama_customer, m.jenis, m.merk');
        $this->db->from('penyewaan p');
        $this->db->join('customer c', 'p.id_cus = c.id_cus', 'left');
        $this->db->join('mobil m', 'p.no_plat = m.no_plat', 'left');
        $this->db->where('p.id_pinjam', $id_pinjam);
        return $this->db->get()->row_array();
    }

    public function update_penyewaan($id_pinjam, $data) {
        $this->db->where('id_pinjam', $id_pinjam);
        $this->db->update('penyewaan', $data);
    }
}

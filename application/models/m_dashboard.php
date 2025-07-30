    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Pastikan database diload di konstruktor
    }
    public function tampil_data()
    {
        return $this->db->get('mobil')->result_array();
    }

    // Mengambil semua data kendaraan
    public function get_all_mobil() {
        return $this->db->get('mobil')->result_array();
    }

    // Mengambil data kendaraan berdasarkan ID
    public function get_mobil_by_id($No_Plat) {
        return $this->db->get_where('mobil', ['No_Plat' => $No_Plat])->result_array();
    }

    public function filter_mobil($merk, $harga, $min_harga = null, $max_harga = null)
    {
        $this->db->select('*');
        $this->db->from('mobil');

        // Filter berdasarkan merk (jika diisi)
        if (!empty($merk)) {
            $this->db->like('Merk', $merk);
        }

        // Filter berdasarkan harga maksimum (jika diisi)
        if (!empty($harga)) {
            $this->db->where('Harga_Per_Hari <=', $harga);
        }

        // Mengatur harga minimum dan maksimum menggunakan HAVING
        if (!is_null($min_harga) || !is_null($max_harga)) {
            $this->db->select('MIN(Harga_Per_Hari) AS min_harga, MAX(Harga_Per_Hari) AS max_harga', false);
            $this->db->group_by('No_Plat');
            if (!is_null($min_harga)) {
                $this->db->having('min_harga >=', $min_harga);
            }
            if (!is_null($max_harga)) {
                $this->db->having('max_harga <=', $max_harga);
            }
        }

        // Eksekusi query dan return hasilnya
        $query = $this->db->get();
        return $query->result_array();
    }

public function urutkan($urut)
{
    $this->db->select('*');
    $this->db->from('mobil');

    // Urutkan data berdasarkan harga
    if ($urut == 'harga_terendah') {
        $this->db->order_by('Harga_Per_Hari', 'ASC');
    } elseif ($urut == 'harga_tertinggi') {
        $this->db->order_by('Harga_Per_Hari', 'DESC');
    }

    // Eksekusi query dan return hasilnya
    $query = $this->db->get();
    return $query->result_array();
}
}

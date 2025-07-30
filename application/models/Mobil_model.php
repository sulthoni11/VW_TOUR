<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil_model extends CI_Model {

    public function get_all_mobils() {
        return $this->db->get('mobil')->result_array();
    }
}

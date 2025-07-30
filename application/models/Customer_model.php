<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function get_all_customers() {
        return $this->db->get('customer')->result_array();
    }
}

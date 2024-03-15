<?php
class Customer_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_customer() {
        return $this->db->get('customer')->result_array();
    }

    public function add_customer($data) {
        $this->db->insert('customer', $data);
        return $this->db->insert_id();
    }

    public function get_customer_by_id($id) {
        return $this->db->get_where('customer', array('id' => $id))->row();
    }

    public function penjualan() {
        return $this->has_many('Penjualan_model', 'id_customer');
    }

    public function update_customer($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('customer', $data);
    }

    public function delete_customer($id) {
        
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $this->db->where('id', $id);
        $this->db->delete('customer');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function is_email_registered($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('customer');
        return $query->num_rows() > 0; 
    }
}
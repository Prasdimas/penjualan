<?php
class Sales_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_sales() {
        return $this->db->get('sales')->result_array();
    }

    public function add_sales($data) {
        $this->db->insert('sales', $data);
        return $this->db->insert_id();
    }

    public function get_sales_by_id($id) {
        return $this->db->get_where('sales', array('id' => $id))->row();
    }

    public function penjualan() {
        return $this->has_many('Penjualan_model', 'id_sales');
    }

    public function update_sales($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('sales', $data);
    }

    public function delete_sales($id) {
        
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $this->db->where('id', $id);
        $this->db->delete('sales');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function is_email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('sales');
        return $query->num_rows() > 0; 
    }
}
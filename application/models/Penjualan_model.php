<?php
class Penjualan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function rumah() {
        return $this->belongs_to('Rumah_model', 'id_rumah');
    }
    public function filter_by_date($start_date, $end_date) {
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $this->db->select('penjualan_rumah.*, customer.nama AS nama_customer, sales.nama AS nama_sales, rumah.nama AS nama_rumah');
        $this->db->from('penjualan_rumah');
        $this->db->join('customer', 'customer.id = penjualan_rumah.id_customer');
        $this->db->join('sales', 'sales.id = penjualan_rumah.id_sales');
        $this->db->join('rumah', 'rumah.id = penjualan_rumah.id_rumah');
        return $this->db->get()->result_array();
    }
    public function customer() {
        return $this->belongs_to('Customer_model', 'id_customer');
    }

    public function sales() {
        return $this->belongs_to('Sales_model', 'id_sales');
    }
    public function get_all_penjualan() {
        $this->db->select('penjualan_rumah.*, customer.nama AS nama_customer, sales.nama AS nama_sales, rumah.nama AS nama_rumah');
        $this->db->from('penjualan_rumah');
        $this->db->join('customer', 'customer.id = penjualan_rumah.id_customer');
        $this->db->join('sales', 'sales.id = penjualan_rumah.id_sales');
        $this->db->join('rumah', 'rumah.id = penjualan_rumah.id_rumah');
        return $this->db->get()->result_array();
    }

    public function get_penjualan_by_id($id) {
        $this->db->select('penjualan_rumah.*, customer.nama AS nama_customer, sales.nama AS nama_sales, rumah.nama AS nama_rumah');
        $this->db->from('penjualan_rumah');
        $this->db->join('customer', 'customer.id = penjualan_rumah.customer_id');
        $this->db->join('sales', 'sales.id = penjualan_rumah.sales_id');
        $this->db->join('rumah', 'rumah.id = penjualan_rumah.rumah_id');
        $this->db->where('penjualan_rumah.id', $id);
        return $this->db->get()->row_array();
    }

    public function add_penjualan($data) {
        $this->db->insert('penjualan_rumah', $data);
        return $this->db->insert_id();
    }
    public function update_penjualan($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('penjualan_rumah', $data);
    }

    public function delete_penjualan($id) {
        $this->db->where('id', $id);
        $this->db->delete('penjualan_rumah');
    }
}
<?php
class Rumah_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        
    }
    public function get_rumah_by_id($id) {
        return $this->db->get_where('rumah', array('id' => $id))->row();
    }

    public function get_penjualan_by_rumah_id($rumah_id) {
        return $this->db->get_where('penjualan', array('rumah_id' => $rumah_id))->result();
    }
    public function get_all_rumah() {
        return $this->db->get('rumah')->result_array();
    }

    public function add_rumah($data) {
        $this->db->insert('rumah', $data);
        return $this->db->insert_id();
    }
    public function update_rumah($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('rumah', $data);
    }

    public function delete_rumah($id) {
        
        if (!is_numeric($id) || $id <= 0) {
            return false;
        }
        $this->db->where('id', $id);
        $this->db->delete('rumah');
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
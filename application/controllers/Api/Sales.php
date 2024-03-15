<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Sales extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Sales_model');
    }

    public function index_get() {
        $sales = $this->Sales_model->get_all_sales();
        if (!empty($sales)) {
            $this->response($sales, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No sales found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_post() {
        $nama = $this->post('nama');
        $email = $this->post('email');
        $telepon = $this->post('telepon');
        $alamat = $this->post('alamat');
    
        if (empty($nama) || empty($email) || empty($telepon) || empty($alamat)) {
            $this->response([
                'status' => false,
                'message' => 'All fields are required'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }
        if ($this->Sales_model->is_email_exists($email)) {
            $this->response([
                'status' => false,
                'message' => 'Email already exists'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon,
            'alamat' => $alamat
        );
    
        if ($this->Sales_model->add_sales($data)) {
            $this->response([
                'status' => true,
                'message' => 'Sales added successfully'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to add sales'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    
    public function index_put() {
        $id = $this->put('id');
        $data = array(
            "nama" => $this->put('nama'),
            "email" => $this->put('email'),
            "telepon" => $this->put('telepon'),
            "alamat" => $this->put('alamat')
        );
        
        $update_result = $this->Sales_model->update_sales($id, $data);
        
        if ($update_result !== false) {
            $this->response([
                'status' => true,
                'message' => 'Sales updated successfully'
            ], RestController::HTTP_OK);
        } else {
            $error_message = $this->db->error();
            $this->response([
                'status' => false,
                'message' => 'Failed to update sales: ' . $error_message['message']
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    public function index_delete($id) {
        $this->db->where('id', $id);
        $delete_result = $this->db->delete('sales');
    
        if ($delete_result) {
            $this->response([
                'status' => true,
                'message' => 'Sales deleted successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to delete sales'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    
    
    
}


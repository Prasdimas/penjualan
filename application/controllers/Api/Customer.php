<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Customer extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
    }

    public function index_get() {
        $costumer = $this->Customer_model->get_all_customer();
        if (!empty($costumer)) {
            $this->response($costumer, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No costumer found'
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
        if ($this->Customer_model->is_email_registered($email)) {
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
        if ($this->Customer_model->add_customer($data)) {
            $this->response([
                'status' => true,
                'message' => 'Customer added successfully'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to add customer'
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
    
        $update_result = $this->Customer_model->update_customer($id, $data);
        
        if ($update_result !== false) {
            $this->response([
                'status' => true,
                'message' => 'Costumer updated successfully'
            ], RestController::HTTP_OK);
        } else {
            $error_message = $this->db->error();
            $this->response([
                'status' => false,
                'message' => 'Failed to update customer: ' . $error_message['message']
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    public function index_delete($id) {
        if (empty($id)) {
            $this->response([
                'status' => false,
                'message' => 'ID is required for deletion'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }
    
        $delete_result = $this->Customer_model->delete_customer($id);
    
        if ($delete_result) {
            $this->response([
                'status' => true,
                'message' => 'Customer deleted successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to delete Customer'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
    
    
}


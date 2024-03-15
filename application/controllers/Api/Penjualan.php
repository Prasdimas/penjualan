<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Penjualan extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->model('Rumah_model');
        $this->load->model('Customer_model');
        $this->load->model('Sales_model');
    }

    public function index_get() {
        $penjualan = $this->Penjualan_model->get_all_penjualan();
        $this->response($penjualan, RestController::HTTP_OK);
    }
    
    public function filter_get($start_date, $end_date) {
        $penjualan = $this->Penjualan_model->filter_by_date($start_date, $end_date);
        if (!empty($penjualan)) {
            $this->response($penjualan, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No penjualan found within the specified date range'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    
    public function index_post() {
        $id_rumah = $this->post('id_rumah');
        $rumah = $this->Rumah_model->get_rumah_by_id($id_rumah);
        if (!$rumah) {
            $this->response([
                'status' => false,
                'message' => 'Invalid id_rumah'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }

        $data = [
            'id_rumah' => $id_rumah,
            'id_customer' => $this->post('id_customer'),
            'id_sales' => $this->post('id_sales'),
            'tanggal' => $this->post('tanggal'),
            'harga' =>  $rumah->harga, 
            'jenis_pembayaran' => $this->post('jenis_pembayaran')
        ];

        if ($this->Penjualan_model->add_penjualan($data)) {
            $this->response([
                'status' => true,
                'message' => 'Penjualan added successfully'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to add penjualan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() {
        $id = $this->put('id');
        $id_rumah = $this->put('id_rumah');
        $rumah = $this->Rumah_model->get_rumah_by_id($id_rumah);

        if (!$rumah) {
            $this->response([
                'status' => false,
                'message' => 'Invalid id_rumah'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }

        $data = [
            'id_rumah' => $id_rumah,
            'id_customer' => $this->put('id_customer'),
            'id_sales' => $this->put('id_sales'),
            'tanggal' => $this->put('tanggal'),
            'harga' => $rumah['harga'], // Mengambil harga rumah dari tabel rumah
            'jenis_pembayaran' => $this->put('jenis_pembayaran')
        ];

        if ($this->Penjualan_model->update_penjualan($id, $data)) {
            $this->response([
                'status' => true,
                'message' => 'Penjualan updated successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update penjualan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }


    public function index_delete($id) {
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'ID is required for deletion'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }

        if ($this->Penjualan_model->delete_penjualan($id)) {
            $this->response([
                'status' => true,
                'message' => 'Penjualan deleted successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to delete penjualan'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}

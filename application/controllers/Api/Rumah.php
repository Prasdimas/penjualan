<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Rumah extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Rumah_model');

    }
    public function index_get() {
        $rumah = $this->Rumah_model->get_all_rumah();
        if (!empty($rumah)) {
            $this->response($rumah, RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'No houses found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }
    public function test_get_penjualan_by_rumah_id($id_rumah) {
        $penjualan = $this->Rumah_model->get_penjualan_by_rumah_id($id_rumah);

        // Menampilkan hasil
        if ($penjualan) {
            echo "Daftar penjualan untuk rumah dengan ID $id_rumah:<br>";
            foreach ($penjualan as $item) {
                echo "ID Penjualan: " . $item->id . ", Harga: " . $item->harga . "<br>";
            }
        } else {
            echo "Tidak ada data penjualan untuk rumah dengan ID $id_rumah.";
        }
    }
    public function index_post() {
        $data = [
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'harga' => $this->post('harga'),
            'luas_tanah' => $this->post('luas_tanah'),
            'luas_bangunan' => $this->post('luas_bangunan')
        ];

        if (empty($data['nama']) || empty($data['alamat']) || empty($data['harga']) || empty($data['luas_tanah']) || empty($data['luas_bangunan'])) {
            $this->response([
                'status' => false,
                'message' => 'All fields are required'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }

        if ($this->Rumah_model->add_rumah($data)) {
            $this->response([
                'status' => true,
                'message' => 'House added successfully'
            ], RestController::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to add house'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put() {
        $id = $this->put('id');
        $data = [
            'nama' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'harga' => $this->put('harga'),
            'luas_tanah' => $this->put('luas_tanah'),
            'luas_bangunan' => $this->put('luas_bangunan')
        ];

        if (empty($id) || empty($data['nama']) || empty($data['alamat']) || empty($data['harga']) || empty($data['luas_tanah']) || empty($data['luas_bangunan'])) {
            $this->response([
                'status' => false,
                'message' => 'All fields are required'
            ], RestController::HTTP_BAD_REQUEST);
            return;
        }
        $update_result = $this->Rumah_model->update_rumah($id, $data);
        if ($update_result !== false) {
            $this->response([
                'status' => true,
                'message' => 'House updated successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update house'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_delete($id) {
        $this->db->where('id', $id);
        $delete_result = $this->db->delete('rumah');
        if ($delete_result) {
            $this->response([
                'status' => true,
                'message' => 'House deleted successfully'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to delete House'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}

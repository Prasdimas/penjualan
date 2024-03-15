<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah extends CI_Controller {
    public function tambah()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('form/rumah_form');
		$this->load->view('layouts/Footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('laporan/Laporan');
		$this->load->view('layouts/Footer');
	}
	public function customer()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('laporan/customer_laporan');
		$this->load->view('layouts/Footer');
	}
	public function sales()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('laporan/sales_laporan');
		$this->load->view('layouts/Footer');
	}
	public function rumah()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('laporan/rumah_laporan');
		$this->load->view('layouts/Footer');
	}
	public function penjualan()
	{
		$this->load->view('layouts/Header');
		$this->load->view('layouts/Sidebar');
		$this->load->view('form/penjualan_form');
		$this->load->view('layouts/Footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_motor extends CI_Controller {

	var $API ="";

	function __construct() {
		parent::__construct();
		$this->API="https://api.akhmad.id/uaspromnet";

			$this->curl->http_header("X-Nim", "1707885");
	}

	// proses yang akan di buka saat pertama masuk ke controller
	public function index()
	{
		$data['user'] = json_decode($this->curl->simple_get($this->API.'/user'));
		$this->load->view('V_karyawan', $data);
	}

	public function tampil_motor()
	{
		$data['motor'] = json_decode($this->curl->simple_get($this->API.'/motor'))->data;
		$this->load->view('v_motor', $data);
	}

	public function tampil_cicil()
	{
		$data['motor'] = json_decode($this->curl->simple_get($this->API.'/cicil'))->data;
		$this->load->view('v_cicil', $data);
	}

	public function tampil_dp()
	{
		$data['motor'] = json_decode($this->curl->simple_get($this->API.'/uangmuka'))->data;
		$this->load->view('v_dp', $data);
	}

	public function tampil_penjualan()
	{
		$data['motor'] = json_decode($this->curl->simple_get($this->API.'/penjualan'))->data->terjual;
		$this->load->view('v_penjualan', $data);
	}

}

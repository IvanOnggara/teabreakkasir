<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminStand extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->model('ModelKasir');
	    $this->load->library('session');
  	}

  	public function login()
  	{
  		$dataallstan = $this->ModelKasir->getAllDataOnline('stan');
  		var_dump($dataallstan);
  		// if ($dataallstan) {
  		// 	# code...
  		// }

  		$this->ModelKasir->deleteAllData('stan');
  		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            $this->load->view('adminstand/login');
        }else{
        	redirect('kasir');
        }
  	}

  	public function prosesLogin()
  	{
  		$username = $this->input->post('username');
  		$password = $this->input->post('password');
  		$password = md5($password);
  		$where = array('id_stan' => $username,'password' => $password);
  		
  		if ($this->ModelKasir->getRowCount('stan',$where) > 0) {
  			$this->session->set_userdata('aksesadminstan', 'granted');
  			$this->session->set_userdata('id_stan', $username);
  		 	echo 'true';
  		}else{
  			echo "false";
  			
  		} 
  	}

  	public function logout()
  	{
  		$this->session->unset_userdata('aksesadminstan');
  		$this->session->unset_userdata('id_stan');
  		redirect('login');
  	}

  	// public function gantipassword()
  	// {
  	// 	$akses = $this->session->userdata('aksesadminstan');
   //      if(empty($akses)){
   //          redirect('login');
   //      }else{
   //          $this->load->view('superadminfranchise/gantipassword');//XXXX
   //      }
  		
  	// }

  	// public function prosesgantipassword()
  	// {
  	// 	$passlama = $this->input->post('passlama');
  	// 	$passlama = md5($passlama);
  	// 	$passbaru = $this->input->post('passbaru');
  	// 	$passbaru = md5($passbaru);
  	// 	$konfirmasipassbaru = $this->input->post('konfirmasipassbaru');
  	// 	$username = $this->input->post('username');

  	// 	$where = array('username' => $username,'password' => $passlama);
  		
  	// 	if ($this->Produk->getRowCount('alluser',$where) > 0) {
  	// 		$data = array(
			// 	'username' => $username,
	  //       	'password' => $passbaru,
	  //       	'usertype' => $usertype
	  //       );
			// $success = $this->Post->Update('alluser',$data,$where);
			// if ($success) {
			// 	echo 'true';
			// }else{
			// 	echo "servererror";
			// }
  		 	
  	// 	}else{
  	// 		echo "false";
  	// 	} 

  	// }

	public function kasir()
	{
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
            $this->load->view('adminstand/kasir');
        }
		
	}

	public function getAllKategori()//GET KATEGORI
	{
		$where = array('kategori !=' => 'topping' );
		$data = $this->ModelKasir->getDistinctSpecificColumnWhere('produk','kategori',$where);
		echo json_encode($data);
	}

	public function getProdukInKategori() //GET PRODUK DI KATEGORI TERTENTU
	{
		$kategori = $this->input->post('kategori');
		$where = array('kategori' => $kategori );
		$data = $this->ModelKasir->getData($where,'produk');
		echo json_encode($data);
	}

	public function getListTopping() //GET LIST TOPPING SAJA
	{
		$where = array('kategori' => 'topping' );
		$data = $this->ModelKasir->getData($where,'produk');
		echo json_encode($data);
	}
}

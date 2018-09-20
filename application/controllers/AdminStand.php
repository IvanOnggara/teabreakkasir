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
		$json = @file_get_contents('http://localhost/teabreak/getDataStan');
		if($json === FALSE){
			echo "<p class='red'>(warning) tidak bisa tersambung ke server !</p>";
		}else{
			$datas = json_decode($json);
			$localdatastan = $this->ModelKasir->getSpecificColumn('stan','id_stan');
			$onlinedatastan = array();
			var_dump($localdatastan);

			foreach ($datas as $data) {
				$exist = $this->ModelKasir->checkExist('stan',$data->id_stan);
				$array = array(
			        'id_stan' => $data->id_stan,
			        'nama_stan' => $data->nama_stan,
			        'alamat' => $data->alamat,
			        'password' => $data->password
			    );

				if ($exist) {
					$where = array(
				        'id_stan' => $data->id_stan
				    );
					$this->ModelKasir->update('stan', $array, $where);
				}else{
					$this->ModelKasir->insert('stan',$array);
				}
				array_push($onlinedatastan,$data->id_stan);
			}

			foreach ($localdatastan as $perstan) {
				if (!in_array($perstan->id_stan, $onlinedatastan)) {
					$this->ModelKasir->delete('stan',$perstan->id_stan);
				}
			}


			echo "<p class='green'>(success) data stan terupdate</p>";
		}
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
  		$this->session->unset_userdata('update');
  		redirect('login');
  	}

	public function kasir()
	{
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$updated = $this->session->userdata('update');

        	if (empty($updated)) {
        		$status = 'true';

        		//DATA PRODUK
        		$json = @file_get_contents('http://localhost/teabreak/getDataProduk');
				if($json === FALSE){
					
					$status = 'false';
				}else{
					$datas = json_decode($json);
					$localdataproduk = $this->ModelKasir->getSpecificColumn('produk','id_produk');
					$onlinedataproduk = array();
					// var_dump($localdataproduk);

					foreach ($datas as $data) {
						$exist = $this->ModelKasir->checkExist('produk',$data->id_produk);
						$array = array(
					        'id_produk' => $data->id_produk,
					        'nama_produk' => $data->nama_produk,
					        'kategori' => $data->kategori,
					        'harga_jual' => $data->harga_jual
					    );

						if ($exist) {
							$where = array(
						        'id_produk' => $data->id_produk
						    );
							$this->ModelKasir->update('produk', $array, $where);
						}else{
							$this->ModelKasir->insert('produk',$array);
						}
						array_push($onlinedataproduk,$data->id_produk);
					}

					foreach ($localdataproduk as $perproduk) {
						if (!in_array($perproduk->id_produk, $onlinedataproduk)) {
							$this->ModelKasir->delete('produk',$perproduk->id_produk);
						}
					}
					
				}


				$postdata = http_build_query(
				    array(
				        'id_stan' => $this->session->userdata('id_stan')
				    )
				);

				$opts = array('http' =>
				    array(
				        'method'  => 'POST',
				        'header'  => 'Content-type: application/x-www-form-urlencoded',
				        'content' => $postdata
				    )
				);

				$context  = stream_context_create($opts);



				//DATA DISKON
				$json = @file_get_contents('http://localhost/teabreak/getDataDiskon', false, $context);
				if($json === FALSE){
					
					$status = 'false';
				}else{
					// var_dump($json);
					$datas = json_decode($json);
					$localdatadiskon = $this->ModelKasir->getSpecificColumn('diskon','id_diskon');
					$onlinedatadiskon = array();
					// var_dump($localdataproduk);

					foreach ($datas as $data) {
						$exist = $this->ModelKasir->checkExist('diskon',$data->id_diskon);
						$array = array(
					        'id_diskon' => $data->id_diskon,
					        'nama_diskon' => $data->nama_diskon,
					        'jenis_diskon' => $data->jenis_diskon,
					        'tanggal_mulai' => $data->tanggal_mulai,
					        'tanggal_akhir' => $data->tanggal_akhir,
					        'jam_mulai' => $data->jam_mulai,
					        'jam_akhir' => $data->jam_akhir,
					        'hari' => $data->hari,
					        'status' => $data->status,
					    );

						if ($exist) {
							$where = array(
						        'id_diskon' => $data->id_diskon
						    );
							$this->ModelKasir->update('diskon', $array, $where);
						}else{
							$this->ModelKasir->insert('diskon',$array);
						}
						array_push($onlinedatadiskon,$data->id_diskon);
					}

					foreach ($localdatadiskon as $perproduk) {
						if (!in_array($perproduk->id_diskon, $onlinedatadiskon)) {
							$this->ModelKasir->delete('diskon',$perproduk->id_diskon);
						}
					}
					
				}

				//DATA DETAIL DISKON (BARANG)
				$json = @file_get_contents('http://localhost/teabreak/getDataDetailDiskonProduk', false, $context);
				if($json === FALSE){
					
					$status = 'false';
				}else{
					$datas = json_decode($json);
					$localdatadetailbarangdiskon = $this->ModelKasir->getSpecificColumn('detail_barang_diskon','id_diskon,id_produk');
					$onlinedatadetailbarangdiskon = array();
					// var_dump($localdataproduk);

					foreach ($datas as $data) {
						$where = array('id_diskon' => $data->id_diskon,'id_produk' => $data->id_produk );
						$exist = $this->ModelKasir->checkExistDetailBarangDiskon($where);
						$array = array(
							'id_diskon' => $data->id_diskon,
					        'id_produk' => $data->id_produk
					    );

						if (!$exist) {
							$this->ModelKasir->insert('detail_barang_diskon',$array);
						}
						array_push($onlinedatadetailbarangdiskon,[$data->id_diskon,$data->id_produk]);
					}

					foreach ($localdatadetailbarangdiskon as $perdetailproduk) {
						if (!in_array([$perdetailproduk->id_diskon,$perdetailproduk->id_produk], $onlinedatadetailbarangdiskon)) {
							$where2 = array('id_diskon' => $perdetailproduk->id_diskon,'id_produk' => $perdetailproduk->id_produk );
							$this->ModelKasir->deleteWithCustomWhere('detail_barang_diskon', $where2);
						}
					}
					if ($status == 'true') {
						$this->session->set_userdata('update','updated');
						echo "<p class='green'>(success) seluruh data telah terupdate</p>";
					}else{
						echo "<p class='red'>(warning) tidak bisa tersambung ke server !</p>";
					}
				}

        	}

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

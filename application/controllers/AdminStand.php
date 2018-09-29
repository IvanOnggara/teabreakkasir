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
	    $this->load->helper('site_helper');
	    $this->load->model('ModelKasir');
	    $this->load->library('session');
  	}

  	public function login()
  	{
  		
  		$json = @file_get_contents('http://teabreak.bekkostudio.com/getDataStan');
		// $json = @file_get_contents('http://localhost/teabreak/getDataStan');
		if($json === FALSE){
			echo "<p class='red'>(warning) tidak bisa tersambung ke server !</p>";
		}else{
			$datas = json_decode($json);
			$localdatastan = $this->ModelKasir->getSpecificColumn('stan','id_stan');
			$onlinedatastan = array();
			// var_dump($localdatastan);

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
  			$uss = $this->ModelKasir->getData($where,'stan');
  			$this->session->set_userdata('aksesadminstan', 'granted');
  			$this->session->set_userdata('id_stan', $username);
  			$this->session->set_userdata('alamat_stan', $uss[0]->alamat);
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
  		$this->session->unset_userdata('alamat_stan');
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
        		
        		$json = @file_get_contents('http://teabreak.bekkostudio.com/getDataProduk');
        		// $json = @file_get_contents('http://localhost/teabreak/getDataProduk');
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
				
				$json = @file_get_contents('http://teabreak.bekkostudio.com/getDataDiskon', false, $context);
				// $json = @file_get_contents('http://localhost/teabreak/getDataDiskon', false, $context);
				if($json === FALSE){
					
					$status = 'false';
				}else{
					// var_dump($json);
					$datas = json_decode($json);
					$localdatadiskon = $this->ModelKasir->getSpecificColumn('diskon','id_diskon');
					$onlinedatadiskon = array();
					// var_dump($localdataproduk);

					if (!empty($datas)) {
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
					}else{
						$this->ModelKasir->deleteAllData('diskon');
					}
					
				}

				//DATA DETAIL DISKON (BARANG)
				
				$json = @file_get_contents('http://teabreak.bekkostudio.com/getDataDetailDiskonProduk', false, $context);
				// $json = @file_get_contents('http://localhost/teabreak/getDataDetailDiskonProduk', false, $context);
				if($json === FALSE){
					
					$status = 'false';
				}else{
					$datas = json_decode($json);
					$localdatadetailbarangdiskon = $this->ModelKasir->getSpecificColumn('detail_barang_diskon','id_diskon,id_produk');
					$onlinedatadetailbarangdiskon = array();
					// var_dump($localdataproduk);
					if (!empty($datas)) {
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
					}else{
						$this->ModelKasir->deleteAllData('detail_barang_diskon');
					}
					
					if ($status == 'true') {
						$this->session->set_userdata('update','updated');
						echo "<p class='green'>(success) seluruh data telah terupdate</p>";
					}else{
						echo "<p class='red'>(warning) tidak bisa tersambung ke server !</p>";
					}
				}

        	}

        	$this->load->view('adminstand/header');
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

	public function getDiskon()//GET DISKON SETIAP PILIH PRODUK ATAU TAMBAH PRODUK ATAU KURANGI PRODUK
	{
		date_default_timezone_set("Asia/Bangkok");
		$datenow = date("Y-m-d");
		$daynow = date("w");
		$timenow = date("H:i:s");
		switch ($daynow) {
			case 0:
				$daynow = 'minggu';
				break;
			case 1:
				$daynow = 'senin';
				break;
			case 2:
				$daynow = 'selasa';
				break;
			case 3:
				$daynow = 'rabu';
				break;
			case 4:
				$daynow = 'kamis';
				break;
			case 5:
				$daynow = 'jumat';
				break;
			case 6:
				$daynow = 'sabtu';
				break;
			
			default:
				break;
		}
		$daynow = "%".$daynow."%";

		$id_produk = $this->input->post('id');
		$where = array('produk.id_produk' => $id_produk);
		$arraytoui = array();


		// $alldiskon = $this->ModelKasir->getDataDiskonForProduct($where);
		$wheretanggal = array(
			'tanggal_mulai<='=>$datenow,
			'tanggal_akhir>='=>$datenow,
			'hari LIKE'=>$daynow,
			'jam_mulai<='=>$timenow,
			'jam_akhir>='=>$timenow,
		);

		$alldiskon = $this->ModelKasir->getData($wheretanggal,'diskon');
		// $alldiskon = $this->ModelKasir->getAllData('diskon');

		foreach ($alldiskon as $diskon) {
			// $where2 = array('diskon.id_diskon' => $diskon->id_diskon);
			$where2 = array('diskon.id_diskon' => $diskon->id_diskon);
			$listbarang = $this->ModelKasir->getListProductForDiskon($where2);
			$produk2nya = '';
			$first = true;
			foreach ($listbarang as $produk2) {
				if ($first) {
					$produk2nya = $produk2nya.$produk2->id_produk;
					$first = false;
				}else{
					$produk2nya = $produk2nya.','.$produk2->id_produk;
				}
			}
			array_push($arraytoui, array('id_diskon' => $diskon->id_diskon,'nama_diskon' => $diskon->nama_diskon, 'jenis_diskon' => $diskon->jenis_diskon,'id_poduk'=> $produk2nya));
		}

		
		echo json_encode($arraytoui);
	}

	public function saveNota()
	{
		$dataorder = json_decode($this->input->post('order'));
		var_dump($dataorder);
		$list_diskon = $this->input->post('list_diskon');
		$harga_akhir = $this->input->post('harga_akhir');
		$tipe_pembayaran = $this->input->post('tipe_pembayaran');
		$keterangan = $this->input->post('keterangan');

		$diskon = $this->ModelKasir->getDataInTable('diskon',$list_diskon,'id_diskon');
		$arraynamadiskon = array();
		$arrayjenisdiskon = array();

		foreach ($diskon as $perdiskon) {
			array_push($arraynamadiskon, $perdiskon->nama_diskon);
			array_push($arrayjenisdiskon, $perdiskon->jenis_diskon);
		}

		date_default_timezone_set("Asia/Bangkok");
		$idnota = $this->session->userdata('id_stan').IDNotaGenerator();
		$datesave= date("Y-m-d");
		$timesave = date("H:i");

		if (empty(array_filter($arraynamadiskon))) {
			$namadisk = 'none';
			$jenisdisk = 'none';
		}else{
			$namadisk = implode(',', $arraynamadiskon);
			$jenisdisk = implode(',', $arrayjenisdiskon);
		}

		$data = array(
			'id_nota' => $idnota,
			'tanggal_nota' => $datesave,
			'waktu_nota' => $timesave, 
			'nama_diskon' => $namadisk,
			'jenis_diskon' => $jenisdisk,
			'status' => 'novoid',
			'total_harga' => $harga_akhir,
			'pembayaran' => $tipe_pembayaran,
			'keterangan' => $keterangan,
			'status_upload' => 'not_upload'
		);

		// var_dump($dataorder);
		$this->ModelKasir->insert('nota',$data);
		$listidproduk = array();
		$listjumlahproduk = array();
		$listidprodukdiskon = array();
		$arraydiskonprod = array();
		$listall = array();

		foreach ($dataorder as $perorder) {
			if (!in_array($perorder->id_produk, $listidproduk)) {
				array_push($listidproduk, $perorder->id_produk);
				array_push($listjumlahproduk, $perorder->qty);	 	   
			}else{
				for ($i=0; $i < count($listidproduk); $i++) { 
					if ($listidproduk[$i] == $perorder->id_produk) {
						$listjumlahproduk[$i] +=  $perorder->qty;
					}
				}
			}

			// if ($perorder->diskon>0) {
				if (!array_key_exists($perorder->id_produk, $arraydiskonprod)) {
				    $arraydiskonprod[$perorder->id_produk] = 0;
				}
				$arraydiskonprod[$perorder->id_produk] = $arraydiskonprod[$perorder->id_produk] + $perorder->diskon;
			// }

			foreach ($perorder->list_idtopping as $pertopping) {
				if (!in_array($pertopping, $listidproduk)) {
					array_push($listidproduk, $pertopping);
					array_push($listjumlahproduk, $perorder->qty);	 	   
				}else{
					for ($i=0; $i < count($listidproduk); $i++) { 
						if ($listidproduk[$i] == $pertopping) {
							$listjumlahproduk[$i] +=  $perorder->qty;
						}
					}
				}

				if (!array_key_exists($pertopping, $arraydiskonprod)) {
				    $arraydiskonprod[$pertopping] = 0;
				}
				$arraydiskonprod[$pertopping] = $arraydiskonprod[$pertopping] + $perorder->diskon;
			}
		}
		$angkaid = 1;
		for ($i=0; $i < count($listidproduk); $i++) {
			$whereprod = array('id_produk'=>$listidproduk[$i]);
			$dataprod = $this->ModelKasir->getData($whereprod,'produk');
			
			$id_detail_nota = $this->session->userdata('id_stan')."".IDDetailNotaGenerator()."ke".$angkaid;

			$datadetail = array(
				'id_detail_nota' => $id_detail_nota,
				'id_nota' => $idnota,
				'nama_produk' => $dataprod[0]->nama_produk,
				'jumlah_produk' => $listjumlahproduk[$i],
				'kategori_produk' => $dataprod[0]->kategori,
				'harga_produk' => $dataprod[0]->harga_jual,
				'total_harga_produk' => intval($listjumlahproduk[$i])*intval($dataprod[0]->harga_jual)-$arraydiskonprod[$listidproduk[$i]]
			);
			$this->ModelKasir->insert('detail_nota',$datadetail);
			$angkaid+=1;
			array_push($listall, $datadetail);
		}
		// var_dump($listall);
		// var_dump($data);

		//SAVE NOTA

		$this->sinkronnota();
	}

	public function sinkronnota()
	{
		$whereforsinkron = array('status_upload' => 'not_upload');

		if ($this->ModelKasir->getRowCount('nota',$whereforsinkron) <1) {
			echo "SUCCESSSAVE";
		}else{
			$listnotabelumupload = $this->ModelKasir->getData($whereforsinkron,'nota');
			$listnotarray = array();

			foreach ($listnotabelumupload as $pernota) {
				array_push($listnotarray, $pernota->id_nota);
			}
			$listalldetailnota = $this->ModelKasir->getDataIn('detail_nota',$listnotarray);
			

			$postdata = http_build_query(
			    array(
			        'allnota' => json_encode($listnotabelumupload),
			        'detailnota' => json_encode($listalldetailnota),
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
			//DATA NOTA
			$send = @file_get_contents('http://teabreak.bekkostudio.com/insertDataNota', false, $context);
			// $send = @file_get_contents('http://localhost/teabreak/insertDataNota', false, $context);
			if($send === FALSE){
				echo 'CANTCONNECT';
			}else{
				if ($send == 'true') {
					// var_dump($send);
					foreach ($listnotabelumupload as $nota) {
						$where = array('id_nota' => $nota->id_nota );
						$update = array('status_upload' => 'upload' );
						$this->ModelKasir->update('nota',$update,$where);
						
					}
					echo "SUCCESSSAVE";
				}else{
					echo "PENYIMPANANGAGAL";
				}
			}
		}
		
	}

	public function getListNota()
	{
		$where = array('status' => 'novoid');
		$data = $this->ModelKasir->getData($where,'nota');
		echo json_encode($data);
	}

	public function voidNota()
	{
		$id = $this->input->post('id_nota');
		$password = $this->input->post('pwd');
		$id_stan = $this->session->userdata('id_stan');

		$where = array('id_stan' => $id_stan,'password' => $password);
  		
  		if ($this->ModelKasir->getRowCount('stan',$where) > 0) {
  			$where2 = array('id_nota' => $id);
			$data = array('status' => 'void' );

			$this->ModelKasir->update('nota', $data, $where2);
  		 	echo 'true';
  		}else{
  			echo "false";
  		} 
	}

	public function viewvoidnota(){

        $akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/notavoid');
        }
	}

	public function stokmasuk(){
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/stokmasuk');
        }
	}

	public function stokkeluar(){
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/stokkeluar');
        }
	}

	public function laporanstok(){
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/laporanstok');
        }
	}

	public function pengeluaranlain(){
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/pengeluaranlain');
        }
	}

	public function orderproduk(){
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/orderproduk');
        }
	}

	public function sisastok()
	{
		$akses = $this->session->userdata('aksesadminstan');
        if(empty($akses)){
            redirect('login');
        }else{
        	$this->load->view('adminstand/header');
			$this->load->view('adminstand/sisastok');
        }
	}
}

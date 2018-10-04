<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Controllerdisplay extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->helper('url');
	    $this->load->helper('site_helper');
	    $this->load->model('ModelKasir');
	    $this->load->library('session');
  	}

  	public function resetDisplay()
  	{
  		$handle = @fopen("\\\\.\COM13", "w+b") or die("Unable to open file!");
		// To write into
		$text = "\fI Love You Kristine!\t\t<3<3<3";
		fwrite($handle, $text);

		fclose($handle);
  	}

  	public function setItem()
  	{
  		$topping = $this->input->post('topping');
  		$nama_produk = $this->input->post('nama_produk');
  		$harga_produk = $this->input->post('harga_produk');

  		if(strlen($nama_produk)>=15){
  			$arr = explode(" ", $nama_produk);
  			if (sizeof($arr)<=1) {
  				$nama_produk = "";
  				$nama_produk = $arr[0].substr($arr[0], 0, 5);
  			}else{
  				$nama_produk = "";
  				for ($i=0; $i < sizeof($arr); $i++) { 
  					if ($i>0) {
  						$nama_produk = $nama_produk." ".$arr[$i];
  					}else{
  						$nama_produk = substr($arr[$i], 0, 1).".";
  					}
  				}
  			}
  		}

  		if ($topping[0]!="-") {
  			$nama_produk = $nama_produk."+top";
  		}

  		$handle = @fopen("\\\\.\COM13", "w+b") or die("Unable to open file!");
		// To write into
		$txtNama = $nama_produk;
		$text = "\f";
		$textharga = "Rp. ".$harga_produk;

		$count1 = 20-strlen($txtNama);
		$count2 = 20-strlen($textharga);
		for ($i=0; $i < $count1; $i++) { 
			$txtNama = $txtNama."\t";
		}

		for ($i=0; $i < $count2; $i++) { 
			$textharga = "\t".$textharga;
		}
		$textharga = $txtNama."".$textharga;
		
		fwrite($handle, $text);
		fwrite($handle, $textharga);
		fclose($handle);
		echo $nama_produk;
  	}

  	public function setTotal()
  	{
  		$handle = @fopen("\\\\.\COM13", "w+b") or die("Unable to open file!");
  		$total = $this->input->post('ttl_display');
		// To write into
		$text = "\fTotal :";
		$total = "Rp. ".$total;
		$count1 = 13;
		$count2 = 20-strlen($total);
		for ($i=0; $i < $count1; $i++) { 
			$text = $text."\t";
		}
		for ($i=0; $i < $count2; $i++) { 
			$total = "\t".$total;
		}
		$text = $text."".$total;
		fwrite($handle, $text);

		fclose($handle);
  	}
}
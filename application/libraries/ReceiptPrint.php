<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// IMPORTANT - Replace the following line with your path to the escpos-php autoload script
require_once __DIR__ . '/mike42/escpos-php\autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
class ReceiptPrint {
  private $CI;
  private $connector;
  private $printer;
  // TODO: printer settings
  // Make this configurable by printer (32 or 48 probably)
  private $printer_width = 32;
  function __construct()
  {
    $this->CI =& get_instance(); // This allows you to call models or other CI objects with $this->CI->... 
  }
  function connect($nama)
  {
    $this->connector = new WindowsPrintConnector($nama);
    $this->printer = new Printer($this->connector);
  }
  private function check_connection()
  {
    if (!$this->connector OR !$this->printer OR !is_a($this->printer, 'Mike42\Escpos\Printer')) {
      throw new Exception("Tried to create receipt without being connected to a printer.");
    }
  }
  public function close_after_exception()
  {
    if (isset($this->printer) && is_a($this->printer, 'Mike42\Escpos\Printer')) {
      $this->printer->close();
    }
    $this->connector = null;
    $this->printer = null;
    $this->emc_printer = null;
  }
  // Calls printer->text and adds new line
  private function add_line($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width) : $text;
    $this->printer->text($text."\n");
  }

  // Calls printer->text and adds new line
  private function add_line_special($text = "", $should_wordwrap = true)
  {
    $text = $should_wordwrap ? wordwrap($text, $this->printer_width-8) : $text;
    $this->printer->text($text."\n");
  }
  public function print_test_receipt($order = "",$Pelanggan = "",$alamat ="",$subtotal="",$diskon,$totalakhir,$kembalian)
  // $subtotal = "156.000,-";
  //   $diskon = "12.000,-";
  //   $totalakhir = "144.000,-";
  //   $kembalian = "0,-";
  // $listallitem = "",
  {
    date_default_timezone_set("Asia/Bangkok");
    $this->check_connection();
    $img_logo = EscposImage::load(__DIR__ . "/logo112.png");
    echo pathinfo(__DIR__ . "\logo.bmp", PATHINFO_EXTENSION);
    // echo $img_logo;
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    // $this->printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
    $this->printer->bitImageColumnFormat($img_logo);
    // $this->printer->selectPrintMode();
    // $this->printer->setJustification(Printer::JUSTIFY_LEFT);
    $this->printer->setFont(Printer::FONT_B);
    
    $this->add_line("".$alamat);
    $this->add_line("Telp : 087842220111");
    $this->add_line("Email : teabreakindo@gmail.com");
    

    $this->printer->setFont(Printer::FONT_A);
    $this->add_line();
    $this->add_line(date('d/m/Y H:i'));
    $this->add_line();

    $this->printer->setFont(Printer::FONT_B);
    $this->printer->setJustification(Printer::JUSTIFY_LEFT);
    $this->add_line("Pelanggan : ".$Pelanggan);
    $this->add_line("================================");
    $this->add_line();
    $totalitem = 0;

    foreach ($order as $perorder) {
      $hargatotsatuan = intval($perorder->harga_topping) +intval($perorder->harga_produk);

      $hargasatuan = number_format($hargatotsatuan,0,",",'.');
      $linehargasebelumtotal = "@Rp.".$hargasatuan;
      $linehargatotal = number_format($perorder->total,0,",",'.')."";
      $space ='';

      $sisaspace = 32-(strlen($linehargasebelumtotal)+strlen($linehargatotal));

      for ($i=0; $i < $sisaspace; $i++) { 
        $space = $space." ";
      }

      $finaltotal = $linehargasebelumtotal.$space.$linehargatotal;

        $this->add_line_special($perorder->qty."x ".$perorder->nama_produk);
        $this->add_line_special("TP:".implode(",", $perorder->topping));
        $this->add_line($finaltotal);

        $totalitem += intval($perorder->qty);
        // SETIAP ADA 1 ORDER JARAK PEMBATAS 2 AKAN BERTAMBAH SEBANYAK +11 (DITAMBAH SETELAH MENULISKAN TEXT PDF)
    }

    // $this->add_line_special("2x Tea Matcha Special");
    // $this->add_line_special("TP:Cheese,Bubble,Kismis");
    // $this->add_line("@Rp.90.000               180.000");
    // $this->add_line_special("2x Tea Matcha Special");
    // $this->add_line_special("TP:Cheese,Bubble,Kismis");
    // $this->add_line("@Rp.90.000               180.000");


    $this->add_line();
    $this->add_line("================================");
    $this->add_line("Total Item : ".$totalitem);
    $this->printer->setJustification(Printer::JUSTIFY_RIGHT);
    
    $this->add_line("Subtotal : ".$subtotal);
    $this->add_line("Diskon : ".$diskon);
    $this->add_line("Pembayaran : ".$totalakhir);
    $this->add_line("------------------");
    $this->add_line("Kembali : ".$kembalian);
    $this->add_line("================================");
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->add_line("Signature Milk Tea, Special Tea, Taste the original fresh!");
    $this->printer->setTextSize(2, 1);
    $this->add_line("Terima kasih");


    // $this->add_line("Testing Receipt Print");
    // $this->add_line("12345678901234567890123456789012");
    // $this->add_line("1x Tea Matcha Super       10.000");
    // $this->add_line("3x Tea Fantastic           9.000");
    // $this->printer->text("1x Tea Matcha Super  Rp.10.000,-");
    
    // $this->add_line(); // blank line
    // $this->add_line($text);
    // $this->add_line(); // blank line
    // $this->add_line(date('Y-m-d H:i:s'));
    // $this->printer->cut(Printer::CUT_PARTIAL);
    $this->printer->cut();
    $this->printer->close();
  }
}
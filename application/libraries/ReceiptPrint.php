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
  public function print_test_receipt($order = "",$Pelanggan = "",$alamat ="",$subtotal="",$diskon,$totalakhir,$kembalian,$nourut)
  // $subtotal = "156.000,-";
  //   $diskon = "12.000,-";
  //   $totalakhir = "144.000,-";
  //   $kembalian = "0,-";
  // $listallitem = "",
  {
    $this->printer->pulse();
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
    var_dump($nourut);
    $this->add_line("Nomor     : ".$nourut);
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
    $this->add_line("Reasonable Price Excellent Taste");
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

  public function printrekap($kasawal,$totalpemasukan,$cashdetail,$debitdetail,$ovodetail,$pengeluaran,$sisauang,$sisauangdikasir,$cash_bersih)
  {
    $kasawal = number_format($kasawal,"0",",",".");
    $totalpemasukan = number_format($totalpemasukan,"0",",",".");
    $cashdetail = number_format($cashdetail,"0",",",".");
    $debitdetail = number_format($debitdetail,"0",",",".");
    $ovodetail = number_format($ovodetail,"0",",",".");
    $pengeluaran = number_format($pengeluaran,"0",",",".");
    $cash_bersih = number_format($cash_bersih,"0",",",".");
    // $sisauang = number_format($sisauang,"0",",",".");
    // $sisauangdikasir = number_format($sisauangdikasir,"0",",",".");

    date_default_timezone_set("Asia/Bangkok");
    $this->check_connection();
    $img_logo = EscposImage::load(__DIR__ . "/logo112.png");
    echo pathinfo(__DIR__ . "\logo.bmp", PATHINFO_EXTENSION);
    // echo $img_logo;
    $this->printer->setJustification(Printer::JUSTIFY_CENTER);
    $this->printer->bitImageColumnFormat($img_logo);
    $this->add_line("Rekap Pemasukan Pengeluaran");
    $this->add_line(date('d/m/Y'));
    $this->add_line(date("H:i"));
    $this->printer->setJustification(Printer::JUSTIFY_LEFT);
    $this->add_line("================================");

    $stringkasawal =    "Uang Modal  :    Rp.";
    // $stringpemasukan =  "Pemasukan   :    Rp.";
    $stringcashdetail = "*cash :          Rp.";
    $stringdebitdetail ="*debit:          Rp.";
    $stringovodetail =  "*ovo  :          Rp.";
    $stringpengeluaran ="Pengeluaran :    Rp.";
    $stringcashbersih = "Cash Bersih :    Rp.";
    // $stringsisauang =   "Sisa Uang   :    Rp.";
    // $stringuangdikasir ="Mesin Kasir :    Rp.";

    $spacekasawal = 32-(strlen($stringkasawal)+strlen($kasawal));
    // $spacepemasukan = 32-(strlen($stringpemasukan)+strlen($pemasukan));
    $spacecashdetail = 32-(strlen($stringcashdetail)+strlen($cashdetail));
    $spacedebitdetail = 32-(strlen($stringdebitdetail)+strlen($debitdetail));
    $spaceovodetail = 32-(strlen($stringovodetail)+strlen($ovodetail));
    $spacepengeluaran = 32-(strlen($stringpengeluaran)+strlen($pengeluaran));

    $spacecashbersih = 32-(strlen($stringcashbersih)+strlen($cash_bersih));
    // $spacesisauang = 32-(strlen($stringsisauang)+strlen($sisauang));
    // $spaceuangdikasir = 32-(strlen($stringuangdikasir)+strlen($uangdikasir));

    for ($i=0; $i < $spacekasawal; $i++) { 
      $stringkasawal = $stringkasawal." ";
    }

    // for ($i=0; $i < $spacepemasukan; $i++) { 
    //   $stringpemasukan = $stringpemasukan." ";
    // }

    for ($i=0; $i < $spacecashdetail; $i++) { 
      $stringcashdetail = $stringcashdetail." ";
    }

    for ($i=0; $i < $spacedebitdetail; $i++) { 
      $stringdebitdetail = $stringdebitdetail." ";
    }

    for ($i=0; $i < $spaceovodetail; $i++) { 
      $stringovodetail = $stringovodetail." ";
    }

    for ($i=0; $i < $spacepengeluaran; $i++) { 
      $stringpengeluaran = $stringpengeluaran." ";
    }

    for ($i=0; $i < $spacecashbersih; $i++) { 
      $stringcashbersih = $stringcashbersih." ";
    }

    // for ($i=0; $i < $spacesisauang; $i++) { 
    //   $stringsisauang = $stringsisauang." ";
    // }

    // for ($i=0; $i < $spaceuangdikasir; $i++) { 
    //   $stringuangdikasir = $stringuangdikasir." ";
    // }

    $stringkasawal = $stringkasawal.$kasawal;
    // $stringpemasukan = $stringpemasukan.$totalpemasukan;
    $stringcashdetail = $stringcashdetail.$cashdetail;
    $stringdebitdetail = $stringdebitdetail.$debitdetail;
    $stringovodetail = $stringovodetail.$ovodetail;
    $stringpengeluaran = $stringpengeluaran.$pengeluaran;
    $stringcashbersih = $stringcashbersih.$cash_bersih;
    // $stringsisauang = $stringsisauang.$sisauang;
    // $stringuangdikasir = $stringuangdikasir.$sisauangdikasir;


    $this->add_line($stringkasawal);
    // $this->add_line($stringpemasukan);
    $this->add_line($stringcashdetail);
    $this->add_line($stringdebitdetail);
    $this->add_line($stringovodetail);
    $this->add_line($stringpengeluaran);
    $this->add_line("                 _______________");
    //32
    // $this->add_line($stringsisauang);
    $this->add_line($stringcashbersih);
    // $this->add_line($stringuangdikasir);
    $this->printer->cut();
    
    $this->printer->close();
  }
}
<div class="section">
    <div class="col-lg-2 col-md-4 col-sm-12 section1">
        <div style="padding: 0px;" class="col-lg-8 offset-lg-4 col-md-6 offset-md-3 judul">
            KATEGORI
        </div>
        <div id="kategorisection">
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-12 section2">
        <div class="col-md-11 offset-md-1 judul">
            MENU
        </div>
        <div id="menusection">
        </div>
    </div>

    <div class="col-lg-7 col-md-12 col-sm-12 section3">
        <div class="judul">
            BILL
        </div>
        <div class="billsection">
            <div class="row divnamap">
                <label class="col-lg-3 offset-lg-1 jnama" for="nama_pelanggan">Nama Pelanggan </label>
                <input class="col-lg-7" type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Masukkan Nama Pelanggan...">
            </div>
            <div class="divbill table-responsive">
                <table id="billtable" class="table" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 15%;">Nama</th>
                            <th style="width: 15%;">Topping</th>
                            <th style="width: 20%;">Qty</th>
                            <th style="width: 20%;">Satuan</th>
                            <th style="width: 30%;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paysection">
            <div class="row">
                <div class="col-lg-8">
                    <table id="bayar" style="text-align: left!important;">
                        <tr>
                            <td>Sub Total </td>
                            <td>:</td>
                            <td id="subtotal">Rp 0</td>
                        </tr>
                        <tr>
                            <td>Diskon </td>
                            <td>:</td>
                            <td id="diskon">Rp 0</td>
                        </tr>
                        <tr>
                            <td>TOTAL</td>
                            <td>:</td>
                            <td><h4 id="total_harus_byr">Rp 0</h4></td>
                        </tr>
                    </table>
                </div>
                <button id="buttonbayar" class="btn btn-info col-lg-3 btnpay" disabled="" onclick="pembayaran()">BAYAR</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_bayar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="header modal-header">
                <h4 class="modal-title">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('7')">7
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('8')">8
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('9')">9
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('4')">4
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('5')">5
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('6')">6
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('1')">1
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('2')">2
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('3')">3
                        </button>
                    </div>
                    <div class="row">
                        <button class="btn btn-calc col-lg-3" onclick="kalkulatorkasir('0')">0
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('00')">00
                        </button>
                        <button class="btn btn-calc col-lg-3 offset-lg-1" onclick="kalkulatorkasir('del')"><
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row jumlahuang">
                        Jumlah Uang
                    </div>
                    <div class="row">
                        <p id="total_bayar" class="form-control">0</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="totaljudul">Total :</p>
                        </div>
                        <div class="col-lg-6">
                            <p id="harus_bayar">Rp 0</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="kembalianjudul">Kembalian :</p>
                        </div>
                        <div class="col-lg-6">
                            <p id="kembalian">Rp 0</p>
                        </div>
                    </div>
                    <hr class="garis">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" checked="true" value="cash"><label>&nbsp Cash</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" value="debit"><label>&nbsp Debit</label>
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" name="tipe_bayar" value="ovo"><label>&nbsp Ovo</label>
                        </div>
                    </div>
                    <div class="row">
                        <input type="text" name="keterangan" id="keterangan" class="form-control col-lg-4 offset-lg-4" placeholder="keterangan...">
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <button class="btn btn-auto" onclick="autobtn()">Auto</button>
                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <button class="btn btn-kembali" onclick="resetbyr()">Kembali</button>
                        </div>
                        <div class="col-lg-3">
                            <button id="buttoncetaknota" class="btn btn-cetak-dis" disabled="" onclick="cetakNota()">Cetak Nota</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_topping" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header modal-header">
                <h4 class="modal-title">Pilih Topping</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" id="toppingsection">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" onclick="reset_topping()" class="btn btn-default">Batal</button>
                <button type="button" onclick="tambah_item()" class="btn add_field_button btn-info">Tambah Item</button>
            </div>
        </div>
    </div>
</div>

<script src=<?php echo base_url("assets/js/jquery.min.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.min.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/jquery.vmap.sampledata.js")?>></script>
<script src=<?php echo base_url("assets/js/lib/vector-map/country/jquery.vmap.world.js")?>></script>
<script src=<?php echo base_url("assets/datatable/datatables.js")?>></script>
<script src=<?php echo base_url("assets/js/popper.min.js"); ?>></script>
<script src=<?php echo base_url("assets/js/plugins.js"); ?>></script>
<script src=<?php echo base_url("assets/js/lib/chosen/chosen.jquery.min.js"); ?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/dataTables.buttons.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.print.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.html5.js")?>></script>
<script src=<?php echo base_url("assets/datatable/Buttons-1.5.2/js/buttons.flash.js")?>></script>
<script src=<?php echo base_url("assets/datatable/JSZip-2.5.0/jszip.js")?>></script>
<script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/pdfmake.js")?>></script>
<script src=<?php echo base_url("assets/datatable/pdfmake-0.1.36/vfs_fonts.js")?>></script>
<script type="text/javascript">
var nama_produk;
var harga_produk;
var qty;
var id_produk;
var topping = new Array();
var order = new Array();
var total_harus_byr=0;
var diskon = 0;
var subtotal = 0;

function myFunction() {
var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function pembayaran(){
    $("#modal_bayar").modal({
        backdrop: 'static',
        keyboard: false
    });
    hitungKembalian();
}

function resetbyr(){
    $("#modal_bayar").modal('hide');
    $("#total_bayar").text('0');
}

function removeBtn(rowid){
    var i = rowid.parentNode.parentNode.parentNode.rowIndex;
    document.getElementById("billtable").deleteRow(i);
    row = rowid.parentNode.parentNode.parentNode.id;
    for (var i = 0; i < order.length; i++) {
        if (order[i].id_order==row) {
            order.splice(i, 1);
            break;
        }
    }
    countTotal();
}

function tambah_item(){
    var status_topping = false;
    var count_topping = 0;
    var count;

    var table = document.getElementById("billtable");
    var list_idtopping = new Array();
    $.each($('.activetopping'), function (index, item) {
        topping.push(item.childNodes[2].value);
        harga_produk = parseInt(harga_produk)+parseInt(item.childNodes[1].value);
        list_idtopping.push(item.childNodes[1].id);
    });

    if (topping.length<1) {
        topping.push("-");   
    }

    if (table.rows.length>1) {
        for (var i = 0; i < order.length; i++) {
            if (order[i].id_produk==id_produk) {
                count = i;
                if (order[i].topping.length==topping.length) {
                    for (var j = 0; j < topping.length; j++) {
                        for (var k = 0; k < order[i].topping.length; k++) {
                            if (topping[j]===order[i].topping[k]) {
                                count_topping++;
                            }
                        }
                    }
                    if (count_topping==order[i].topping.length) {
                        status_topping = true;
                        count_topping=0;
                        break;
                    }
                    count_topping=0;
                }
            }
        }
    }

    if (status_topping) {
        order[count].qty++;
        order[count].total = order[count].qty*order[count].harga_produk;
        $("#qty"+order[count].id_order).text(order[count].qty);
        $("#totalharga"+order[count].id_order).text("Rp "+currency(order[count].total));
        $("#modal_topping").modal('hide');
        
    }else{
        var row = table.insertRow(1);
        row.id = table.rows.length;
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = '<p id="#nama_produk'+table.rows.length+'">'+nama_produk+'</p>';
        cell2.innerHTML = '<p id="topping'+table.rows.length+'">'+topping.toString()+'</p>';
        cell3.innerHTML = '<button class="btn center btn-default btnmin btnqty" onclick="minus(\''+table.rows.length+'\',this)">-</button><p id="qty'+table.rows.length+'" class="qtyitem btnqty">1</p><button class="btn center btn-default btnplus btnqty" onclick="plus(\''+table.rows.length+'\',this)">+</button>';
        cell4.innerHTML = '<p id="satuan'+table.rows.length+'">Rp '+currency(harga_produk)+'</p>';
        cell5.innerHTML = '<div class="row"><p class="col-lg-9" id="totalharga'+table.rows.length+'">Rp '+currency(qty*harga_produk)+'</p><button class="col-lg-3 btn btn-danger btnremove" onclick="removeBtn(this);">X</button></div>';
        $("#modal_topping").modal('hide');
        var item = new Array();
        item.id_order = table.rows.length;
        item.list_idtopping = list_idtopping;
        item.nama_produk = nama_produk;
        item.id_produk = id_produk;
        item.topping = topping;
        item.qty = 1;
        item.harga_produk = harga_produk;
        item.total = qty*harga_produk;
        order.push(item);
    }
    
    nama_produk="";
    topping = [];
    list_idtopping = [];
    id_produk = "";
    harga_produk = 0;
    qty = 0;
    count=null;
    $.each($('.activetopping'), function (index, item) {
        $(this).toggleClass("activetopping");
    });
    countTotal();

    
}

function plus(id,rowid){
    var value = $("#qty"+id).text();
    value = parseInt(value)+1;
    satuan = parseInt($("#satuan"+id).text().substring(3).replace('.',''));
    $("#qty"+id).text(value);
    $("#totalharga"+id).text("Rp "+currency(value*satuan));
    row = rowid.parentNode.parentNode.id;
    for (var i = 0; i < order.length; i++) {
        if (order[i].id_order==row) {
            order[i].qty = value;
            order[i].total = value*satuan;
            break;
        }
    }
    countTotal();
}

function minus(id,rowid){
    var value = $("#qty"+id).text();

    if (parseInt(value)>1) {
        value = parseInt(value)-1;
        satuan = parseInt($("#satuan"+id).text().substring(3).replace('.',''));
        row = rowid.parentNode.parentNode.id;
        for (var i = 0; i < order.length; i++) {
            if (order[i].id_order==row) {
                order[i].qty = value;
                order[i].total = value*satuan;
            }
        }
        $("#qty"+id).text(value);
        $("#totalharga"+id).text("Rp "+currency(value*satuan));
    }else{
        var i = rowid.parentNode.parentNode.rowIndex;
        document.getElementById("billtable").deleteRow(i);
        row = rowid.parentNode.parentNode.id;
        for (var i = 0; i < order.length; i++) {
            if (order[i].id_order==row) {
                order.splice(i, 1);
                break;
            }
        }
    }
    countTotal();
}

function countTotal(){
    total_harus_byr=0;
    subtotal = 0;
    for (var i = 0;i < order.length; i++){
        subtotal = subtotal+order[i].total;
    }
    total_harus_byr = subtotal-diskon;
    $("#subtotal").text("Rp "+currency(subtotal));
    $("#total_harus_byr").text("Rp "+currency(total_harus_byr));
    $("#harus_bayar").text("Rp "+currency(total_harus_byr));
    if (order.length>0) {
        $('#buttonbayar').prop("disabled", false);
    }else{
        $('#buttonbayar').prop("disabled", true);
    }
}

function reset_topping(){
    $.each($('.activetopping'), function (index, item) {
        $(this).toggleClass("activetopping");
    });
}

function pilih_topping(produk,harga_jual,produk_id){
    nama_produk = produk;
    harga_produk = harga_jual;
    id_produk = produk_id;
    qty = 1;
    $("#modal_topping").modal({
        backdrop: 'static',
        keyboard: false
    });
}

function pilih_kategori(kategori){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getProdukInKategori')?>/",
          data:{ kategori:kategori},
          dataType:"json",
          success:function(response)
          {
            document.getElementById("menusection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                div.className = "menu col-lg-5 offset-lg-1 col-md-5 offset-md-1";
                div.setAttribute("onclick", "pilih_topping('"+response[i].nama_produk+"','"+response[i].harga_jual+"','"+response[i].id_produk+"')");
                div.innerHTML = response[i].nama_produk;
                document.getElementById('menusection').appendChild(div);
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
}

function autobtn(){
    $("#total_bayar").text(currency(total_harus_byr));
    hitungKembalian();
}

function hitungKembalian(){

    var total = parseInt($("#total_bayar").html().split('.').join(""));
    selisih = total-total_harus_byr;
    if (selisih>=0) {
        $("#kembalian").text("Rp "+currency(total_harus_byr-total));
        $('#buttoncetaknota').prop("disabled", false);
    }else{
        $("#kembalian").text("- Rp "+currency(total_harus_byr-total));
        $('#buttoncetaknota').prop("disabled", true);
    }
    // alert(selisih);
}

function selectTopping(id){
    if(id.childNodes[0].classList.contains('activetopping')){
        id.childNodes[0].classList.remove('activetopping');
    }else{
        id.childNodes[0].classList.add('activetopping');
    }
}

function reset_menu(){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getAllKategori')?>/",
          dataType:"json",
          success:function(response)
          {
            document.getElementById("kategorisection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                div.className = "kategori col-lg-8 offset-lg-4 col-sm-12 col-md-10 offset-md-1";
                div.setAttribute("onclick", "pilih_kategori('"+response[i].kategori+"')");
                div.innerHTML = response[i].kategori;
                document.getElementById('kategorisection').appendChild(div);
            }
            pilih_kategori(response[0].kategori);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );

    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getListTopping')?>/",
          dataType:"json",
          success:function(response)
          {
            document.getElementById("toppingsection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                var divchild = document.createElement('div');
                var input = document.createElement('input');
                var input2 = document.createElement('input');
                input.setAttribute("type","hidden");
                input.setAttribute("value",response[i].harga_jual);
                input2.setAttribute("type","hidden");
                input2.setAttribute("value",response[i].nama_produk);
                input.id = response[i].id_produk;
                div.className = "col-md-6";
                divchild.className = "kategori itemtopping";
                divchild.innerHTML = response[i].nama_produk;
                divchild.appendChild(input);
                divchild.appendChild(input2);
                div.appendChild(divchild);
                div.setAttribute("onclick", "selectTopping(this)");
                document.getElementById('toppingsection').appendChild(div);
            }
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
}

jQuery( document ).ready(function( $ ) {
    reset_menu();
});


function kalkulatorkasir(number) {
    var nominal = $("#total_bayar").html();
    nominal = nominal.replace('.','');

    if (number == 'del') {
        if (nominal != '0') {
            if (nominal.length == 1) {
                $("#total_bayar").html('0');
                hitungKembalian();
            }else{
                nominal = nominal.slice(0,-1)
                $("#total_bayar").html(currency(nominal));
                hitungKembalian();
            }
        }
    }else{
        if (nominal == '0') {
            $("#total_bayar").html(currency(number));
            hitungKembalian();
        }else{
            if (nominal.length<20) {
                nominal = nominal + number;
                $("#total_bayar").html(currency(nominal));
                hitungKembalian();
            }
        }
    }
}

function currency(x) {
    var retVal=x.toString().replace(/[^\d]/g,'');
    while(/(\d+)(\d{3})/.test(retVal)) {
      retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
    }
    return retVal;
}

function cetakNota() {
    var imgData = 'data:image/png;base64,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';

    var pembatas1 = 33;
    var pembatas2 = 57;
    var pembatas3 = 76;
    // var doc = new jsPDF()
    var doc = new jsPDF('p', 'mm', [90, 58]);

    doc.setFontSize(6);
    doc.addImage(imgData, 'JPEG', 29-15.5, 0, 31, 11);
    doc.text('Jalan Villa Puncak Tidar H-21 Malang', 29, 13, 'center');
    doc.text('Telp : 087842220111', 29, 16, 'center');
    doc.text('Email : teabreakindo@gmail.com', 29, 19, 'center');
    doc.setFontSize(8);
    doc.text('19/09/2018   11:30', 29, 25, 'center');
    doc.setFontSize(6);
    doc.text('Pelanggan : Ivan', 2, 30);
    // doc.text('Kasir : Bejo', 56, 30, 'right');

    doc.text('============================================', 2, pembatas1);

    doc.text('2x Tea Matcha Kelapa', 2, pembatas1+3);
    doc.text('topping : bubble', 2, pembatas1+6);
    doc.text('@ Rp.12.000,-', 2, pembatas1+9);
    doc.text('24.000,-', 56, pembatas1+6,'right');

    doc.text('3x Tea Matcha Biasa', 2, pembatas1+14);
    doc.text('topping : tidak ada', 2, pembatas1+17);
    doc.text('@ Rp.10.000,-', 2, pembatas1+20);
    doc.text('30.000,-', 56, pembatas1+17,'right');
    doc.text('============================================', 2, pembatas2);
    doc.text('Total Item : 5', 2, pembatas2+3);
    doc.text('Total Harga :', 40, pembatas2+3,'right');
    doc.text('Pembayaran :', 40, pembatas2+7,'right');
    doc.text('Kembali :', 40, pembatas2+15,'right');

    doc.text('54.000,-', 56, pembatas2+3,'right');
    doc.text('100.000,-', 56, pembatas2+7,'right');
    doc.text('--------------------', 56, pembatas2+10,'right');
    doc.text('46.000,-', 56, pembatas2+15,'right');

    doc.text('============================================', 2, pembatas3);

    // doc.addImage(imgPhone, 'JPEG', 29-15.5, 50, 3, 3)
    doc.text('Signature Milk Tea, Special Tea, ', 29, pembatas3+4, 'center');
    doc.text('Taste the Original Fresh!', 29, pembatas3+7, 'center');
    doc.setFontSize(8);
    doc.setFontType("bold");
    doc.text('Terima kasih atas kunjungan anda !', 29, pembatas3+11, 'center');
}
</script>
</body>
</html>

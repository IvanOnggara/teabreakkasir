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
                    <div class="row">
                        <div class="offset-md-7 col-md-5">
                            <button id="cetaknotaulang" class="btn btn-sm btn-info"  disabled="" onclick="cetakNotaHelp()">cetak ulang nota</button>
                        </div>
                    </div>
                        <div style="display:block; visibility:hidden">
                            <iframe width="0" height="0" id="myFrame" name="myFrame" src="blob:0827B944-D600-410D-8356-96E71F316FE4"></iframe>
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
<script src=<?php echo base_url("assets/vendors/jsPDF-1.3.2/dist/jspdf.debug.js")?>></script>
<script src=<?php echo base_url("assets/vendors/pdfmake-master/build/pdfmake.min.js")?>></script>
<script src=<?php echo base_url("assets/vendors/pdfmake-master/build/vfs_fonts.js")?>></script>

<script type="text/javascript">
var nama_produk;
var harga_produk;
var harga_topping=0;
var qty;
var id_produk;
var topping = new Array();
var order = new Array();
var order_diskon = new Array();
var list_diskon = new Array();
var id_itemdisc1 = new Array();
var id_itemdisc2 = new Array();
var totalsemuaproduk1 = 0;
var totalsemuaproduk2 = 0;
var total_harus_byr=0;
var diskon = 0;
var diskonp=0;
var subtotal = 0;
var totalygdibayar=0;
var isFirefox = typeof InstallTrigger !== 'undefined';
var isIE = /*@cc_on!@*/false || !!document.documentMode;
var isEdge = !isIE && !!window.StyleMedia;

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

//MERESET NILAI DARI MODAL BAYAR

function resetbyr(){
    $("#modal_bayar").modal('hide');
    $("#total_bayar").text('0');
}

//UNTUK MENAMBAHKAN ITEM BARU MELALUI PENEKANAN TOMBOL MENU

function tambah_item(){
    var status_topping = false;
    var count_topping = 0;
    var count;
    var roworder;

    var table = document.getElementById("billtable");
    var list_idtopping = new Array();
    var harga_topping = 0;

    //MENDAPATKAN LIST DAN HARGA TOPPING

    $.each($('.activetopping'), function (index, item) {
        topping.push(item.childNodes[2].value);
        harga_topping = parseInt(harga_topping)+parseInt(item.childNodes[1].value);
        list_idtopping.push(item.childNodes[1].id);
    });

    //JIKA TOPPING TIDAK ADA MAKA DIBERI PENANDA

    if (topping.length<1) {
        topping.push("-");   
    }

    //MENGECEK JIKA MEMILIKI ID PRODUK YANG SAMA DAN TOPPING YANG SAMA

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

    //JIKA MEMILIKI ID DAN TOPPING YANG SAMA MAKA DILAKUKAN PENAMBAHAN QTY SAJA PADA PRODUK, JIKA TIDAK DITAMBAH ROW BARU

    if (status_topping) {
        roworder = count;
        order[count].qty++;
        order[count].total = parseInt(order[count].qty)*(parseInt(order[count].harga_produk)+parseInt(order[count].harga_topping));
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
        cell4.innerHTML = '<p id="satuan'+table.rows.length+'">Rp '+currency(parseInt(harga_produk)+parseInt(harga_topping))+'</p>';
        cell5.innerHTML = '<div class="row"><p class="col-lg-9" id="totalharga'+table.rows.length+'">Rp '+currency(qty*harga_produk)+'</p><button class="col-lg-3 btn btn-danger btnremove" onclick="removeBtn(this);">X</button></div>';
        $("#modal_topping").modal('hide');
        var item = new Array();
        roworder = table.rows.length;
        item.id_order = table.rows.length;
        item.list_idtopping = list_idtopping;
        item.nama_produk = nama_produk;
        item.id_produk = id_produk;
        item.topping = topping;
        item.diskon = 0;
        item.qty = 1;
        item.subtotal = parseInt(harga_produk)+parseInt(harga_topping);
        item.qtydisc = 0;
        item.harga_produk = harga_produk;
        item.harga_topping = harga_topping;
        item.total = parseInt(qty)*(parseInt(harga_produk)+parseInt(harga_topping));
        order.push(item);
    }

    hitungDiskon();

    nama_produk="";
    topping = [];
    list_idtopping = [];
    order_diskon = [];
    id_produk = "";
    harga_produk = 0;
    harga_topping = 0;
    qty = 0;
    count=null;
    $.each($('.activetopping'), function (index, item) {
        $(this).toggleClass("activetopping");
    });
}

function hitungDiskon(){
    totalsemuaproduk1 = 0;
    totalsemuaproduk2 = 0;
    id_itemdisc1 = [];
    id_itemdisc2 = [];
    list_diskon = [];

    $.ajax({
      type:"post",
      url: "<?php echo base_url('adminstand/getDiskon')?>/",
      dataType:"json",
      success:function(response)
      {

        //UNTUK MENGOSONGKAN JUMLAH DISKON PADA ORDER
        for(var i =0;i<order.length;i++){
            order[i].qtydisc = 0;
            order[i].diskon = 0;
            order[i].total = ((parseInt(order[i].qty)-parseInt(order[i].qtydisc))*(parseInt(order[i].harga_produk)))+(parseInt(order[i].qty)*parseInt(order[i].harga_topping));
        }

        //UNTUK MENGECEK DAN MENGHITUNG DISKON

        for(var i =0;i<order.length;i++){
            for(var j = 0;j<response.length;j++){
                if(response[j].jenis_diskon[3]=="2"){

                    if (!list_diskon.includes(response[j].id_diskon)) {

                        var arrId = new Array();
                        arrId = response[j].id_poduk.split(",");
                        
                        var totalqty = 0;
                        var total_pdiskon = 0;

                        for (var k = 0; k < order.length; k++) {
                            for(var l = 0; l < arrId.length; l++) {
                                if(order[k].id_produk==arrId[l]){
                                    totalqty = totalqty+order[k].qty;
                                    if (!id_itemdisc2.includes(order[k].id_produk)) {
                                        id_itemdisc2.push(order[k].id_produk);
                                    }
                                }
                            }
                        }

                        total_pdiskon = parseInt(totalqty/3);
                        totalsemuaproduk2 = parseInt(totalsemuaproduk2) + parseInt(total_pdiskon);
                        list_diskon.push(response[j].id_diskon);
                    }

                }else if(response[j].jenis_diskon[3]=="1"){

                    if (!list_diskon.includes(response[j].id_diskon)) {
                        var arrId = new Array();
                        arrId = response[j].id_poduk.split(",");
                        
                        var totalqty = 0;
                        var total_pdiskon = 0;

                        for (var k = 0; k < order.length; k++) {
                            for(var l = 0; l < arrId.length; l++) {
                                if(order[k].id_produk==arrId[l]){
                                    totalqty = totalqty+order[k].qty;
                                    
                                    if (!id_itemdisc1.includes(order[k].id_produk)) {
                                        id_itemdisc1.push(order[k].id_produk);
                                    }
                                }
                            }
                        }

                        total_pdiskon = parseInt(totalqty/2);
                        totalsemuaproduk1 = parseInt(totalsemuaproduk1) + parseInt(total_pdiskon);
                        list_diskon.push(response[j].id_diskon);
                    }
                }
            }
        }

        if (totalsemuaproduk1>0) {
            diskon_termurah(totalsemuaproduk1,id_itemdisc1);
        }
        if (totalsemuaproduk2>0) {
            diskon_termurah(totalsemuaproduk2,id_itemdisc2);
        }
        
        for(var i =0;i<order.length;i++){
            for(var j = 0;j<response.length;j++){

                if (response[j].jenis_diskon[0]=="p") {
                    var arrId = new Array();
                    arrId = response[j].id_poduk.split(",");
                    if (arrId.includes(order[i].id_produk)) {
                        var dis = parseFloat(response[j].jenis_diskon.replace('persen',''))/100;
                        disc = (parseInt(order[i].qty)-parseInt(order[i].qtydisc))*(parseFloat(dis)*parseInt(order[i].harga_produk));
                        order[i].diskon = parseInt(order[i].diskon)+parseInt(disc);
                        if (!list_diskon.includes(response[j].id_diskon)) {
                            list_diskon.push(response[j].id_diskon);
                        }
                    }
                }else if(response[j].jenis_diskon[0]=="n"){
                    var arrId = new Array();
                    arrId = response[j].id_poduk.split(",");
                    if (arrId.includes(order[i].id_produk)) {
                        var dis = parseInt(response[j].jenis_diskon.replace('nominal',''));
                        var disc = parseInt(dis)*((parseInt(order[i].qty)-parseInt(order[i].qtydisc)));
                        order[i].diskon = parseInt(order[i].diskon)+parseInt(disc);
                        if (!list_diskon.includes(response[j].id_diskon)) {
                            list_diskon.push(response[j].id_diskon);
                        }
                    }
                }

            }
        }

        if (list_diskon.length==0) {
            list_diskon.push("none");
        }

        //UPDATE HARGA UNTUK DATA ORDER DAN TAMPILAN DI KASIR

        for(var i = 0;i<order.length;i++){
            order[i].total = ((parseInt(order[i].qty)-parseInt(order[i].qtydisc))*(parseInt(order[i].harga_produk)))+(parseInt(order[i].qty)*parseInt(order[i].harga_topping));
            order[i].subtotal = parseInt(order[i].total)-parseInt(order[i].diskon);
            $("#totalharga"+order[i].id_order).text("Rp "+currency(order[i].total));
        }

        countTotal();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert(errorThrown);
      }
    });
}

//UNTUK MENCARI ITEM YANG PALING MURAH DAN MASIH TERSEDIA UNTUK DILAKUKAN DISKON QTY

function diskon_termurah(totalproduk,arrId){
    var id_termurah=0;
    var termurah=null;
    //INISIALISASI HARGA DAN ID TERMURAH YANG ADA DALAM LIST

    while(totalproduk>0){
        for(var i=0;i<order.length;i++){
            if (order[i].qtydisc<order[i].qty&&arrId.includes(order[i].id_produk)) {
                termurah = order[i].harga_produk;
                id_termurah = i;
                break;
            }
        }

        for(var i=0;i<order.length;i++){
            if (order[i].qtydisc<order[i].qty&&arrId.includes(order[i].id_produk)) {
                if (parseInt(order[i].harga_produk)<parseInt(termurah)) {
                    termurah = order[i].harga_produk;
                    id_termurah = i;
                }
            }
        }

        //JIKA JUMLAH ITEM YANG PERLU DIDISKON > ITEM TERMURAH MAKA HANYA MENGURANGI TOTAL DAN DILANJUTKAN PENCARIAN YG BARU
        
        if (totalproduk>parseInt(order[id_termurah].qty)) {
            totalproduk = parseInt(totalproduk)-parseInt(order[id_termurah].qty);
            order[id_termurah].qtydisc = parseInt(order[id_termurah].qty);
        }else{
            order[id_termurah].qtydisc = parseInt(totalproduk);
            totalproduk = parseInt(0);
        }
    }
}

//UNTUK MENAMBAHKAM ITEM MENGGUNAKAN JIKA MENEKAN TOMBOL + PADA ORDER

function plus(id,rowid){
    var value = $("#qty"+id).text();
    value = parseInt(value)+1;
    satuan = parseInt($("#satuan"+id).text().substring(3).replace('.',''));
    $("#qty"+id).text(value);
    row = rowid.parentNode.parentNode.id;
    for (var i = 0; i < order.length; i++) {
        if (order[i].id_order==row) {
            order[i].qty = value;
        }
    }
    hitungDiskon();
}

//MENGHILANGKAN ITEM DARI LIST ORDER

function removeBtn(rowid){
    var a = rowid.parentNode.parentNode.parentNode.rowIndex;
    document.getElementById("billtable").deleteRow(a);
    var table = document.getElementById("billtable");
    row = rowid.parentNode.parentNode.parentNode.id;
    for (var i = 0; i < order.length; i++) {
        if (order[i].id_order==row) {
            order.splice(i, 1);
        }
    }

    var count = 0;
    for (var i = 1; i < table.rows.length-1; i++) {
        table.rows[i].id = i;
        order[count].id_order = i;
        count++;
    }

    hitungDiskon();
}

//MENGURANGI JUMLAH PADA ORDER, JIKA <1 MAKA DIHILANGKAN DARI LIST

function minus(id,rowid){
    var value = $("#qty"+id).text();
    row = rowid.parentNode.parentNode.id;
    var table = document.getElementById("billtable");
    if (parseInt(value)>1) {
        value = parseInt(value)-1;
        satuan = parseInt($("#satuan"+id).text().substring(3).replace('.',''));
        for (var i = 0; i < order.length; i++) {
            if (order[i].id_order==row) {
                order[i].qty = value;
            }
        }
        $("#qty"+id).text(value);
    }else{
        for (var i = 0; i < order.length; i++) {
            if (order[i].id_order==row) {
                order.splice(i, 1);
            }
        }
        var a = rowid.parentNode.parentNode.rowIndex;
        document.getElementById("billtable").deleteRow(a);
        var count=0;
        for (var i = 1; i < table.rows.length-1; i++) {
            table.rows[i].id = i;
            order[count].id_order = i;
            count++;
        }
    }
    hitungDiskon();
}

//UNTUK MENGHITUNG DISCOUNT AKHIR DAN TOTAL PEMBAYARAN

function countTotal(){
    total_harus_byr=0;
    subtotal = 0;
    diskon = 0;

    //MENDAPATKAN NILAI TOTAL PEMBAYARAN DAN TOTAL DISKON DARI LIST ORDER
    for (var i = 0;i < order.length; i++){
        subtotal = parseInt(subtotal)+parseInt(order[i].total);
        diskon = parseInt(diskon)+parseInt(order[i].diskon);
    }
    
    total_harus_byr = parseInt(subtotal)-parseInt(diskon);
    $("#diskon").text("Rp "+currency(diskon));
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

    totalygdibayar = parseInt($("#total_bayar").html().split('.').join(""));
    selisih = totalygdibayar-total_harus_byr;
    if (selisih>=0) {
        $("#kembalian").text("Rp "+currency(total_harus_byr-totalygdibayar));
        $('#buttoncetaknota').prop("disabled", false);
    }else{
        $("#kembalian").text("- Rp "+currency(total_harus_byr-totalygdibayar));
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
var imgData = 'data:image/jpeg;base64,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';



function cetakNota() {
    var harga_akhir = parseInt($("#harus_bayar").html().replace('Rp ','').split('.').join(""));
    var tipe_pembayaran = $('input[name=tipe_bayar]:checked').val();
    var keterangan = $("#keterangan").val();

    if (keterangan.length==0) {
        keterangan = "none";
    }

    $('#buttoncetaknota').prop("disabled", true);
    $('#cetaknotaulang').prop("disabled", false);
    
    var arrorder = new Array();

    for (var i = order.length - 1; i >= 0; i--) {
        arrorder.push(Object.assign({}, order[i]));
    }
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/saveNota')?>/",
          dataType:"text",
          data:{ order:JSON.stringify(arrorder),list_diskon:list_diskon,harga_akhir:harga_akhir,tipe_pembayaran:tipe_pembayaran,keterangan:keterangan},
          success:function(response)
          {
            //BELUM SELESAI
            // alert(response);
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );

    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var hour = d.getHours();
    var minutes = d.getMinutes();
    var clock = hour+":"+minutes;
    var output = (day<10 ? '0' : '') + day+ '/' +(month<10 ? '0' : '') + month+ '/' +d.getFullYear();

    var pembatas1 = 33;
    var pembatas2 = pembatas1+5;
    var pembatas2help = pembatas2;
    for(var i=0;i< order.length; i++){

            pembatas2 = pembatas2+11;
            // SETIAP ADA 1 ORDER JARAK PEMBATAS 2 AKAN BERTAMBAH SEBANYAK +11 (DITAMBAH SETELAH MENULISKAN TEXT PDF)

    }
    // var pembatas2 = pembatas1+24;
    var pembatas3 = pembatas2+21;
    var doc = new jsPDF('p', 'mm', [pembatas3+15, 58]);

    doc.setFontSize(6);
    doc.addImage(imgData, 'JPEG', 29-15.5, 0, 31, 11);
    doc.text('Jalan Villa Puncak Tidar H-21 Malang', 29, 13, 'center');
    doc.text('Telp : 087842220111', 29, 16, 'center');
    doc.text('Email : teabreakindo@gmail.com', 29, 19, 'center');
    doc.setFontSize(8);
    doc.text(output+'   '+clock, 29, 25, 'center');
    doc.setFontSize(6);
    doc.text('Pelanggan : '+$('#nama_pelanggan').val(), 2, 30);
    // doc.text('Kasir : Bejo', 56, 30, 'right');

    doc.text('============================================', 2, pembatas1);
    var totalitem = 0;

    for(var i=0;i< order.length; i++){
        var hargatotsatuan = parseInt(order[i]['harga_topping'])+parseInt(order[i]['harga_produk']);
        doc.text(order[i]['qty']+'x '+order[i]['nama_produk']+'', 2, pembatas2help);
        doc.text('topping : '+order[i]['topping'].toString(), 2, pembatas2help+3);
        doc.text('@ Rp.'+currency(hargatotsatuan)+',-', 2, pembatas2help+6);
        doc.text(currency(order[i]['total'])+',-', 56, pembatas2help+3,'right');

        pembatas2help = pembatas2help+11;
        totalitem += parseInt(order[i]['qty']);
        // SETIAP ADA 1 ORDER JARAK PEMBATAS 2 AKAN BERTAMBAH SEBANYAK +11 (DITAMBAH SETELAH MENULISKAN TEXT PDF)

    }

//KALAU SUDAH INI DIHAPUS SAJA
    // doc.text('2x Tea Matcha Kelapa', 2, pembatas1+3);
    // doc.text('topping : bubble', 2, pembatas1+6);
    // doc.text('@ Rp.12.000,-', 2, pembatas1+9);
    // doc.text('24.000,-', 56, pembatas1+6,'right');

    // doc.text('3x Tea Matcha Biasa', 2, pembatas1+14);
    // doc.text('topping : tidak ada', 2, pembatas1+17);
    // doc.text('@ Rp.10.000,-', 2, pembatas1+20);
    // doc.text('30.000,-', 56, pembatas1+17,'right');
//BATAS MENGHAPUS

    doc.text('============================================', 2, pembatas2);
    doc.text('Total Item : '+totalitem, 2, pembatas2+3);
    doc.text('Total Harga :', 40, pembatas2+3,'right');
    doc.text('Total Nominal Diskon :', 40, pembatas2+7,'right');
    doc.text('Pembayaran :', 40, pembatas2+11,'right');
    doc.text('Kembali :', 40, pembatas2+17,'right');

    doc.text($("#subtotal").html().replace('Rp ','')+',-', 56, pembatas2+3,'right');
    doc.text($("#diskon").html().replace('Rp ','')+',-', 56, pembatas2+7,'right');
    doc.text($("#total_bayar").html()+',-', 56, pembatas2+11,'right');
    doc.text('--------------------', 56, pembatas2+14,'right');
    doc.text($("#kembalian").html().replace('Rp ','')+',-', 56, pembatas2+17,'right');
    doc.text('============================================', 2, pembatas3);

    doc.text('Signature Milk Tea, Special Tea, ', 29, pembatas3+4, 'center');
    doc.text('Taste the Original Fresh!', 29, pembatas3+7, 'center');
    doc.setFontSize(8);
    doc.setFontType("bold");
    doc.text('Terima kasih atas kunjungan anda !', 29, pembatas3+11, 'center');
    doc.autoPrint();
    
    // print()
    // $("#myFrame").get(0).contentWindow.print();
    
    if (isFirefox) {
        window.open(doc.output('bloburl'), '_blank');
    }else{
        document.getElementById("myFrame").src = doc.output('bloburl');
    }
    // window.open(doc.output('bloburl'), '_blank');
    // var docDefinition = { content: 'This is an sample PDF printed with pdfMake' };

    // pdfMake.createPdf(docDefinition).print({}, window);
}

function cetakNotaHelp() {
    
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var hour = d.getHours();
    var minutes = d.getMinutes();
    var clock = hour+":"+minutes;
    var output = (day<10 ? '0' : '') + day+ '/' +(month<10 ? '0' : '') + month+ '/' +d.getFullYear();

    var pembatas1 = 33;
    var pembatas2 = pembatas1+5;
    var pembatas2help = pembatas2;
    for(var i=0;i< order.length; i++){

            pembatas2 = pembatas2+11;
            // SETIAP ADA 1 ORDER JARAK PEMBATAS 2 AKAN BERTAMBAH SEBANYAK +11 (DITAMBAH SETELAH MENULISKAN TEXT PDF)

    }
    var pembatas3 = pembatas2+21;
    var doc = new jsPDF('p', 'mm', [pembatas3+15, 58]);

    doc.setFontSize(6);
    doc.addImage(imgData, 'JPEG', 29-15.5, 0, 31, 11);
    doc.text('Jalan Villa Puncak Tidar H-21 Malang', 29, 13, 'center');
    doc.text('Telp : 087842220111', 29, 16, 'center');
    doc.text('Email : teabreakindo@gmail.com', 29, 19, 'center');
    doc.setFontSize(8);
    doc.text(output+'   '+clock, 29, 25, 'center');
    doc.setFontSize(6);
    doc.text('Pelanggan : '+$('#nama_pelanggan').val(), 2, 30);
    // doc.text('Kasir : Bejo', 56, 30, 'right');

    doc.text('============================================', 2, pembatas1);
    var totalitem = 0;

    for(var i=0;i< order.length; i++){
        var hargatotsatuan = parseInt(order[i]['harga_topping'])+parseInt(order[i]['harga_produk']);
        doc.text(order[i]['qty']+'x '+order[i]['nama_produk']+'', 2, pembatas2help);
        doc.text('topping : '+order[i]['topping'].toString(), 2, pembatas2help+3);
        doc.text('@ Rp.'+currency(hargatotsatuan)+',-', 2, pembatas2help+6);
        doc.text(currency(order[i]['total'])+',-', 56, pembatas2help+3,'right');

        pembatas2help = pembatas2help+11;
        totalitem += parseInt(order[i]['qty']);
        // SETIAP ADA 1 ORDER JARAK PEMBATAS 2 AKAN BERTAMBAH SEBANYAK +11 (DITAMBAH SETELAH MENULISKAN TEXT PDF)

    }

    doc.text('============================================', 2, pembatas2);
    doc.text('Total Item : '+totalitem, 2, pembatas2+3);
    doc.text('Total Harga :', 40, pembatas2+3,'right');
    doc.text('Total Nominal Diskon :', 40, pembatas2+7,'right');
    doc.text('Pembayaran :', 40, pembatas2+11,'right');
    doc.text('Kembali :', 40, pembatas2+17,'right');

    doc.text($("#subtotal").html().replace('Rp ','')+',-', 56, pembatas2+3,'right');
    doc.text($("#diskon").html().replace('Rp ','')+',-', 56, pembatas2+7,'right');
    doc.text($("#total_bayar").html()+',-', 56, pembatas2+11,'right');
    doc.text('--------------------', 56, pembatas2+14,'right');
    doc.text($("#kembalian").html().replace('Rp ','')+',-', 56, pembatas2+17,'right');
    doc.text('============================================', 2, pembatas3);

    doc.text('Signature Milk Tea, Special Tea, ', 29, pembatas3+4, 'center');
    doc.text('Taste the Original Fresh!', 29, pembatas3+7, 'center');
    doc.setFontSize(8);
    doc.setFontType("bold");
    doc.text('Terima kasih atas kunjungan anda !', 29, pembatas3+11, 'center');
    doc.autoPrint();
    
    if (isFirefox) {
        window.open(doc.output('bloburl'), '_blank');
    }else{
        document.getElementById("myFrame").src = doc.output('bloburl');
    }
}
</script>
</body>
</html>

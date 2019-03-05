<div class="section">

    <div class="col-lg-4 col-md-12 col-sm-12 section2">
        <div class="col-md-11 offset-md-1 judul">
            LIST BAHAN JADI
        </div>
        <div id="menusection">
        </div>
    </div>

    <div class="col-lg-6 offset-lg-1 col-md-12 col-sm-12 section3">
        <div class="judul">
            BILL
        </div>
        <div class="billsection">
            <div class="divbill table-responsive">
                <table id="billtable" class="table" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 40%;">Nama</th>
                            <th style="width: 40%;">Qty</th>
                            <th style="width: 20%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paysection">
            <div class="row">
                <button id="btnorder" class="btn btn-info col-lg-3 offset-lg-8 btnpay" disabled="" onclick="orderprocess()">ORDER</button>
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
<script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
</body>
</html>
<script type="text/javascript">

  var listOrder = new Array();
  count_id_order = 0;
  loadMenu();

  function loadMenu(){
    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getNamaBahanJadi')?>/",
          dataType:"json",
          success:function(response)
          {
            document.getElementById("menusection").innerHTML = "";
            for(var i=0;i< response.length; i++){
                var div = document.createElement('div');
                div.className = "menu col-lg-5 offset-lg-1 col-md-5 offset-md-1";
                div.setAttribute("onclick", "tambah_item('"+response[i].id_bahan_jadi+"','"+response[i].nama_bahan_jadi+"')");
                div.innerHTML = response[i].nama_bahan_jadi;
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

  function tambah_item(id_bahan_jadi,nama_bahan_jadi){
    var count=-1;
    var table = document.getElementById("billtable");
    // var date = new Date();
    // var tgl_order = date.getDate()+"-"+date.getMonth()+"-"+date.getFullYear();

    if (table.rows.length>1) {
      for(var i = 0;i<listOrder.length;i++){
        if (listOrder[i].id_bahan_jadi==id_bahan_jadi){
          count = i;
        }
      }
    }

    //JIKA MEMILIKI ID DAN TOPPING YANG SAMA MAKA DILAKUKAN PENAMBAHAN QTY SAJA PADA PRODUK, JIKA TIDAK DITAMBAH ROW BARU

    if (count!=-1) {
        listOrder[count].qty++;
        $("#qty"+listOrder[count].id_order).val(listOrder[count].qty);
    }else{
        var row = table.insertRow(1);
        row.id = count_id_order;
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var item = new Array();
        item.id_order = count_id_order;
        item.nama_bahan_jadi = nama_bahan_jadi;
        item.id_bahan_jadi = id_bahan_jadi;
        item.qty = 1;
        // item.tgl_order = tgl_order;
        listOrder.push(item);
        cell1.innerHTML = '<p id="namabjadi'+count_id_order+'">'+nama_bahan_jadi+'</p>';
        cell2.innerHTML = '<button class="btn center btn-default btnmin btnqty" style="font-size: 15px;font-weight: bold;" onclick="minus(\''+count_id_order+'\',this)">-</button><input type="text" onkeyup="changeqty(\''+count_id_order+'\',this)"  value="1" id="qty'+count_id_order+'" class="qtyitem btnqty" style="font-size: 15px;font-weight: bold;width:30%"><button class="btn center btn-default btnplus btnqty" style="font-size: 15px;font-weight: bold;" onclick="plus(\''+count_id_order+'\',this)">+</button>';
        // cell3.innerHTML = '<p id="tgl_order'+count_id_order+'">'+tgl_order+'</p>';
        cell3.innerHTML = '<div class="row"><button class="col-lg-4 offset-lg-8 btn btn-danger btnremove" onclick="removeBtn(this);">X</button>';

        count_id_order++;
    }
    checkBtnOrder();
}

  function plus(id,rowid){
    checkBtnOrder();
    var value = $("#qty"+id).val();
    value = parseInt(value)+1;
    satuan = parseInt($("#satuan"+id).text().substring(3).replace('.',''));
    $("#qty"+id).val(value);
    row = rowid.parentNode.parentNode.id;
    for (var i = 0; i < listOrder.length; i++) {
        if (listOrder[i].id_order==row) {
            listOrder[i].qty = value;
        }
    }
}

function changeqty(id,rowid) {
  checkBtnOrder();
  var value = $("#qty"+id).val();
  value = parseInt(value);

  row = rowid.parentNode.parentNode.id;
  for (var i = 0; i < listOrder.length; i++) {
      if (listOrder[i].id_order==row) {
          listOrder[i].qty = value;
      }
  }

}

//MENGHILANGKAN ITEM DARI LIST ORDER

function removeBtn(rowid){
    var a = rowid.parentNode.parentNode.parentNode.rowIndex;
    document.getElementById("billtable").deleteRow(a);
    var table = document.getElementById("billtable");
    row = rowid.parentNode.parentNode.parentNode.id;
    for (var i = 0; i < listOrder.length; i++) {
        if (listOrder[i].id_order==row) {
            listOrder.splice(i, 1);
        }
    }
    checkBtnOrder();
}

//MENGURANGI JUMLAH PADA ORDER, JIKA <1 MAKA DIHILANGKAN DARI LIST

function minus(id,rowid){
    var value = $("#qty"+id).val();
    row = rowid.parentNode.parentNode.id;
    var table = document.getElementById("billtable");
    if (parseInt(value)>1) {
        value = parseInt(value)-1;
        for (var i = 0; i < listOrder.length; i++) {
            if (listOrder[i].id_order==row) {
                listOrder[i].qty = value;
            }
        }
        $("#qty"+id).val(value);
    }else{
      alert('asd0');
        for (var i = 0; i < listOrder.length; i++) {
            if (listOrder[i].id_order==row) {
                listOrder.splice(i, 1);
            }
        }
        var a = rowid.parentNode.parentNode.rowIndex;
        document.getElementById("billtable").deleteRow(a);
    }
  checkBtnOrder();
}

function checkBtnOrder(){
  if (listOrder.length>0) {
        $('#btnorder').prop("disabled", false);
    }else{
        $('#btnorder').prop("disabled", true);
    }
}

function orderprocess(){

    var arrorder = new Array();

    for (var i = listOrder.length - 1; i >= 0; i--) {
        arrorder.push(Object.assign({}, listOrder[i]));
    }

    $.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/saveOrder')?>/",
          dataType:"text",
          data:{ order:JSON.stringify(arrorder)},
          success:function(response)
          {
            alert('Saved');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
    // console.log(JSON.stringify(arrorder));
}

</script>
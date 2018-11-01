    <div class="container-fluid">
      <div class="col-lg-8 offset-lg-2 col-md-6 offset-lg-3 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>VOID ORDER</strong></h3>
                <!-- <div class="row">
      <div class="col-md-3">
        <div class="card">
  <div class="card-body">
    
                                    <div class="h1 text-muted text-right mb-4">
                                        <i class="fa fa-cart-plus"></i>
                                    </div>
                                    <div class="h4 mb-0">
                                        <span class="count">1238</span>
                                    </div>
                                    <small class="text-muted text-uppercase font-weight-bold">Produk Terjual</small>
                                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                                </div>
</div>
      </div>
    </div> -->
                
            </div>
            <div class="card-body">
              <!-- <button class="btn btn-info">+ Void Nota</button> -->
              <table id="mytable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No Nota</th>
                    <th>Tanggal Nota</th>
                    <th>Shift</th>
                    <th>Total</th>
                    <th>Detail</th>
                    <th>Void</th>
                  </tr>
                </thead>
              </table>
            </div>
        </div> <!-- .card -->
      </div>
    </div>

    <div class="modal fade" id="modal_void" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="header modal-header">
                  <h4 class="modal-title">Silahkan Masukkan Password Anda</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <p style="font-weight: 600!important;font-size: 4vh;color: black;text-align: center;" id="labelid"></p>
                  <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                      <label class="col-lg-12">Password : <input type="password" id="password_stand"></label>
                      <label id="error" style="display: none;color: red;">Password Anda Salah!</label>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" data-dismiss="modal" onclick="reset_modal_void()" class="btn btn-default">Batal</button>
                  <button type="button" onclick="confirm_void()" class="btn add_field_button btn-info">Void</button>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Jenis Pembayaran</strong></label>
                                
                                <h4><span class="badge badge-primary" id="jenis_pembayaran">CASH</span></h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Status</strong></label>
                                
                                <h4><span class="badge badge-success" id="status">TIDAK VOID</span></h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>List Diskon</strong></label>
                                <div id="listdiskon">
                                    <h6>- ...</h6>
                                    <h6>- ...</h6>
                                    <h6>- ...</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>Keterangan</strong></label>
                                
                                <h6 id="keterangan">...</h6>
                            </div>
                        </div>
                    </div>

                    <!-- DETAIL -->
                    <div class="form-group">
                        <label class=" form-control-label"><strong>Nota Pembelian</strong></label>
                        <table id="detailnota" class="table table-striped table-bordered" style="width: 100%" width="100%">
                            <thead>
                              <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Kategori</th>
                                <th>Harga Produk</th>
                                <th>Total Harga Produk</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                    <h5 class="text-right" id="totalhargapernota">Total Harga Nota : Rp. 0,-</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
  </body>
</html>
<script type="text/javascript">
  var id_nota;

  function currency(x) {
      var retVal=x.toString().replace(/[^\d]/g,'');
      while(/(\d+)(\d{3})/.test(retVal)) {
        retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
      }
      return retVal;
  }

  function reset_modal_void(){
    id_nota ="";
    $("#password_stand").val('');
    $("#modal_void").modal('hide');
    $("#labelid").text('');
    $("#error").css("display", "none");;
  }

  function modal_confirm_void(id){
    $("#modal_void").modal({
        backdrop: 'static',
        keyboard: false
    });
    id_nota = id;
    $("#labelid").text(id);
  }

  function modal_detail_void(id,harga_total_akhir,nama_diskon,jenis_diskon,status,pembayaran,keterangan) {
    $("#modal_detail").modal('toggle');
    $("#jenis_pembayaran").removeClass('badge-primary');
    $("#jenis_pembayaran").removeClass('badge-success');
    $("#jenis_pembayaran").removeClass('badge-warning');

    $("#status").removeClass('badge-success');
    $("#status").removeClass('badge-danger');

    if (pembayaran == 'cash') {
      $("#jenis_pembayaran").addClass('badge-success');
    }else if (pembayaran == 'debit') {
      $("#jenis_pembayaran").addClass('badge-warning');
    }else{
      $("#jenis_pembayaran").addClass('badge-primary');
    }

    $("#jenis_pembayaran").html(pembayaran.toUpperCase());

    if (status == 'void') {
      $("#status").addClass('badge-danger');
      var stat = 'VOID';
    }else{
      $("#status").addClass('badge-success');
      var stat = 'TIDAK VOID';
    }
    $("#status").html(stat);

    if (nama_diskon == 'none') {
      var disc = 'tidak ada diskon'; 
    }else{
      var disc = '';
      var jenishelp = '';
      var nama = nama_diskon.split(",");
      var jenis = jenis_diskon.split(",");

      for (var i = nama.length - 1; i >= 0; i--) {
        if (jenis[i].includes('nominal')) {
          jenishelp = 'potongan Rp.'+currency(jenis[i]);
        }else if (jenis[i].includes('persen')) {
          jenishelp = 'potongan '+ jenis[i].replace("persen", "")+'%';
        }else if (jenis[i].includes('buy1')) {
          jenishelp = 'promo beli 1 gratis 1';
        }else if (jenis[i].includes('buy2')) {
          jenishelp = 'promo beli 2 gratis 1';
        }

        disc = disc+'<h6>- '+nama[i].split('+').join(' ')+' ( '+jenishelp+' )</h6>';
        
      }

      
    }
    
    $("#listdiskon").html(disc);

    if (keterangan == 'none') {
      var ket = 'tidak ada keterangan';
    }else{
      var ket = keterangan.split('+').join(' ');
    }

    $("#keterangan").html(ket);
    $("#totalhargapernota").text("Total Harga Nota : Rp. "+currency(harga_total_akhir)+",-");

    if ( $.fn.DataTable.isDataTable( '#detailnota' ) ) {
          $('#detailnota').DataTable().destroy();
      }

    tabeldetail = $("#detailnota").DataTable({
        initComplete: function() {
          var api = this.api();
          $('#mytable_filter input')
          .on('.DT')
          .on('keyup.DT', function(e) {
            if (e.keyCode == 13) {
              api.search(this.value).draw();
            }
          });
        },
        oLanguage: {
          sProcessing: "loading..."
        },
        responsive: true,
        ajax: {
        "type"   : "POST",
        "data": function(data) {
        data.id_nota = id;
      },
        "url"    : "<?php echo base_url('adminstand/detailNotaData');?>",
        "dataSrc": function (json) {
          var return_data = new Array();

          for(var i=0;i< json.length; i++){

            return_data.push({
              'nama_produk': json[i].nama_produk,
              'jumlah_produk'  : json[i].jumlah_produk,
              'kategori_produk' : json[i].kategori_produk,
              'harga_produk' : "Rp "+currency(json[i].harga_produk),
              'total_harga_produk' : "Rp "+currency(json[i].total_harga_produk)
            });
          }
          return return_data;
        }
      },
        
          "lengthChange": true,
        columns: [
          {'data': 'nama_produk'},
          {'data': 'jumlah_produk'},
          {'data': 'kategori_produk'},
          {'data': 'harga_produk'},
          {'data': 'total_harga_produk'}
        ],
      });
  }

  function confirm_void(){
    var pwd = $("#password_stand").val();
      $.ajax({
            type:"post",
            url: "<?php echo base_url('adminstand/voidNota')?>/",
            data:{ id_nota:id_nota,pwd:pwd},
            success:function(response)
            {
              console.log(response);
              if(response=='true'){
                $("#error").css("display", "none");;
                $("#modal_void").modal('hide');
                alert("Nota dengan id "+id_nota+" sudah void!");
                reload_table();
              }else{
                $("#error").css("display", "block");;
              }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert(errorThrown);
            }
        }
    );
  }

  var tabeldata;

  jQuery( document ).ready(function( $ ) {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };
    tabeldata = $("#mytable").dataTable({
      initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .on('.DT')
        .on('keyup.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "loading..."
      },
      responsive: true,
      serverSide: false,
      ajax: {
    "type"   : "POST",
    "url"    : "<?php echo base_url('adminstand/getListNota');?>",
    "dataSrc": function (json) {
      console.log(json);
      var return_data = new Array();
      for(var i=0;i< json.length; i++){
        var nama = json[i].nama_diskon;
        var kett = json[i].keterangan;
        nama = nama.split(' ').join('+');
        kett = kett.split(' ').join('+');
        return_data.push({
          'no_nota': json[i].id_nota,
          'tgl_nota'  : json[i].tanggal_nota+" "+json[i].waktu_nota,
          'shift' : json[i].shift,
          'total' : "Rp "+currency(json[i].total_harga),
          'detail' : '<button onclick=modal_detail_void("'+json[i].id_nota+'","'+json[i].total_harga+'","'+nama+'","'+json[i].jenis_diskon+'","'+json[i].status+'","'+json[i].pembayaran+'","'+kett+'") class="btn btn-primary">Detail</button> ',
          'void' : '<button onclick=modal_confirm_void("'+json[i].id_nota+'") class="btn btn-warning" style="color:white;">Void</button> '
        })
      }
      return return_data;
    }
  },
  columns: [
    {'data': 'no_nota'},
    {'data': 'tgl_nota'},
    {'data': 'shift'},
    {'data': 'total'},
    {'data': 'detail'},
    {'data': 'void','orderable':false,'searchable':false}
  ],
          "order": [[ 1, "desc" ]],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        // $('td:eq(0)', row).html(index);
      }
    });
});

function reload_table(){
  tabeldata.api().ajax.reload(null,false);
}



</script>
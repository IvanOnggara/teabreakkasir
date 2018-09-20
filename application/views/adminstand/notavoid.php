    <div class="container-fluid">
      <div class="col-lg-8 offset-lg-2 col-md-6 offset-lg-3 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong>VOID ORDER</strong></h3>
            </div>
            <div class="card-body">
              <!-- <button class="btn btn-info">+ Void Nota</button> -->
              <table id="mytable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No Nota</th>
                    <th>Tanggal Nota</th>
                    <th>Status</th>
                    <th>Total</th>
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

  function confirm_void(){
    var pwd = $("#password_stand").val();
      $.ajax({
            type:"post",
            url: "<?php echo base_url('adminstand/voidNota')?>/",
            data:{ id_nota:id_nota,pwd:pwd},
            success:function(response)
            {
              console.log(response);
              if(response==true){
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
        return_data.push({
          'no_nota': json[i].id_nota,
          'tgl_nota'  : json[i].tanggal_nota,
          'status' : json[i].status,
          'total' : "Rp "+currency(json[i].total_harga),
          'void' : '<button onclick=modal_confirm_void("'+json[i].id_nota+'") class="btn btn-warning" style="color:white;">Void</button> '
        })
      }
      return return_data;
    }
  },
  columns: [
    {'data': 'no_nota'},
    {'data': 'tgl_nota'},
    {'data': 'status'},
    {'data': 'total'},
    {'data': 'void','orderable':false,'searchable':false}
  ],
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
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div style="padding: 0px;" class="menujudul">
              REKAP PENJUALAN PRODUK
          </div>
    </div>
  </div>
  <br>
  <div class="row">
    
  </div>
  <div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Tanggal</label>
            <input type="text" class="form-control" id="tanggal" placeholder="Tanggal">
        </div>
        <div class="card">
          <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-cart-plus"></i>
                </div>
                <div class="h4 mb-0">
                    <span class="count" id="numcountproduk">-</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Cup Terjual</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
            </div>
          </div>
    </div>
    <div class="col-md-9 col-sm-9">
      <table id="mytable" class="table table-striped table-bordered">
            <thead class="thead-dark">
              <tr>
                <th style="width: 65%;">Nama Produk</th>
                <th style="width: 20%;">Kategori</th>
                <th style="width: 15%;">Terjual</th>
              </tr>
            </thead>
        </table>
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
<script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
<!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>

    <script type="text/javascript">
      $('#tanggal').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        $("#tanggal").on("dp.change", function(e) {
            refreshcupterjual()
            reload_table();
        });

        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        var tahun = d.getFullYear();

        var output = (day<10 ? '0' : '') + day+ '/' +(month<10 ? '0' : '') + month+ '/' +tahun;
        $('#tanggal').val(output);

        refreshcupterjual();

        function refreshcupterjual() {
          $.ajax({
                  type:"post",
                  url: "<?php echo base_url('adminstand/getcupsold')?>/",
                  data:{
                    tanggal:$('#tanggal').val()
                  },
                  success:function(response)
                  {
                    $("#numcountproduk").text(response);
                    
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                    alert(errorThrown);
                  }
              }
          );
        }

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
            ajax: {
          "type"   : "POST",
          "url"    : "<?php echo base_url('adminstand/datapenjualan');?>",
          "data": function(d){
              d.tanggal = $("#tanggal").val()
          },
          "dataSrc": function (json) {
            var return_data = new Array();
            for(var i=0;i< json.length; i++){

              return_data.push({
                'nama_produk': json[i].nama_produk,
                'kategori'  : json[i].kategori,
                'terjual' : json[i].jumlah
              })
            }
            return return_data;
          }
        },
         dom: 'Bfrtlip',
              buttons: [
                  {
                      extend: 'copyHtml5',
                      text: 'Copy',
                      filename: 'Produk Terjual '+$("#tanggal").val(),
                      exportOptions: {
                        columns:[0,1,2]
                      }
                  },{
                      extend: 'excelHtml5',
                      text: 'Excel',
                      className: 'exportExcel',
                      filename: 'Produk Terjual '+$("#tanggal").val(),
                      exportOptions: {
                        columns:[0,1,2]
                      }
                  },{
                      extend: 'csvHtml5',
                      filename: 'Produk Terjual '+$("#tanggal").val(),
                      exportOptions: {
                        columns:[0,1,2]
                      }
                  },{
                      extend: 'pdfHtml5',
                      filename: 'Produk Terjual '+$("#tanggal").val(),
                      exportOptions: {
                        columns:[0,1,2]
                      }
                  },{
                      extend: 'print',
                      filename: 'Produk Terjual '+$("#tanggal").val(),
                      exportOptions: {
                        columns:[0,1,2]
                      }
                  }
              ],
              "lengthChange": true,
      columns: [
        {'data': 'nama_produk'},
        {'data': 'kategori'},
        {'data': 'terjual'},
      ],
      "order": [[ 1, "asc" ]]
    });

        function reload_table(){
          tabeldata.api().ajax.reload(null,false);
        }
        
    </script>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul" id="judul">
	            HISTORI STOCK
	        </div>
		</div>
	</div>
	<br>
  <div class="row">
    <div class="col-md-4 col-sm-4">
      <div class="form-group">
        <label for="usr">Tanggal:</label>
        <input type="text" class="form-control" id="tanggalstok">
      </div>
    </div>
  </div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			
			<table id="mytable" class="table table-striped table-bordered">
		        <thead class="thead-dark">
		          <tr>
		            <th style="width: 15%;">ID Bahan Jadi</th>
		            <th style="width: 35%;">Nama Bahan Jadi</th>
		            <th style="width: 7%;">Masuk</th>
		            <th style="width: 7%;">Keluar</th>
		            <th style="width: 7%;">Sisa</th>
		            <th style="width: 19%;">Keterangan</th>
		            <!-- <th style="width: 12.5%;">Edit</th> -->
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
<script src=<?php echo base_url("assets/vendors/pdfmake-master/build/pdfmake.min.js")?>></script>
<script src=<?php echo base_url("assets/vendors/pdfmake-master/build/vfs_fonts.js")?>></script>
<script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
<!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
<script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>
</body>
</html>
<script type="text/javascript">

  var d = new Date();
  var date = d.getDate();
  var month = d.getMonth();
  var month1 = month+1;
  var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; 
  var year = d.getFullYear();
  var alldate = date + " " + months[month] +" "+year;

  if (date< 10) {
    date = "0"+date;
  }

  if (month<10) {
    month = "0"+month;
  }

  var datee = date + "/" + month1 +"/"+year;

  $('#tanggalstok').datetimepicker({
      format: 'DD/MM/YYYY',
      useCurrent: true
  });

  $('#tanggalstok').val(datee);

  $("#tanggalstok").on("dp.change", function(e) {
      reload_table();
  });


		$("#tooltip").tooltip();

    var tabeldata = $("#mytable").DataTable({
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
    "url"    : "<?php echo base_url('adminstand/dataSisaStok');?>",
    "data": function(d){
        var datt = $('#tanggalstok').val();
        datt = datt.split("/");
        d.tanggal = datt[2]+"-"+datt[1]+"-"+datt[0];
    },
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'id_bahan_jadi': json.data[i].id_bahan_jadi,
          'nama_bahan_jadi'  : json.data[i].nama_bahan_jadi,
          'stok_masuk' : json.data[i].stok_masuk,
          'stok_keluar' : json.data[i].stok_keluar,
          'stok_sisa' : json.data[i].stok_sisa,
          'keterangan' : json.data[i].keterangan,
        })
      }
      return return_data;
    }
  },
  columns: [
    {'data': 'id_bahan_jadi'},
    {'data': 'nama_bahan_jadi'},
    {'data': 'stok_masuk'},
    {'data': 'stok_keluar'},
    {'data': 'stok_sisa'},
    {'data': 'keterangan'}
  ]
    });

    function savealldata() {
		var data = tabeldata.$('input').serializeArray();
        console.log(data);
        //save disini
	}

	function stok_masuk_keluar(argument) {
		return false;
	}

  function reload_table(){
    tabeldata.ajax.reload(null,false);
  }
</script>
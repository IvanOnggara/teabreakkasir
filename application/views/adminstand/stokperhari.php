<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul" id="judul">
	            STOCK HARI INI ( - )

	        </div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<button class="btn btn-lg btn-success" id="saveall" style="margin-bottom: 10px;" onclick="savealldata()">SAVE ALL</button>
			&nbsp<i class="fa fa-spin fa-refresh" id="loadingprint" style="color: green"></i>
			<table id="mytable" class="table table-striped table-bordered">
		        <thead class="thead-dark">
		          <tr>
		            <th style="width: 15%;">ID Bahan Jadi</th>
		            <th style="width: 29%;">Nama Bahan Jadi</th>
		            <th style="width: 9%;">Masuk</th>
		            <th style="width: 9%;">Keluar</th>
		            <th style="width: 9%;">Sisa <i id="tooltip" class="fa fa-question-circle-o" style="color: yellow" data-toggle="tooltip"  title="Lakukan Save untuk merubah sisa"></i></th>
		            <th style="width: 19%;">Keterangan</th>
		            <!-- <th style="width: 12.5%;">Edit</th> -->
		          </tr>
		        </thead>
		    </table>
		</div>
		
	</div>
</div>
<!-- 
<div class="modal fade" id="modal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="editid" class=" form-control-label">Stok Masuk</label>
                            <input type="text" id="editsm" placeholder="Masukkan Stok Masuk" class="form-control numeric">
                            <input type="hidden" name="id_lama" id="id_lama">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                <button type="button" onclick="simpanedit()" class="btn add_field_button btn-info">Simpan</button>
            </div>
        </div>
    </div>
</div> -->


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
  $('#loadingprint').hide();
	var d = new Date();
	var date = d.getDate();
	var month = d.getMonth();
	var month1 = month+1;
	var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]; 
	var year = d.getFullYear();
	var alldate = date + " " + months[month] +" "+year;
	$("#judul").html("STOK HARI INI ( "+alldate+" )");


	


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
      ajax: {
    "type"   : "POST",
    "url"    : "<?php echo base_url('adminstand/dataSisaStok');?>",
    "data": function(d){
        d.tanggal = year+"-"+month1+"-"+date;
    },
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'id_bahan_jadi': json.data[i].id_bahan_jadi,
          'nama_bahan_jadi'  : json.data[i].nama_bahan_jadi,
          'stok_masuk' : '<input name="masuk_'+json.data[i].id_bahan_jadi+'" type="text" placeholder="" class="form-control numeric" onchange="stok_masuk_keluar(\'sisa_'+json.data[i].id_bahan_jadi+'\')" value="'+json.data[i].stok_masuk+'">',
          'stok_keluar' : '<input name="keluar_'+json.data[i].id_bahan_jadi+'" type="text" placeholder="" class="form-control numeric" value="'+json.data[i].stok_keluar+'">',
          'stok_sisa' : '<div id="sisa_'+json.data[i].id_bahan_jadi+'">'+json.data[i].stok_sisa+'</div>',
          'keterangan' : '<input name="keterangan_'+json.data[i].id_bahan_jadi+'" type="text" placeholder="" class="form-control" value="'+json.data[i].keterangan+'">',
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
  ],
  "fnDrawCallback": function( oSettings ) {
      $('.numeric').on('input', function (event) { 

		    this.value = this.value.replace(/[^.0-9]/g, '');
		    if ($(this).val().indexOf('.') == 0) {
		      $(this).val($(this).val().substring(1));
		    }
		    if ($(this).val().length > 1) {
		        if ($(this).val().charAt(0) == '0') {
		            if ($(this).val().charAt(1) != '.') {
		                this.value = $(this).val().charAt(1);
		            }else{
		            	// this.value = $(this).val().charAt(1);
		            }
		        }
		    }

		    if ($(this).val().split(".").length > 2) {
		        this.value = this.value.slice(0,-1);
		    }

        if ($(this).val()=='') {
            this.value = 0;
        }
		});
    }
    });

    $( document ).ready(function() {
    
});

    

    function savealldata() {
		var data = tabeldata.$('input').serializeArray();


      $('#loadingprint').show();
      $('#loadingprint').addClass("fa-spin");
      $('#loadingprint').addClass("fa-refresh");
      $('#loadingprint').removeClass("fa-check");
      $('#loadingprint').html("");
      $('#loadingprint').removeClass("fa-times");
      $("#saveall").prop('disabled', true);

          $.post({
           url: 'adminstand/savedatastokhariini',
           data: { data:data},
           success:function(response){
            reload_table();
            stoploading('success');
           },
           error:function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
              stoploading('error');
           }
        });

        
	}

  function stoploading(argument) {
    $('#loadingprint').removeClass("fa-spin");
    $('#loadingprint').removeClass("fa-refresh");
    if (argument == 'success') {
      $('#loadingprint').addClass("fa-check");
      $('#loadingprint').css("color", "green");
      $('#loadingprint').html(" Proses Penyimpanan Berhasil");
    }else{
      $('#loadingprint').addClass("fa-times");
      $('#loadingprint').css("color", "red");
      $('#loadingprint').html(" Proses Penyimpanan Gagal");
    }
    $("#saveall").prop('disabled', false);
    
  }

	function stok_masuk_keluar(argument) {
		return false;
	}

	function reload_table(){
	  tabeldata.ajax.reload(null,false);
	}
</script>
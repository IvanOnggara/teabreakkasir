<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul">
	            STOCK MASUK
	        </div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-5 col-sm-12">
			<div class="form-group">
			  	<label>Nama Bahan Jadi</label>
			  	<input type="text" class="form-control" id="namabahanjadi" placeholder="Nama Bahan Jadi">
			</div>
		</div>
		<div class="col-md-5 col-sm-12">
			<div class="form-group">
			  	<label>Stok Masuk</label>
			  	<input type="text" class="form-control numeric" id="stokmasuk" placeholder="Stok Masuk">
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
			<label for="usr">Action</label>
			<button class="btn btn-success" id="buttontambahstok" onclick="tambahstokbahan()">Tambah Stok Masuk</button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<table id="mytable" class="table table-striped table-bordered">
		        <thead class="thead-dark">
		          <tr>
		            <th style="width: 15%;">ID Bahan Jadi</th>
		            <th style="width: 35%;">Nama Bahan Jadi</th>
		            <th style="width: 15%;">Stok Masuk</th>
		            <th style="width: 15%;">Tanggal</th>
		            <th style="width: 10%;">Edit</th>
		            <th style="width: 10%;">Delete</th>
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
</body>
</html>
<script type="text/javascript">
var id = '';
var option = {
	url : "<?php echo base_url('adminstand/getNamaBahanJadi');?>",
	getValue: function(element) {
		console.log(element);
		return element.nama_bahan_jadi;
	},
	list :{
		maxNumberOfElements: 10,
		showAnimation:{
			type:"fade",
			time:400,
			callback:function(){}
		},
		hideAnimation:{
			type:"slide",
			time:400,
			callback:function(){}
		},
		match: {
			enabled: true
		},
		onClickEvent: function() {
			var bahan = $('#namabahanjadi').getSelectedItemData().nama_bahan_jadi;

			$('#namabahanjadi').val(bahan).trigger("change");
		}  
	}
}

$('#namabahanjadi').change(function(){	
	var data = $('#namabahanjadi').val();
	$.ajax({
          type:"post",
          url: "<?php echo base_url('adminstand/getNamaBahanJadi')?>/",
          dataType:"json",
          success:function(list)
          {
          	// console.log(list);
			list.forEach(function(item){
				var found = false;

				if (data==item.nama_bahan_jadi) {
					found = true;
					id = item.id_bahan_jadi;

					if ($('#namabahanjadi').has("is-invalid")) {
						$('#namabahanjadi').removeClass("is-invalid");
					}
				}else{
					if (!found) {
						id = 'unidentified';
					}
					
					$('#namabahanjadi').addClass("is-invalid");
				}
			});
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
            alert(errorThrown);
          }
      }
    );
});

$('.numeric').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9]/g, '');
});

$("#namabahanjadi").easyAutocomplete(option);

function tambahstokbahan() {
	var id_bahan = id;
	var nama = $('#namabahanjadi').val();
	var stokmasuk = $('#stokmasuk').val();

	if (id_bahan == 'unidentified') {
		$('#namabahanjadi').addClass("is-invalid");
	}

	if ($('#stokmasuk').val() == '') {
		$('#stokmasuk').addClass("is-invalid");
	}

	if (id_bahan != 'unidentified' && $('#stokmasuk').val() != '') {
		$.ajax(
            {
                type:"post",
                url: "<?php echo base_url('adminstand/tambah_stok_masuk')?>/",
                data:{ id:id_bahan,nama:nama,stokmasuk:stokmasuk},
                success:function(response)
                {
                	$("#namabahanjadi").val('');
                    $("#stokmasuk").val('');

                  if(response == 'Berhasil Ditambahkan'){
                    reload_table();
                    
                    if($('#namabahanjadi').has("is-invalid")){
                      $('#namabahanjadi').removeClass("is-invalid");
                    }

                    if($('#stokmasuk').has("is-invalid")){
                      $('#stokmasuk').removeClass("is-invalid");
                    }

                    $("#namabahanjadi").focus();

                    alert(response);
                  }else if(response =='ID Data Sudah ada di dalam database'){
                    
                    alert(response);
                  }else{
                    alert('unknown error is happen! try again.');
                  }
                  
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                  alert(errorThrown);
                }
            }
        );
	}
}

jQuery( document ).ready(function( $ ) {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
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
      serverSide: true,
      ajax: {
    "type"   : "POST",
    "url"    : "<?php echo base_url('adminstand/dataStokMasuk');?>",
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'id_bahan_jadi': json.data[i].id_bahan_jadi,
          'nama_bahan'  : json.data[i].nama_bahan_jadi,
          'stok_masuk' : json.data[i].stok_masuk,
          'tgl' : json.data[i].tanggal,
          'edit' : '<button onclick="" class="btn btn-warning" style="color:white;">Edit</button> ',
          'hapus' : '<button onclick="" class="btn btn-danger" style="color:white;">Delete</button>'
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
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            },{
                extend: 'print',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1,2,3]
                }
            }
        ],
        "lengthChange": true,
  columns: [
    {'data': 'id_bahan_jadi'},
    {'data': 'nama_bahan'},
    {'data': 'stok_masuk'},
    {'data': 'tgl'},
    {'data': 'edit','orderable':false,'searchable':false},
    {'data': 'hapus','orderable':false,'searchable':false}
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
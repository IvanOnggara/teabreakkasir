<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul">
	            KAS AWAL HARIAN
	        </div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="form-group">
			  	<label>Kas Hari Ini</label>
			  	<input type="text" class="form-control numeric" id="kasawal" placeholder="Kas">
          
			</div>
		</div>
	</div>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <button class="btn btn-success" onclick="simpankas()"><span class="fa fa-save"></span> Simpan</button>
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
<script src=<?php echo base_url("assets/js/teabreak.js"); ?>></script>
</body>
</html>
<script type="text/javascript">
var id = '';

$('.numeric').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9]/g, '');
});

$("#kasawal").focus(function() { $(this).select(); } );

$.ajax(
  {
      type:"post",
      url: "<?php echo base_url('adminstand/cekDataKas')?>/",
      // data:{ keterangan:keterangan,jumlahpengeluaran:jumlahpengeluaran},
      success:function(response)
      {
         $("#kasawal").val(response);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert(errorThrown);
      }
  }
);

function simpankas() {
	var kas = $('#kasawal').val();

	if (kas == '') {
		$('#kasawal').addClass("is-invalid");
	}else{
    $('#kasawal').removeClass("is-invalid");
    $.ajax(
        {
            type:"post",
            url: "<?php echo base_url('adminstand/simpankas')?>/",
            data:{ kas:kas},
            success:function(response)
            {
               alert('sukses update data!');
              
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
    "url"    : "<?php echo base_url('adminstand/dataPengeluaranLain');?>",
    "dataSrc": function (json) {
      var return_data = new Array();
      for(var i=0;i< json.data.length; i++){
        return_data.push({
          'tanggal': uidate(json.data[i].tanggal),
          'keterangan': json.data[i].keterangan.split('-').join(' - '),
          'pengeluaran'  : "Rp. "+currency(json.data[i].pengeluaran)+",-",
          'edit' : '<button onclick="editpengeluaran(\''+json.data[i].id_pengeluaran+'\',\''+json.data[i].keterangan+'\',\''+json.data[i].pengeluaran+'\')" class="btn btn-warning" >Edit</button> ',
          'delete' : '<button onclick="deletepengeluaran(\''+json.data[i].id_pengeluaran.split(' ').join('+')+'\')" class="btn btn-danger">Delete</button> '
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
                  columns:[0,1]
                }
            },{
                extend: 'excelHtml5',
                text: 'Excel',
                className: 'exportExcel',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1]
                }
            },{
                extend: 'csvHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1]
                }
            },{
                extend: 'pdfHtml5',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1]
                }
            },{
                extend: 'print',
                filename: 'Produk Data',
                exportOptions: {
                  columns:[0,1]
                }
            }
        ],
        "lengthChange": true,
  columns: [
    {'data': 'tanggal'},
    {'data': 'keterangan'},
    {'data': 'pengeluaran'},
    {'data': 'edit','orderable':false,'searchable':false},
    {'data': 'delete','orderable':false,'searchable':false}
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

function editpengeluaran(id,keterangan,pengeluaran) {
  $('#modal_edit').modal('toggle');
  $('#editket').val(keterangan.split('-').join('\n'));
  $('#editpeng').val(pengeluaran);
  $('#id_lama').val(id);
}

function deletepengeluaran(id) {
  // body...
}

function simpanedit() {


  
  var keteranganbaru = $('#editket').val().split('\n').join('-');
  var pengeluaranbaru = $('#editpeng').val();
  var id_pengeluaran = $('#id_lama').val();

  if (keteranganbaru == '' || pengeluaranbaru == '') {
    if (keteranganbaru == '') {
      $('#editket').addClass('is-invalid');
    }

    if (pengeluaranbaru == '') {
      $('#editpeng').addClass('is-invalid');
    }

    alert('Periksa Kembali inputan anda');
  }else{
    console.log(id_pengeluaran);
    $.ajax(
        {
            type:"post",
            url: "<?php echo base_url('adminstand/edit_pengeluaran_lain')?>/",
            data:{ keteranganbaru:keteranganbaru,pengeluaranbaru:pengeluaranbaru,id_pengeluaran:id_pengeluaran},
            success:function(response)
            {
              reload_table();

              if(response == 'Berhasil Diupdate'){
                
                
                if($('#editket').has("is-invalid")){
                  $('#editket').removeClass("is-invalid");
                }

                if($('#editpeng').has("is-invalid")){
                  $('#editpeng').removeClass("is-invalid");
                }

                $('#modal_edit').modal('toggle');

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
</script>
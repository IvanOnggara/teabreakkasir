<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul">
	            SINKRONISASI FINGERSPOT -> PC
	        </div>
		</div>
	</div>
	<br>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <button class="btn btn-success btn-lg" onclick="sinkronuser()"><span id="sinkronuser" class="fa fa-refresh"></span> Sinkronisasi USER</button>
    </div>
    <div class="col-md-6 col-sm-12">
      <button class="btn btn-success btn-lg" onclick="sinkronpresensi()"><span id="sinkronpresensi" class="fa fa-refresh"></span> Sinkronisasi PRESENSI</button>
    </div>
    <div class="col-md-6 col-sm-12">
      <b><p class="" id="labelsinkronuser"></p></b>
    </div>
    <div class="col-md-6 col-sm-12">
      <b><p class="" id="labelsinkronpresensi"></p></b>
    </div>
  </div>
  

  <div class="row">
		<div class="col-md-12">
			<div style="padding: 0px;" class="menujudul">
	            SINKRONISASI PC -> ONLINE
	        </div>
		</div>
	</div>
	<br>
  <div class="row">
    <div class="col-md-6 col-sm-12">
      <button class="btn btn-success btn-lg" onclick="sinkronuseronline()"><span id="sinkronuseronline" class="fa fa-refresh"></span> Sinkronisasi USER</button>
    </div>
    <div class="col-md-6 col-sm-12">
      <button class="btn btn-success btn-lg" onclick="sinkronpresensionline()"><span id="sinkronpresensionline" class="fa fa-refresh"></span> Sinkronisasi PRESENSI</button>
    </div>
    <div class="col-md-6 col-sm-12">
      <b><p class="" id="labelsinkronuseronline"></p></b>
    </div>
    <div class="col-md-6 col-sm-12">
      <b><p class="" id="labelsinkronpresensionline"></p></b>
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
<script type="text/javascript">
	function sinkronpresensi() {
        $('#sinkronpresensi').addClass('fa-spin');
        $('#labelsinkronpresensi').removeClass('red');
        $('#labelsinkronpresensi').removeClass('green');
        $('#labelsinkronpresensi').html('LOADING...');
        $('#labelsinkronpresensi').addClass('orange');
        
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/sinkronpresensi')?>/",
              data:{ sst:"sinkron"},
              dataType:"text",
              success:function(response)
              {
                $('#labelsinkronpresensi').removeClass('orange');
                if (response == 'CANTCONNECT') {
                    $('#labelsinkronpresensi').html('KONEKSI ERROR!');
                    $('#labelsinkronpresensi').addClass('red');
                }else if (response == 'SUCCESSSAVE') {
                    $('#labelsinkronpresensi').html('SINKRONISASI SUKSES!');
                    $('#labelsinkronpresensi').addClass('green');
                }else{
                    $('#labelsinkronpresensi').html('TIDAK ADA PERUBAHAN DATA!');
                    $('#labelsinkronpresensi').addClass('red');
                }
                console.log(response);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function(){
                $('#sinkronpresensi').removeClass('fa-spin');
              }
          }
        );
    }

    function sinkronuser() {
        $('#sinkronuser').addClass('fa-spin');
        $('#labelsinkronuser').removeClass('red');
        $('#labelsinkronuser').removeClass('green');
        $('#labelsinkronuser').html('LOADING...');
        $('#labelsinkronuser').addClass('orange');
        
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/sinkronuser')?>/",
              data:{ sst:"sinkron"},
              dataType:"text",
              success:function(response)
              {
                $('#labelsinkronuser').removeClass('orange');
                if (response == 'CANTCONNECT') {
                    $('#labelsinkronuser').html('KONEKSI ERROR!');
                    $('#labelsinkronuser').addClass('red');
                }else if (response == 'SUCCESSSAVE') {
                    $('#labelsinkronuser').html('SINKRONISASI PRESENSI SUKSES!');
                    $('#labelsinkronuser').addClass('green');
                }else{
                    $('#labelsinkronuser').html('TIDAK ADA PERUBAHAN DATA!');
                    $('#labelsinkronuser').addClass('red');
                }
                console.log(response);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function(){
                $('#sinkronuser').removeClass('fa-spin');
              }
          }
        );
    }

    function sinkronpresensionline(argument) {
    	$('#sinkronpresensionline').addClass('fa-spin');
        $('#labelsinkronpresensionline').removeClass('red');
        $('#labelsinkronpresensionline').removeClass('green');
        $('#labelsinkronpresensionline').html('LOADING...');
        $('#labelsinkronpresensionline').addClass('orange');
        
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/sinkronpresensionline')?>/",
              data:{ sst:"sinkron"},
              dataType:"text",
              success:function(response)
              {
                $('#labelsinkronpresensionline').removeClass('orange');
                if (response == 'CANTCONNECT') {
                    $('#labelsinkronpresensionline').html('KONEKSI ERROR!');
                    $('#labelsinkronpresensionline').addClass('red');
                }else if (response == 'SUCCESSSAVE') {
                    $('#labelsinkronpresensionline').html('SINKRONISASI SUKSES!');
                    $('#labelsinkronpresensionline').addClass('green');
                }else{
                    $('#labelsinkronpresensionline').html('TIDAK ADA PERUBAHAN DATA!');
                    $('#labelsinkronpresensionline').addClass('red');
                }
                console.log(response);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function(){
                $('#sinkronpresensionline').removeClass('fa-spin');
              }
          }
        );
    }

    function sinkronuseronline(argument) {
    	$('#sinkronuseronline').addClass('fa-spin');
        $('#labelsinkronuseronline').removeClass('red');
        $('#labelsinkronuseronline').removeClass('green');
        $('#labelsinkronuseronline').html('LOADING...');
        $('#labelsinkronuseronline').addClass('orange');
        
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/sinkronuseronline')?>/",
              data:{ sst:"sinkron"},
              dataType:"text",
              success:function(response)
              {
                $('#labelsinkronuseronline').removeClass('orange');
                if (response == 'CANTCONNECT') {
                    $('#labelsinkronuseronline').html('KONEKSI ERROR!');
                    $('#labelsinkronuseronline').addClass('red');
                }else if (response == 'SUCCESSSAVE') {
                    $('#labelsinkronuseronline').html('SINKRONISASI PRESENSI SUKSES!');
                    $('#labelsinkronuseronline').addClass('green');
                }else{
                    $('#labelsinkronuseronline').html('TIDAK ADA PERUBAHAN DATA!');
                    $('#labelsinkronuseronline').addClass('green');
                }
                console.log(response);
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function(){
                $('#sinkronuseronline').removeClass('fa-spin');
              }
          }
        );
    }
</script>
</body>
</html>
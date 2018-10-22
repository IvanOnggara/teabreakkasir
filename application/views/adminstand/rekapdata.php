<div class="container">
  <div class="row">
      <div class="col-md-4 text-center">
        
      </div>
      <div class="col-md-4 text-center">
        
      </div>
  </div>
	<div class="row">
    <div class="col-md-4 col-lg-4">
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <h1><span class="badge badge-primary">KAS AWAL</span></h1>
              </div>
        </div>
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <div id="kasawal">Rp. --.---,-</div>
              </div>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <h1><span class="badge badge-primary">HASIL PENJUALAN</span></h1>
              </div>
        </div>
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <div id="hasilcash">Rp. --.---,- (cash)</div>
              </div>
              <button class="btn btn-sm btn-primary" onclick="openmodaldetail()"><i class="fa fa-eye"></i> detail</button>
        </div>
    </div>

    <div class="col-md-4 col-lg-4">
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <h1><span class="badge badge-danger">PENGELUARAN</span></h1>
              </div>
        </div>
        <div class="col-md-12 text-center">
          <div style="padding: 0px;" class="menujudul">
                  <div id="pengeluaran">Rp. --.---,-</div>
              </div>
        </div>
    </div>

		
	</div>
	<br>
	<div class="row">
		<div class="col-md-12 col-sm-12 text-center">
			<div style="padding: 0px;" class="menujudul">
                  <div id="totalkasir">TOTAL UANG KASIR : Rp. ---.---,-</div>
              </div>
		</div>
    <div class="col-md-6 col-sm-6 text-right" style="margin-top: 25px">
      <button class="btn btn-lg btn-primary" onclick="printrekapharian()"><i class="fa fa-print"></i> CETAK LAPORAN </button>
    </div>
    <div class="col-md-6 col-sm-6 text-left" style="margin-top: 25px">
      <button class="btn btn-lg btn-success" onclick="saverekapharian()"><i class="fa fa-save"></i> SIMPAN LAPORAN </button>
      
    </div>
    <div class="col-md-12 col-sm-12 text-center" style="margin-top: 15px">
      <h6 id="tanggal" class="">Tanggal : --/--/----</h6>
        <h6 id="waktu" class="">Waktu : --:--</h6>
    </div>

    <div class="col-md-12 col-sm-12 text-center" style="margin-top: 15px">
      <h4 id="loadingprint" style="color: green" ><i class="fa fa-spin fa-refresh"></i></h4>
    </div>

    
		
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
		</div>
		
	</div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Detail Pemasukan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>CASH</strong></label>
                                
                                <h4><span class="badge badge-success" id="cashdetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>DEBIT</strong></label>
                                
                                <h4><span class="badge badge-primary" id="debitdetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                <label class=" form-control-label"><strong>OVO</strong></label>
                                
                                <h4><span class="badge badge-warning" id="ovodetail">Rp. -.---.---,-</span></h4>
                            </div>
                        </div>
                    </div>
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
<script src=<?php echo base_url("assets/vendors/jsPDF-1.3.2/dist/jspdf.debug.js")?>></script>
<script src=<?php echo base_url("assets/js/jquery.easy-autocomplete.js")?>></script>
<!-- bootstrap-daterangepicker -->
    <script src=<?php echo base_url("assets/vendors/moment/min/moment.min.js")?>></script>
    <script src=<?php echo base_url("assets/vendors/bootstrap-daterangepicker/daterangepicker.js")?>></script>
    <!-- bootstrap-datetimepicker -->    
    <script src=<?php echo base_url("assets/vendors/Date-Time-Picker-Bootstrap-4/build/js/bootstrap-datetimepicker.min.js")?>></script>
    <script type="text/javascript">
      var tanggalfull = new Date();
      var tanggal = tanggalfull.getDate();
      var bulan = tanggalfull.getMonth()+1;
      var tahun = tanggalfull.getFullYear();
      var jam = tanggalfull.getHours();
      var menit = tanggalfull.getMinutes();

      if (parseInt(tanggal)<10) {
        tanggal = "0"+tanggal;
      }

      if (parseInt(bulan)<10) {
        bulan = "0"+bulan;
      }

      if (parseInt(jam)<10) {
        jam = "0"+jam;
      }

      if (parseInt(menit)<10) {
        menit = "0"+menit;
      }

      $('#tanggal').text("Tanggal : "+tanggal+"/"+bulan+"/"+tahun);
      $('#waktu').text("Waktu : "+jam+":"+menit);

      function openmodaldetail() {
        $('#modalDetail').modal('toggle');
      }

      var uangdikasir = 0;
      var datarekapharian;

      $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/getrekapdata')?>/",
              data:{},
              success:function(response)
              {
                response = jQuery.parseJSON(response);
                var kasawal = response.kasawal;
                var hasilcash = response.hasilcash;
                var pengeluaran = response.pengeluaran;
                var cashdetail = response.cashdetail;
                var ovodetail = response.ovodetail;
                var debitdetail = response.debitdetail;
                var totalkasir = response.totalkasir;

                kasawal = "Rp. "+currency(kasawal)+",-";
                hasilcash = "Rp. "+currency(hasilcash)+",-";
                pengeluaran = "Rp. "+currency(pengeluaran)+",-";
                cashdetail = "Rp. "+currency(cashdetail)+",-";
                ovodetail = "Rp. "+currency(ovodetail)+",-";
                debitdetail = "Rp. "+currency(debitdetail)+",-";
                totalkasir = "TOTAL UANG KASIR : Rp. "+currency(totalkasir)+",-";

                $('#kasawal').html(kasawal);
                $('#hasilcash').html(hasilcash);
                $('#pengeluaran').html(pengeluaran);
                $('#cashdetail').html(cashdetail);
                $('#ovodetail').html(ovodetail);
                $('#debitdetail').html(debitdetail);
                $('#totalkasir').html(totalkasir);
                datarekapharian = response;
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              }
          }
      );

      function currency(number1) {
        var retVal=number1.toString().replace(/[^\d]/g,'');
        while(/(\d+)(\d{3})/.test(retVal)) {
          retVal=retVal.replace(/(\d+)(\d{3})/,'$1'+'.'+'$2');
        }
        return retVal;
      }
      $('#loadingprint').hide();
      function printrekapharian() {
        $('#loadingprint').show();
        $.ajax({
              type:"post",
              url: "<?php echo base_url('adminstand/printrekap')?>/",
              dataType:"text",
              data:{ datarekapharian:JSON.stringify(datarekapharian)},
              success:function(response)
              {
                  alert('printed');
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                alert(errorThrown);
              },
              complete: function (argument) {
                
                $('#loadingprint').hide();
              }
          }
        );
      }

      function saverekapharian() {
        alert('fungsi masih dalam tahap pengembangan!');
      }
    </script>
</body>
</html>
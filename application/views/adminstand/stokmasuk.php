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
			  	<input type="text" class="form-control" id="stokmasuk" placeholder="Stok Masuk">
			</div>
		</div>
		<div class="col-md-2 col-sm-12">
			<label for="usr">Action</label>
			<button class="btn btn-success" id="buttontambahstok">Tambah Stok Masuk</button>
		</div>
	</div>
	<div class="row">
		<table id="mytable" class="table table-striped table-bordered">
	        <thead>
	          <tr>
	            <th>ID Produk</th>
	            <th>Nama Produk</th>
	            <th>Kategori</th>
	            <th>Harga Jual</th>
	            <th>Edit</th>
	            <th>Delete</th>
	          </tr>
	        </thead>
	    </table>
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
</body>
</html>